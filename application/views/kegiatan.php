<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Event - KBK PCR</title>
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
		<a href="<?php echo site_url('/'); ?>" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
			<h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Kelompok Bidang Keahlian PCR</h2>
		</a>
		<button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<div class="navbar-nav ms-auto p-4 p-lg-0">
				<?php if ($user_info->Kajur == '1'): ?>
					<div class="nav-item dropdown">
						<a href="<?php echo site_url('/'); ?>" class="nav-link dropdown-toggle"
							data-bs-toggle="dropdown">Kajur</a>
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
				<a href="<?php echo site_url('kegiatan'); ?>" class="nav-item nav-link active">Event</a>
			</div>
			<div class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
					<img src="<?php echo $user_info ? $user_info->profile_image : ''; ?>" class="avatar"></a>
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
					<h1 class="display-3 text-white animated slideInDown">Event</h1>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb justify-content-center">
							<li class="breadcrumb-item"><a class="text-white"
									href="<?php echo site_url('/'); ?>">Beranda</a></li>
							<li class="breadcrumb-item text-white active" aria-current="page">Event</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- Header End -->

	<!--Title Start-->
	<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
		<h6 class="section-title bg-white text-center text-primary px-3">Event</h6>
		<h1 class="mb-5">Event dalam KBK</h1>
	</div>
	<!--Title End-->

	<!-- Categories Start -->
	<div class="container-xxl py-5 category">
		<div class="container">
			<div class="row g-3">
				<div class="col-lg-7 col-md-6">
					<div class="row g-3">
						<div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
							<button>
								<a href="<?php echo site_url('Kegiatan/Review_PA');?>" class="position-relative d-block overflow-hidden">
									<img class="img-fluid" src="img/cat-1.jpg" alt="">
									<div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
										style="margin: 1px;">
										<h5 class="m-0">Review PA</h5>
			
									</div>
								</a>
							</button>
						</div>
						<div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
							<a class="position-relative d-block overflow-hidden" href="<?php echo site_url('Kegiatan/Seminar');?>">
								<img class="img-fluid" src="img/cat-2.jpg" alt="">
								<div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
									style="margin: 1px;">
									<h5 class="m-0">Seminar</h5>
		
								</div>
							</a>
						</div>
						<div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
							<a class="position-relative d-block overflow-hidden" href="<?php echo site_url('Kegiatan/Sharing_Session');?>">
								<img class="img-fluid" src="img/cat-3.jpg" alt="">
								<div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
									style="margin: 1px;">
									<h5 class="m-0">Sharing Session</h5>
		
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
					<a href="<?php echo site_url('kegiatan/semua'); ?>"
						class="position-relative d-block h-100 overflow-hidden">
						<img class="img-fluid position-absolute w-100 h-100" src="img/cat-4.jpg" alt=""
							style="object-fit: cover;">
						<div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
							style="margin:  1px;">
							<h5 class="m-0">Semua Event</h5>

						</div>
					</a>
				</div>
			</div>
		</div>
	</div>


	<!-- Table Start -->
	<!-- Table End -->

	<!-- Form Start -->
	<div id="myModal" class="modal animated slideInDown">
		<div class="modal-content">
			<form id="event-form" enctype="multipart/form-data">>
				<div class="form-header">
					<span class="close animated slideInLeft">&times;</span>
					<h1>Ajukan Event</h1>
				</div>
				<div class="form-body">
					<div class="horizontal-group">
						<div class="form-group form-group-left">
							<input type="hidden" id="id_user" name="id_user" value="<?php echo $user_info->id_user; ?>">
							<label for="nama" class="label-title">Judul Event</label>
							<input type="text" name="judul_event" class="form-input" placeholder="Judul Event"
								required="required" />
						</div>
						<div class="form-group form-group-right">
							<label for="matkul" class="label-title">Jadwal Pelaksanaan</label>
							<input type="datetime-local" name="jadwal" class="form-input" required="required" />
						</div>
						<div class="form-group form-group-left">
							<label for="judul" class="label-title">Tempat Pelaksanaan</label>
							<input type="text" name="tempat" class="form-input" placeholder="Tempat Pelaksanaan"
								required="required" />
						</div>
						<div class="form-group form-group-right">
							<label class="label-title">Jenis Event</label>
							<select name="jenis" class="form-input" placeholder="Jenis Event..." required="required">
								<option value="Review PA">Review PA</Option>
								<option value="Sharing Session">Sharing Session</Option>
								<option value="Seminar">Seminar</Option>
								<option value="Kegiatan Lainnya">Kegiatan Lainnya</Option>
				</select>
						</div>
						<div class="form-group form-group-left">
							<label class="label-title">Proposal</label>
							<input type="file" name="proposal[]" id="file-input" class="form-input" required="required"
								multiple />
						</div>
					</div>
					<div class="form-footer">
						<button type="submit" class="btn btn-primary">Tambah Event</button>
					</div>
				</div>
		</div>
	</div>
	</form>
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
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url(); ?>js/daftar.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$("#event-form").on('submit', function (e) {
				e.preventDefault(); // Prevent the default button click behavior

				// Create a new FormData object
				var formData = new FormData(this);

				// Send AJAX request with FormData
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>Kegiatan/add_ajukan_event",
					data: formData, // Use the FormData object
					processData: false, // Important: prevent jQuery from processing the data
					contentType: false, // Important: prevent jQuery from setting content type
					success: function (response) {
						// Handle the AJAX response
						console.log(response);
						alert("Data Saved");
						// Perform any actions or show success messages
					},
					error: function (xhr, status, error) {
						// Handle the AJAX error
						console.log(xhr.responseText);
						alert("Fail");
						// Perform any error handling or show error messages
					}
				});
			});
		});
	</script>

	<!-- Template Javascript -->
	<script src="<?php echo base_url(); ?>js/main.js"></script>
	<script src="<?php echo base_url(); ?>js/daftar.js"></script>
</body>

</html>
