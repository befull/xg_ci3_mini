<?php require('1.0.head.php')?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Report</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
<div>



<div class="panel panel-default">
    <div class="panel-body">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#profile" aria-controls="home" role="tab" data-toggle="tab">Base Info</a></li>
    <li role="presentation"><a href="#home" aria-controls="profile" role="tab" data-toggle="tab">Machine</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Optics</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Examine</a></li>
    <li role="presentation"><a href="#tc5" role="tab" data-toggle="tab">Third party</a></li>
  </ul>

        <!-- Tab panes -->
        <div class="tab-content">

            <div role="tabpanel" class="tab-pane active" id="profile">
                <div class="row" style="padding-top: 20px;">
                    <div class="col-lg-6">
                        <form class="form-horizontal">
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

                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-6">
                        <form class="form-horizontal">
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

                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->


            </div>
            <div role="tabpanel" class="tab-pane panel-body" id="home">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="80"><input type="checkbox"> All</th>
                        <th>Criteria</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>FDA Dropball</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>FDA Dropball</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>FDA Dropball</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>FDA Dropball</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>FDA Dropball</td>
                    </tr>
                    </tbody>
                </table></div>
            <div role="tabpanel" class="tab-pane" id="messages">.3..</div>
            <div role="tabpanel" class="tab-pane" id="settings">..4.</div>
            <div role="tabpanel" class="tab-pane" id="tc5">..5.</div>
        </div>

    </div><!-- /.panel-body -->
    <div class="panel-footer">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>


            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php require('0.foot.php')?>