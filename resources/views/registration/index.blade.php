@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Реєстрація</h2>
    <form id="registrationForm" method="POST" action="{{ route('store') }}">
        @csrf
       <div class="form-group">
    <label for="name">Ім'я:</label>
    <input type="text" class="form-control" id="name" name="name" required>
    @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
</div>
<div class="form-group">
    <label for="surname">Прізвище:</label>
    <input type="text" class="form-control" id="surname" name="surname" required>
    @if ($errors->has('surname'))
        <span class="text-danger">{{ $errors->first('surname') }}</span>
    @endif
</div>
<div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" required>
    @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
    @endif
</div>
       <div class="form-group">
    <label for="password">Пароль:</label>
    <input type="password" class="form-control" id="password" name="password" required>
    @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
    @endif
</div>
        <div class="form-group">
            <label for="password_confirmation">Повторіть пароль:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            @if ($errors->has('password_confirmation'))
                 <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>
        <button type="submit" id="registerButton" class="btn btn-primary">Зареєструватися</button>
    </form>
    <div id="registrationMessage" class="mt-3"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $('#registrationForm').on('submit', function (e) {
        e.preventDefault(); // Забороняємо стандартну поведінку форми

        var formData = $(this).serialize(); // Серіалізуємо дані форми

        $.ajax({
            type: 'POST',
            url: '/register', // URL для обробки форми
            data: formData,
            success: function (data) {
                // Виконується при успішному відправленні форми
                $('#registrationMessage').html('<div class="alert alert-success">Реєстрація успішна!</div>');
                $('#registrationForm')[0].reset();
                // Перенаправити користувача на сторінку 'users'
                window.location.href = '/users';
            },
            error: function (data) {
                // Виконується при помилці відправлення форми
                var errors = data.responseJSON;
                var errorHtml = '<div class="alert alert-danger"><ul>';
                $.each(errors.errors, function (key, value) {
                    errorHtml += '<li>' + value + '</li>';
                });
                errorHtml += '</ul></div>';
                $('#registrationMessage').html(errorHtml);
            }
        });
    });
});
</script>


@endsection
