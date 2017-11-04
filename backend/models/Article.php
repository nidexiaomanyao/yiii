<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/4 0004
 * Time: 下午 6:07
 */

namespace backend\models;


use yii\db\ActiveRecord;
use frontend\models\Cate;

class Article extends ActiveRecord
{

    public function rules()
    {
        //规则
        return [[['name', 'intro', 'status', 'sort','article_category_id','content'], 'required'],
//            [['imgFile'],'file','extensions'=>['gif','png','jpg'],'skipOnEmpty'=>false]

        ];

    }
    public function getClasses(){
        return $this->hasOne(Article::className(),['id'=>'article_category_id']);
    }

//    public function getArticle(){
//        return $this->hasOne(Article::className(),['id'=>'article_id']);
//    }

    public function getCate()
    {
        return ArticleCategory::findOne($this->article_category_id)->name;
    }
}
