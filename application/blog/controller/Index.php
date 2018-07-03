<?php
namespace app\blog\controller;


class Index
{
    public $a = 1;
    protected $c = 10;
    protected $b = 100;
    const BIT_5 = 5 * 6;

    public function index()
    {
//        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) 2018新年快乐</h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">12载初心不改（2006-2018） - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';
    }

    public function hello($name="World"){
        echo "Hello ".$name;
    }    

    public function jingtai()
    {

        echo "asd";
    }

    public static function abc()
    {
        return "index's abc()";
    }

    public static function bcd(){
        echo static::abc();
    }
}

//$index = new Index();
//echo $index::BIT_5;
//$index->jingtai();
//echo $index->a;

//class Child extends Index
//{
//    protected $c = 20;
//
//    public function dayin(){
//        echo $this->c."<br>";
//        echo $this->b;
//    }
//}

