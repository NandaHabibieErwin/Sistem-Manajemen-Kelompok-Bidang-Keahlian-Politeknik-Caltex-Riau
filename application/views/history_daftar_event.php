<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Pendaftaran Event - KBK PCR</title>
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
	<link href="<?php echo base_url(); ?>css/tables.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/daftar.css" rel="stylesheet">
</head>

<body>
	<?php include 'template/header.php'; ?>

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>Kajur - KBK PCR</title>
		<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
		<link href="css/styles.css" rel="stylesheet" />

		<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
	</head>
	<div id="spinner"
		class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
		<div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	<div id="layoutSidenav">
	</div>
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid px-4">
				<h1 class="mt-4">Tabel Pendaftaran Kegiatan</h1>
				<ol class="breadcrumb mb-4">
					<li class="breadcrumb-item active"><a href="<?php echo site_url('Users/history'); ?>">Tabel
							Dosen</a></li>
					<li class="breadcrumb-item active"><a href="<?php echo site_url('KBK/history'); ?>">Tabel KBK</a>
					</li>
					<li class="breadcrumb-item active"><a href="<?php echo site_url('Daftar/history'); ?>">Tabel
							Pendaftaran KBK</a></li>
					<li class="breadcrumb-item active"><a href="<?php echo site_url('Kegiatan/history'); ?>">Tabel Event
							KBK</a></li>
					<li class="breadcrumb-item active"><a
							href="<?php echo site_url('Kegiatan/pengajuan_history'); ?>">Tabel Pengajuan Event</a></li>
					<li class="breadcrumb-item">Tabel
							Daftar Event</li>
				</ol>
				<div class="card mb-4">
					<div class="card-body">
						<table id="datatablesSimple">
							<thead>
								<tr>
								<th>Judul Kegiatan</th>
									<th>Nama</th>
									<th>KBK</th>
									<th>Jadwal Ikut</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Judul Kegiatan</th>
									<th>Nama</th>
									<th>KBK</th>
									<th>Jadwal Ikut</th>
								</tr>
							</tfoot>
							<tbody>
								<?php
								foreach ($kegiatan as $k): ?>
									<tr>
										<td>
											<?php echo $k['judul_event']; ?>
										</td>
										<td>
											<?php echo $k['name']; ?>
										</td>
										<td>
											<?php echo $k['nama_kbk']; ?>
										</td>
										<td>
											<?php echo $k['jadwal_ikut']; ?>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</main>
		<?php include 'template/footer.php'; ?>
	</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
		crossorigin="anonymous"></script>
	<script src="<?php echo base_url(); ?>js/scripts.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
		crossorigin="anonymous"></script>
	<script src="<?php echo base_url(); ?>js/datatables-simple-demo.js"></script>
	<script src="<?php echo base_url(); ?>js/custom-ajax.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
		function assignKbkKbkp(id_daftar, id_kbk, id_kbkp) {
			// Make an AJAX request to the controller method with the data
			$.ajax({
				url: "<?php echo base_url('Daftar/updateDaftar'); ?>",
				type: "POST",
				data: {
					id_daftar: id_daftar,
					id_kbk: id_kbk,
					id_kbkp: id_kbkp
				},
				success: function (response) {
					// Handle the response from the server
					console.log(response);
					alert("Dosen telah terdaftar di KBK");
				},
				error: function (xhr, status, error) {
					// Handle any error that occurred during the AJAX request
					console.error(error);
					alert("Gagal Mendaftar KBK");
				}
			});
		}
	</script>
	<script>
		$(document).ready(function () {
			$(".assign-ketua").on('click', function () {
				var idUser = $(this).data('id-user');
				var idKbk = $(this).data('id-kbk');

				// Send AJAX request
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>KBKController/assignKetua", // Replace with your server-side script URL
					data: { id_user: idUser, id_kbk: idKbk },
					success: function (response) {
						// Handle the AJAX response
						console.log(response);
						alert("Dosen telah menjadi ketua KBK");
						// Perform any actions or show success messages
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
	<script src="<?php echo base_url(); ?>js/main.js"></script>
	<script src="<?php echo base_url(); ?>js/daftar.js"></script>
</body>

</html>
