<? $this->load->view('app/head'); ?>

</head>

<body>
	
	<section class="container-fluid">
	
		<div class="row">
	
			<? $this->load->view($main_content); ?>
	
		</div>
	
	</section>

			<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
			<script src="<?echo site_url();?>/js/jquery-ui.min.js"></script>
			<script src="<?echo site_url();?>/js/jquery.easing.1.3.js"></script>

			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</body>

</html>