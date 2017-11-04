<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/4 0004
 * Time: 下午 6:51
 */

namespace backend\models;


use yii\db\ActiveRecord;

class ArticleCetail extends ActiveRecord
{
    //规则
    public function rules()
    {
        return [
            [['content'], 'required'],
        ];

    }
}