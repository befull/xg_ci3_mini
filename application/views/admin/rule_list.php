<?php require('head.php') ?>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"></h3>

                    <div class="pull-right">
                        <div class="input-group input-group-sm" style="">
                            <a ruleid="0" onclick="add_child(this)" href="javascript:;" class="btn btn-social btn-sm btn-primary"><i
                                    class="fa fa-plus-circle"></i>添加</a>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                    <table class="table table-striped table-bordered table-hover table-condensed">
                        <tbody>
                        <tr>
                            <th>权限名</th>
                            <th>MCA</th>
                            <th>图标</th>
                            <th>类型</th>
                            <th>操作</th>
                        </tr>


                        <?php
                        function cicle_echo($m1, &$allm, $space=''){
                            ?>
                        <tr>
                            <td><?=$space.$m1->name?></td>
                            <td><?=$m1->mca?></td>
                            <td><?=$m1->ico?></td>
                            <td><?=echo_status('rule_type', $m1->type)?></td>
                            <td>
                                <a href="javascript:;" ruleid="<?=$m1->id?>" onclick="add_child(this)">添加子项</a> |
                                <a href="javascript:;" ruleid="<?=$m1->id?>" onclick="edit(this)">修改</a> |
                                <a href="javascript:;" ruleid="<?=$m1->id?>" onclick="del(this)">删除</a>
                            </td>
                        </tr>
                        <?php
                            if(isset($allm[$m1->id])) foreach($allm[$m1->id] as $m2){
                                cicle_echo($m2, $allm, ($space == '' ? $space.'├─' : '│ '.$space));
                            }
                        }
                        ?>

                        <?php
                            foreach($menu_arr[0] as $m){
                                cicle_echo($m, $menu_arr);
                            }
                        ?>

                        </tbody>
                    </table>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

<?php require('foot.php') ?>


        <script>

            function edit(ts){
                var $ts = $(ts);
                var ruleid = $ts.attr('ruleid');
                modal_load('修改', '<?=site_url('admin/user/rule_edit')?>?id='+ruleid);
            }
            function add_child(ts){
                var $ts = $(ts);
                var ruleid = $ts.attr('ruleid');
                modal_load('添加', '<?=site_url('admin/user/rule_add')?>?id='+ruleid);
            }
            function del(ts){
                var $ts = $(ts);
                var ruleid = $ts.attr('ruleid');
                modal_load('确认删除', '<?=site_url('admin/user/rule_del')?>?id='+ruleid);
            }
        </script>