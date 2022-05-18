<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.0.0
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
		<meta name="author" content="Łukasz Holeczek">
		<meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
		<title>Bus</title>
		<!-- Icons-->
		<link href="<?php echo base_url();?>assets/vendors/bootstrap/css/bootstrap.css" rel="stylesheet">
		<script src="<?php echo base_url();?>assets/vendors/jquery/js/jquery.min.js"></script>
		<!-- Main styles for this application-->
<style>
	.card-header{
		background-color: white;
	}
	body{
		background-color: gray;
	}
</style>
	</head>
	<body>		
			<!-- Your content will be here-->
	
    <?php echo $contents; ?>

		<!-- Bootstrap and necessary plugins-->
		<script src="<?php echo base_url();?>assets/vendors/popper.js/js/popper.min.js"></script>
		<script src="<?php echo base_url();?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/vendors/pace-progress/js/pace.min.js"></script>
		<!-- Plugins and scripts required by this view-->
		<script src="<?php echo base_url();?>assets/sweetalert/dist/sweetalert2.all.min.js"></script>
		<script>

const flashdata = $('.flash-data').data('flashdata');


if(flashdata == 'registrasi_berhasil'){
  Swal.fire({
    icon: 'success',
    title: '' +flashdata,
    text: 'silahkan login'
  })
}
else if(flashdata == 'success'){
    Swal.fire({
    icon: 'success',
    title: ''+flashdata,
    text: ''
  })
  }
  else{
	if(flashdata){
  Swal.fire({
    icon: 'error',
    title: '' +flashdata,
    text: ''
  })
}
  }
</script>
	</body>
</html>
