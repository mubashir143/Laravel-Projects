<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    @php
        $message = "this is just testing";
    @endphp

{{-- 1st method --}}

    {{-- <x-alert type="success" message="{{ $message }}"/> --}}


    {{-- 2st method --}}

{{-- <x-alert type="success" :message=" $message "/> --}}
    
    {{-- 3rd method --}}

    <x-alert type="success" :$message />

    <x-alert type="danger" message="this is error" />
    <x-alert type="info" message="this is info"/>
</body>
</html>