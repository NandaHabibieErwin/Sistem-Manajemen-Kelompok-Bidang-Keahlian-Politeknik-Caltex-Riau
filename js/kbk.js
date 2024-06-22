
	// Get the Tambah KBK buttons
	var tambahKbkBtns = document.getElementsByClassName("tambah-kbk-btn");

	// Get the modal
	var modal = document.getElementById("myModal");

	// Get the close button
	var closeBtn = document.getElementsByClassName("close")[0];

	// Loop through the Tambah KBK buttons
	for (var i = 0; i < tambahKbkBtns.length; i++) {
		// When a Tambah KBK button is clicked
		tambahKbkBtns[i].addEventListener("click", function () {
			// Get the id_kbk from the data-id attribute
			var idKbk = this.getAttribute("data-id");

			// Show the modal
			modal.style.display = "block";

			// Add the id_kbk to the modal content
			var modalContent = modal.getElementsByClassName("modal-content")[0];
			modalContent.innerHTML = "Modal for id_kbk: " + idKbk;
		});
	}

	// When the user clicks on the close button, close the modal
	closeBtn.addEventListener("click", function () {
		modal.style.display = "none";
	});

	// When the user clicks anywhere outside of the modal, close it
	window.addEventListener("click", function (event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	});

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

	/**
	  We're defining the event on the `body` element, 
	  because we know the `body` is not going away.
	  Second argument makes sure the callback only fires when 
	  the `click` event happens only on elements marked as `data-editable`
	*/
	$('body').on('click', '[data-editable]', function () {
		var $el = $(this);
		var $input = $('<input/>').val($el.text());
		$el.replaceWith($input);

		var save = function () {
			var $p = $('<p data-editable />').text($input.val());
			$input.replaceWith($p);
		};

		/**
		  We're defining the callback with `one`, because we know that
		  the element will be gone just after that, and we don't want 
		  any callbacks leftovers taking memory. 
		  Next time `p` turns into `input` this single callback 
		  will be applied again.
		*/
		$input.one('blur', save).focus();
	});

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
	});
	$(document).ready(function () {
		$("#dana-form").on('submit', function (e) {
			e.preventDefault(); // Prevent the default button click behavior
			// Send AJAX request
			$.ajax({
				url: "<?php echo base_url('Kbk/updateDanaKBK'); ?>",
				type: "POST",
				data: {
					id_kbk: id_kbk,
					dana_kbk: dana_kbk
				},
				success: function (response) {
					console.log(response);
					alert("Dana KBK updated successfully");
				},
				error: function (xhr, status, error) {
					console.error(error);
					alert("Failed to update Dana KBK");
				}
			});
		});
	});
	function displayDanaForm(id_kbk) {
		// Show the form container
		document.getElementById('danaFormContainer').style.display = 'block';

		// Set the ID of the clicked KBK
		document.getElementById('danaForm').dataset.id_kbk = id_kbk;
	}
