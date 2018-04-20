<?php require('2.0.head.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Report > Setup 2</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Meta Data
                        </div>
                        <div class="panel-body">
							<h4>Branded Sunglasses Inspection Form</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Po Num：2049813</td>
                                            <td>Name：31321</td>
                                            <td>Country： APC</td>
                                            <td>Vend Name：CONTOUR OPTIK INC.</td>
                                        </tr>
                                        <tr>
                                            <td>Product Group： FR</td>
                                            <td>Card：QTM</td>
                                            <td>Product no：10303600.QTM</td>
                                            <td>Del Method：AIR</td>
                                        </tr>
                                        <tr>
                                            <td>Po Qty： 200</td>
                                            <td>Conf Date：2017-10-3</td>
                                            <td>Name of sub-contractors： weidong</td>
                                            <td>Town of sub-contractors：Jiangxi</td>
                                        </tr>
                                    </tbody>
                                </table>



                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td><label style="margin-top: 4px;">Sample Size：</label></td>
                                        <td><input style="width: 100px;" type="text" class="form-control"></td>
                                        <td><label style="margin-top: 4px;">Final Inspection Date：</label></td>
                                        <td><input style="width: 100px;" type="text" class="form-control"></td>
                                        <td><label style="margin-top: 4px;">Final inspection result：</label></td>
                                        <td>
                                            <select class="form-control">
                                                <option>PASS</option>
                                                <option>PENDING</option>
                                                <option>REJECT</option>
                                                <option>FAIL</option>
                                            </select>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>


                            </div>
							
							
							
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->




                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Criteria TEST
                        </div>
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#con1" aria-controls="home" role="tab" data-toggle="tab">Construction</a></li>
                                <li role="presentation"><a href="#con2" aria-controls="profile" role="tab" data-toggle="tab">Size</a></li>
                                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Function</a></li>
                                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Lens</a></li>
                                <li role="presentation"><a href="#tc5" role="tab" data-toggle="tab">Frame Cosmetics</a></li>
                                <li role="presentation"><a href="#tc5" role="tab" data-toggle="tab">Imprint</a></li>
                                <li role="presentation"><a href="#tc5" role="tab" data-toggle="tab">Packaging</a></li>
                                <li role="presentation"><a href="#tc5" role="tab" data-toggle="tab">Testing</a></li>
                            </ul>


                            <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" style="padding: 10px;" id="con1">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Problem</th>
                                        <th>Measurement</th>
                                        <th>Defect QTY</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody class="check_tbody">
                                    </tbody>
                                </table>

                                <table style="display: none" class="temp_rs">
                                    <tr>
                                        <td>
                                            <select class="form-control">
                                                <option></option>
                                                <option>111F14 Into rim and out of rim 进圈/漏圈</option>
                                                <option>F1 Correct Item 產品正確</option>
                                                <option>F24 4 Points高低脚</option>
                                                <option>F26 Mixed styles 混款</option>
                                            </select>
                                        </td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><a href="javascript:;" class="btn btn-danger btn-xs" onclick="return rs_del(this);">Delete</a></td>
                                    </tr>
                                </table>

                                <div>
                                    <button type="button" class="btn btn-default add_one">Add one</button>
                                </div>
                            </div>


                            <div role="tabpanel" class="tab-pane" style="padding: 10px;" id="con2">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Problem</th>
                                        <th>Measurement</th>
                                        <th>Defect QTY</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody class="check_tbody">
                                    </tbody>
                                </table>

                                <table style="display: none" class="temp_rs">
                                    <tr>
                                        <td>
                                            <select class="form-control">
                                                <option></option>
                                                <option>222F14 Into rim and out of rim 进圈/漏圈</option>
                                                <option>F1 Correct Item 產品正確</option>
                                                <option>F24 4 Points高低脚</option>
                                                <option>F26 Mixed styles 混款</option>
                                            </select>
                                        </td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><a href="javascript:;" class="btn btn-danger btn-xs" onclick="return rs_del(this);">Delete</a></td>
                                    </tr>
                                </table>

                                <div>
                                    <button type="button" class="btn btn-default add_one">Add one</button>
                                </div>
                            </div>

                            </div>


                        </div>
                    </div>







<div>
    <button type="submit" class="btn btn-primary">Complete & Submit</button>
</div>
			
					
					
					
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

			
        </div>
        <!-- /#page-wrapper -->
<?php require('0.foot.php')?>
<script>
    function rs_del(ts){
        $(ts).parent().parent().remove();
    }

    $(function () {

        // add one
        $('.add_one').bind('click', function () {
            var ts = $(this);
            var box = ts.parent().parent();
            var body = box.find('.check_tbody');
            var temp = box.find('.temp_rs').children().html();
            body.append(temp);
        });

    });

</script>
