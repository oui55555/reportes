
	<!-- <div class="p_15">
		<h1><? echo $user_name ." ". $user_last; ?></h1>
		<? echo $user_mail; ?><br>
	</div> -->


	<ul class="nav">


				<li id="home">
					<a href="<?echo site_url();?>/empresa_home/valid_user/home">
						<i class="fa fa-id-home" aria-hidden="true"></i> Inicio
					</a>
				</li>

				<li id="profile">
					<a href="<?echo site_url();?>/empresa_home/valid_user/my_profile">
						<i class="fa fa-id-badge" aria-hidden="true"></i> Mi perfil
					</a>
				</li>

				<li>
					<a href="<?echo site_url();?>/empresa/logout">
						<i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a>
				</li>
		<? if($my_apps){?>
			<li>
				<h3>Mis Apps</h3>
			<li>
			<? foreach ($my_apps as $k) {?>
				<li id="profile">
					<a href="<?echo site_url();?>/empresa_home/valid_user/my_app/<?= $k->app_id; ?>">
						<i class="fa fa-mobile fa-lg" aria-hidden="true"></i> <?= $k->app_name; ?>
					</a>
				</li>
			<? } ?>

		<?}?>

	</ul>
