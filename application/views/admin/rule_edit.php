<form class="form-horizontal" action="<?=current_url().'?id='.$id?>">
    <div class="form-group">
        <label class="col-sm-2 control-label">权限名</label>
        <div class="col-sm-10">
            <input name="name" value="<?=isset_or($r->name)?>" type="text" class="form-control" >
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">MCA</label>
        <div class="col-sm-10">
            <input name="mca" value="<?=isset_or($r->mca)?>" type="text" class="form-control" >
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">图标</label>
        <div class="col-sm-10">
            <?=form_input('ico', isset_or($r->ico), 'class="form-control"')?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">类型</label>
        <div class="col-sm-10">
            <?=form_dropdown('type', status_select_arr('rule_type'), isset_or($r->type), 'class="form-control"')?>
        </div>
    </div>
</form>