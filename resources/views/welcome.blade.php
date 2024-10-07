<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" content="Top autores">
        <meta name="description" content="">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
    
            .font-family-karla {
                font-family: karla;
            }
            .thumbnail {
                max-width: 100%;
                max-height: 250px;
                height: 100%;
            }
        </style>
    
        <!-- AlpineJS -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                        <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('login') }}">ENTRAR</a></li>
                        <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('register') }}">REGISTRAR</a></li>
                    </ul>
                </nav>
    
                <div class="flex items-center text-lg no-underline text-white pr-6">
                    <a class="" href="#">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a class="pl-6" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="pl-6" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="pl-6" href="#">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
    
        </nav>
    
        <!-- Text Header -->
        <header class="w-full container mx-auto">
            <div class="flex flex-col items-center py-12">
                <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl">
                    Green IT
                </a>
                <p class="text-lg text-gray-600">
                    Um simples blog sobre a TI Verde
                </p>
            </div>
        </header>
    
    
        <div class="container mx-auto flex flex-wrap py-6">    
            <!-- Posts Section -->
            <section class="w-full md:w-2/3 flex flex-col items-center px-3">
                @php
                    $limite_char = 100; // O número de caracteres que você deseja exibir
                @endphp
                @foreach ($posts as $post)
                    <article class="flex flex-row shadow my-4 w-full">
                        <!-- Article Image -->
                        <a href="#" class="hover:opacity-75">
                            <img src="{{ asset('storage/thumbnails'. $post->thumbnail->file_path) }}" class="thumbnail">
                        </a>
                        <div class="bg-white flex flex-col justify-start p-6">
                            <a href="{{ route('post.viewPost', ['post'=>$post->slug]) }}" class="text-3xl font-bold hover:text-gray-700 pb-4 text-green-700">{{ $post->title }}</a>
                            <a href="{{ route('post.viewPost', ['post'=>$post->slug]) }}" class="pb-6">{{ $post->subtitle }}</a>
                            <p href="{{ route('post.viewPost', ['post'=>$post->slug]) }}" class="text-sm pb-3">
                                Por <a href="{{ route('author.show', ['author'=>$post->author->id]) }}" class="font-semibold hover:text-gray-800">{{$post->author->name}} {{$post->created_at->format('d/m/Y')}} às {{$post->created_at->format('H')}}Hrs</a>
                            </p>
                            {{-- <a href="#" class="pb-6">{{ mb_strimwidth($post->subtitle, 0, $limite_char, " ...") }}</a> --}}
                            <a href="{{ route('post.viewPost', ['post'=>$post->slug]) }}" class="uppercase text-gray-800 hover:text-black">Continuar leitura <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>
                @endforeach
    
                <!-- Pagination -->
                <div class="flex items-center py-8">
                    <a href="#" class="h-10 w-10 bg-green-800 hover:bg-green-600 font-semibold text-white text-sm flex items-center justify-center">1</a>
                    <a href="#" class="h-10 w-10 font-semibold text-gray-800 hover:bg-green-600 hover:text-white text-sm flex items-center justify-center">2</a>
                    <a href="#" class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3">Next <i class="fas fa-arrow-right ml-2"></i></a>
                </div>
    
            </section>
    
            <!-- Sidebar Section -->
            <aside class="w-full md:w-1/3 flex flex-col items-center px-3">
    
                <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                    <p class="text-xl font-semibold pb-5">Sobre nós</p>
                    <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>
                    <a href="{{ route('about') }}" class="w-full bg-green-800 text-white font-bold text-sm uppercase rounded hover:bg-green-700 flex items-center justify-center px-2 py-3 mt-4">
                        Saiba mais
                    </a>
                </div>
    
            </aside>
    
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
