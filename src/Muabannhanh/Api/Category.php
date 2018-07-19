<?php
namespace Muabannhanh\Api;

use Exception;

class Category
{

    private static $endpoint = array(
        "single" => "category/detail",
        "list" => "category/list"
    );

    public static function getSingle($args)
    {
        $id  = isset($args['id']) ? $args['id'] : "";
        if (empty($id) || $id == 0) {
            throw new Exception("Id category is required");
        }
        $dataQuery = array(
            "id" => $id,
        );

        $response = Curl::init()->get(self::$endpoint['single'], $dataQuery);

        return $response;
    }


    public static function findList()
    {

        $response = Curl::init()->get(self::$endpoint['list']);
        return $response;
    }
}