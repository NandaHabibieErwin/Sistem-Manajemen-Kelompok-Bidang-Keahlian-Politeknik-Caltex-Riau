<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Info KBK - KBK PCR</title>
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
	<link href="<?php echo base_url(); ?>css/kbk.css" rel="stylesheet">


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
				<a href="<?php echo site_url('daftar'); ?>" class="nav-item nav-link active">KBK</a>
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
	</nav>
	<!-- Navbar End -->


	<!-- Header Start -->
	<div class="container-fluid bg-primary py-5 mb-5 page-header">
		<div class="container py-5">
			<div class="row justify-content-center">
				<div class="col-lg-10 text-center">
					<h1 class="display-3 text-white animated slideInDown">KBK</h1>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb justify-content-center">
							<li class="breadcrumb-item"><a class="text-white"
									href="<?php echo site_url('/'); ?>">Beranda</a></li>
							<li class="breadcrumb-item text-white active" aria-current="page">Info KBK</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- Header End -->

	<!--Title Start-->
	<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
		<h6 class="section-title bg-white text-center text-primary px-3">Info KBK</h6>
		<h1 class="mb-5">Kelompok Bidang Keahlian</h1>
	</div>
	<!--Title End-->

	<div class="container animated fadeInUp">
		<div class="col-lg-12">
			<div class="item">
				<div class="main-button-yellow">
					<a id="myBtn" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Daftar KBK</a>
				</div>
			</div>
		</div>


		<br>
		<div class="row">
			<?php foreach ($dataKBK as $data): ?>
				<div class="col-md-4 mt-6">
					<a href="<?php echo site_url('KBK/' . $data['id_kbk']); ?>"
						class="position-relative d-flex shadow rounded-4 bgi-size-cover bgi-no-repeat bgi-position-center h-200px">
						<img class="img-fluid" src="https://pmb.pcr.ac.id/uploads/assets/img/pcr.jpg" alt="">
						<div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
							<h5 class="m-0">
								<?php echo $data['nama_kbk'] ?>
							</h5>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

	<!-- Form Start -->


	<div id="myModal" class="modal animated slideInDown">
		<div class="modal-content">
			<form id="save">
				<div class="form-header">
					<span class="close animated">&times;</span>
					<h1>Daftar Anggota</h1>
				</div>
				<div class="form-body">
					<div class="horizontal-group">
						<input type="hidden" id="id_user" name="id_user" value="<?php echo $user_info->id_user; ?>">
						<input type="hidden" readonly class="form-input" id="name" name="name"
							value="<?php echo $user_info ? $user_info->name : ''; ?>">
						<div class="form-group form-group-left">
							<label class="label-title">Pilihan KBK Utama</label>
							<select class="form-input" id="id_kbk" name="id_kbk" onchange="filterKbkPendamping()">
								<?php
								foreach ($kbk as $m) {
									if ($m->id_kbk != 0) {
										echo '<option value="' . $m->id_kbk . '">' . $m->nama_kbk . '</option>';
									}
								}
								?>
							</select>
						</div>
						<div class="form-group form-group-right">
							<label class="label-title">Pilihan KBK Pendamping</label>
							<select class="form-input" id="id_kbkp" name="id_kbkp" onchange="filterKbk()">
								<?php
								$i = 1;
								foreach ($kbk as $m) {
									echo '<option value="' . $m->id_kbk . '">' . $m->nama_kbk . '</option>';
									$i++;
								}
								?>
							</select>
						</div>
						<script>
    function filterKbkPendamping() {
        var selectedKbkId = document.getElementById("id_kbk").value;
        var kbkPendampingOptions = document.getElementById("id_kbkp").options;

        for (var i = 0; i < kbkPendampingOptions.length; i++) {
            if (kbkPendampingOptions[i].value == selectedKbkId) {
                kbkPendampingOptions[i].style.display = "none";
            } else {
                kbkPendampingOptions[i].style.display = "block";
            }
        }
    }

    function filterKbk() {
        var selectedKbkPendampingId = document.getElementById("id_kbkp").value;
        var kbkOptions = document.getElementById("id_kbk").options;

        for (var i = 0; i < kbkOptions.length; i++) {
            if (kbkOptions[i].value == selectedKbkPendampingId) {
                kbkOptions[i].style.display = "none";
            } else {
                kbkOptions[i].style.display = "block";
            }
        }
    }
</script>
						<div class="form-group form-group-right">
							<label for="matkul" class="label-title">Mata Kuliah</label>
							<input type="text" id="matkul" name="matkul" class="form-input"
								placeholder="Matkul yang diampu..." required="required" />
						</div>
						<div class="form-group form-group-left">
							<label for="judul" class="label-title">Judul Penelitian</label>
							<input type="text" id="judul" name="judul" class="form-input"
								placeholder="Judul Penelitian..." required="required" />
						</div>
						<input type="hidden" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d H:i:s'); ?>">
					</div>
					<div class="form-footer">
						<button type="submit" class="btn btn-primary">Daftar</button>
						<div id="info"></div>
					</div>
				</div>
		</div>
	</div>
	</form>
	<!-- Form End -->

	<!-- Form KBK -->
	<div id="myModals" class="modal animated fadeInUp">
		<div class="modal-content">
			<form id="kbk-form">
				<div class="form-header">
					<span class="close animated">&times;</span>
					<h1>Buat KBK Baru</h1>
				</div>
				<div class="form-body">
					<div class="horizontal-group">
						<input type="hidden" id="id_user" name="id_user" value="<?php echo $user_info->id_user; ?>">
						<input type="hidden" readonly class="form-input" id="name" name="name"
							value="<?php echo $user_info ? $user_info->name : ''; ?>">
						<div class="form-group form-group-left">
							<label class="label-title">Nama KBK</label>
							<input type="text" class="form-input" id="nama_kbk" name="nama_kbk" placeholder="Nama KBK">
						</div>
						<div class="form-group form-group-right">
							<label class="label-title">Dana KBK</label>
							<input type="text" class="form-input" id="dana_kbk" name="dana_kbk" placeholder="Dana KBK">
						</div>
						<input type="hidden" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d H:i:s'); ?>">
					</div>
					<div class="form-footer">
						<button type="submit" class="btn btn-primary">Tambah</button>
						<div id="info"></div>
					</div>
				</div>
		</div>
	</div>
	</form>
	<!-- -->


	<!-- Footer Start -->
	<?php include 'template/footerkbk.php'; ?>
	<!-- Footer End -->


	<!-- Back to Top -->
	<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


	<!-- JavaScript Libraries -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url(); ?>lib/wow/wow.min.js"></script>
	<script src="<?php echo base_url(); ?>lib/easing/easing.min.js"></script>
	<script src="<?php echo base_url(); ?>lib/waypoints/waypoints.min.js"></script>
	<script src="<?php echo base_url(); ?>lib/owlcarousel/owl.carousel.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$("#save").on('submit', function (e) {
				e.preventDefault(); // Prevent the default button click behavior


				// Send AJAX request
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>Daftar/add_daftar", // Replace with your route URL
					data: $("#save").serialize(),
					success: function (response) {
						// Handle the AJAX response
						console.log(response);
						alert("Data Saved");
						modal.style.display = "none";
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
	<script>
		$(document).ready(function () {
			$("#kbk-form").on('submit', function (e) {
				e.preventDefault(); // Prevent the default button click behavior
				// Send AJAX request
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>KBKController/addKBK", // Replace with your route URL
					data: $("#kbk-form").serialize(),
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
		});</script>


	<!-- Template Javascript -->
	<script src="<?php echo base_url(); ?>js/main.js"></script>
	<script src="<?php echo base_url(); ?>js/daftar.js"></script>
</body>

</html>
