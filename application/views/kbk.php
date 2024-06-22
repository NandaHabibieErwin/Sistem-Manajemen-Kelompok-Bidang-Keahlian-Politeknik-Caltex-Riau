<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>
		<?php echo $kbk['nama_kbk']; ?> - KBK PCR
	</title>
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
							<li class="breadcrumb-item"><a class="text-white"
									href="<?php echo site_url('daftar'); ?>">Info KBK</a></li>
							<li class="breadcrumb-item text-white active" aria-current="page">
								<?php echo $kbk['nama_kbk']; ?>
							</li>
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
		<h1 class="mb-5">
			<?php echo $kbk['nama_kbk']; ?>
		</h1>
	</div>
	<!--Title End-->
	<div class="container animated fadeInUp">
		<?php if ($user_info->id_user == $kbk['id_ketua']): ?>
			<div class="col-lg-12">
				<div class="item">
					<div class="main-button-yellow">
						<a href="<?php echo site_url('KBK/' . $kbk['id_kbk'] . '/pengajuan_event'); ?>"
							class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Pengajuan Event</a>
					</div>
				</div>
			</div>
		<?php endif ?>
	<?php if ((!($user_info->id_user == $kbk['id_ketua'])) && ($user_info->id_kbk === $kbk['id_kbk'] || $user_info->id_kbkp === $kbk['id_kbk'])): ?>
			<div class="col-lg-12">
				<div class="item">
					<div class="main-button-yellow">

						<a id="myBtn" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Ajukan Event</a>
					</div>
				</div>
			</div>
		<?php endif ?><br><br>
		<h3><?php echo "Dana Saat Ini: " ."Rp." . $kbk['dana_kbk']; ?></h3>
		<h3><?php
		if ($kbk['name'] !== null) {
			echo "Ketua: " . $kbk['name'];
		} else {
			echo "Belum Ada Ketua";
		}
		?><h3>
		<br>
		<hr>
		<br>

		<h1>Anggota</h1>
		<?php if (empty($kbkMember)) {
			echo "Belum ada Anggota";
		} else { ?>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Nama Anggota</th>
						<th scope="col">Email</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1;
					foreach ($kbkMember as $k): ?>
						<tr>
							<th scope="row">
								<?php echo $i; ?>
							</th>
							<td>
								<?php echo $k['name'];
								if ($k['id_user'] === $k['id_ketua']) {
									echo " (Ketua)";
								} ?>
							</td>
							<td>
								<?php echo $k['email']; ?>
							</td>
						</tr>
						<?php $i++; endforeach;
		} ?>
			</tbody>
		</table>
		<br>
		<hr>
		<br>

		<h1>Event</h1>
		<?php if (empty($kegiatan)) {
			echo "Belum ada Event";
		} else { ?>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Judul Event</th>
						<th scope="col">Jenis Event</th>
						<th scope="col">Jadwal</th>
						<th scope="col">Tempat</th>
						<th scope="col">Dana yang dipakai</th>
						<th scope="col">Notulensi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1;
					foreach ($kegiatan as $k):

						?>
						<tr>
							<th scope="row">
								<?php echo $i; ?>
							</th>
							<td>
								<?php echo $k['judul_event']; ?>
							</td>
							<td>
								<?php echo $k['jenis']; ?>
							</td>
							<td>
								<?php echo $k['jadwal']; ?>
							</td>
							<td>
								<?php echo $k['tempat']; ?>
							</td>
							<td>Rp.
								<?php echo $k['danaUsed']; ?>
							</td>
							<td><a href="<?php echo site_url('kegiatan/event/' . $k['id_event']); ?>">Data</a></td>
						</tr>
						<?php $i++; endforeach;
		} ?>
			</tbody>
		</table>
	</div>
	<?php include 'template/footer.php'; ?>
	<!-- Form Start -->
	<div id="myModal" class="modal animated slideInDown">
		<div class="modal-content">
			<form id="event-form" enctype="multipart/form-data">
				<div class="form-header">
					<span class="close animated slideInLeft">&times;</span>
					<h1>Ajukan Event</h1>
				</div>
				<div class="form-body">
					<div class="horizontal-group">
						<div class="form-group form-group-left">
							<input type="hidden" id="id_user" name="id_user" value="<?php echo $user_info->id_user; ?>">
							<input type="hidden" id="id_kbk" name="id_kbk" value="<?php echo $user_info->id_kbk; ?>">
							<input type="hidden" id="id_kbkp" name="id_kbkp" value="<?php echo $user_info->id_kbkp; ?>">
							<input type="hidden" id="id_kbkk" name="id_kbkk" value="<?php echo $kbk['id_kbk']; ?>">
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
						<button type="submit" class="btn btn-primary">Ajukan Event</button>
					</div>
			</form>
		</div>
	</div>

	<div id="formtambah" class="modal animated slideInDown">
		<div class="modal-content">
			<form id="event-form">
				<div class="form-header">
					<span class="close-tambah animated slideInDown">&times;</span>
					<h1>Tambah Event</h1>
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
						<div class="form-group-right">
							<label class="label-title">Jenis Event</label>
							<select name="jenis" class="form-input" placeholder="Jenis Event..." required="required">
								<option value="Review PA">Review PA</Option>
								<option value="Sharing Session">Sharing Session</Option>
								<option value="Seminar">Seminar</Option>
								<option value="Kegiatan Lainnya">Kegiatan Lainnya</Option>
							</select>
						</div>
					</div>
					<div class="form-footer">
						<button type="submit" class="btn btn-primary">Tambah Event</button>
					</div>
			</form>
		</div>
	</div>

	</div>
	<!-- Form End -->


	<!-- Footer Start -->

	<!-- Footer End -->


	<!-- Back to Top -->
	<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


	<!-- JavaScript Libraries -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url(); ?>lib/wow/wow.min.js">"</script>
	<script src="<?php echo base_url(); ?>lib/easing/easing.min.js">"</script>
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
						alert("Anda telah mendaftar");
						// Perform any actions or show success messages
					},
					error: function (xhr, status, error) {
						// Handle the AJAX error
						console.log(xhr.responseText);
						alert("Gagal");
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
						alert("Kegiatan telah diajukan");
						// Perform any actions or show success messages
					},
					error: function (xhr, status, error) {
						// Handle the AJAX error
						console.log(xhr.responseText);
						alert("Gagal");
						// Perform any error handling or show error messages
					}
				});
			});
		});
	</script>


	<!-- Template Javascript -->
	<script src="<?php echo base_url(); ?>js/main.js"></script>
	<script>
		var modal = document.getElementById("myModal");
		var btn = document.getElementById("myBtn");
		var span = document.getElementsByClassName("close")[0];

		btn.onclick = function () {
			modal.style.display = "block";
		};

		span.onclick = function () {
			modal.style.display = "none";
		};</script>


	<script>
		var formtambah = document.getElementById("formtambah");
		var tombol = document.getElementById("tombol");
		var spanTambah = document.getElementsByClassName("close-tambah")[0]; // Update the class name to "close-tambah"

		tombol.onclick = function () {
			formtambah.style.display = "block";
		};

		spanTambah.onclick = function () { // Update the variable name to "spanTambah"
			formtambah.style.display = "none";
		};

		window.onclick = function (event) {
			if (event.target == modal) {
				modal.style.display = "none";
			} else if (event.target == formtambah) {
				formtambah.style.display = "none";
			}
		};
	</script>
</body>

</html>
