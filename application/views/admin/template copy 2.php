<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
		<meta name="author" content="Łukasz Holeczek">
		<meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
		<title>Admin</title>
		<!-- Icons-->
		<link href="<?php echo base_url();?>assets/vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
		<!-- Main styles for this application-->
		<link href="<?php echo base_url();?>assets/css/datatables.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
		<script src="<?php echo base_url();?>assets/vendors/jquery/js/jquery.min.js"></script>
	</head>
	<style>
		body,.jumbotron{
			background-color: white;
		}
		*{
				font-family: 'Poppins', sans-serif;
				font-weight: 300;
				font-size: 15px;
			}
			.navbar-brand{
								font-size: 25px;
							}
							body{
						background-color: #FFFFFF;
							}
	</style>
	<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
		<header>
	<nav class="app-header navbar navbar navbar-light fixed-top ">
			<button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand font-weight-bold ">TegalyosoTravel</a>
			<button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
				<span class="navbar-toggler-icon"></span>
			</button>
			<ul class="nav navbar-nav d-md-down-none">
			<li class="nav-item px-3 font-weight-bold">
					<a class="nav-link" href="<?= site_url('admin')?>">Home</a>
				</li>
				<li class="nav-item px-3">
					<a class="nav-link" href="#">Users</a>
				</li>
				<li class="nav-item px-3">
					<a class="nav-link" href="#">Settings</a>
				</li>
			</ul>
			<ul class="nav navbar-nav ml-auto">
			<?php
		if($this->session->userdata('login') == true ){?>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold pr-5 text-danger" href="<?php echo site_url('login/Logout') ?>">Logout</a>
                    </li>
                    </ul>
		<?php 
    }
    else{ ?>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold pr-5 text-primary" href="<?php echo site_url('login') ?>">Login</a>
                    </li>
                    </ul>

<?php  }
    ?>
			</ul>
</nav>
</header>
		<div class="app-body">
			<div class="sidebar">
				<nav class="sidebar-nav">
					<ul class="nav">
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('admin')?>">
								<i class="nav-icon icon-speedometer"></i> Dashboard
							</a>
						</li>
						<li class="nav-title">Components</li>
						<li class="nav-item">
									<a class="nav-link" href="<?= site_url('admin/terminal')?>">
									<i class="nav-icon fa fa-terminal"></i> Terminal</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?= site_url('admin/bus')?>">
										<i class="nav-icon fa fa-bus"></i> BUS</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?= site_url('admin/jadwal')?>">
										<i class="nav-icon fa fa-calendar"></i> Jadwal Bus</a>
								</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo site_url('admin/pemesanan_all');?>">
								<i class="nav-icon fa fa-shopping-cart"></i> Data Pemesanan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo site_url('admin/kelola_kursi');?>">
								<i class="nav-icon  fa fa-user"></i> Data Penumpang</a>
						</li>
						<li class="nav-item nav-dropdown">
							<a class="nav-link nav-dropdown-toggle" href="#">
								<i class="nav-icon icon-puzzle"></i>Template</a>
							<ul class="nav-dropdown-items">
								
							<li class="nav-item">
							<a class="nav-link" href="<?php echo site_url('page/charts');?>">
								<i class="nav-icon icon-pie-chart"></i> Charts</a>
						</li>
						<li class="nav-item">
									<a class="nav-link" href="<?php echo site_url('page/forms');?>">
										<i class="nav-icon icon-puzzle"></i> Forms</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link" href="<?php echo site_url('page/tables');?>">
										<i class="nav-icon icon-puzzle"></i> Tables</a>
								</li>
								
							</ul>
						</li>

					</ul>
				</nav>
				<button class="sidebar-minimizer brand-minimizer" type="button"></button>
			</div>
			
			<!-- Your content will be here-->
			<?php echo $contents; ?>
			</div>
			<footer class="app-footer">
			<div>
				<a href="https://coreui.io">CoreUI</a>
				<span>&copy; 2018 creativeLabs.</span>
			</div>
			<div class="ml-auto">
				<span>Powered by</span>
				<a href="https://coreui.io">CoreUI</a>
			</div>
		</footer>

		<!-- Bootstrap and necessary plugins-->
		<script src="<?php echo base_url();?>assets/js/datatables.js"></script>
		<script src="<?php echo base_url();?>assets/vendors/popper.js/js/popper.min.js"></script>
		<script src="<?php echo base_url();?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/vendors/pace-progress/js/pace.min.js"></script>
		<script src="<?php echo base_url();?>assets/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
		<script src="<?php echo base_url();?>assets/vendors/@coreui/coreui/js/coreui.min.js"></script>
		<!-- Plugins and scripts required by this view-->
		<script src="<?php echo base_url();?>assets/vendors/chart.js/js/Chart.min.js"></script>
		<script src="<?php echo base_url();?>assets/vendors/@coreui/coreui-plugin-chartjs-custom-tooltips/js/custom-tooltips.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/main.js"></script>
		<script src="<?php echo base_url();?>assets/js/charts.js"></script>
		<script src="<?php echo base_url();?>assets/sweetalert/dist/sweetalert2.all.min.js"></script>
		<script>
const flashdata = $('.flash-data').data('flashdata');
if(flashdata){
  Swal.fire({
    icon: 'success',
    title: '' +flashdata,
    text: ''
  })
  if(flashdata == 'error'){
    Swal.fire({
    icon: 'error',
    title: ''+flashdata,
    text: 'Data Tidak bisa dihapus karena memiliki relasi'
  })
  }
  if(flashdata == 'gagal'){
    Swal.fire({
    icon: 'error',
    title: ''+flashdata,
  })
  }
}
    
$(document).ready( function () {
    $('.datatables').DataTable();
} );
</script>
	</body>
</html>
