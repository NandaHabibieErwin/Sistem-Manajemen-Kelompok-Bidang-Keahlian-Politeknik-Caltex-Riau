<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>All Event - KBK PCR</title>
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
							<li class="breadcrumb-item text-white active" aria-current="page">Semua Event</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- Header End -->
	<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
	<!--Title Start-->

	<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
		<h6 class="section-title bg-white text-center text-primary px-3">Event</h6>
		<h1 class="mb-5">Event dalam KBK</h1>
	</div>

	<!--Title End-->

	<!-- Categories Start -->

	<div class="container">
		<?php foreach ($kbk as $s):
			if ($user_info->id_user == $s['id_ketua']): ?>
				<a id="myBtn" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Tambah Event</a>
			<?php endif; endforeach; ?><br><br><br>
		<!-- Courses Start -->
		<div class="row">
			<?php
			foreach ($kegiatan as $k):
				?>
				<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
					<div class="course-item bg-light">
						<div class="position-relative overflow-hidden">
							<img class="img-fluid" src="<?php echo base_url(); ?>img/course-2.jpg" alt="">
							<div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
								<a href="<?php echo site_url('kegiatan/event/' . $k['id_event']); ?>"
									class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end"
									style="border-radius: 30px 0 0 30px;">Selengkapnya</a>
								<?php
								$id_event = $k['id_event'];
								$id_user = $user_info->id_user;
								$isFollowed = $this->EventModel->getUserFollowEvent($id_user, $id_event);

								// Convert the jadwal to a DateTime object
								$jadwalDateTimeObj = new DateTime($k['jadwal']);

								// Get the current datetime
								$currentDateTimeObj = new DateTime();

								// Calculate the difference between the current datetime and the jadwal
								$interval = $currentDateTimeObj->diff($jadwalDateTimeObj);

								// Check if the difference is greater than or equal to 6 hours
								$isLewatBatasJoin = $interval->h >= 6 && $interval->d === 0 && $interval->m === 0 && $interval->y === 0;
								?>

								<?php if ($isLewatBatasJoin) { ?>
									<button disabled class="flex-shrink-0 btn btn-sm btn-primary px-3"
											style="border-radius: 0 30px 30px 0;">Lewat Batas Waktu</button>
								<?php } else { ?>
									<?php if (!$isFollowed) { ?>
										<button href="#" class="assign-ketua flex-shrink-0 btn btn-sm btn-primary px-3"
											data-id-event="<?php echo $k['id_event']; ?>"
											style="border-radius: 0 30px 30px 0;">Gabung</button>
									<?php } else { ?>
										<button disabled class="flex-shrink-0 btn btn-sm btn-primary px-3"
											style="border-radius: 0 30px 30px 0;">Telah Bergabung</button>
									<?php } ?>
								<?php } ?>


							</div>
						</div>
						<div class="text-center p-4 pb-0">
							<h3 class="mb-0">
								<?php echo $k['judul_event'] ?>
							</h3>
							<h5 class="mb-4">
								<?php echo $k['jenis'] ?>
							</h5>
						</div>
						<div class="d-flex border-top">
							<small class="flex-fill text-center border-end py-2"><i
									class="fa fa-user-tie text-primary me-2"></i>
								<?php echo $k['nama_kbk'] ?>
							</small>
							<small class="flex-fill text-center border-end py-2"><i
									class="fa fa-clock text-primary me-2"></i>
								<?php echo $k['jadwal'] ?>
							</small>
							<small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>
								<?php echo $k['tempat'] ?>
							</small>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>


	<div id="myModal" class="modal animated slideInDown">
		<div class="modal-content">
			<form id="event-form">
				<div class="form-header">
					<span class="close animated slideInDown">&times;</span>
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


				// Send AJAX request
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>Kegiatan/add_event", // Replace with your route URL
					data: $("#event-form").serialize(),
					success: function (response) {
						// Handle the AJAX response
						console.log(response);
						alert("Event telah ditambah");
						
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
		function Search() {
			// Declare variables
			var input, filter, ul, li, a, i, txtValue;
			input = document.getElementById('myInput');
			filter = input.value.toUpperCase();
			ul = document.getElementById("myUL");
			li = ul.getElementsByTagName('li');

			// Loop through all list items, and hide those who don't match the search query
			for (i = 0; i < li.length; i++) {
				a = li[i].getElementsByTagName("a")[0];
				txtValue = a.textContent || a.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					li[i].style.display = "";
				} else {
					li[i].style.display = "none";
				}
			}
		}
	</script>
	<script>
		$(document).ready(function () {
			$(".assign-ketua").on('click', function () {
				var idEvent = $(this).data('id-event');
				var idKbk = <?php echo $user_info->id_kbk; ?>;
				var idUser = <?php echo $user_info->id_user; ?>; // Retrieve id_user from the session

				// Send AJAX request
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>Kegiatan/daftarEvent", // Replace with your server-side script URL
					data: { id_event: idEvent, id_user: idUser, id_kbk: idKbk },
					success: function (response) {
						// Handle the AJAX response
						console.log(response);
						var button = $('.assign-ketua[data-id-event="' + idEvent + '"]');
						button.prop('disabled', true).html('Joined');
						alert("Anda telah mendaftar di event ini");

					},
					error: function (xhr, status, error) {
						// Handle the AJAX error
						console.log(xhr.responseText);
						alert("Fail");
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
