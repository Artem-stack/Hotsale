// resources/js/app.js

$(document).ready(function () {
    $('#registrationForm').on('submit', function (e) {
        e.preventDefault(); // Забороняємо стандартну поведінку форми

        var formData = $(this).serialize(); // Серіалізуємо дані форми

        $.ajax({
            type: 'POST',
            url: '/registration', // URL для обробки форми
            data: formData,
            success: function (data) {
                // Виконується при успішному відправленні форми
                $('#registrationSuccess').show();
                $('#registrationError').hide();
            },
            error: function (data) {
                // Виконується при помилці відправлення форми
                $('#registrationError').show();
                $('#registrationSuccess').hide();
            }
        });
    });
});
