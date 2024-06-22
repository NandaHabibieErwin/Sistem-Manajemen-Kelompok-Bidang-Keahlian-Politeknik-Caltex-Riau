<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title><?php foreach ($kegiatan as $k): echo $k['judul_event']; endforeach; ?> - KBK PCR</title>
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
	<style>
		.container {
			padding-right: 25px
		}

		#myInput {
			background-image: url('/css/searchicon.png');
			/* Add a search icon to input */
			background-position: 10px 12px;
			/* Position the search icon */
			background-repeat: no-repeat;
			/* Do not repeat the icon image */
			width: 100%;
			/* Full-width */
			font-size: 16px;
			/* Increase font-size */
			padding: 12px 20px 12px 40px;
			/* Add some padding */
			border: 1px solid #ddd;
			/* Add a grey border */
			margin-bottom: 12px;
			/* Add some space below the input */
		}

		#myUL {
			/* Remove default list styling */
			list-style-type: none;
			padding: 0;
			margin: 0;
		}

		#myUL li a {
			border: 1px solid #ddd;
			/* Add a border to all links */
			margin-top: -1px;
			/* Prevent double borders */
			background-color: #f6f6f6;
			/* Grey background color */
			padding: 12px;
			/* Add some padding */
			text-decoration: none;
			/* Remove default text underline */
			font-size: 18px;
			/* Increase the font-size */
			color: black;
			/* Add a black text color */
			display: block;
			/* Make it into a block element to fill the whole list */
		}

		#myUL li a:hover:not(.header) {
			background-color: #eee;
			/* Add a hover effect to all links, except for headers */
		}
	</style>
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
					<h1 class="display-3 text-white animated slideInDown">Event</h1>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb justify-content-center">
							<li class="breadcrumb-item"><a class="text-white"
									href="<?php echo site_url('/'); ?>">Beranda</a></li>
							<li class="breadcrumb-item"><a class="text-white"
									href="<?php echo site_url('kegiatan'); ?>">Event</a></li>
							<li class="breadcrumb-item"><a class="text-white"
									href="<?php echo site_url('kegiatan/semua'); ?>">Semua Event</a></li>
							<li class="breadcrumb-item text-white" aria-current="page">
								<?php foreach ($kegiatan as $k):
									echo $k['judul_event']; endforeach; ?>
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
		<?php foreach ($kegiatan as $k): ?>
			<h6 class="section-title bg-white text-center text-primary px-3">Dokumentasi Event</h6>
			<h1 class="mb-5">
				<?php echo $k['judul_event'];?>
			</h1>
		</div>
		<!--Title End-->

		<!-- Categories Start -->

		<div class="main">
			<div class="container">
				<?php foreach ($kbk as $s): ?>
					<?php if ($user_info->id_user == $s['id_ketua'] && $user_info->id_kbk == $k['id_kbk'] ): ?>
						<button id="myBtn" class="btn btn-primary animated slideInLeft">Upload Dokumentasi Event</button>
					<?php endif; endforeach; ?>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Nama</th>
							<th scope="col">Judul Event</th>
							<th scope="col">KBK</th>
							<th scope="col">Tanggal Mengikuti</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;
						foreach ($daftar as $d):

							?>
							<tr>
								<th scope="row">
									<?php echo $i; ?>
								</th>
								<td>
									<?php echo $d['name']; ?>
								</td>
								<td>
									<?php echo $d['judul_event']; ?>
								</td>
								<td>
									<?php echo $d['nama_kbk']; ?>
								</td>
								<td>
									<?php echo $d['jadwal_ikut']; ?>
								</td>
							</tr>
							<?php $i++; endforeach; ?>
					</tbody>
				</table>
				<div class="row margin-bottom-40" itemscope itemtype="http://schema.org/CreativeWork">
					<div class="col-md-12 col-sm-12">
						<h1 itemprop="headline"></h1>
						<div class="content-page">
							<div class="row">
								<div class="col-md-12 col-sm-12 blog-item">
									<div itemprop="text">
										<p>
										<p>Berikut Terlampir Hasil Dokumentasi Dari Kegiatan
											<?php echo $k['judul_event'] ?> yang dilaksanakan pada
											<?php echo $k['jadwal'] ?>
										</p>
										<p>Dana yang terpakai untuk kegiatan ini Rp.
											<?php echo $k['danaUsed']; ?>
										</p>
										<p>
										<div id="notulensi-images">

										</div>
										</p>
										</p>
									</div>
								</div>
							</div>


						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	<?php endforeach; ?>

	<!-- Categories End -->

	<!-- Table Start -->
	<!-- Table End -->

	<!-- Form Start -->

	<div id="myModal" class="modal animated slideInDown">
		<div class="modal-content">
			<form id="doc-form" enctype="multipart/form-data">
				<div class="form-header">
					<h1>Tambah Dokumentasi Event</h1>
					<span class="close animated slideInDown">&times;</span>
				</div>
				<div class="form-body">
					<div class="horizontal-group">
						<div class="form-group form-group-left">
							<input type="hidden" id="id_event" name="id_event" value="<?php foreach ($kegiatan as $k) {
								echo $k['id_event'];
							} ?>">
							<label for="nama" class="label-title">Dokumentasi</label>
							<input type="file" name="notulensi[]" id="file-input" required="required" multiple />
						</div>
						<div class="form-group form-group-right">
							<label for="nama" class="label-title">Dana yang dipakai</label>
							<input type="number" name="danaUsed" id="danaUsed" required="required" multiple />
						</div>
					</div>
					<div class="form-footer">
						<button type="submit" class="btn btn-primary">Upload Dokumentasi</button>
					</div>
				</div>
		</div>
	</div>
	</form>
	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="doc-form" enctype="multipart/form-data">
						<div class="form-header">
							<h1>Tambah Dokumentasi Event</h1>
						</div>
						<div class="form-body">
							<div class="horizontal-group">
								<div class="form-group form-group-left">
									<input type="hidden" id="id_event" name="id_event" value="<?php foreach ($kegiatan as $k) {
										echo $k['id_event'];
									} ?>">
									<label for="nama" class="label-title">Upload Notulensi</label>
									<input type="file" name="notulensi[]" id="file-input" required="required"
										multiple />
								</div>
							</div>
							<div class="form-footer">
								<button type="submit" class="btn btn-primary">Tambah Event</button>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Save changes</button>
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
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url(); ?>js/daftar.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#doc-form').submit(function (e) {
				e.preventDefault(); // Prevent the default form submission

				var formData = new FormData(this);
				var danaUsed = $('#danaUsed').val();
				formData.append('danaUsed', $('#danaUsed').val());

				$.ajax({
					url: "<?php echo base_url('Kegiatan/uploadDokumentasi'); ?>", // Replace with your PHP file that handles the form submission
					type: 'POST',
					data: formData,
					dataType: 'json',
					contentType: false,
					processData: false,
					success: function (response, xhr, status, error) {
						if ($.isEmptyObject(response.error)) {
							alert('Dokumentasi telah diupload.');
						} else {
							console.log(xhr.responseText);
							alert('File harus berbentuk png/jpg/jpeg.');
						}
					},
					error: function (xhr, status, error) {
						// Handle the AJAX error
						console.log(xhr.responseText);
						alert('Dokumentasi telah diupload.');
						location.reload();
					}
				});
			});
		});
		$(document).ready(function () {
			var idEvent = <?php echo $k['id_event']; ?>;

			$.ajax({
				url: "<?php echo base_url('Kegiatan/getNotulensi'); ?>/" + idEvent,
				type: 'GET',
				dataType: 'json',
				success: function (response) {
					if (response && response.length > 0) {
						var imageContainer = $('#notulensi-images');

						response.forEach(function (imagePath) {
							var imgElement = $('<img>').attr('src', imagePath).attr('alt', 'Notulensi Image');
							imageContainer.append(imgElement);
						});
					} else {
						$('#notulensi-images').html('<p>Belum ada Dokumentasi</p>');
					}
				},
				error: function (xhr, status, error) {
					$('#notulensi-images').html('<p>Belum ada Dokumentasi</p>');
				}
			});
		});

	</script>

	<!-- Template Javascript -->
	<script src="<?php echo base_url(); ?>js/main.js"></script>
	<script src="<?php echo base_url(); ?>js/daftar.js"></script>
</body>

</html>
