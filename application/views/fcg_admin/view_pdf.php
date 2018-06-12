<?php require(__DIR__.'/head.php') ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View Pdf</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->


    <form id="my_form" class="form-horizontal" action="" method="post">
<div class="panel panel-default">

    <div class="panel-body">
        <h1>Success! now you can view the pdf report.</h1>
        <a href="<?=site_url('init/pdf').'?id='.$report_id?>" class="btn btn-primary" role="button">PDF</a>
    </div><!-- /.panel-body -->

</div>
    </form>

            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php require(__DIR__.'/foot.php')?>
<script>
    var base_url = '<?=site_url()?>';
</script>
<script src="<?=STA_URL?>_my_js/report_1.js"></script>