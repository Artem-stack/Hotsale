$(document).ready(function() {
    $('#registrationForm').submit(function(event) {
        event.preventDefault();

        // Отримуємо дані з форми
        var formData = {
            name: $('#name').val(),
            surname: $('#surname').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            password_confirmation: $('#password_confirmation').val(),
            _token: $('input[name=_token]').val()
        };

        // Відправляємо AJAX-запит
        $.ajax({
            type: 'POST',
            url: '/register',
            data: formData,
            dataType: 'json',
            success: function(data) {
                // Очищаємо форму
                $('#registrationForm')[0].reset();

                // Показуємо повідомлення про успішну реєстрацію
                $('#registrationSuccess').show();

                // Приховуємо повідомлення про помилку (якщо вони були видимі)
                $('#registrationError').hide();
            },
            error: function(data) {
                // Показуємо повідомлення про помилку
                $('#registrationError').show();

                // Приховуємо повідомлення про успішну реєстрацію (якщо вони були видимі)
                $('#registrationSuccess').hide();
            }
        });
    });
});
