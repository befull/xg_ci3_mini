<?=form_open('')?>

error:
<?=validation_errors()?>
<br>
token:<?=form_token()?><br>
Name:<?=form_input('name')?><br>
Pw:<?=form_password('pw')?><br>
<?=form_submit('mysubmit', 'Submit Post!')?>


</form>