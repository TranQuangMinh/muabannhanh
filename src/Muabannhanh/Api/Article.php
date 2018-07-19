<?php
namespace Muabannhanh\Api;

class Article
{

    private static $endpoint = array(
        "single" => "article/detail",
        "list" => "article/elastic-search-list"
    );

    public static function getSingle($args)
    {
        $id       = isset($args['id']) ? $args['id'] : "";
        $hash_id  = isset($args['hash_id']) ? $args['hash_id'] : "";
        $is_count = isset($args['is_count']) ? $args['is_count'] : "";


        $dataQuery = array(
            "id" => $id,
            "hash_id" => $hash_id,
            "is_count" => $is_count
        );

        foreach ($dataQuery as $key => $value) {
            if (empty($value) || $value == '') {
                unset($dataQuery[$key]);
            }
        }

        $response = Curl::init()->get(self::$endpoint['single'], $dataQuery);

        return $response;
    }


    public static function findList($args)
    {

        $dataQuery['q']                  = isset($args['q']) ? $args['q'] : '';
        $dataQuery['no_id']              = isset($args['no_id']) ? $args['no_id'] : '';
        $dataQuery['parent_category_id'] = isset($args['parent_category_id']) ? $args['parent_category_id'] : '';
        $dataQuery['category_id']        = isset($args['category_id']) ? $args['category_id'] : '';
        $dataQuery['category_ids']       = isset($args['category_ids']) ? $args['category_ids'] : '';
        $dataQuery['user_id']            = isset($args['user_id']) ? $args['user_id'] : '';
        $dataQuery['phone']              = isset($args['phone']) ? $args['phone'] : '';
        $dataQuery['page_id']            = isset($args['page_id']) ? $args['page_id'] : '';
        $dataQuery['membership_vip']     = isset($args['membership_vip']) ? $args['membership_vip'] : '';
        $dataQuery['membership_partner'] = isset($args['membership_partner']) ? $args['membership_partner'] : '';
        $dataQuery['user_membership']    = isset($args['user_membership']) ? $args['user_membership'] : '';
        $dataQuery['sort']               = isset($args['sort']) ? $args['sort'] : '';
        $dataQuery['slug_tag']           = isset($args['slug_tag']) ? $args['slug_tag'] : '';
        $dataQuery['conditions']         = isset($args['conditions']) ? $args['conditions'] : '';
        $dataQuery['type_display']       = isset($args['type_display']) ? $args['type_display'] : '';
        $dataQuery['province_id']        = isset($args['province_id']) ? $args['province_id'] : '';
        $dataQuery['district_id']        = isset($args['district_id']) ? $args['district_id'] : '';
        $dataQuery['type']               = isset($args['type']) ? $args['type'] : '';
        $dataQuery['price_min']          = isset($args['price_min']) ? $args['price_min'] : '';
        $dataQuery['price_max']          = isset($args['price_max']) ? $args['price_max'] : '';
        $dataQuery['filter']             = isset($args['filter']) ? $args['filter'] : '';
        $dataQuery['hash_tag']           = isset($args['hash_tag']) ? $args['hash_tag'] : '';
        $dataQuery['page']               = isset($args['page']) ? $args['page'] : '';
        $dataQuery['limit']              = isset($args['limit']) ? $args['limit'] : '';

        foreach ($dataQuery as $key => $value) {
            if (empty($value) || $value == '') {
                unset($dataQuery[$key]);
            }
        }

        $response = Curl::init()->get(self::$endpoint['list'], $dataQuery);
        return $response;
    }
}