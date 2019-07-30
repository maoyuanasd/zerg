<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/30
 * Time: 15:20
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\validate\IDMustBePostiveInt;

class Pay extends BaseController
{
   protected $beforeActionList=[
       'checkExclusiveScope'=>['only'=>'getPreOrder']
   ];
   public function getPreOrder($id=''){
       (new IDMustBePostiveInt())->goCheck();
   }
}