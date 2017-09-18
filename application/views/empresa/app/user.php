<div class="row">
  <? $this->load->view('empresa/app/top_menu'); ?>
  <?if($users->num_rows()>0){?>

  <h3>Lista de usuarios</h3>
  <div class="col-sm-12">
    <div class="table-responsive">
      <table class="table table-hover panel">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

          <? foreach ($users->result() as $u) {?>
             <tr>

              <td><?= $u->app_user_name; ?></td>
              <td><?= $u->app_user_lastName; ?></td>
              <td><?= $u->app_user_email; ?></td>
              <td>
                <div class="btn-group" role="group" aria-label="">
                <a href="<?= site_Url(); ?>/empresa_home/valid_user/user/<?= $u->app_user_id; ?>" class="btn btn-default btn-xs" alt="Asignar usarios">
                    Ver usuario
                </a>
                </div>
              </td>

            </tr>





            <?}?>

        </tbody>
      </table>
      <div class="txt_c"> <?= $this->pagination->create_links();?></div>
    </div>
      <?}else{ ?>
        No hay usuarios registrados
        <?}?>
</div>
</div>
