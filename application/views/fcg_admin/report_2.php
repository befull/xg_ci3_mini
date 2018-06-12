<?php require(__DIR__.'/head.php') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Report > Setup 2</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


            <form id="my_form" action="" method="post">
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
                                            <td>Po Num：<?=$md['Po_Num']?></td>
                                            <td>Name：<?=$md['Name']?></td>
                                            <td>Country： <?=$md['Country']?></td>
                                            <td>Vend Name：<?=$md['Vend_Name']?></td>
                                        </tr>
                                        <tr>
                                            <td>Product Group： <?=$md['Product_Group']?></td>
                                            <td>Card：<?=$md['Card']?></td>
                                            <td>Product no：<?=$md['Product_no']?></td>
                                            <td>Del Method：<?=$md['Del_Method']?></td>
                                        </tr>
                                        <tr>
                                            <td>Po Qty： <?=$md['Po_Qty']?></td>
                                            <td>Name of sub-contractors： <?=$md['Name_sub_contractors']?></td>
                                            <td>Town of sub-contractors：<?=$md['Town_sub_contractors']?></td>
                                            <td>QC member：<?=$md['QC_member']?></td>
                                        </tr>
                                    </tbody>
                                </table>



                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td><label style="margin-top: 4px;">Sample Size：</label></td>
                                        <td><input name="base[sample_size]" style="width: 100px;" type="text" class="form-control"></td>
                                        <td><label style="margin-top: 4px;">Final Inspection Date：</label></td>
                                        <td><input name="base[final_inspection_date]" style="width: 100px;" type="text" class="form-control"></td>
                                        <td><label style="margin-top: 4px;">Final inspection result：</label></td>
                                        <td>
                                            <select name="base[final_inspection_result]" class="form-control">
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
                                <?php foreach($ck_data as $k=>$v):?>
                                <li role="presentation"<?php if($k=='Construction'):?> class="active"<?php endif;?>><a href="#<?=$k?>" aria-controls="home" role="tab" data-toggle="tab"><?=$k?></a></li>
                                <?php endforeach;?>
                            </ul>


                            <div class="tab-content">

                                <?php foreach($ck_data as $k=>$v):?>
                            <div role="tabpanel" class="tab-pane <?php if($k=='Construction'):?> active<?php endif;?>" style="padding: 10px;" id="<?=$k?>">
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
                                            <select name="Problem[]" class="form-control">
                                                <option></option>
                                                <?php foreach($v as $kk=>$vv):?>
                                                <option value="<?=$kk?>"><?=$vv?></option>
                                                <?php endforeach?>
                                            </select>
                                        </td>
                                        <td><input name="Measurement[]" type="text" class="form-control"></td>
                                        <td><input name="Defect_QTY[]" type="text" class="form-control"></td>
                                        <td><a href="javascript:;" class="btn btn-danger btn-xs" onclick="return rs_del(this);">Delete</a></td>
                                    </tr>
                                </table>

                                <div>
                                    <button type="button" class="btn btn-default add_one">Add one</button>
                                </div>
                            </div>
                                <?php endforeach;?>


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
            </form>
			
        </div>
        <!-- /#page-wrapper -->
<?php require(__DIR__.'/foot.php')?>
<script src="<?=STA_URL?>_my_js/report_2.js"></script>
