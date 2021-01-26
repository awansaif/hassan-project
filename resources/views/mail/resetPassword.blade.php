<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Password Reset</title>
<style>
    .button{
        background-color: green;
        border-radius: 20px;
        color:honeydew;
        padding: 10px 10px;
        width:200px;
        margin: auto
    }
    a{
        text-decoration:none;
        color:white;
    }
</style>
</head>
<body>

    <h2>Welcome {{ $user->name }}</h2>
    <p>
        You are receiving this email because we received a password reset request for your account.
    </p>
    <a href="{{ $link }}" class="button">Password Rest</a>
    <p>
        This password reset link will expire in 60 minutes.

If you did not request a password reset, no further action is required.
    </p>
    <span>
        Regards,
        <br>
        <br>
        {{ env('APP_NAME') }}
    </span>

</body>
</html>

