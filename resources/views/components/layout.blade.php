@props([
    'title' => 'Mete um nome!'
])

<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
    <style>
        .max-w-400{
            max-width: 400px;
            margin: auto;
        }
        .cardaula1{
            background: #e3e3e3; 
            padding: 1rem; 
            text-align: center;
        }
    </style>
</head>
<body class="">

    <x-nav/>
        
    @if ($title == 'Home1'|| $title == 'About Us' || $title == 'Contact Us')
        <nav class=" text-white ">
            <a href="/welcome">Home</a>
            <a href="/about">About Us</a>
            <a href="/contact">Contact Us</a>
        </nav>
    @endif

    <main class=" max-w-3xl mx-auto mt-6">
        {{ $slot }}
    </main>
</body>
</html>