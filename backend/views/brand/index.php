
<?=\yii\bootstrap\html::a("添加",['brand/add'],['class'=>'btn btn-success'])?>
<table class="table">
    <tr>
        <th>id</th>
        <th>名字</th>
        <th>简介</th>
        <th>LOGO</th>
        <th>排序</th>
        <th>状态</th>
        <th>操作</th>

    </tr>
    <?php foreach ($brand as $brand): ?>
        <tr>
            <td><?=$brand ->id?></td>
            <td><?=$brand ->name?></td>
            <td><?=$brand ->intro?></td>
            <td><img style="width: 50px" src="<?='/'.$brand->logo?>"></td>
            <td><?=$brand ->sort?></td>
            <td><?=$brand->status?></td>

<td>
                <?php
                echo \yii\bootstrap\html::a("编辑",['brand/edit','id'=>$brand->id],['class'=>'btn btn-info']);
                echo \yii\bootstrap\html::a("删除",['brand/del','id'=>$brand->id],['class'=>'btn btn-danger']);
                ?>
            </td>
        </tr>
    <?php endforeach;?>
</table>
<?php

