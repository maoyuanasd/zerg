<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/8/1
 * Time: 14:26
 */

namespace app\api\service;
use app\api\model\Order as OrderModel;
use app\api\model\Product;
use app\lib\enum\OrderStatusEnum;
use think\Db;
use think\Exception;
use app\api\service\Order as OrderService;
use think\Loader;
use think\Log;

Loader::import('WxPay.WxPay', EXTEND_PATH, '.Api.php');

class WxNotify extends \WxPayNotify
{
   public function NotifyProcess($objData, $config, &$msg)
   {
         $data=$objData->values;
             $orderNo=$data['out_trade_no'];
             Db::startTrans();
             try{
                  $order=OrderModel::where('order_no','=',$orderNo)
                      ->lock(true)
                      ->find();
                   if($order->status==1){
                       $service=new OrderService();
                   $stockStatus= $service->checkOrderStock($order->id);
                       if($stockStatus['pass']){
                          $this->updateOrderStatus($order->id,true);
                           $this->reduceStock($stockStatus);
                       }else{
                           $this->updateOrderStatus($order->id,false);
                       }
                       Db::commit();

                   }
             }catch (Exception $ex){
                 Db::rollback();
                 Log::error($ex);
                  return false;
             }
             return true;
   }
   private function reduceStock($stockStatus){
       foreach ($stockStatus['pStatusArray'] as $singlePStatus){
          Product::where('id','=',$singlePStatus['id'])
              ->setDec('stock',$singlePStatus['count']);
       }
   }
   private function updateOrderStatus($orderID,$success){
        $status=$success ? OrderStatusEnum::PAID :
            OrderStatusEnum::PAID_BUT_OUT_OF;
       OrderModel::where('id','=',$orderID)
           ->update(['status'=>$status]);
   }
}