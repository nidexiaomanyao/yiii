<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/4 0004
 * Time: 下午 9:01
 */

namespace backend\controllers;


use backend\models\ArticleCategory;
use yii\web\Controller;
use yii\web\Request;

class ArticleCategoryController extends Controller
{
    public function actionIndex()
    {
        $category=ArticleCategory::find()->all();
        // var_dump($article);exit()
        return $this->render('index',['category'=>$category]);
    }
    public function actionAdd(){
        //创建模型对象
        $category=new ArticleCategory();
        //查询分类
        $request=new Request();
        //判断提交方式
        if ($request->isPost){

            //绑定数据
            if($category->load($request->post()) && $category->validate()){
//                $category->inputtime=time();
//                var_dump($request->post());exit;
                //保存数据
                $category->save();
                return  $this->redirect('index');

            }
        }
        return $this->render("add",['category'=>$category,]);
    }
    public function actionEdit($id){
        //创建模型对象
        $category = ArticleCategory::findOne($id);
        //查询分类
        $request=new Request();
        //判断提交方式
        if ($request->isPost){

            //绑定数据
            if($category->load($request->post()) && $category->validate()){
//                $category->inputtime=time();
//                var_dump($request->post());exit;
                //保存数据
                $category->save();
                return  $this->redirect('index');

            }
        }
        return $this->render("add",['category'=>$category,]);
    }
    public function actionDel($id)
    {
        $category=ArticleCategory::findOne($id);
        $category->delete();
        $this->redirect(['index']);

    }


}