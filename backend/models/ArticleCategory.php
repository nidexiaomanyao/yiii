<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/4 0004
 * Time: 下午 8:40
 */

namespace backend\models;


use yii\db\ActiveRecord;

class ArticleCategory extends ActiveRecord
{
    public function rules()
    {
        return [
            [['name','intro','status','sort','is_help'], 'required'],
        ];

    }


}