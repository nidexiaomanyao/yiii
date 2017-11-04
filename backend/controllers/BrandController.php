<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/3 0003
 * Time: 下午 8:51
 */

namespace backend\controllers;

use backend\models\Brand;
use yii\web\Controller;
use yii\web\Request;
use yii\web\UploadedFile;
use flyok666\qiniu\Qiniu;

class BrandController extends Controller
{


    public function actionIndex()
    {
        $brand =Brand::find()->all();
        return $this->render("index",['brands'=>$brand]);
}
    public function actionUpload()
    {

        $config = [
            'accessKey'=>'JarICzXxSm-GNYMcSEHUHD6Au-WeT6fs43Xezd_h',//AK
            'secretKey'=>'_p8D9jn5Hu6gi5UDxTPh5PbOntNk-RljMih4pbpT',//sk
            'domain'=>'http://oyvifomow.bkt.clouddn.com',//域名
            'bucket'=>'haoge',
            'area'=>Qiniu::AREA_HUANAN
        ];
        $qiniu = new Qiniu($config);
        $key = time();
        $qiniu->uploadFile($_FILES['file']['tmp_name'],$key);
        $url = $qiniu->getLink($key);

        $info=[
          'code'=>0,
            'url'=>$url,
            'attachment'=>$url
        ];
    echo json_encode($info);

    }

    public function actionAdd()
    {
        $brand = new Brand();
        $request = new Request();
        if ($request->isPost) {
            if ($brand->load($request->post())) {
                //$brand->imgFile = UploadedFile::getInstance($brand, 'imgFile');
//                var_dump($admin->imgFile);exit;
                if ($brand->validate()) {
                    //判断有没有文件上传
//                    if ($brand->imgFile) {
//                        $filePath = "images/" . time() . "." . $brand->imgFile->extension;
//                        //var_dump($filePath);exit;
//                        //文件保存
//                        $brand->imgFile->saveAs($filePath, imgFile);
//                        //保存数据
//                        $brand->logo = $filePath;
//                    }
                    //验证码只能验证一次
                    $brand->save(false);
                    return $this->redirect(['brand/index']);
                }
            }
        }
        return $this->render("add", ['brand' => $brand,]);
    }
    public function actionEdit($id)
    {
        $brand = Brand::findOne($id);
        $request = new Request();
        if ($request->isPost) {
            if ($brand->load($request->post())) {
                $brand->imgFile = UploadedFile::getInstance($brand, 'imgFile');
//                var_dump($admin->imgFile);exit;
                if ($brand->validate()) {
                    //判断有没有文件上传
                    if ($brand->imgFile) {
                        $filePath = "images/" . time() . "." . $brand->imgFile->extension;
                        //var_dump($filePath);exit;
                        //文件保存
                        $brand->imgFile->saveAs($filePath, false);
                        //保存数据
                        $brand->img = $filePath;
                    }
                    //验证码只能验证一次
                    $brand->save(false);
                    return $this->redirect(['brand/index']);
                }
            }
        }
        return $this->render("add", ['brand' => $brand,]);
    }
    public function actionDel($id)
    {
        $brand=Brand::findOne($id);
        $brand->delete();
        $this->redirect(['brand/index']);

    }




}



