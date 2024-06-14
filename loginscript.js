$(document).ready(function () {
    $('#loginForm').submit(function (event) {
        event.preventDefault(); // Prevent default form submission
        var username = $('#username').val();
        var password = $('#password').val();

        // AJAX request to validate credentials
        $.ajax({
            type: 'POST',
            url: 'validate.php',
            data: { username: username, password: password },
            success: function (response) {
                // Response from server
                $('#message').html(response); // Display response message
            }
        });
    });
});
