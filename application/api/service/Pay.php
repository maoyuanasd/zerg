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
    }
    private function makeWxPreOrder(){
        //openid
        $openid=Token::getCurrentTokenVar('openid');
        if(!$openid){
            throw new TokenException();
        }
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