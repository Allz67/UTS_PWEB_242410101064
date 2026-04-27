<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alia Cookies Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> </head>
    <body class="bg-[#FDF5E6] text-[#5D4037] font-['Quicksand']">
        <x-navbar />

        <main class="pt-24 pb-20 px-8 max-w-[1200px] mx-auto min-h-screen">
            @yield('content')
        </main>

        <x-footer />
        <script src="{{ asset('js/admin.js') }}"></script>
    </body>
</html>
