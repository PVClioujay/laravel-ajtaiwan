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
        <h1>you are not login yet!</h1>
    @endguest
    @auth
        <h1>Login!</h1>
    @endauth
</body>
</html>
