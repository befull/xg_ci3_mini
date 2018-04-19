<h3>Meta:</h3>
<table border="1">
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


<h3>Criteria TEST:</h3>
<table border="1">
    <thead>
        <tr>
            <th>Problem</th>
            <th>Measurement</th>
            <th>Defect QTY</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($rc_rs as $rc):?>
        <tr>
            <td><?=$c_rs[$rc->checklist_id]->name?></td>
            <td><?=$rc->measurement?></td>
            <td><?=$rc->defect_QTY?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>