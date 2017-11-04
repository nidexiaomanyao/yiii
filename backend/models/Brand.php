<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/3 0003
 * Time: 下午 9:04
 */
namespace backend\models;
use Yii;

class Brand extends \yii\db\ActiveRecord
{
   // public $imgFile;


    public function rules()
    {
        //规则
        return [[['name', 'intro', 'sort', 'status'], 'required'],
            [['logo'],'safe']
            //[['imgFile'],'file','extensions'=>['gif','png','jpg'],'skipOnEmpty'=>false]

        ];
    }
    public function getAaa(){
       // echo 1;exit;
        if (substr($this->logo,0,7)=="http://"){
            return $this->logo;
        }else{
            return "@web/".$this->logo;

        }

    }
}