<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Hello, {{$detail['username']}}</h3>
    <p>Login code: {{$detail['verification_code']}}. Do not give this code to anyone, even if they say they are from Email!</p>
    <p>This code can be used to login to your account. We never ask it for anything else.</p>
</body>
</html>