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
	<title>Bus</title>
	<!-- Icons-->
	<link href="<?php echo base_url(); ?>assets/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Main styles for this application-->
	<link href="<?php echo base_url(); ?>assets/vendors/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/datatables.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/datatables.min.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>assets/vendors/jquery/js/jquery.min.js"></script>
	<style>
		* {
			font-family: sans-serif;
			font-weight: 300;
		}

		.navbar-brand {
			font-size: 25px;
		}

		.border-custom {
			border-width: 1px !important;
		}

		.container-top {
			padding-top: 70px;
		}
		.nav-link{
			color: black;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-expand-lg border navar-dark bg-light fixed-top">
		<a disabled class="navbar-brand font-weight-bold ">TegalyosoTravel</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('pelanggan') ?>">Dashboard <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('pelanggan/pemesanan') ?>">Pencarian Tiket</a>
				</li>
			</ul>
			<?php
			if ($this->session->userdata('login') == true) { ?>
				<ul class="navbar-nav navbar-right">
					<li class="nav-item">
						<a class="nav-link font-weight-bold text-danger" href="<?php echo site_url('login/Logout') ?>">Logout</a>
					</li>
				</ul>
			<?php
			} else { ?>
				<ul class="navbar-nav navbar-right">
					<li class="nav-item">
						<a class="nav-link font-weight-bold text-danger" href="<?php echo site_url('login') ?>">Login</a>
					</li>
				</ul>

			<?php  }
			?>
		</div>
	</nav>

	<!-- Your content will be here-->

	<?php echo $contents; ?>

	<!-- Bootstrap and necessary plugins-->
	<script src="<?php echo base_url(); ?>assets/js/datatables.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/datatables.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/popper.js/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/pace-progress/js/pace.min.js"></script>
	<!-- Plugins and scripts required by this view-->
	<script src="<?php echo base_url(); ?>assets/sweetalert/dist/sweetalert2.all.min.js"></script>
	<script>
		const flashdata = $('.flash-data').data('flashdata');

		if (flashdata) {
			Swal.fire({
				icon: 'success',
				title: '' + flashdata,
				text: ''
			})
			if (flashdata == 'error') {
				Swal.fire({
					icon: 'error',
					title: '' + flashdata,
				})
			}

		}
	</script>
	<script>
		$(document).ready(function() {
			$('.datatables').DataTable();
		});
	</script>
</body>

</html>