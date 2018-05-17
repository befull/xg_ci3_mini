<?php require('3.0.head.php') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">All Item List</h1>
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

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td><span class="label label-primary">Submited</span></td>
                                        <td><a href="#" class="btn btn-primary btn-xs">Check</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                        <td><span class="label label-primary">Submited</span></td>
                                        <td><a href="#" class="btn btn-primary btn-xs">Check</a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                        <td><span class="label label-primary">Submited</span></td>
                                        <td><a href="#" class="btn btn-primary btn-xs">Check</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_info" id="example_info" role="status" aria-live="polite">
                                        Showing 1 to 3 of 3 entries
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button previous disabled" aria-controls="example"
                                                tabindex="0" id="example_previous"><a href="#">Previous</a></li>
                                            <li class="paginate_button active" aria-controls="example" tabindex="0"><a
                                                    href="#">1</a></li>
                                            <li class="paginate_button next disabled" aria-controls="example"
                                                tabindex="0" id="example_next"><a href="#">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

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