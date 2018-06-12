<?php require('head.php') ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>

                <div class="pull-right">
                    <div class="input-group input-group-sm" style="">
                        <a href="<?=site_url('admin/user/group_add')?>" class="btn btn-social btn-sm btn-primary"><i class="fa fa-plus-circle"></i>添加</a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>用户组名</th>
                        <th>状态</th>
                        <th>用户数</th>
                        <th>操作</th>
                    </tr>
                    <?php foreach($rs as $r):?>
                    <tr>
                        <td><?=$r->id?></td>
                        <td><?=$r->name?></td>
                        <td><?=echo_status('user_group', $r->status)?></td>
                        <td></td>
                        <td>
                            <button type="button" class="btn btn-xs btn-primary">修改</button>
                            <button type="button" class="btn btn-xs btn-danger">删除</button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>


<?php require('foot.php')?>