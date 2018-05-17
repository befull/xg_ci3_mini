<!-- jQuery 2.2.3 -->
<script src="<?=STA_URL?>plugins/jQuery/jquery-2.2.3.min.js"></script>

<form action="" method="post" id="myform">

error:<p id="err"></p>
<br>
Name:<?=form_input('name')?><br>
Pw:<?=form_password('pw')?><br>
    <?=form_hidden('ajax_do_sub', 1)?>
<button type="button" id="do_sub">提交</button>

</form>

<script>
    $('#do_sub').click(function(){
        var ts = $(this);
        var ts_old_val = ts.val();
        ts.val('提交中...');
        ts.attr("disabled",true);

        var data = new FormData($("#myform")[0]);

        $.ajax({
            url: '<?=current_url()?>',
            type: 'POST',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (msg) {
                if (msg.err_no < 0) {
                    $('#err').html(msg.err_msg).show();
                } else {
                    alert('保存成功');
                    window.location.href = '<?=current_url()?>?id='+msg.err_msg;
                }
            },
            complete: function (XMLHttpRequest, textStatus) {
                ts.val(ts_old_val);
                ts.attr("disabled",false);
            }
        });
    });
</script>