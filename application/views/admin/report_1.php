<?php require(__DIR__.'/head.php') ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Report</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->


    <form id="my_form" class="form-horizontal" action="" method="post">
<div class="panel panel-default">

    <div class="panel-body">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#" aria-controls="home" role="tab" data-toggle="tab">Meta Data</a></li>
  </ul>

        <!-- Tab panes -->
        <div class="tab-content">

            <div role="tabpanel" class="tab-pane active" id="profile">
                <div class="row" style="padding-top: 20px;">
                    <div class="col-lg-6">

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Po Num:</label>
                                <div class="col-sm-8">

                                    <div class="input-group">
                                        <input name="Po_Num" type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button id="get_base_info" class="btn btn-default" type="button">Get Base Info</button>
      </span>
                                    </div><!-- /input-group -->

                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-sm-4 control-label">Name:</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="id" class="form-control" value="">
                                    <input name="Name" class="form-control" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Country:</label>
                                <div class="col-sm-8">
                                    <input name="Country" class="form-control" value="" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Vend Name:</label>
                                <div class="col-sm-8">
                                    <input name="Vend_Name" class="form-control" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Product Group:</label>
                                <div class="col-sm-8">
                                    <input name="Product_Group" class="form-control" value="" readonly>
                                </div>
                            </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Card:</label>
                            <div class="col-sm-8">
                                <input name="Card" class="form-control" value="" readonly>
                            </div>
                        </div>

                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-sm-5 control-label">QC member:</label>
                                <div class="col-sm-7">
                                    <input name="QC_member" class="form-control" value="Joy" readonly>
                                </div>
                            </div>


                        <div class="form-group">
                            <label class="col-sm-4 control-label">Product_no:</label>
                            <div class="col-sm-8">
                                <input name="Product_no" class="form-control" value="" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Del_Method:</label>
                            <div class="col-sm-8">
                                <input name="Del_Method" class="form-control" value="" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Po_Qty:</label>
                            <div class="col-sm-8">
                                <input name="Po_Qty" class="form-control" value="" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Name of sub-contractors:</label>
                            <div class="col-sm-6">
                                <input name="Name_sub_contractors" class="form-control" value="" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Town of sub-contractors:</label>
                            <div class="col-sm-6">
                                <input name="Town_sub_contractors" class="form-control" value="" readonly>
                            </div>
                        </div>

                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->


            </div>
        </div>

    </div><!-- /.panel-body -->
    <div class="panel-footer">
        <button type="submit" class="btn btn-primary">OK & NEXT</button>
    </div>

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