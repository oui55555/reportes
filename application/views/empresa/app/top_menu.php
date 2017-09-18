<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?= $app[0]->app_name; ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?echo site_url();?>/empresa_home/valid_user/add_reporte/<?= $this->uri->segment(4); ?>">Crear reporte <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Bandeja</a></li>
        <li><a href="<?echo site_url();?>/empresa_home/valid_user/app_user/<?= $this->uri->segment(4); ?>">Usuarios</a></li>

      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
