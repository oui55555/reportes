<? $this->load->view('app/head'); ?>

</head>

<body>
	<? $this->load->view('app/home/menu'); ?>
	
		<section class="container-fluid">
	
		
	
			<? $this->load->view($main_content); ?>
	
		</section>


			<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
			<script src="<?echo site_url();?>/js/jquery-ui.min.js"></script>
			<script src="<?echo site_url();?>/js/jquery.easing.1.3.js"></script>

			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

			<script type="text/javascript">
			  $(function(){
			     $(this_page).addClass('active'); 

			  });
			</script>

</body>

</html>