  <? $this->load->view('admin/home/head'); ?>
			<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
			<script src="<?echo base_url();;?>/js/jquery-ui.min.js"></script>
			<script src="<?echo base_url();;?>/js/jquery.jqGrid.js"></script>

			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

			<script type="text/javascript" src="<?echo base_url();?>js/animacion.js"></script>

				<script>
					var this_page;

				  $( function() {
				    $( ".cal" ).datepicker({
						  dateFormat: "yy-mm-dd",
					      changeMonth: true,
					      changeYear: true
						});
				  } );




				</script>

</head>

<body class="admin">
  <div class="menuAdmin m_0 bg_dark">

    <?$this->load->view('admin/home/menu');?>

  </div>
	<section class="container-fluid">

			<div class=" main_content">
				<? $this->load->view($main_content); ?>
      </div>

	</section>

<? // $this->load->view('admin/home/footer'); ?>
<script type="text/javascript">
	$(function(){
		$(this_page).addClass('active');
	});
</script>
</body>
</html>
