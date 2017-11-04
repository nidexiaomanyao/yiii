<?php
$form=\yii\bootstrap\ActiveForm::begin();

echo $form->field($category,'name');
echo $form->field($category,'intro');
echo $form->field($category,'status')->radioList(['0'=>'是','1'=>'否']);
echo $form->field($category,'sort');
echo $form->field($category,'is_help')->radioList(['0'=>'是','1'=>'否']);

echo \yii\bootstrap\Html::submitButton("提交",['class'=>'ben btn-success']);


\yii\bootstrap\ActiveForm::end();