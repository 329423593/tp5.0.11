<?php
/**
 * Created by PhpStorm.
 * User: Linweichao
 * Date: 2018/6/14
 * Time: 上午10:24
 */

namespace app\blog\controller;


class SingleMode
{
    private static $instance = null;

    public function index()
    {
        echo "11";
    }

    private function __construct()
    {

    }

    private function __clone()
    {

    }

    public static function getInstance()
    {
        if(!(self::$instance instanceof self)){
            self::$instance = new self();
        }
        return self::$instance;
    }
}


$ss = singlemode::getInstance();
$bb = singlemode::getInstance();
var_dump($ss);
var_dump($bb);
?>
