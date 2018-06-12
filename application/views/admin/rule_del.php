<form class="" action="<?=current_url().'?id='.$id?>">
    <?=form_hidden('id', $id)?>
    <p class="lead">是否确定删除【<?=$r->name?>】权限？</p>
</form>