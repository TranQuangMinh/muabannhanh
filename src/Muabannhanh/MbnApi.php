<?php 

namespace Muabannhanh;

use Exception;
use Muabannhanh\Api\Article;
use Muabannhanh\Api\Base;
use Muabannhanh\Api\Category;
use Muabannhanh\Api\Curl;
use Muabannhanh\Api\Province;

class MbnApi  extends Base {

	function __construct($args)
	{
		if (!isset($args['public_key']) || !isset($args['public_key']) || !isset($args['session_token'])) {
		    throw new Exception("Key not found");
        }
        new Curl($args['private_key'], $args['public_key'], $args['session_token']);
	}


	public function get($type, $args = array()) {
        $output = array();

        switch ($type){
            case 'article':
                $output  = Article::getSingle($args);
                break;
            case 'job':
                break;
            case 'user':
                break;
            case 'category':
                $output  = Category::getSingle($args);
                break;
            case 'province':
                $output  = Province::getSingle($args);
                break;
        }

        return $output;
    }

	public function find($type, $args = array()) {
        $output = array();

        switch ($type){
            case 'article':
                $output  = Article::findList($args);
                break;
            case 'job':
                break;
            case 'user':
                break;
            case 'category':
                $output  = Category::findList();
                break;
            case 'province':
                $output  = Province::findList();
                break;
        }

        return $output;
    }
}