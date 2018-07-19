<?php
namespace Muabannhanh\Api;

class Curl
{
    private $header = array(
        'Accept:  application/json',
        'Accept-Encoding: gzip, deflate',
        'Cache-Control: no-cache',
        'Content-Type: application/json; charset=utf-8',
        'User-Agent: SDK MuaBanNhanh@2018'
    );
    private $sessionToken = '';

    private $url = "https://api.muabannhanh.com/";

    private static $instants;

    function __construct($private_key, $public_key, $session_token)
    {
        if ($private_key == '' || $public_key == '' || $session_token == '') {
            throw new \Exception("Key not found on init Curl");
        }

        $this->header[] = "Mbn-Public-Key: {$public_key}";
        $this->header[] = "Mbn-Private-Key: {$private_key}";
        $this->sessionToken = $session_token;

        self::$instants = $this;
    }

    public static function init(){
        if (!self::$instants) {
            self::$instants  = new Curl('none','none','none');
        }

        return self::$instants;
    }


    public function get($url, $data = array(), $options = array())
    {
        $result = self::sendRequest($url, $data,'get', $options);
        $result = json_decode($result, true);
        return $result;
    }

    private function sendRequest($url, $post, $method, $options = array())
    {
        $url = trim($url);
        $url = $this->url . $url;
        $sessionToken = http_build_query(array(
            "session_token" => $this->sessionToken
        ));

        if (strpos("?", $url)) {
            $url .= "&{$sessionToken}";
        } else {
            $url .= "?" .  $sessionToken;
        }


        if (is_array($post)) {
            if (count($post)) {
                $data = http_build_query($post);

                if ($method == 'get') {
                    $url .= "&" . http_build_query($post);
                }
            }
        } else {
            $data = $post;

            if ($method == 'get') {
                $url .= "&" . $post;
            }
        }

        $defaults = array(
            CURLOPT_URL => $url,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_FORBID_REUSE => true,
            CURLOPT_FRESH_CONNECT => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false
        );

        if ($method == "post") {
            $defaults[CURLOPT_POST] = true;
            $defaults[CURLOPT_POSTFIELDS] = $data;
        } else if ($method == "post_json") {

        }

        $defaults[CURLOPT_HTTPHEADER] = $this->header;

        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}