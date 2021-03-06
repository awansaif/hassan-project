<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>
<body>
    <h2>Hi {{ $member->name }}</h2>
    <h4>Welcome! Your are now  a member of Uifa ! we aere glad to have you.</h4>


    <h2>Regards</h2><br>
    {{ env('APP_NAME') }}
</body>
</html>
