<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2 style="text-align: center;">{{ env('APP_NAME') }} </h2>

    <p>Thanks for purchasing our link.</p>
    <h2>Title:</h2> {{ $link->title }}
    <h2>Link:</h2> {{ $link->link }}

    <h2>Regards</h2>
    <h2>{{ env('APP_NAME') }}</h2>
</body>

</html>

