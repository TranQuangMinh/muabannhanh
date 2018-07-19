<?php
namespace Muabannhanh\Api;

use Exception;

class Province
{

    private static $endpoint = array(
        "list" => "province/list"
    );

    public static function getSingle($args)
    {
        if (isset($args['id']) && (int)$args['id'] > 0) {
            $provinces = self::findList();
            foreach ($provinces['result'] as $province) {
                if ($args['id'] == $province['id']) {
                    return $province;
                }
            }
        } else {
            throw new \Exception("Province not found");
        }

    }


    public static function findList()
    {

        $response = Curl::init()->get(self::$endpoint['list']);
        return $response;
    }
}