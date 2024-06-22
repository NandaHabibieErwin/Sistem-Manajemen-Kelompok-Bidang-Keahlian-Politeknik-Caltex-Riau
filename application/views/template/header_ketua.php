<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Kajur - KBK PCR</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Favicon -->
	<link rel="icon" href="https://pcr.ac.id/assets/images/favicon.ico" />

	<!-- Google Web Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
		rel="stylesheet">

	<!-- Icon Font Stylesheet -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/select/1.6.2/css/select.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css" rel="stylesheet">

	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

	<!-- Libraries Stylesheet -->
	<link href="<?php echo base_url(); ?>lib/animate/animate.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

	<!-- Customized Bootstrap Stylesheet -->
	<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

	<!-- Template Stylesheet -->
	<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/daftar.css" rel="stylesheet">
</head>

<body>
	<!-- Spinner Start -->

	<!-- Spinner End -->


	<!-- Navbar Start -->
	<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
		<a href="<?php echo base_url(); ?>" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
			<h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Kelompok Bidang Keahlian JTI PCR</h2>
		</a>
		<button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<div class="navbar-nav ms-auto p-4 p-lg-0">
			<?php if ($user_info->Kajur == '1'): ?>
					<div class="nav-item dropdown">
						<a href="<?php echo site_url('/'); ?>" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Kajur</a>
						<div class="dropdown-menu fade-down m-0">
						<a href="<?php echo site_url('Users/history'); ?>" class="dropdown-item">Dosen</a>
						<a href="<?php echo site_url('KBK/history'); ?>" class="dropdown-item">KBK</a>
						<a href="<?php echo site_url('Daftar/history'); ?>" class="dropdown-item">Pendaftaran KBK</a>
						<a href="<?php echo site_url('Kegiatan/history'); ?>" class="dropdown-item">Kegiatan</a>
						</div>
					</div>
				<?php endif; ?>
				<a href="<?php echo site_url('/'); ?>" class="nav-item nav-link">Beranda</a>
				<a href="<?php echo site_url('daftar'); ?>" class="nav-item nav-link">KBK</a>
				<a href="<?php echo site_url('kegiatan'); ?>" class="nav-item nav-link">Event</a>
			</div>
			<div class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
					<img src="<?php echo $user_info ? $user_info->profile_image : ''; ?>" class="avatar">
				</a>
				<div class="dropdown-menu fade-down m-0">
					<a href="<?php echo site_url('Profile'); ?>" class="dropdown-item">Profil</a>
					<a href="<?php echo site_url('LoginControl/logout'); ?>" class="dropdown-item">Logout</a>
				</div>
			</div>
		</div>
		</div>
	</nav>
	<!-- Navbar End -->


	<!-- Header Start -->
	<div class="container-fluid bg-primary py-5 mb-5 page-header">
		<div class="container py-5">
			<div class="row justify-content-center">
				<div class="col-lg-10 text-center">
					<h1 class="display-3 text-white animated slideInDown">Kajur</h1>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb justify-content-center">
							<li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
							<li class="breadcrumb-item"><a class="text-white" href="#">Halaman</a></li>
							<li class="breadcrumb-item text-white active" aria-current="page">Kajur</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- Header End -->
