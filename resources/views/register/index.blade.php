<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @if ( $msg ?? '')
    <script>
        alert('Registe Success');
            location.href = 'login';
    </script>
    @endif
</head>

<body>
    <form action="/register" id="registForm" method="POST">
        @csrf
        <div class="form-group">
            <label for="username">User Name:</label>
            <input type="text" class="@error('account') is-invalid @enderror" id="account" aria-describedby="account"
                name="account">
            @error('account')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="@error('pasword') is-invalid @enderror" id="password"
                aria-describedby="pasword" name="password">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>
