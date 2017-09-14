<div style="text-align:center;padding:20px;">
</div>
<section class="centered"id="login">
		<?= form_open('app/validate_credentials', 'class="form_admin" ');?>
			<legend>Inicia tu sesión</legend>
			<fieldset>
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				<?= form_input('user_mail', $this->input->post('user_mail'), 'placeholder="Correo"');?>
			</fieldset> 				

			<fieldset>
				<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
				<?= form_password('user_password', $this->input->post('user_password'), 'placeholder="Contraseña"');?>
			</fieldset>
				
			
			<?= form_submit('submit', 'Entrar', 'class="btn  btn-block btn-warning"');?>
					
			
			<? if(isset($fail)){?>
					<div class="alert alert-warning" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> | 
						<?= $fail; ?>
					</div>
				<?}?>
		<?= form_close();?>
</section>