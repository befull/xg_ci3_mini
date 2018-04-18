<?php require('head.php')?>
<!-- iCheck -->
<link rel="stylesheet" href="<?=STA_URL?>plugins/iCheck/square/blue.css">
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>小高</b>系统</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"></p>

        <form action="" method="post">
            <?php
            $emsg = validation_errors();
            if(!empty($post_err)) $emsg = $post_err;
            if($emsg != ''){
                echo '<div class="alert alert-danger" role="alert">';
                echo $emsg;
                echo '</div>';
            }
            ?>
            <div class="form-group has-feedback">
                <input name="username" type="input" class="form-control" placeholder="用户名">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="password" type="password" class="form-control" placeholder="密码">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <div class="row">
                    <div class="col-xs-4" style=""><input class="form-control" maxlength="4" placeholder="验证码" name="captcha" type="text" value="" style="padding-right: 10px;"></div>
                    <div class="col-xs-8"><a href="javascript:set_captcha();void(0);"><img id="captcha_img" src="" /> 看不清</a></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> 记住用户名
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">登陆</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> 注册</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> 以其他账号登陆</a>
        </div>
        <!-- /.social-auth-links -->

        <a href="#">忘记密码</a>
    </div>
    <!-- /.login-box-body -->
</div>
    <!-- /.login-box -->

<?php require('foot.php')?>

<!-- iCheck -->
<script src="<?=STA_URL?>plugins/iCheck/icheck.min.js"></script>
<script>
    function set_captcha(){
        var url = '<?=site_url('api/captcha').'?w=100&h=30'?>';
        document.getElementById('captcha_img').src = url + '&time='+Math.random();
    }

    $(function () {
        set_captcha();

        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>