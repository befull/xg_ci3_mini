<?php require('3.0.head.php') ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Fail Top 10</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">

                    <form class="form-inline">
                        <div class="form-group">
                            <label for="">Time Interval：</label>
                            <select class="form-control" name="type">
                                <option value="cet">latest 1 months</option>
                                <option value="jsj">计算机</option>
                                <option value="zyyy">专业英语</option>
                            </select>
                        </div>


                        <!--
                        <div class="form-group">
                            <label for="">Chart Type：</label>
                            <select class="form-control" id="" name="xnxq">
                                <option value="0">Pie</option>
                                <option value="0">Bar</option>
                            </select>
                        </div>
                        -->


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">View</button>
                        </div>

                    </form>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

			
			<div class="row" style="margin-top:10px;">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Fail Top
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-bar-chart"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
				
				<div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Fail Top PCT
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Factory Name</th>
                                            <th>Pass PCT</th>
                                        </tr> 
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Name1</td>
                                            <td>99%</td>
                                        </tr>
                                        <tr>
                                            <td>Name2</td>
                                            <td>99%</td>
                                        </tr>
										<tr>
                                            <td>Name3</td>
                                            <td>99%</td>
                                        </tr>
										<tr>
                                            <td>Name4</td>
                                            <td>99%</td>
                                        </tr>
										<tr>
                                            <td>Name5</td>
                                            <td>99%</td>
                                        </tr>
										<tr>
                                            <td>Name6</td>
                                            <td>99%</td>
                                        </tr>
										<tr>
                                            <td>Name7</td>
                                            <td>99%</td>
                                        </tr>
										<tr>
                                            <td>Name8</td>
                                            <td>99%</td>
                                        </tr>
										<tr>
                                            <td>Name9</td>
                                            <td>99%</td>
                                        </tr>
										<tr>
                                            <td>Name10</td>
                                            <td>99%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
			</div>
			
        </div>
        <!-- /#page-wrapper -->


<?php require('0.foot.php')?>