<?php
namespace app\api\controller;

use Config;
class Index
{
    public function index($type='json')
    {
        if(!in_array($type, ['json','xml'])){
            $type='json';
        }

        Config::set('default_return_type', $type);

        $arr = [
          'code' => 200,
          'list' => [
              'name' => 'lin',
              'age' => 28
          ]
        ];
        return $arr;
    }
}
