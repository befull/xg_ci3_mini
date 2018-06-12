<?php require('head.php')?>
<div class="wrapper">


    <!-- Full Width Column -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <div class="error-page">
                <h2 class="headline text-red">ERR</h2>

                <div class="error-content">
                    <h3><i class="fa fa-warning text-red"></i> <?=$title?>.</h3>
                    <p>
                        <?=$msg?>.
                    </p>
                    <p>
                        你可以点击返回上一步的操作界面，或者点击<a href="/">返回首页</a>.
                    </p>

                    <div>
                        <button type="submit" name="submit" class="btn btn-danger btn-flat">返回</button>
                    </div>

                </div>
            </div>
            <!-- /.error-page -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
<?php require('foot.php')?>