<?php require('3.0.head.php') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> All Finished Report </h1>
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

                [ 12, "123123", "Number1", "14", "3", "Senk", "Linda","2017-11-11","<a href='#' class='btn btn-danger btn-xs'>PDF</a>" ],

                [ 12, "123123", "Number1", "14", "3", "Jery", "Linda","2017-11-11", "<a href='#' class='btn btn-danger btn-xs'>PDF</a>" ],

                [ 12, "123123", "Number1", "14", "3", "Lily", "Linda","2017-11-11", "<a href='#' class='btn btn-danger btn-xs'>PDF</a>" ],
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
                        { title: "P", "orderable":false},
                        { title: "F", "orderable":false},
                        { title: "Tester", "orderable":false},
                        { title: "Checker", "orderable":false},
                        { title: "Check time", "orderable":false},
                        { title: "", "orderable":false }
                    ]
                } );
            } );
        </script>
