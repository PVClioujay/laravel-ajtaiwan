<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reset</title>
    @if ( $msg ?? '')
    <script>
        alert('{{ $msg }}');
            location.href = '/login';
    </script>
    @endif
</head>
<body>
    <form action="/reset" id="registForm" method="POST">
        @csrf
        <div class="form-group">
            <label for="username">Email:</label>
            <input type="text" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="@error('pasword') is-invalid @enderror" id="password"
                aria-describedby="pasword" name="password">
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>
        {{ $msg ?? '' }}
        <button type="submit">Submit</button>
    </form>
</body>
</html>
