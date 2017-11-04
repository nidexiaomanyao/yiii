<?php
$form=\yii\bootstrap\ActiveForm::begin();

echo $form->field($brand,'name');
echo $form->field($brand,'intro');
echo $form->field($brand, 'logo')->widget('manks\FileInput', [
]);
//echo $form->field($brand, 'logo')->widget('manks\FileInput', []);
echo $form->field($brand,'sort');
echo $form->field($brand,'status')->radioList(['0'=>'隐藏','1'=>'展示']);
echo \yii\bootstrap\Html::submitButton("提交",['class'=>'ben btn-success']);


\yii\bootstrap\ActiveForm::end();
