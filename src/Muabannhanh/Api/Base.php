<?php
namespace Muabannhanh\Api;

class Base
{
    public function json($data)
    {
        self::jsonResponse($data);
    }
    public static function jsonResponse($data)
    {
        header('Content-Type: application/json');

        if (is_string($data)) {
            echo $data;
        } else if (is_array($data)) {
            echo json_encode($data);
        } else {
            echo json_encode(((array)$data));
        }

        die;
    }

}