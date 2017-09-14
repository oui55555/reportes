<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
<h3>Registrate</h3>


	<?= form_open('admin/create_user', 'class="form_admin"');?>
		<fieldset>
			<legend>Datos personales</legend>
				<label>Nombre 
					<?= form_error('user_name', '<br><span class="label label-danger">', '</span>'); ?>
				</label>
				<?= form_input('user_name', $this->input->post('user_name'));?>

				<label>Apellido 
					<?= form_error('user_lastName', '<br><span class="label label-danger">', '</span>'); ?>
				</label>
				<?= form_input('user_lastName', $this->input->post('user_lastName'));?>
		</fieldset>
		
		<fieldset>
			<legend>Datos de ingreso</legend>
				<label>Email: 
					<?= form_error('user_mail', '<br><span class="label label-danger">', '</span>'); ?>
				</label>
				<?= form_input('user_mail', $this->input->post('user_mail'));?>

				<label>Contraseña 
					<?= form_error('user_user_password', '<br><span class="label label-danger">', '</span>'); ?>
				</label>
				<?= form_password('user_password');?>

				<label>Confirma constraseña 
					<?= form_error('user_passwordc', '<br><span class="label label-danger">', '</span>'); ?>
				</label>
				<?= form_password('user_passwordc');?>

				<?= form_submit('registrarse', 'Registro');?>
		</fieldset>
	<?= form_close();?>	

		<div class="col-sm-4"></div>
	</div>
</div></div>
