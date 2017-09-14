<?

	$update_my_data =site_url().'/admin_home/valid_user/update_my_data';

	$update_my_pass =site_url().'/admin_home/valid_user/update_my_pass';

?>
<script type="text/javascript">
  this_page="#profile";
</script>


<header class="admin_header">


	<h3>Mi perfil</h3>

	<p>Aqui puedes editar tus datos y cambiar tu contraseña</p>

</header>



<?= form_open($update_my_data, 'class="form_admin col-sm-6"');?>

	<fieldset class="">

		<legend>Datos personales</legend>

			<label>Nombre</label>

				<?= form_input('user_name', $user_name, 'required');?>

			<label>Apellido</label>

				<?= form_input('user_lastName', $user_last, 'required');?>

			<label>Correo</label>

				<?= form_input('user_mail', $user_mail, 'required');?>
			<input name="user_id" value="<?= $user_id?>" type="hidden">
			<div class="txt_r">
				<?= form_submit('user_data', 'Actualizar', 'class="btn btn-default"');?>

			</div>

	</fieldset >

<?= form_close();?>

<?= form_open($update_my_pass, 'class="form_admin col-sm-6"');?>
<? if(isset($pass_changed)){?>
<div class="alert alert-success" role="alert"> Contraseña cambiada correctamente.</div>
<?}?>

	<fieldset class="">

		<legend>Cambia tu contraseña</legend>

			<label>Nueva contraseña</label>
				<?= form_error('user_pass', '<br><span class="label label-danger">', '</span>'); ?>
				<?= form_password('user_pass');?>

			<label>Confirmar contraseña</label>
				<?= form_error('user_passC', '<br><span class="label label-danger">', '</span>'); ?>
				<?= form_password('user_passC');?>
			<input name="user_id" value="<?= $user_id?>" type="hidden">
			<div class="txt_r">

				<?= form_submit('user_pass_data', 'Cambiar', 'class="btn  btn-default"');?>
			</div>

	</fieldset>

<?= form_close();?>

</div>

</div>
