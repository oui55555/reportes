<script type="text/javascript">
	this_page="#my_events";
</script>
<h1>Candidato</h1>
<div class="row">
		<? foreach ($candidato as $x ) {?>
			
			<div class="col-sm-4">
			      <li class="list-group-item name" data-id="<?= $x->user_event_id ?>"><?= $x->user_event_name; ?> </li>
                  <li class="list-group-item last"><?= $x->user_event_lastName; ?></li>
                  <li class="list-group-item email"><?= $x->user_event_email; ?></li>
                  <li class="list-group-item domicilio"><?= $x->domicilio; ?></li>
                  <li class="list-group-item edad"><?= $x->edad; ?></li>
                  <li class="list-group-item genero"><?= $x->genero; ?></li>
			</div>
			
			<div class="col-sm-4">
                  <li class="list-group-item escolaridad"><?= $x->escolaridad; ?></li>
                  <li class="list-group-item disponibilidad"><?= $x->disponibilidad; ?></li>
                  <li class="list-group-item experiencia"><?= $x->experiencia; ?></li>
                  <li class="list-group-item detalles"><?= $x->detalles; ?></li>
                  <li class="list-group-item ingles"><?= $x->ingles; ?></li>
                  <li class="list-group-item cel"><?= $x->cel; ?></li>
                  <li class="list-group-item puesto"><?= $x->puesto; ?></li>
                  <li class="list-group-item rfc"><?= $x->rfc; ?></li>
			</div>
			
			<div class="col-sm-4">
                  <li class="list-group-item curp"><?= $x->curp; ?></li>
                  <li class="list-group-item nacimiento"><?= $x->nacimiento; ?></li>
                  <li class="list-group-item civil"><?= $x->civil; ?></li>
                  <li class="list-group-item nns"><?= $x->nns; ?></li>
                  <li class="list-group-item cedula"><?= $x->cedula; ?></li>
                  <li class="list-group-item escuela"><?= $x->escuela; ?></li>
                  <li class="list-group-item municipio"><?= $x->municipio; ?></li>
                  <li class="list-group-item auto"><?= $x->auto; ?></li>
			</div>

		<?}?>
</div>
<div class="row">

    <div  class="col-sm-6">
    	<h3>Estado de candidato</h3>
    	<h4><? if($x->stats == 1){echo 'rechazado';}else if($x->stats == 2){echo 'Aprobado';} ?></h4>
    </div>
    <div  class="col-sm-6">
	 <?= form_open('app_home/valid_user/candidato/'.$x->user_event_id, 'class="form_admin"');?>
        <fieldset>

          <legend>Estado del candidato</legend>
          
         <select name="estado">
         	<option value=""></option>
         	<option value="1">Rechazado</option>
         	<option value="2">Aprobado</option>
         </select>

          <input type="hidden" value="<?= $x->user_event_id; ?>" name="user_event_id">
          <?= form_submit('candidato_edit', 'Actualizar', 'class="btn btn-info"');?>

         </fieldset>
      <?= form_close();?>
    </div>

</div>
