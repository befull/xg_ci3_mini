<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后端登录 - 小高系统</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?=STA_URL?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="https://cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Ionicons -->
    <link href="https://cdn.bootcss.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=STA_URL?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=STA_URL?>dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!-- jQuery 2.2.3 -->
    <script src="<?=STA_URL?>plugins/jQuery/jquery-2.2.3.min.js"></script>
</head>

<!-- iCheck -->
<link rel="stylesheet" href="<?=STA_URL?>plugins/iCheck/square/blue.css">
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>小高系统</b>后端登录</a>
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


        <a href="#">忘记密码</a>
    </div>
    <!-- /.login-box-body -->
</div>
    <!-- /.login-box -->


<!-- Bootstrap 3.3.6 -->
<script src="<?=STA_URL?>bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=STA_URL?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=STA_URL?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=STA_URL?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=STA_URL?>dist/js/demo.js"></script>

</body>
</html>

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