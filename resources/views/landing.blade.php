<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KKSE - Landing</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-white">
    <a href="{{ route('fullscreen', ['route' => route('visitor.form')]) }}" class="block w-full h-screen">
        <div class="w-full h-full flex items-center justify-center">
            <div class="text-center max-w-full max-h-full px-4">
                <img src="{{ asset('images/kkse.png') }}" alt="KKSE" class="mx-auto max-w-full max-h-[70vh] object-contain">
            </div>
        </div>
    </a>
</body>
</html>
