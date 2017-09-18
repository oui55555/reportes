
		<?= form_open('empresa/validate_credentials', 'class="form_admin form-horizontal centrado" id="login"');?>
			<fieldset>
				<h3 class="txt_c">Empresas</h3>
				<!-- <legend>Inicia tu sesión</legend> -->
				<div class="form-group">
					<label class="control-label col-sm-3">Email</label>
					<div class="col-sm-9"><?= form_input('user_mail', $this->input->post('user_mail'));?></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Contraseña</label>
					<div class="col-sm-9"><?= form_password('user_password', $this->input->post('user_password'));?></div>
				</div>
				<div class="txt_r">

					<?= form_submit('submit', 'Entrar', 'class="btn btn-success "');?>
				</div>

			</fieldset>
			<? if(isset($fail)){?>
					<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> |
						<?= $fail; ?>
					</div>
				<?}?>
		<?= form_close();?>
