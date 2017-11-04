<?=\yii\bootstrap\html::a("添加",['article/add'],['class'=>'btn btn-success'])?>
    <table class="table">
        <tr>
            <th>id</th>
            <th>名称</th>
            <th>文章分类</th>
            <th>简介</th>
            <th>状态</th>
            <th>排序</th>
            <th>录入时间</th>
            <th>文章内容</th>
            <th>操作</th>

        </tr>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td><?=$article ->id?></td>
                <td><?=$article ->name?></td>
                <td><?=$article ->cate?></td>
                <td><?=$article ->intro?></td>
                <td><?=$article->status?></td>
                <td><?=$article->sort?></td>
                <td><?=date('y-m-d h-i-s',$article->inputtime)?></td>

                <td><?=$article->content?></td>

                <td>
                    <?php
                    echo \yii\bootstrap\html::a("编辑",['article/edit','id'=>$article->id],['class'=>'btn btn-info']);
                    echo \yii\bootstrap\html::a("删除",['article/del','id'=>$article->id],['class'=>'btn btn-danger']);
                    ?>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
<?php