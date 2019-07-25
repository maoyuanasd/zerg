<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/25
 * Time: 11:32
 */

namespace app\api\controller\v1;


use app\api\validate\Count;
use app\api\model\Product as ProductModle;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ProductException;

class Product
{
  public function getRecent($count=15){
      (new Count())->goCheck();
      $products=ProductModle::getMostRecent($count);
      if($products->isEmpty()){
            throw new ProductException();
      }
      $products=$products->hidden(['summary']);
      return $products;
  }
  public function getAllInCategory($id){
      (new IDMustBePostiveInt())->goCheck();
      $products=ProductModle::getProductByCategoryID($id);
      if($products->isEmpty()){
          throw new ProductException();
      }
      return $products;
  }
}