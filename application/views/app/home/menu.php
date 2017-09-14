<nav class="navbar navbar-kiik">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-1" aria-expanded="false">
        <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true">
        <a class="navbar-brand" href="#"><img src="<?= base_url();?>img/kiik.png" height="24"></span></a>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="collapse-1">
      <ul class="nav navbar-nav">
        <li id="my_user"><a href="<?= site_url()?>/app_home/valid_user/my_user"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> | Mis datos</a></li>
        <li id="calendar"><a href="<?= site_url()?>/app_home/valid_user/candidatos"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> | Mis candidatos</a></li>
        <li><a href="<?= site_url(); ?>/app/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> | Salir</a></li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<script type="text/javascript">
  var this_page;
</script>