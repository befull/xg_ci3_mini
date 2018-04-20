<?php require('2.0.head.php') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">My Base Info</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->



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

                [ 11, "123123", "Number1", "1000", "Name1", "2017-11-11", "", "<a href='2.2.1.report.php' class='btn btn-primary btn-xs'>Report</a>" ],

                [ 12, "123123", "Number1", "1000", "Name1",  "2017-11-11", "<span class='label label-success'>Testing</span>","<a href='2.2.1.report.php' class='btn btn-primary btn-xs'>Continue</a>" ],

                [ 13, "123123", "Number1", "1000", "Name1",  "2017-11-11", "<span class='label label-default'>Finished</span>","<a href='#' class='btn btn-danger btn-xs'>PDF</a>" ],
                [ 14, "123123", "Number1", "1000", "Name1",  "2017-11-11", "<span class='label label-primary'>Submited</span>","<a href='#' class='btn btn-danger btn-xs'>Withdraw</a> <a href='#' class='btn btn-danger btn-xs'>PDF</a>" ],
                [ 15, "123123", "Number1", "3000", "Name1",  "2017-11-11", "<span class='label label-danger'>Check False</span>","<a href='#' class='btn btn-danger btn-xs'>Withdraw</a> <a href='#' class='btn btn-danger btn-xs'>PDF</a>" ],
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
                        { title: "Status", "orderable":false},
                        { title: "", "orderable":false }
                    ]
                } );
            } );
        </script>
