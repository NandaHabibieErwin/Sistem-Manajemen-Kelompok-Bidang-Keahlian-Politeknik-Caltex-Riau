<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title><?php echo $user_info ? $user_info->name : ''; ?> - KBK PCR</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

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
	<div id="spinner"
		class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
		<div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	<!-- Spinner End -->


	<!-- Navbar Start -->
	<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
		<a href="<?php echo base_url(); ?>" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
			<h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Kelompok Bidang Keahlian PCR</h2>
		</a>
		<button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<div class="navbar-nav ms-auto p-4 p-lg-0">
			<?php if ($user_info->Kajur == '1'): ?>
					<div class="nav-item dropdown">
						<a href="<?php echo site_url('/'); ?>" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Kajur</a>
						<div class="dropdown-menu fade-down m-0">
						<a href="<?php echo site_url('Users/history'); ?>" class="dropdown-item">Dosen</a>
						<a href="<?php echo site_url('KBK/history'); ?>" class="dropdown-item">KBK</a>
						<a href="<?php echo site_url('Daftar/history'); ?>" class="dropdown-item">Pendaftaran KBK</a>
						<a href="<?php echo site_url('Kegiatan/history'); ?>" class="dropdown-item">Kegiatan</a>
						</div>
					</div>
				<?php endif; ?>
				<a href="<?php echo base_url(); ?>" class="nav-item nav-link">Beranda</a>
				<a href="<?php echo site_url('daftar'); ?>" class="nav-item nav-link">KBK</a>
				<a href="<?php echo site_url('kegiatan'); ?>" class="nav-item nav-link">Event</a>
			</div>
			<div class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><img
						src="<?php echo $user_info ? $user_info->profile_image : ''; ?>" class="avatar"></a>
				<div class="dropdown-menu fade-down m-0">
					<a href="<?php echo site_url('Profile'); ?>" class="dropdown-item">Profil</a>
					<a href="<?php echo site_url('LoginControl/logout'); ?>" class="dropdown-item">Logout</a>
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
					<h1 class="display-3 text-white animated slideInDown">Profile</h1>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb justify-content-center">
							<li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
							<li class="breadcrumb-item"><a class="text-white" href="#">Halaman</a></li>
							<li class="breadcrumb-item text-white active" aria-current="page">Profile</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- Header End -->


	<!-- Form Start -->
	<div class="container">
			<div class="card-deck">
				<div class="card mb-4">
					<div class="card-body text-center">
						<img src="<?php echo $user_info ? $user_info->profile_image : ''; ?>"
							alt="<?php echo $user_info ? $user_info->name : ''; ?>" class="rounded-circle img-fluid"
							style="width: 150px;">
						<h5 class="my-3">
							<?php echo $user_info ? $user_info->name : ''; ?>
						</h5>
					</div>
				</div>
				<div class="card mb-4">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-3">
								<p class="mb-0">Full Name</p>
							</div>
							<div class="col-sm-9">
								<p class="text-muted mb-0">
									<?php echo $user_info ? $user_info->name : ''; ?>
								</p>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-3">
								<p class="mb-0">Email</p>
							</div>
							<div class="col-sm-9">
								<p class="text-muted mb-0">
									<?php echo $user_info ? $user_info->email : ''; ?>
								</p>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-3">
								<p class="mb-0">KBK Utama</p>
							</div>
							<div class="col-sm-9">
								<p class="text-muted mb-0">
									<?php echo $nama_kbk_id_kbk; ?>
								</p>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-3">
								<p class="mb-0">KBK Pendamping</p>
							</div>
							<div class="col-sm-9">
								<p class="text-muted mb-0">
									<?php echo $nama_kbk_id_kbkp; ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
	</div>
	<!-- Form End -->

	<!-- Footer Start -->
	<?php include 'template/footer.php'; ?>
	<!-- Footer End -->



	<!-- Back to Top -->
	<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


	<!-- JavaScript Libraries -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url(); ?>lib/wow/wow.min.js"></script>
	<script src="<?php echo base_url(); ?>lib/easing/easing.min.js"></script>
	<script src="<?php echo base_url(); ?>lib/waypoints/waypoints.min.js"></script>
	<script src="<?php echo base_url(); ?>lib/owlcarousel/owl.carousel.min.js"></script>

	<!-- Template Javascript -->
	<script src="<?php echo base_url(); ?>js/main.js"></script>
	<script src="<?php echo base_url(); ?>js/daftar.js"></script>
</body>

</html>
