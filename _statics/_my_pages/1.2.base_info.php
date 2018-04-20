<?php require('1.0.head.php') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Base Info Manage</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


            <div class="row mar_bot_10">
                <div class="col-lg-6">
                </div>

                <div class="col-lg-6 text-right">

                    <form action="http://moodle.wzbc.edu.cn:7007/index3.php/jw_plus/zkz/zkz_importdata" class="form-inline" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <div class="form-group">
                            <input type="file" name="userfile" class="form-control" style="width: 220px;">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>


                    </form>

                </div>

            </div>


            <div class="row" style="margin-top: 20px;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table id="example" class="table table-striped table-bordered table-hover" ></table>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->



        </div>
        <!-- /#page-wrapper -->


<?php require('0.foot.php')?>



        <script>
            var dataSet = [

                [ 11, "123123", "Number1", "1000", "Name1", "2017-11-11", "Y", "<a href='#' class='btn btn-danger btn-xs'>Delete</a> <a href='#' class='btn btn-primary btn-xs'>Edit</a>" ],

                [ 12, "123123", "Number1", "1000", "Name1",  "2017-11-11", "Y","<a href='#' class='btn btn-danger btn-xs'>Delete</a>" ],

                [ 13, "123123", "Number1", "1000", "Name1",  "2017-11-11", "Y","<a href='#' class='btn btn-danger btn-xs'>Delete</a>" ],
            ];
            $(document).ready(function() {
                $('#example').DataTable( {
                    data: dataSet,
                    searching: true,
                    "order": [[ 0, "desc" ]],

                    columns: [
                        { title: "#"},
                        { title: "PO"},
                        { title: "PO QTY", "orderable":false},
                        { title: "Item Number", "orderable":false},
                        { title: "Item Name", "orderable":false},
                        { title: "Confirm Date", "orderable":false},
                        { title: "SIS Available", "orderable":false},
                        { title: "", "orderable":false }
                    ]
                } );
            } );
        </script>
