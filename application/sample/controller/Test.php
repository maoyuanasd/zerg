<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/19
 * Time: 9:34
 */

namespace app\sample\controller;

use think\Request;
class Test
{
   public function hello(Request $request)
   {
//     $all=  input('param.');

      $all= $request->param();
       var_dump($all);
//       $name= Request::instance()->param('name');
//       $age= Request::instance()->param('age');
//
//       echo $id;
//       echo '|';
//       echo  $name;
//       echo $age;
////       return 'hello,word';
   }
}