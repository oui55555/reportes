
	<!-- <div class="p_15">
		<h1><? echo $user_name ." ". $user_last; ?></h1>
		<? echo $user_mail; ?><br>
	</div> -->


	<ul class="nav">


		<li id="profile">
			<a href="<?echo site_url();?>/admin_home/valid_user/my_profile">
				<i class="fa fa-id-badge" aria-hidden="true"></i> Mi perfil
			</a>
		</li>

		<? if($this->session->userdata('user_admin')==1){?>
		<!-- Adminn access only -->
			<li id="administradores">
				<a href="<?echo site_url();?>/admin_home/valid_user/users">
					<i class="fa fa-users" aria-hidden="true"></i> Administradores
				</a>
			</li>
		<?}?>


		<li id="temporadas">
			<a href="<?echo site_url();?>/admin_home/valid_user/empresa">
				<i class="fa fa-building-o" aria-hidden="true"></i> Empresas
			</a>
		</li>
		<li id="eventos">
			<a href="<?echo site_url();?>/admin_home/valid_user/events">
				<i class="fa fa-mobile" aria-hidden="true"></i> App</a>
		</li>
		<? if($this->session->userdata('user_admin')==0){?>
			<?}?>
		<li id="usuarios">
			<a href="<?echo site_url();?>/admin_home/valid_user/candidato">
				<i class="fa fa-sing-out" aria-hidden="true"></i> Usuarios de app</a>
		</li>
		<li>
			<a href="<?echo site_url();?>/admin/logout">
				<i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a>
		</li>
	</ul>
