<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajtaiwan</title>
    @if ($msg)
        <script>
            alert('Registe Success');
        </script>
    @endif
</head>
<body>
    @guest
        <form action="/login" method="POST">
            @csrf
            <div class="form-group">
                <label for="UserName">帳號</label>
                <input type="text" class="form-control" name="account" id="account" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="UserName">密碼</label>
                <input type="password" class="form-control" name="pwd" id="pwd" placeholder="password">
            </div>
            <button type="submit" class="btn btn-primary" id="submit" onclick="submit()">送出</button>
            <a href="/register">Don't have account?</a>
        </form>
    @endguest
    @auth
        <h1>Login!</h1>
    @endauth
</body>
</html>
