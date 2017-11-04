<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/4 0004
 * Time: 下午 6:07
 */

namespace backend\controllers;


use backend\models\Article;
use backend\models\Article_category;
use backend\models\Article_cetail;
use backend\models\ArticleCategory;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Request;

class ArticleController extends Controller
{
    public function actionIndex(){
        $articles=Article::find()->all();
//        var_dump()
       // var_dump($article);exit()
        return $this->render('index',['articles'=>$articles]);
    }
    public function actionAdd(){
        //创建模型对象
        $articles=new Article();

        //查询分类
        $cate=ArticleCategory::find()->asArray()->all();
        $cates=ArrayHelper::map($cate,'id','name');

        $request=new Request();
        //判断提交方式
        if ($request->isPost){

            //绑定数据
            if($articles->load($request->post()) && $articles->validate()){
                $articles->inputtime=time();
//                var_dump($request->post());exit;
                //保存数据
                $articles->save();
                 return  $this->redirect('index');

            }
        }
        return $this->render("add",['articles'=>$articles]);
    }

    public function actionEdit($id){
        //创建模型对象
        $articles=Article::findOne($id);

        //查询分类
        $cate=ArticleCategory::find()->asArray()->all();
        $cates=ArrayHelper::map($cate,'id','name');

        $request=new Request();
        //判断提交方式
        if ($request->isPost){

            //绑定数据
            if($articles->load($request->post()) && $articles->validate()){
                $articles->inputtime=time();
//                var_dump($request->post());exit;
                //保存数据
                $articles->save();
                return  $this->redirect('index');

            }
        }
        return $this->render("add",['articles'=>$articles]);
    }
    public function actionDel($id)
    {
        $articles=Article::findOne($id);
        $articles->delete();
        $this->redirect(['index']);

    }


}