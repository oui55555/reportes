<script type="text/javascript">
  this_page="#temporadas";
</script>



 <div class="row">

		<?= form_open('admin_home/valid_user/empresa', 'class="form_admin"');?>
		<fieldset>
			<legend>Empresa</legend>
      <div class="row">
        <div class="col-sm-4">
          <label>Nombre empresa
            <?= form_error('empresa_tit', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('empresa_tit', $this->input->post('empresa_tit'));?>

          <label>Nombre contacto
            <?= form_error('empresa_contacto', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('empresa_contacto', $this->input->post('empresa_contacto'));?>

        </div>

        <div class="col-sm-4">
          <label>Correo
            <?= form_error('empresa_mail', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('empresa_mail', $this->input->post('empresa_mail'));?>

          <label>Contraseña
            <?= form_error('empresa_pass', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('empresa_pass', $this->input->post('empresa_pass'));?>

        </div>

        <div class="col-sm-4">
          <label>Direccion
            <?= form_error('empresa_dir', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_textarea('empresa_dir', $this->input->post('empresa_dir'));?>

        </div>

      </div>



      <div class="txt_r">

        <?= form_submit('empresa_add', 'Agregar', 'class="btn btn-info "');?>
      </div>
			</fieldset>
		<?= form_close();?>

  </div>
    <div class="row">

      <h3>Lista de empresas</h3>
      <div class="col-sm-12">
        <div class="table-responsive">
          <table class="table table-hover panel">
            <thead>
              <tr>
                <th>Empresa</th>
                <th>Contacto</th>
                <th>Correo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>

                <? foreach ($empresa->result() as $e) { ?>
                 <tr>

                  <td><?= $e->empresa_tit ?></td>
                  <td><?= $e->empresa_contacto; ?></td>
                  <td><?= $e->empresa_mail; ?></td>
                  <td>
                    <div class="btn-group" role="group" aria-label="">
                    <a href="<?= site_Url(); ?>/admin_home/valid_user/empresa_detail/<?= $e->empresa_id ?>" class="btn btn-default btn-xs borrar" alt="Asignar usarios">
                        Ver empresa
                    </a>
                    </div>
                  </td>

                </tr>
              <? }?>

            </tbody>
          </table>
        	<div class="txt_c"> <?= $this->pagination->create_links();?></div>
        </div>
 	 </div>
 </div>

 </div></div>
