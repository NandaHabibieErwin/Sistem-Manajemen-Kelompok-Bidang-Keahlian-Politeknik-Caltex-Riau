<?php error_reporting(E_ALL);
ini_set('display_errors', 1); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Seluruh KBK - KBK PCR</title>
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
				<h1 class="mt-4">Tabel KBK</h1>
				<ol class="breadcrumb mb-4">
					<li class="breadcrumb-item active"><a href="<?php echo site_url('Users/history'); ?>">Tabel
							Dosen</a></li>
					<li class="breadcrumb-item">Tabel KBK</a></li>
					<li class="breadcrumb-item active"><a href="<?php echo site_url('Daftar/history'); ?>">Tabel
							Pendaftaran KBK</a></li>
					<li class="breadcrumb-item active"><a href="<?php echo site_url('Kegiatan/history'); ?>">Tabel Event
							KBK</a></li>
					<li class="breadcrumb-item active"><a
							href="<?php echo site_url('Kegiatan/pengajuan_history'); ?>">Tabel Pengajuan Event</a></li>
					<li class="breadcrumb-item active"><a
							href="<?php echo site_url('Kegiatan/dafter_kegiatan'); ?>">Tabel
							Daftar Event</a></li>

				</ol>
				<a id="myBtn" class="btn btn-primary py-md-3 px-md-5 me-3">Tambah KBK</a>
				<div class="card mb-4">
					<div class="card-body">
						<table id="datatablesSimple">
							<thead>
								<tr>
									<th>Nama KBK</th>
									<th>Dana KBK</th>
									<th>Nama Ketua</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Nama KBK</th>
									<th>Dana KBK</th>
									<th>Nama Ketua</th>
									<th>Keterangan</th>
								</tr>
							</tfoot>
							<tbody>
								<?php foreach ($kbk as $row): ?>
									<tr>
										<td>
											<?php echo $row['nama_kbk']; ?>
										</td>
										<td>Rp.
											<?php echo $row['dana_kbk']; ?>
										</td>
										<td>
											<?php echo $row['name']; ?>
										</td>
										<td>
											<button class="btn btn-primary tombol"
												data-modal-id="<?php echo $row['id_kbk']; ?>">Edit</button>
											<button class="btn btn-primary"
												onclick="hapusKBK('<?php echo $row['id_kbk']; ?>')">Hapus</button>

										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</main>

		<div id="myModal" class="modal animated slideInDown">
			<div class="modal-content">
				<form id="kbk-form">
					<div class="form-header">
						<span class="close animated">&times;</span>
						<h1>Tambah KBK</h1>
					</div>
					<div class="form-body">
						<div class="horizontal-group">
							<input type="hidden" id="id_user" name="id_user" value="<?php echo $user_info->id_user; ?>">
							<input type="hidden" readonly class="form-input" id="name" name="name"
								value="<?php echo $user_info ? $user_info->name : ''; ?>">
							<div class="form-group form-group-left">
								<label for="matkul" class="label-title">Nama KBK</label>

								<input type="text" id="nama_kbk" name="nama_kbk" class="form-input"
									placeholder="Nama KBK..." required="required" />
							</div>
							<div class="form-group form-group-right">
								<label for="judul" class="label-title">Dana KBK</label>
								<input type="number" id="dana_kbk" name="dana_kbk" class="form-input"
									placeholder="Dana KBK..." required="required" />
							</div>
						</div>
						<div class="form-footer">
							<button type="submit" class="btn btn-primary">Tambah</button>
							<div id="info"></div>
						</div>
					</div>
				</form>
			</div>
		</div>

		<?php foreach ($kbk as $row): ?>
			<div class="modal animated slideInDown" id="modal-<?php echo $row['id_kbk']; ?>">
				<div class="modal-content">
					<form method="post" action="<?php echo base_url('KBK/dana/' . $row['id_kbk']); ?>">
						<div class="form-header">
							<span class="close animated">&times;</span>
							<h1>Edit KBK
								<?php echo $row['nama_kbk']; ?>
							</h1>
						</div>
						<div class="form-body">
							<div class="horizontal-group">
								<input type="hidden" id="id_kbk" name="id_kbk" value="<?php echo $row['id_kbk']; ?>">
								<div class="form-group form-group-left">
									<label for="judul" class="label-title">Nama KBK</label>
									<input type="text" id="nama_kbk" name="nama_kbk" class="form-input" value="<?php echo $row['nama_kbk']; ?>"
										placeholder="Nama KBK..." required="required" />
								</div>
							</div>
							<div class="horizontal-group">
								<div class="form-group form-group-right">
									<label for="judul" class="label-title">Dana KBK</label>
									<input type="number" id="dana_kbk" name="dana_kbk" class="form-input"
										placeholder="Dana KBK..." required="required" />
								</div>
							</div>
							<div class="form-footer">
								<button type="submit" class="btn btn-primary">Tambah</button>
								<div id="info"></div>
							</div>
						</div>
					</form>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	</div>
	<?php include 'template/footerkbk.php'; ?>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
	crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
	crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>js/datatables-simple-demo.js"></script>
<script src="<?php echo base_url(); ?>js/custom-ajax.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function () {
		// Modal Logic
		var buttons = $(".tombol");
		var spans = $(".close");

		buttons.each(function () {
			$(this).on("click", function () {
				var modalId = $(this).data("modal-id");
				var modal = $("#modal-" + modalId);
				modal.css("display", "block");
			});
		});

		spans.each(function () {
			$(this).on("click", function () {
				var modal = $(this).closest(".modal");
				modal.css("display", "none");
			});
		});

		$(window).on("click", function (event) {
			if ($(event.target).hasClass("modal")) {
				$(event.target).css("display", "none");
			}
		});
	});
</script>
<script>
	// Daftar Anggota Modal 	
	var modal = document.getElementById("myModal");
	var btn = document.getElementById("myBtn");
	var span = document.getElementsByClassName("close")[0];

	btn.onclick = function () {
		modal.style.display = "block";
	};

	span.onclick = function () {
		modal.style.display = "none";
	};

	window.onclick = function (event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	};

	$('body').on('click', '[data-editable]', function () {
		var $el = $(this);
		var $input = $('<input/>').val($el.text());
		$el.replaceWith($input);

		var save = function () {
			var $p = $('<p data-editable />').text($input.val());
			$input.replaceWith($p);
		};

		$input.one('blur', save).focus();
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
					alert("KBK Ditambah");
					location.reload();
					// Perform any actions or show success messages
				},
				error: function (xhr, status, error) {
					// Handle the AJAX error
					console.log(xhr.responseText);
					alert("Gagal menambah KBK");
					// Perform any error handling or show error messages
				}
			});
		});
	});</script>
<script>
	function hapusKBK(id_kbk) {
		$.ajax({
			url: "<?php echo base_url() ?>KBKController/deleteKBK/" + id_kbk,
			type: "POST",
			data: {
				id_kbk: id_kbk
			},
			success: function (response) {
				console.log(response);
				alert("KBK Dihapus");
				location.reload();
			},
			error: function (xhr, status, error) {
				console.log(xhr.responseText, error);
				alert("Gagal Menghapus KBK");
			}
		});
	}
</script>
<script src="<?php echo base_url(); ?>js/main.js"></script>

</body>

</html>
