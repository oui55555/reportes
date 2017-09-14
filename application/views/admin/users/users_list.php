<script type="text/javascript">
  this_page="#administradores";
</script>


  <div class=" row">
    <?= form_open('admin_home/valid_user/users', 'class="form_admin"');?>
        <fieldset>
          <legend>Administradores</legend>
          <div class="row">
            <div class="col-sm-4">

              <h3>Crear nuevo</h3>
              <p>Agregar administradores y reclutadores<br>
                Adminstradores.- acceso total<br>
                Editor.- Acceso restringido
              </p>
            </div>

          <div class="col-sm-4">

          <label>Nombre
            <?= form_error('user_name', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('user_name', $this->input->post('user_name'));?>

          <label>Apellidos
            <?= form_error('user_lastName', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('user_lastName', $this->input->post('user_lastName'));?>

          <label>Tipo de usuario</label>
          <br><input type="radio" name="user_type" value="1" > Administrador
          <br><input type="radio" name="user_type" value="0" checked> Editor<br>
        </div>

        <div class="col-sm-4">

          <label>Email
            <?= form_error('user_mail', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('user_mail', $this->input->post('user_mail'));?>

          <label>Contraseña
            <?= form_error('user_password', '<br><span class="label label-danger">', '</span>'); ?>

          </label>
          <input type="text" name="user_password" data-size="7" data-character-set="a-z,0-9" class="random_pass">
        </div>

          <?= form_hidden('validation', '1');?>
        </div>
          <div class="txt_r row">
            <?= form_submit('registrarse', 'Agregar', 'class="btn btn-default"');?>

          </div>
          </fieldset>
      <?= form_close();?>


  </div>

  <div class="row">
    <h3>Lista de administradores</h3>

    <div class="col-sm-12 p_15">
          <div class="table-responsive panel">
            <table class="table table-hover ">
              <thead>
                <tr>
                  <th>Nombre Completo</th>
                  <th>E-mail</th>
                  <th>Nivel</th>
                  <th></th>
                </tr>
              </thead>
              <tbody class="">
            	<? foreach ($users->result() as $user ) {?>
                  <tr>
                    <td><?= $user->user_name. ' '.$user->user_lastName; ?></td>
              			<td><?= $user->user_mail; ?></td>
              			<td><? if($user->user_admin==1)echo 'Administrador'; else echo 'Reclutador'; ?></td>
                    <td>
                      <div class="btn-group" role="group" aria-label="">
                      <a href="#" class="btn btn-default btn-xs borrar">
                        <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                        <span class="confirmar">Cancelar</span>
                      </a>
                      </div>
                      <a href="<?= site_Url(); ?>/admin_home/valid_user/users/<?= $user->user_id ?>" class="btn btn-danger btn-xs confirmar">Confirmar borrado</a>
                    </td>

                    </td>
                  </tr>
                <?}?>

              </tbody>
            </table>
          	<div class="txt_c"> <?= $this->pagination->create_links();?></div>
          </div>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">

          // Create a new password on page load
          $('.random_pass').each(function(){
            $(this).val(randString($(this)));
          });
        $('.confirmar').hide();
          $('.borrar').click(function(event){
          event.preventDefault();
          $(this).closest('td').find('.confirmar').fadeToggle();

        });

</script>
