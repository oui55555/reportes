<script type="text/javascript">
	this_page="#my_events";
</script>
<h1>Candidatos</h1>


<?if($candidatos==false){?>
<div class="alert alert-warning" role="alert">No tienes candidatos.</div>
<?}else{?>
	<table class="table">
		<thead>
			<tr>
				<td>Nombre</td>
				<td>Correo</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
		<? foreach ($candidatos as $x ) {?>
			<tr>
				<td><?= $x->user_event_name; ?> <?= $x->user_event_lastName; ?></td>
				<td><?= $x->user_event_email; ?></td>
				<td><a href="<?= site_url()?>/app_home/valid_user/candidato/<?= $x->user_event_id ?>">ver candidato</a></td>
			</tr>


		<?}?>
		</tbody>
	</table>

<?}?>