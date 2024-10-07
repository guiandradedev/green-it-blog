<x-guest-layout>
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        <article class="flex flex-col shadow my-4 w-full">
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-green-700 text-sm font-bold uppercase pb-4">Green IT</a>
                <p class="text-3xl font-bold text-green-700 hover:text-gray-700 pb-4">{{$post->title}}</p>
                <p href="#" class="pb-6">{{ $post->subtitle }}</p>
                <p href="#" class="text-sm">
                    Publicado por <a href="{{ route('author.show', ['author'=>$post->author->id]) }}" class="font-semibold hover:text-gray-800 text-green-700">{{$post->author->name}}</a>
                </p>
                <p href="#" class="text-sm pb-2">
                    Última atualização em {{$post->updated_at->translatedFormat('d \d\e F \d\e Y \à\s H:i')}}
                </p>
                <hr>
                <div class="flex justify-center"> 
                    <img src="{{ asset('storage/thumbnails'. $post->thumbnail->file_path) }}" class="thumbnail">
                </div>

                <div>
                    {!! $post->content !!}
                </div>
            </div>
        </article>

        <div class="w-full flex pt-6">
            @if($previous)
                <a href="{{ route('post.viewPost', ['post'=>$previous->slug])}}" class="@if(!$next) w-full @else w-1/2 @endif bg-white shadow hover:shadow-md text-left p-6">
                    <p class="text-lg text-green-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i> Anterior</p>
                    <p class="pt-2">{{ $previous->title }}</p>
                </a>
            @endif
            @if($next)
                <a href="{{ route('post.viewPost', ['post'=>$next->slug])}}" class="@if(!$previous) w-full @else w-1/2 @endif bg-white shadow hover:shadow-md text-right p-6">
                    <p class="text-lg text-green-800 font-bold flex items-center justify-end">Próximo <i class="fas fa-arrow-right pl-1"></i></p>
                    <p class="pt-2">{{ $next->title }}</p>
                </a>
            @endif
        </div>

        <div class="w-full flex flex-col text-center md:text-left md:flex-row shadow bg-white mt-10 mb-10 p-6">
            <div class="w-full md:w-1/5 flex justify-center md:justify-start pb-4">
                <img src="{{ asset('storage/avatars'. $post->author->avatar->file_path) }}" class="rounded-full shadow h-32 w-32">
            </div>
            <div class="flex-1 flex flex-col justify-center md:justify-start">
                <a href="{{ route('author.show', ['author'=>$post->author->username]) }}">
                    <p class="font-semibold text-2xl text-green-700 hover:text-gray-700">{{ $post->author->name }}</p>
                </a>
                <p class="pt-2">{{ $post->author->about }}</p>
                <div class="flex items-center justify-center md:justify-start text-2xl no-underline text-green-800 pt-4">
                    @if($post->author->linkedin)
                        <a class="" href="{{ $post->author->linkedin }}" target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    @endif
                    @if($post->author->github)
                        <a class="pl-4" href="{{ $post->author->github }}" target="_blank">
                            <i class="fab fa-github"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>

    </section>

    <!-- Sidebar Section -->
    <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">About Us</p>
            <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>
            <a href="#" class="w-full bg-green-800 text-white font-bold text-sm uppercase rounded hover:bg-green-700 flex items-center justify-center px-2 py-3 mt-4">
                Get to know us
            </a>
        </div>

        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">Últimos posts</p>
            
            <div>
                <ul>
                    @php
                        $limite_char = 40; // O número de caracteres que você deseja exibir
                    @endphp
                    @foreach ($viewMore as $post)
                        <li><a href="{{ route('post.viewPost', ['post'=>$post->slug]) }}" class="text-green-700">{{ mb_strimwidth($post->title, 0, $limite_char, " ...") }} <i class="fas fa-arrow-right"></i></a></li> 
                        <hr>   
                    @endforeach
                </ul>
            </div>
            
            <a href="{{ route('blog') }}" class="w-full bg-green-800 text-white font-bold text-sm uppercase rounded hover:bg-green-700 flex items-center justify-center px-2 py-3 mt-6">
                Ver mais posts
            </a>
        </div>

    </aside>
</x-guest-layout>