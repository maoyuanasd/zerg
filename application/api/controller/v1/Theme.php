<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/24
 * Time: 10:25
 */

namespace app\api\controller\v1;


use app\api\validate\IDCollection;
use app\api\model\Theme as ThemeModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ThemeException;

class Theme
{
   /*
    * @url /theme?ids=id1,id2,id,....
    * @return 一组theme模型
    * */
   public function getSimpleList($ids=''){
       (new IDCollection())->goCheck();
       $ids=explode(',',$ids);
       $resule = ThemeModel::with('topicImg,headImg')->select($ids);
       if(!$resule){
           throw new ThemeException();
       }
       return $resule;
   }
    /*
    * @url /theme/:id
    * */
    public function getCompleXOne($id){
        (new IDMustBePostiveInt())->goCheck();
        $theme=ThemeModel::getThemeWithProducts($id);
        if(!$theme){
            throw new ThemeException();
        }
        return $theme;
    }
}