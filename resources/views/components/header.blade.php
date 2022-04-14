<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url("css/app.css") }}">
    <script src="https://kit.fontawesome.com/812b520597.js" crossorigin="anonymous"></script>
    <title>Document</title>
    @livewireStyles
</head>
<body>

    {{ $slot }}
    
    @livewireScripts
</body>
</html>