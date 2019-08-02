<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/30
 * Time: 15:20
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\service\WxNotify;
use app\api\validate\IDMustBePostiveInt;
use app\api\service\Pay as PayService;
use think\Loader;

Loader::import('WxPay.WxPay', EXTEND_PATH, '.Api.php');
class Pay extends BaseController
{
   protected $beforeActionList=[
       'checkExclusiveScope'=>['only'=>'getPreOrder']
   ];
   public function getPreOrder($id=''){
       (new IDMustBePostiveInt())->goCheck();
       $pay=new PayService($id);
     return  $pay->pay();
   }
   public function  redirectNotify(){
       //通知频率为15/15/30/180/1800/1800/1800/1800/3600 单位:秒
       //1 检查库存量
       //2 更新订单的status状态
       //3 减库存
       // 如果成功处理,我们返回微信成功处理的信息,否则,我们需要返回没有成功处理
       // 特点: POST : XML格式: 不会携带参数
       $notify=new WxNotify();
       $wxPayConfig=new \WxPayConfig();
       $notify->Handle($wxPayConfig);
   }
   public function receiveNotify(){

//       $notify=new WxNotify();
//       $wxPayConfig=new \WxPayConfig();
//       $notify->Handle($wxPayConfig);
               $xmlData = file_get_contents('php://input');
        $result = curl_post_raw('http:/z.cn/api/v1/pay/re_notify?XDEBUG_SESSION_START=13133',
            $xmlData);
        return $result;
   }
}