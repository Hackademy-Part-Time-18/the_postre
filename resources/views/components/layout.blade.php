<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css" />
    <title>The Postre</title>

</head>

<body id="page-top">
    @if (
        request()->route()->getName() != 'register' && request()->route()->getName() != 'login')
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


    <x-footer/>
</body>

</html>
