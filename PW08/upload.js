$(document).ready(function() {
    $('#upload-form').on('submit', function(e) {
        e.preventDefault(); // Prevent form from submitting the traditional way

        var formData = new FormData(this); // Create form data object

        $.ajax({
            url: 'upload_ajax.php', // PHP file to handle upload
            type: 'POST',
            data: formData,
            contentType: false, // Needed for file upload
            processData: false, // Don't process data
            success: function(response) {
                $('#status').html(response); // Update status div with response
            },
            error: function() {
                $('#status').html('Terjadi kesalahan saat mengunggah file.');
            }
        });
    });
});
