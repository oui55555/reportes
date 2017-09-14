<script type="text/javascript">
	this_page="#my_user";
</script>
<h1>Mis datos</h1>
		
<div class="panel panel-warning">
  <div class="panel-heading">
    <h3 class="panel-title">Nombre y correo</h3>
  </div>
  <div class="panel-body">
		<?= form_open('app_home/valid_user/my_user', 'class="form_admin" ');?>

			<fieldset>
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				<?= form_input('user_event_name', $user_name) ;?>
			</fieldset> 				

			<fieldset>
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				<?= form_input('user_event_lastName', $user_last);?>
			</fieldset> 				

			<fieldset>
				<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
				<?= form_input('user_event_email', $user_mail);?>
			</fieldset>
			<input type="hidden" name="id" value="<?= $user_id ?>">
			
			
  </div>
</div>



