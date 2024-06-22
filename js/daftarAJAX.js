$(document).ready(function() {
    $("#save").click(function(e) {
        e.preventDefault(); // Prevent the default form submission

        var id = $("#id").val();
        var id_kbk = $("#id_kbk").val();
        var id_kbkp = $("#id_kbkp").val();
        var matkul = $("#matkul").val();
        var judul = $("#judul").val();

        $.ajax({
            type: "POST",
            url: "{{ route('daftar.store') }}",
            data: {
                _token: "{{ csrf_token() }}", // Include CSRF token for Laravel security
                id: id,
                id_kbk: id_kbk,
                id_kbkp: id_kbkp,
                matkul: matkul,
                judul: judul
            },
            success: function(result) {
                console.log(response);
                alert(response.message); // Display the success message
            },
            error: function(xhr, status, error) {
                // Handle the error response from the server
                console.log(xhr.responseText); // Log the error response data in the browser console
                // Perform any error handling or show error messages
                alert("An error occurred while processing your request.");
            }
        });
    });
});
