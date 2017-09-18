<?  foreach ($empresa->result() as $x) {
        $empresa_id          = $x->empresa_id;
        $empresa_tit         = $x->empresa_tit;
        $empresa_dir         = $x->empresa_direccion;
        $empresa_mail        = $x->empresa_mail;
        $empresa_contacto    = $x->empresa_contacto;
    }
?>
<script type="text/javascript">
  this_page="#temporadas";
</script>




<div class="row">
       <h1 class="txt_c"><?=  $empresa_tit; ?> </h1>

    <div class="row">
      <div class="jumbotron">
          <p><b>Empresa:</b> <?= $empresa_tit ?></p>
          <p><b>Contacto:</b> <?= $empresa_contacto ?></p>

      <button class="btn btn-danger borrar ">Borrar</button>

     <!-- <div class="alert alert-danger confirmar" role="alert">
       <strong>¡Atención!</strong> eliminar este evento no se puede deshacer y se perdera toda la informacion relacionada.
       <br>
       <a href="<?= site_url()?>/admin_home/valid_user/empresa_user_delete/<?= $empresa_id ?>" class="btn btn-danger">Confirmar borrado</a>
       <button class="btn-warning btn cancelar">Cancelar</button>
     </div> -->

      </div>
  </div>
  <div class="row">
  <?= form_open('admin_home/valid_user/empresa_detail/'.$empresa_id, 'class="form_admin"');?>
        <fieldset>

          <legend>Editar empresa</legend>
          <div  class="col-sm-6">

          <label>Empresa
            <?= form_error('empresa_tit', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('empresa_tit', $empresa_tit);?>

          <label>Contacto
            <?= form_error('empresa_contacto', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('empresa_contacto', $empresa_contacto);?>

        </div>
        <div class="col-sm-6">

          <label>Direccion
            <?= form_error('empresa_dir', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_textarea('empresa_dir', $empresa_dir);?>

        </div>
          <div class="row txt_r">

          <input type="hidden" value="<?= $empresa_id; ?>" name="empresa_id">
          <?= form_submit('empresa_edit', 'Actualizar', 'class="btn btn-info "');?>
        </div>
      </fieldset>
      <?= form_close();?>

  </div>

</div>

<div class="row">
<h3>Lista de Apps</h3>

</div>

</div>
</div>

   <script type="text/javascript">
      $(function(){
        $('.confirmar').hide();
        // Hide all user alredy token
        <? foreach ($user_not_available->result() as $y) { ?>
         $('#user_<?= $y->user_event_id?>').addClass('warning');
         $('#user_<?= $y->user_event_id?>').removeClass('value');
         $('#user_<?= $y->user_event_id?>').find('span').remove();
        <?}?>


        // submit user to 'period_user'
        $('.submit_users').click(function(){
            $('tr.active').each(function(){
              var this_tag = this;
              var value_u_id = $(this).attr('data-id')


              $.ajax({
                    method: "POST",
                    url: "<?= site_url(); ?>/admin_home/ajax_add_user",
                    data:
                    {
                      candidato: value_u_id,
                      empresa: <?= $empresa_id; ?>
                    },
                    success: function(res)
                    {
                        $(this_tag).addClass('warning');
                        $(this_tag).removeClass('value');
                        $(this_tag).find('span').remove();

                    }
                  });

            });
        });

        // remove user from register list
        $('.remove_user').click(function(){
            var user_id = $(this).closest('tr').attr('data-id');
            var this_tag =  this;
                $.ajax({
                    method: "POST",
                    url: "<?= site_url(); ?>/admin_home/ajax_remove_user/"+user_id,
                    data:{period_user_id: user_id},
                    success: function(res)
                    {
                        $(this_tag).closest('tr').remove();

                    }
                  });

        })

        $('tr.value span.glyphicon').hide();

        $('tr.value').click(function(){
            $(this).toggleClass('active');
            $('span.glyphicon', this).fadeToggle();
        });

        $('.check_all').click(function(){
            $('tr.value').each(function(){
              $(this).addClass('active');
              $('span.glyphicon', this).fadeIn();
            });
        });

        $('.confirmar').hide();
        $('.borrar').click(function(event){
          event.preventDefault();
          $('.confirmar').fadeToggle();
          $(this).fadeToggle();
        });
        $('.cancelar').click(function(event){
          event.preventDefault();
          $('.borrar').fadeToggle();

          $(this).closest('.confirmar').fadeToggle();
        });
      });
   </script>
