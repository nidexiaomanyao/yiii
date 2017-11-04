<?php
$form=\yii\bootstrap\ActiveForm::begin();

echo $form->field($articles,'name');
$cates=\backend\models\ArticleCategory::find()->asArray()->all();
//var_dump($cates);exit;
$cate=[];
foreach ($cates as $k=>$v){
    $cate[$v['id']]=$v['name'];
}
//var_dump($cate);exit;
echo $form->field($articles,'article_category_id')->dropDownList($cate);
echo $form->field($articles,'intro');
echo $form->field($articles,'status')->radioList(['0'=>'是','1'=>'否']);
echo $form->field($articles,'sort');
echo $form->field($articles,'content');

//echo $form->field($articledetail,'content');


echo \yii\bootstrap\Html::submitButton("提交",['class'=>'ben btn-success']);


\yii\bootstrap\ActiveForm::end();