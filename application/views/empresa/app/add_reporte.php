<div class="row">
  <? $this->load->view('empresa/app/top_menu'); ?>

  <?= form_open('empresa_home/valid_user/add_reporte/'.$this->uri->segment(4), 'class="form_admin"');?>
        <fieldset>

          <legend>Crear reporte</legend>
          <div  class="col-sm-6">

          <label>Nombre de reporte
            <?= form_error('reporte_tit', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('reporte_tit', $this->input->post('reporte_tit'));?>

        </div>
        <div class="col-sm-6">

        </div>
          <div class="row txt_r">

          <input type="hidden" value="<?= $empresa_id; ?>" name="empresa_id">
          <input type="hidden" value="<?= $this->uri->segment(4); ?>" name="app_id">

          <?= form_submit('add_reporte', 'Agregar', 'class="btn btn-info "');?>
        </div>
      </fieldset>
      <?= form_close();?>

</div>
