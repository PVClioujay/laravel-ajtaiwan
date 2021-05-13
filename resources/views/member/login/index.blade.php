<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajtaiwan</title>
</head>

<body>
    {{-- 未登入畫面，顯示表單輸入 --}}
    @guest
        <form action="/login" method="POST">
            @csrf
            <div class="form-group">
                <label for="UserName">Email:</label>
                <input type="text" name="email" id="email" placeholder="email">
            </div>
            <div class="form-group">
                <label for="UserName">Password:</label>
                <input type="password" name="password" id="password" placeholder="password">
            </div>
            <button type="submit" id="submit"">Submit</button>
            <a href="/register">Don't have account?</a>
                @error('error')
                    <div>{{ $errors->first('error') }}</div>
                @enderror
            <a href="/reset">Forget Password?</a>
        </form>
    @endguest

    {{-- 登入成功 --}}
    @auth
        <h1>Login!</h1>
        <p>user: {{ Auth::user()->name }}</p>
        <a href="/logout">logout</a>
    @endauth
</body>

</html>
