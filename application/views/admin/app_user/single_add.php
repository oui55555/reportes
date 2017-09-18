<script type="text/javascript">
  this_page="#usuarios";
</script>


<h1>Usuarios</h1>

<div class="row">
    <?= form_open('admin_home/valid_user/app_user', 'class="form_admin"');?>
    <?
        //values for option select yes/no
        $options = array(
          ''         => '--',
          'si'         => 'Si',
          'no'           => 'No'
      );
    ?>
        <fieldset>
          <legend>Agregar usuario</legend>

        <div class="col-sm-5">

          <label>Nombre
            <?= form_error('user_name', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('user_name', $this->input->post('user_name'));?>

          <label>Apellidos
            <?= form_error('user_lastName', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('user_lastName', $this->input->post('user_lastName'));?>
        </div>
        <div class="col-sm-5">
          <label>Email
            <?= form_error('user_mail', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('user_mail', $this->input->post('user_mail'));?>




          <label>Contraseña
            <?= form_error('password', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('password', $this->input->post('password'));?>

        </div>

        <input name="reclutador" type="hidden" value="<?= $user_id; ?>">
        <div class="col-sm-2 txt_r">
          <?= form_submit('user_event_add', 'Agregar usuario', 'class="btn btn-info"');?>

        </div>

          </fieldset>
      <?= form_close();?>



</div>
<div class="row" id="edit_form">

    <?= form_open('admin_home/valid_user/app_user', 'class="form_admin edit_user_form"');?>
        <fieldset>
          <legend>Editar usuario</legend>

          <div class="col-sm-3">
            <label>Nombre </label>
            <?= form_input('user_name_edit');?>
            <label>Apellidos</label>
            <?= form_input('user_lastName_edit');?>
            <label>Email </label>
            <?= form_input('user_mail_edit');?>



          <input type="hidden" name="user_event_id">

          <?= form_submit('user_event_edit', 'Actualizar', 'class="btn btn-default btn-block"');?>

        </div>

        </fieldset>
      <?= form_close();?>


</div>

<div class="row">
    <div class="col-sm-12">
      <h3>Lista de usuarios</h3>
        <div class="table-responsive ">
          <table class="table table-hover panel">
            <thead>
              <tr class="">
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>E-mail</th>

                <th></th>
              </tr>
            </thead>
            <tbody >

            <? foreach ($users_event->result() as $x ) { ?>
                <tr>
                  <td class="ue_name" data-id="<?= $x->app_user_id ?>"><?= $x->app_user_name; ?> </td>
                  <td class="ue_last"><?= $x->app_user_lastName; ?></td>
                  <td class="ue_email"><?= $x->app_user_email; ?></td>

                  <td>
                    <div class="btn-group" role="group" aria-label="">
                    <a href="#" class="btn btn-default btn-xs btn-edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</a>
                    <a href="#" class="btn btn-default btn-xs borrar">
                      <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Borrar
                      <span class="confirmar">Cancelar</span>
                    </a>

                  </div>
                  <a href="<?= site_Url(); ?>/admin_home/valid_user/candidato/<?= $x->app_user_id ?>" class="btn btn-danger btn-xs confirmar">Confirmar borrado</a>
                  </td>

                </tr>
            <? } ?>


            </tbody>
          </table>
          <nav aria-label="Page navigation" class="txt_c">
            <ul class="pagination">
              <?= $this->pagination->create_links();?>
            </ul>
          </nav>
        </div>
   </div>

</div>

</div></div>

  <script type="text/javascript">

    $(function(){
        $('#edit_form').hide();
        $('.confirmar').hide();

        $('.borrar').click(function(event){
          event.preventDefault();
          $(this).closest('td').find('.confirmar').fadeToggle('fast');

        });

        $('.btn-edit').click(function(event){
            event.preventDefault();

           $('input[name="user_event_id"]').val( $(this).closest('tr').find('.ue_name').attr('data-id'));
           $('input[name="user_name_edit"]').val( $(this).closest('tr').find('.ue_name').text());
           $('input[name="user_lastName_edit"]').val( $(this).closest('tr').find('.ue_last').text());
           $('input[name="user_mail_edit"]').val( $(this).closest('tr').find('.ue_email').text());



            $('#edit_form').fadeIn();
        });


          // Create a new password on page load
          $('.random_pass').each(function(){
            $(this).val(randString($(this)));
          });


    });
  </script>
