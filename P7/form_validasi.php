<!DOCTYPE html>
<html>
<head>
    <title>Form Input dengan Validasi & AJAX</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<h1>Form Input dengan Validasi (AJAX)</h1>

<form id="myForm">
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama">
    <span id="nama-error" style="color: red;"></span><br>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email">
    <span id="email-error" style="color: red;"></span><br>

    <input type="submit" value="Kirim">
</form>

<div id="response" style="margin-top:10px; color:green;"></div>

<script>
$(document).ready(function() {
    $("#myForm").submit(function(event) {
        event.preventDefault(); 

        var nama = $("#nama").val();
        var email = $("#email").val();
        var valid = true;

        if (nama === "") {
            $("#nama-error").text("Nama harus diisi.");
            valid = false;
        } else {
            $("#nama-error").text("");
        }

        if (email === "") {
            $("#email-error").text("Email harus diisi.");
            valid = false;
        } else {
            $("#email-error").text("");
        }

        // Jika validasi lolos, kirim data via AJAX
        if (valid) {
            $.ajax({
                url: "proses_validasi.php",
                type: "POST",
                data: { nama: nama, email: email },
                success: function(response) {
                    $("#response").html("Data berhasil dikirim!<br>Respon dari server: " + response);
                },
                error: function() {
                    $("#response").html("<span style='color:red'>Terjadi kesalahan saat mengirim data.</span>");
                }
            });
        }
    });
});
</script>

</body>
</html>
