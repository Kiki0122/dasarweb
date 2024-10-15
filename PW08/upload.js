$(document).ready(function() {
    // Event handler for file input change
    $('#file').change(function() {
        if (this.files.length > 0) {
            $('#upload-button').prop('disabled', false).css('opacity', 1);
        } else {
            $('#upload-button').prop('disabled', true).css('opacity', 0.5);
        }
    });

    // Event handler for form submission
    $('#upload-form').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        var formData = new FormData(this); // Create FormData object

        $.ajax({
            type: 'POST',
            url: 'upload_ajax.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#status').html(response); // Display the response in the status div
            },
            error: function() {
                $('#status').html('Terjadi kesalahan saat mengunggah file.'); // Display error message
            }
        });
    });
});
