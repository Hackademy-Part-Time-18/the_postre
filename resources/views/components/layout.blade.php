<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/blogs/blog-4/assets/css/blog-4.css">
    <title>The Postre</title>

</head>

<body id="page-top">
    <x-navbar/>
    @if (request()->route()->getName()!='homepage') 
    <div style="height: 70px" class="mb-1"></div>
    <x-btnnav/>
    @endif

    {{ $slot }}



    <x-footer/>
</body>

</html>
