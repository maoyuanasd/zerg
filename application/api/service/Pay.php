<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/30
 * Time: 15:38
 */

namespace app\api\service;


use app\api\model\Order as OrderModel;
use app\api\service\Order as OrderService;
use app\lib\enum\OrderStatusEnum;
use app\lib\exception\OrderException;
use app\lib\exception\TokenException;
use think\Exception;
use think\Loader;
use think\Log;

// extend\WxPay\WxPay.Api.php
//Loader::import('WxPay.Wxpay',EXTEND_PATH,'.Api.php');
Loader::import('WxPay.WxPay', EXTEND_PATH, '.Api.php');
class Pay
{
  private $orderID;
  private $orderNO;
    function  __construct($orderID)
    {
        if(!$orderID){
            throw new Exception('订单号不允许为NULL');
        }
        $this->orderID=$orderID;
    }
    public function pay(){
        //订单号可能根本就不存在
        //订单有可能已经被支付过
        //订单号确实是存在的,当时订单号和当前用户是不匹配的
        //进行库存量检测
        $this->checkOrderValid();
        $OrderService=new OrderService();
      $status= $OrderService->checkOrderStock($this->orderID);
        if(!$status['pass']){
            return $status;
        }
       return $this->makeWxPreOrder($status['orderPrice']);
    }
    private function makeWxPreOrder($totalPrice){
        $openid=Token::getCurrentTokenVar('openid');
        if(!$openid){
            throw new TokenException();
        }
        $wxOrderData = new \WxPayUnifiedOrder();
        $wxOrderData->SetOut_trade_no($this->orderNO);
        $wxOrderData->SetTrade_type('JSAPI');
        $wxOrderData->SetTotal_fee($totalPrice*100);
        $wxOrderData->SetBody('零食商贩');
        $wxOrderData->SetOpenid($openid);
        $wxOrderData->SetNotify_url('');
        $wxConfig=new \WxPayConfig();
       return $this->getPaySignature($wxConfig,$wxOrderData);
    }
    private function getPaySignature($wxConfig,$wxOrderData){
        $wxOrder= \WxPayApi::unifiedOrder($wxConfig,$wxOrderData);
        if($wxOrder['return_code']!='SUCCESS' ||
            $wxOrder['result_code']!='SUCCESS'){
            Log::record($wxOrder,'error');
            Log::record('获取预支付订单失败','error');
        }
        $this->recordPreOrder($wxOrder);
        return null;
    }
    private function recordPreOrder($wxOrder){
        OrderModel::where('id','=',$this->orderID)->update(['prepay_id'=>$wxOrder['prepay_id']]);
    }
    private function checkOrderValid(){
        $order=OrderModel::where('id','=',$this->orderID)->find();
        if(!$order){
            throw new OrderException();
        }
        if(!Token::isValidOperate($order->user_id)){
            throw new TokenException([
                'msg'=>'订单与用户不匹配',
                'errorCode'=>10003
            ]);
        }
        if($order->status!=OrderStatusEnum::UNPAID){
            throw new OrderException([
                'msg'=>'订单状态异常',
                'errorCode'=>80003,
                'code'=>400
            ]);
        }
        $this->orderNO=$order->order_no;
        return true;
    }
}