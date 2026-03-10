<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>DANIELLE COUTURE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
        body {
            margin: 0;
            font-family: 'Playfair Display', serif;
            background: #000;
            color: #fff;
        }
        a { text-decoration: none; color: inherit; }
        input, button { font-family: inherit; }
    </style>
</head>
<body>

@include('layouts.header')

@yield('content')

@include('layouts.footer')

</body>
</html>
