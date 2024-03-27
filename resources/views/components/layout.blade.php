<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css" />
    <title>The Postre</title>

</head>

<body id="page-top">
    @if (
        request()->route()->getName() != 'register' && request()->route()->getName() != 'login' &&
            request()->route()->getName() != 'user')
        <x-navbar />
        @auth            
        <x-sidebar/>
        @endauth
        @if (request()->route()->getName() != 'homepage')
            <div style="height: 70px" class="mb-1"></div>
            <x-btnnav />
        @endif
    @endif

    {{ $slot }}


    <x-footer />
</body>

</html>
