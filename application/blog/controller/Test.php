<?php
/**
 * Created by PhpStorm.
 * User: Linweichao
 * Date: 2018/6/13
 * Time: 下午2:26
 */

//include "Index.php";
//var_dump(new Index());
namespace app\blog\controller;
use Config;
use think\cache\driver\Memcached;
use think\Db;
use app\blog\model\User;    //推荐使用这种获取模型类的方式。
//use app\blog\Common;


class Test extends BackAction
{
    public static $d = 10;
    public $e = 20;

    private $t;

    public function __construct()
    {
//        echo "对象创建<br>";
        parent::__construct();
    }

    public function index(){
//        echo "test's index";
        $request = request();
//        return dump($request->config('database'));


        $res = Db::table('user')->where('id',1)->find();

        $res2 = User::get(2);   //推荐用这种方法

        $user = model("User");  //不推荐直接用这种方法。
        $res3 = $user::get(1);


        $arr = ["id" => 2, "username" => "佳佳"];
        $res4 = User::whereor(["id" => 3, "username" => "佳佳"])
            ->field("id, username")
            ->find();

        $res5 = User::where("id", "<", 3)
            ->select();

        $res6 = User::all("1, 2");

        $res7 = User::all(function($query){
            $query->where("id", "<", 3)
                ->select();
        });

        $mem = new Memcached();
//        dump($mem);
//$re='1';

        return dump($mem);
    }

    public function compare(){
        $a = 10;
        $b = 20;
        $c = 30;
        $this->assign('a', $a);
        $this->assign('b', $b);
        $this->assign('c', $c);

        return $this->fetch();
    }

    public function loop(){
        $res1 = ['user1' => [
                'name' => 'lin',
                'age' => 28
            ],
            'user2' => [
                'name' => 'wang',
                'age' => 27
            ],
            'user3' => [
                'name' => 'lv',
                'age' => 26
            ]
        ];
        $res2 = ['user1' => [
                'name' => 'lin',
                'age' => 28
            ],
            'user2' => [
                'name' => 'wang',
                'age' => 27
            ],
            'user3' => [
                'name' => 'lv',
                'age' => 26
            ]
        ];
        $res3 = ['user1' => [
                'name' => 'lin',
                'age' => 28
            ],
            'user2' => [
                'name' => 'wang',
                'age' => 27
            ],
            'user3' => [
                'name' => 'lv',
                'age' => 26
            ]
        ];

        $this->assign('res1', $res1);
        $this->assign('res2', $res2);
        $this->assign('res3', $res3);

        return $this->fetch();
    }

    public static function curl_request(){
        $data = 'theRegionCode=31124';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'ws.webxml.com.cn/WebServices/WeatherWS.asmx/getSupportCityString');
        curl_setopt($curl, CURLOPT_HEADER, false);  // 启用时会将头文件的信息作为数据流输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);   // TRUE时，将curl_exec()获取的信息以字符串返回，而不是直接输出。

        curl_setopt($curl, CURLOPT_POST, true);   // 类型为：application/x-www-form-urlencoded
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/x-www-form-urlencoded; charset=utf-8', 'Content-length: '.strlen($data)));// 设置 HTTP 头字段的数组。格式： array('Content-type: text/plain', 'Content-length: 100')

//curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);   // TRUE 时将会根据服务器返回 HTTP 头中的 "Location: " 重定向。（注意：这是递归的，"Location: " 发送几次就重定向几次，除非设置了 CURLOPT_MAXREDIRS，限制最大重定向次数。）。当页面出现重定向时使用。

        $html = curl_exec($curl);
        if(!curl_errno($curl)){
            echo "<textarea style='width:800px;height:600px;'>".$html."</textarea>";
        }else{
            echo "curl error: ".curl_error($curl);
        }
        curl_close($curl);
    }

    public function tem_inherit(){
        return $this->fetch();
    }

    public function tem_inherit2(){
        return $this->fetch();
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
//        echo "<br>对象已销毁";
    }
}


//var_dump(SingleMode::getInstance());




