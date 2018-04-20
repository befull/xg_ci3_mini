<?php require('3.0.head.php')?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Detail of factory</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
		<form class="form-inline">
		<div class="form-group">
            <label for="">Factory Name：</label>
            <select class="form-control" name="type">
                <option value="cet">Factory 1</option>
                <option value="jsj">计算机</option>
                <option value="zyyy">专业英语</option>
            </select>
        </div>


            <div class="form-group">
                <label for="">Chart Type：</label>
                <select class="form-control" id="" name="xnxq">
                    <option value="0">Pie</option>
                    <option value="0">Bar</option>
                </select>
            </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">View</button>
        </div>

		</form>
					
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			
			<div class="row" style="margin-top:10px;">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Fail Top
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart"  style="height:350px;">
                                <div class="flot-chart-content" id="flot-pie-chart"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
				
				<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Fail Top Count
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="20">#</th>
                                            <th>Criteria</th>
                                            <th>Fail Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>ADHESION OF SURFACE COATINGS</td>
                                            <td>20</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Name1</td>
                                            <td>20</td>
                                        </tr>
										<tr>
                                            <td>1</td>
                                            <td>Name1</td>
                                            <td>20</td>
                                        </tr>
										<tr>
                                            <td>1</td>
                                            <td>Name1</td>
                                            <td>20</td>
                                        </tr>
										<tr>
                                            <td>1</td>
                                            <td>Name1</td>
                                            <td>20</td>
                                        </tr>
										<tr>
                                            <td>1</td>
                                            <td>Name1</td>
                                            <td>20</td>
                                        </tr>
										<tr>
                                            <td>1</td>
                                            <td>Name1</td>
                                            <td>20</td>
                                        </tr>
										<tr>
                                            <td>1</td>
                                            <td>Name1</td>
                                            <td>20</td>
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

<?php require('0.foot.php');?>
