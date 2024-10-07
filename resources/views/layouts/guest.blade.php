
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Blog Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>
<body class="bg-white font-family-karla">

    <!-- Top Bar Nav -->
    <nav class="w-full py-4 bg-green-800 shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
            <nav>
                <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('home') }}">INICIO</a></li>
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('about') }}">SOBRE NÓS</a></li>
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('blog') }}">POSTS</a></li>
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('contact') }}">CONTATO</a></li>
                </ul>
            </nav>
            
            <nav>
                <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                    @auth
                        <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ url('/dashboard') }}">PAINEL</a></li>
                    @else
                        <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('login') }}">ENTRAR</a></li>
                        <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('register') }}">REGISTRAR</a></li>
                    @endauth

                </ul>
            </nav>
        </div>

    </nav>

    <!-- Text Header -->
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
                Green IT
            </a>
            <p class="text-lg text-gray-600">
                Um simples blog sobre a TI Verde
            </p>
        </div>
    </header>

    <div class="container mx-auto flex flex-wrap py-6">
        {{ $slot }}
    </div>

    <footer class="w-full border-t bg-white pb-12">
        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-row md:flex-row text-center md:text-left md:justify-between py-6">
                <a href="{{ route('about') }}" class="uppercase px-3">Sobre nós</a>
                <a href="{{ route('blog') }}" class="uppercase px-3">Posts</a>
                <a href="{{ route('contact') }}" class="uppercase px-3">Contato</a>
            </div>
            <div class="uppercase pb-6">&copy; myblog.com</div>
        </div>
    </footer>

</body>
</html>