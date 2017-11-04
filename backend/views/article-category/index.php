
<?=\yii\bootstrap\html::a("添加",['add'],['class'=>'btn btn-success'])?>
    <table class="table">
        <tr>
            <th>id</th>
            <th>分类名称</th>
            <th>简介</th>
            <th>状态</th>
            <th>排序</th>
            <th>帮助分类</th>
            <th>操作</th>

        </tr>
        <?php foreach ($category as $category): ?>
            <tr>
                <td><?=$category ->id?></td>
                <td><?=$category ->name?></td>
                <td><?=$category ->intro?></td>
                <td><?=$category->status?></td>
                <td><?=$category->sort?></td>
                <td><?=$category->is_help?></td>


                <td>
                    <?php
                    echo \yii\bootstrap\html::a("编辑",['edit','id'=>$category->id],['class'=>'btn btn-info']);
                    echo \yii\bootstrap\html::a("删除",['del','id'=>$category->id],['class'=>'btn btn-danger']);
                    ?>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
