<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Beranda - KBK PCR</title>
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

	<!-- Libraries Stylesheet -->
	<link href="lib/animate/animate.min.css" rel="stylesheet">
	<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

	<!-- Customized Bootstrap Stylesheet -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Templatet -->
	<link href="css/style.css" rel="stylesheet">
	<link href="css/css/daftar.css" rel="stylesheet">
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
			<h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Kelompok Bidang Keahlian JTI PCR</h2>
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
							<div class="dropdown-menu dropdown-menu-end fade-down m-0">
							<a href="<?php echo site_url('Users/history'); ?>" class="dropdown-item">Dosen</a>
							<a href="<?php echo site_url('KBK/history'); ?>" class="dropdown-item">KBK</a>
							<a href="<?php echo site_url('Daftar/history'); ?>" class="dropdown-item">Pendaftaran KBK</a>
							<a href="<?php echo site_url('Kegiatan/history'); ?>" class="dropdown-item">Kegiatan</a>
						</div>
					</div>
				<?php endif; ?>
				<a href="<?php echo site_url('/'); ?>" class="nav-item nav-link active">Beranda</a>
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

	<!-- Carousel Start -->
	<div class="container-fluid p-0 mb-5">
		<div class="owl-carousel header-carousel position-relative">
			<div class="owl-carousel-item position-relative">
				<img class="img-fluid" src="img/pcr.jpg" alt="">
				<div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
					style="background: rgba(24, 29, 56, .7);">
					<div class="container">
						<div class="row justify-content-start">
							<div class="col-sm-10 col-lg-8">
								<h5 class="text-primary text-uppercase mb-3 animated slideInDown">Kelompok Bidang
									Keahlian JTI</h5>
								<h1 class="display-3 text-white animated slideInDown">Selamat Datang
									<?php echo $user_info ? ucwords(strtolower($user_info->name)) : ''; ?> di Kelompok
									Bidang Keahlian JTI PCR
								</h1>
								<p class="fs-5 text-white mb-4 pb-2">Fasilitas kolaborasi dan pertukaran informasi yang
									efektif antara dosen JTI</p>
								<a href="<?php echo site_url('daftar'); ?>" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Baca Selengkapnya</a>
								<a href="<?php echo site_url('daftar'); ?>" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Gabung Sekarang</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="owl-carousel-item position-relative">
				<img class="img-fluid" src="img/carousel-2.jpg" alt="">
				<div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
					style="background: rgba(24, 29, 56, .7);">
					<div class="container">
						<div class="row justify-content-start">
							<div class="col-sm-10 col-lg-8">
								<h5 class="text-primary text-uppercase mb-3 animated slideInDown">Kelompok Bidang
									Keahlian JTI</h5>
								<h1 class="display-3 text-white animated slideInDown">Berkomitmen untuk memberikan
									solusi teknologi inovatif.</h1>
								<p class="fs-5 text-white mb-4 pb-2">Berfokus pada pengembangan dan penelitian dalam
									bidang jaringan komputer, sistem informasi, dan teknologi informasi.</p>
									<a href="<?php echo site_url('daftar'); ?>" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Baca Selengkapnya</a>
								<a href="<?php echo site_url('daftar'); ?>" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Gabung Sekarang</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Carousel End -->

	<!-- Title Start -->
	<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
		<h6 class="section-title bg-white text-center text-primary px-3">Home</h6>
		<h1 class="mb-5">Beranda KBK</h1>
	</div>
	<!-- Title End -->
	<!-- Service Start -->
	<div class="container-xxl py-5">
		<div class="container">
			<div class="row g-4">
				<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s"><a
						href="<?php echo site_url('daftar'); ?>">
						<div class="service-item text-center pt-3">
							<div class="p-4">
								<i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
								<h5 class="mb-3">Daftar KBK JTI</h5>
								<p>Daftarkan diri anda pada Kelompok Bidang Keahlian</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s"><a
						href="<?php echo site_url('daftar'); ?>">
						<div class="service-item text-center pt-3">
							<div class="p-4">
								<i class="fa fa-3x fa-globe text-primary mb-4"></i>
								<h5 class="mb-3">Informasi KBK JTI</h5>
								<p>Lihat Informasi KBK yang ada di Jurusan Tekhnologi Informasi</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s"><a
						href="<?php echo site_url('KBK/' . $user_info->id_kbk); ?>">
						<div class="service-item text-center pt-3">
							<div class="p-4">
								<i class="fa fa-3x fa-home text-primary mb-4"></i>
								<h5 class="mb-3">KBK Anda</h5>
								<p>Lihat Informasi yang ada di KBK anda</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s"><a
						href="<?php echo site_url('kegiatan'); ?>">
						<div class="service-item text-center pt-3">
							<div class="p-4">
								<i class="fa fa-3x fa-book-open text-primary mb-4"></i>
								<h5 class="mb-3">Event KBK JTI</h5>
								<p>Lihat Kegiatan-Kegiatan yang ada di KBK</p>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Service End -->


	<!-- About Start -->
	<div class="container-xxl py-5">
		<div class="container">
			<div class="row g-5">
				<div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
					<div class="position-relative h-100">
						<img class="img-fluid position-absolute w-100 h-100" src="img/about.jpg" alt=""
							style="object-fit: cover;">
					</div>
				</div>
				<div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
					<h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
					<h1 class="mb-4">Kelompok Bidang Keahlian JTI</h1>
					<p class="mb-4">Kelompok Bidang Keahlian adalah Grup riset JTI dengan tema riset masing-masing
						beranggotangan dosen-dosen JTI dengan ketertarikan riset yang sesuai dengan KBK.</p>
					<p class="mb-4">Saat ini KBK JTI di PCR ada beberapa bidang keahlian diantaranya:</p>
					<div class="row gy-2 gx-4 mb-4">
						<div class="col-sm-6">
							<p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>KBK Business Analyst</p>
						</div>
						<div class="col-sm-6">
							<p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>KBK Data Engineering</p>
						</div>
						<div class="col-sm-6">
							<p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>KBK Multimedia</p>
						</div>
						<div class="col-sm-6">
							<p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>KBK OS and Computer
								Network</p>
						</div>
						<div class="col-sm-6">
							<p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>KBK Soft Computing</p>
						</div>
						<div class="col-sm-6">
							<p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>KBK Software Engineering
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- About End -->

	<!-- Footer Start -->
	<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
		<div class="container py-5">
			<div class="row g-5">
				<div class="col-lg-3 col-md-6">
					<h4 class="text-white mb-3">Sistem Informasi</h4>
					<a class="btn btn-link" href="https://jurnal.pcr.ac.id/">Jurnal PCR</a>
					<a class="btn btn-link" href="https://tracer.pcr.ac.id/">Tracer Study</a>
					<a class="btn btn-link" href="https://bp2m.pcr.ac.id/">BP2M</a>
					<a class="btn btn-link" href="http://elearning.pcr.ac.id/">elearning</a>
					<a class="btn btn-link" href="http://opac.lib.pcr.ac.id/">OPAC Perpustakaan</a>
				</div>
				<div class="col-lg-3 col-md-6">
					<h4 class="text-white mb-3">Contact</h4>
					<p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Umbansari No.1 Rumbai Pekanbaru-Riau
						28265</p>
					<p class="mb-2"><i class="fa fa-phone-alt me-3"></i>(0765) 53939 | (0765) 554224</p>
					<p class="mb-2"><i class="fa fa-envelope me-3"></i>pcr@pcr.ac.id</p>
					<div class="d-flex pt-2">
						<a class="btn btn-outline-light btn-social" href="https://twitter.com/PolicaltexRiau"><i
								class="fab fa-twitter"></i></a>
						<a class="btn btn-outline-light btn-social"
							href="https://www.facebook.com/76248932533?ref=embed_page"><i
								class="fab fa-facebook-f"></i></a>
						<a class="btn btn-outline-light btn-social"
							href="https://www.youtube.com/channel/UC_xsN7_lBMY_m_C8a_34uZg"><i
								class="fab fa-youtube"></i></a>
						<a class="btn btn-outline-light btn-social"
							href="https://www.instagram.com/politeknikcaltexriau/"><i class="fab fa-instagram"></i></a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<h4 class="text-white mb-3">Facebook kami</h4>
					<div class="row g-2 pt-2">
						<iframe
							src="https://facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FPoliteknik.Caltex.Riau&amp;width=355&amp;height=100&amp;colorscheme=light&amp;show_faces=false&amp;header=true&amp;stream=false&amp;show_border=true"
							class="fb"></iframe>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<h4 class="text-white mb-3">Lokasi</h4>
					<div class="position-relative mx-auto" style="max-width: 400px;">
						<iframe class="rounded-3 h-100"
							src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6207561506735!2d101.42331541528218!3d0.570186563741715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ab67086f2e89%3A0x65a24264fec306bb!2sPoliteknik%20Caltex%20Riau!5e0!3m2!1sid!2sid!4v1665645431029!5m2!1sid!2sid"
							width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
							referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="copyright">
				<div class="row">
					<div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
						&copy; <a class="border-bottom" href="#">KBK PCR</a>, All Right Reserved.

						<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
						Designed By <a class="border-bottom" href="https://htmlcodex.com"> Nanda Habibie Erwin</a>
					</div>
					<div class="col-md-6 text-center text-md-end">
						<div class="footer-menu">
							<a href="">Dashboard</a>
							<a href="">Cookies</a>
							<a href="">Help</a>
							<a href="">FQAs</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer End -->


	<!-- Back to Top -->
	<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


	<!-- JavaScript Libraries -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="lib/wow/wow.min.js"></script>
	<script src="lib/easing/easing.min.js"></script>
	<script src="lib/waypoints/waypoints.min.js"></script>
	<script src="lib/owlcarousel/owl.carousel.min.js"></script>

	<!-- Template Javascript -->
	<script src="js/main.js"></script>
	<script src="js/daftar.js"></script>
</body>

</html>
