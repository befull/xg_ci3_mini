<?php require('2.0.head.php')?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Report</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->


    <form class="form-horizontal" action="2.2.2.report_2.php" method="post">
<div class="panel panel-default">

    <div class="panel-body">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#profile" aria-controls="home" role="tab" data-toggle="tab">Meta Data</a></li>
  </ul>

        <!-- Tab panes -->
        <div class="tab-content">

            <div role="tabpanel" class="tab-pane active" id="profile">
                <div class="row" style="padding-top: 20px;">
                    <div class="col-lg-6">
                            <script>
                                function get_input1(){
                                    var in1 = document.getElementById('input1');
                                    in1.value = 'aaa';
                                }


                            </script>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">PO:</label>
                                <div class="col-sm-8">

                                    <div class="input-group">
                                        <input id="input1" type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" onclick="javascript:get_input1();">Get Base Info</button>
      </span>
                                    </div><!-- /input-group -->

                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-sm-4 control-label">Type:</label>
                                <div class="col-sm-8">
                                    <div class="btn-group" role="group" aria-label="Default button group">
                                        <button type="button" class="btn btn-default">Reader</button>
                                        <button type="button" class="btn btn-primary">Frames</button>
                                        <button type="button" class="btn btn-default">Sunglasses</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Vendor:</label>
                                <div class="col-sm-8">
                                    <input class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Item Number:</label>
                                <div class="col-sm-8">
                                    <input class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Item Name:</label>
                                <div class="col-sm-8">
                                    <input class="form-control">
                                </div>
                            </div>

                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-sm-5 control-label">QC member:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" value="member name1" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">Production Factory:</label>
                                <div class="col-sm-7">
                                    <input class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">Confirm Date:</label>
                                <div class="col-sm-7">
                                    <input class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">Cartons Inspected:</label>
                                <div class="col-sm-7">
                                    <input class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">Master sample avil:</label>

                                <div class="btn-group col-sm-7" role="group" aria-label="Default button group">
                                    <button type="button" class="btn btn-primary">Y</button>
                                    <button type="button" class="btn btn-default">N</button>
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

<?php require('0.foot.php')?>