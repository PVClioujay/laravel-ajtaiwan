<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajtaiwan</title>
</head>

<body>
    @guest
    <form action="/login" method="POST">
        @csrf
        <div class="form-group">
            <label for="UserName">帳號</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="email">
        </div>
        <div class="form-group">
            <label for="UserName">密碼</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="password">
        </div>
        <button type="submit" class="btn btn-primary" id="submit" onclick="submit()">送出</button>
        <a href="/register">Don't have account?</a>
        @error('error')
        <div class="alert alert-danger">{{ $errors->first('error') }}</div>
        @enderror
    </form>
    @endguest
    @auth
    <h1>Login!</h1>
    @endauth
</body>

</html>
