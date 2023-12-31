<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Blank Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/lte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/lte/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/assets/lte/plugins/summernote/summernote-bs4.min.css">

  <script src="/assets/lte/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="/assets/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="/assets/lte/dist/js/adminlte.min.js"></script>
	<script src="/assets/lte/plugins/summernote/summernote-bs4.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
	  <li class="nav-item">
		<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
	  </li>
	  <li class="nav-item d-none d-sm-inline-block">
		<a href="/assets/lte/index3.html" class="nav-link">Home</a>
	  </li>
	  <li class="nav-item d-none d-sm-inline-block">
		<a href="#" class="nav-link">Contact</a>
	  </li>
	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
	  <!-- Navbar Search -->
	  <li class="nav-item">
		<a class="nav-link" data-widget="navbar-search" href="#" role="button">
		  <i class="fas fa-search"></i>
		</a>
		<div class="navbar-search-block">
		  <form class="form-inline">
			<div class="input-group input-group-sm">
			  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
			  <div class="input-group-append">
				<button class="btn btn-navbar" type="submit">
				  <i class="fas fa-search"></i>
				</button>
				<button class="btn btn-navbar" type="button" data-widget="navbar-search">
				  <i class="fas fa-times"></i>
				</button>
			  </div>
			</div>
		  </form>
		</div>
	  </li>

	 <li class="nav-item">
		<a class="nav-link" data-widget="fullscreen" href="#" role="button">
		  <i class="fas fa-expand-arrows-alt"></i>
		</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
		  <i class="fas fa-th-large"></i>
		</a>
	  </li>
	</ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="/assets/lte/index3.html" class="brand-link">
	  <img src="/assets/lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
	  <span class="brand-text font-weight-light">Carifacts</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
	  <!-- Sidebar user (optional) -->
	  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
		<div class="image">
		  <img src="/assets/lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
		</div>
		<div class="info">
		  <a href="#" class="d-block">Admin</a>
		</div>
	  </div>

	  <!-- SidebarSearch Form -->
	  <div class="form-inline">
		<div class="input-group" data-widget="sidebar-search">
		  <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
		  <div class="input-group-append">
			<button class="btn btn-sidebar">
			  <i class="fas fa-search fa-fw"></i>
			</button>
		  </div>
		</div>
	  </div>

	  <!-- Sidebar Menu -->
	  <nav class="mt-2">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		  <!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
		  <li class="nav-item">
			<a href="#" class="nav-link">
			  <i class="nav-icon fas fa-tachometer-alt"></i>
			  <p>
				Dashboard
				<i class="right fas fa-angle-left"></i>
			  </p>
			</a>
			<ul class="nav nav-treeview">
			  <li class="nav-item">
				<a href="/assets/lte/index.html" class="nav-link">
				  <i class="far fa-circle nav-icon"></i>
				  <p>Dashboard v1</p>
				</a>
			  </li>
			</ul>
		  </li>
		  <li class="nav-item">
			<a href="../widgets.html" class="nav-link">
			  <i class="nav-icon fas fa-th"></i>
			  <p>
				Site Settings
				<!-- <span class="right badge badge-danger">New</span> -->
			  </p>
			</a>
		  </li>
		  <!-- <li class="nav-header">EXAMPLES</li> -->
		  <li class="nav-item">
			<a href="/grids" class="nav-link">
			  <i class="nav-icon far fa-calendar-alt"></i>
			  <p>
				Grids
				<span class="badge badge-info right">2</span>
			  </p>
			</a>
		  </li>
		  <li class="nav-item">
			<a href="/slider" class="nav-link">
			  <i class="nav-icon far fa-image"></i>
			  <p>
				Sliders
			  </p>
			</a>
		  </li>
		  <li class="nav-item">
			<a href="../kanban.html" class="nav-link">
			  <i class="nav-icon fas fa-columns"></i>
			  <p>
				About Us
			  </p>
			</a>
		  </li>
		  <li class="nav-item">
			<a href="#" class="nav-link">
			  <i class="nav-icon far fa-envelope"></i>
			  <p>
				Contact Us
			  </p>
			</a>
			</li>
		  <li class="nav-item">
			<a href="/menu" class="nav-link">
			<i class="nav-icon far fa-plus-square"></i>  
			<p>
				Manage Menus
			  </p>
			</a>
			</li>
			<li class="nav-header">MENUS</li>
			<?php $menus = $this->db->query('SELECT id, title FROM menus WHERE status = "Active" and has_submenu = "Yes"')->result_array(); 
			foreach ($menus as $menu) {
				echo '<li class="nav-item"><a href="/menu/submenu/'.$menu['id'].'" class="nav-link"><i class="nav-icon far fa-plus-square"></i><p>'.$menu['title'].'</p></a></li>';
			}
			
			?>

		  </ul>
	  </nav>
	  <!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
			<h1><?php echo $title; ?></h1>
		  </div>
		  <div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
			  <li class="breadcrumb-item"><a href="#">Home</a></li>
			  <li class="breadcrumb-item active"><?php echo $title; ?></li>
			</ol>
		  </div>
		</div>
	  </div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
        <?php $this->load->view($page) ?>
	</section>
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
	<div class="float-right d-none d-sm-block">
	  <b>Version</b> 3.2.0
	</div>
	<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<!-- AdminLTE for demo purposes -->
<!-- <script src="/assets/lte/dist/js/demo.js"></script> -->
<script type="text/javascript">
$(function() {
	<?php
	$alert = $this->session->userdata('alert');
	if ($alert) {
		foreach ($alert as $class => $message) {
			if (is_array($message)) {
				echo "
				$(document).Toasts('create', {
					title: '".ucfirst($class)."',
					body: '".implode('<br />', $message)."'
				  })
				";
			} else {
				echo "
				$(document).Toasts('create', {
					title: '".ucfirst($class)."',
					body: '".str_replace("\n", '<br />', $message)."'
				  })
				";
			}
		}
		$this->session->unset_userdata('alert');
	}	
	?>

});
</script>
</body>
</html>
