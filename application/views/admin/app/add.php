<div class="row">

   <?= form_open('admin_home/valid_user/app', 'class="form_admin"');?>
   <fieldset>
     <legend>App</legend>
     <div class="row">
       <div class="col-sm-4">
         <label>Nombre app
           <?= form_error('app_name', '<br><span class="label label-danger">', '</span>'); ?>
         </label>
         <?= form_input('app_name', $this->input->post('app_name'));?>

       </div>

       <div class="col-sm-4">
         <label for="empresa_id">Empresa
           <?= form_error('empresa_id', '<br><span class="label label-danger">', '</span>'); ?>
         </label>
         <select class="form-control" name="empresa_id">
           <? foreach ($empresa->result() as $e) { ?>
           <option value="<?= $e->empresa_id; ?>"><?= $e->empresa_tit; ?></option>
         <?}?>
       </select>

       </div>

       <div class="col-sm-4">
         <div class="txt_r">
           <?= form_submit('add_app', 'Agregar', 'class="btn btn-info "');?>
         </div>

       </div>

     </div>



     </fieldset>
   <?= form_close();?>

 </div>


<div class="row">

    <div class="col-sm-12">
      <h3>Lista de apps</h3>
        <div class="table-responsive ">
          <table class="table table-hover panel">
            <thead>
              <tr class="">
                <th>Nombre app</th>
                <th>Nombre de empresa</th>
                <th>URL de app</th>

                <th></th>
              </tr>
            </thead>
            <tbody >
              <? foreach ($empresas as $e) { ?>
                <tr>
                  <td class="ue_name" ><?= $e->app_name; ?> </td>
                  <td class="ue_last"><?= $e->empresa_tit; ?></td>
                  <td class="ue_email"><?= site_Url(); ?>/app/<?= $e->app_id; ?></td>

                  <td>
                    <div class="btn-group" role="group" aria-label="">
                      <a href="<?= site_Url(); ?>/admin_home/valid_user/app_detail/<?= $e->app_id; ?>" class="btn btn-default btn-xs btn-edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Ver</a>

                    </div>
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
