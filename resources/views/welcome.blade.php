<x-guest-layout>
    <style>
        .thumbnail {
            max-width: 300px;
            widows: 100%;
            max-height: 250px;
            height: 100%;
        }
    </style>
            <section class="w-full md:w-2/3 flex flex-col items-center px-3">
                @php
                    $limite_char = 100; // O número de caracteres que você deseja exibir
                @endphp
                @foreach ($posts as $post)
                    <article class="flex flex-row shadow my-4 w-full">
                        <!-- Article Image -->
                        <a href="{{ route('post.viewPost', ['post'=>$post->slug]) }}" class="hover:opacity-75 p-2">
                            <img src="{{ asset('storage/thumbnails'. $post->thumbnail->file_path) }}" class="thumbnail">
                        </a>
                        <div class="bg-white flex flex-col justify-start p-6">
                            <a href="{{ route('post.viewPost', ['post'=>$post->slug]) }}" class="text-3xl font-bold hover:text-gray-700 pb-4 text-green-700">{{ $post->title }}</a>
                            <a href="{{ route('post.viewPost', ['post'=>$post->slug]) }}" class="pb-6">{{ $post->subtitle }}</a>
                            <p href="{{ route('post.viewPost', ['post'=>$post->slug]) }}" class="text-sm pb-3">
                                Por <a href="{{ route('author.show', ['author'=>$post->author->username]) }}" class="font-semibold hover:text-gray-800">{{$post->author->name}}</a> {{Carbon\Carbon::parse($post->created_at)->diffForHumans()}}
                                {{-- Por <a href="{{ route('author.show', ['author'=>$post->author->username]) }}" class="font-semibold hover:text-gray-800">{{$post->author->name}} {{$post->updated_at->format('d/m/Y')}} às {{$post->created_at->format('H')}}Hrs</a> --}}
                            </p>
                            {{-- <a href="#" class="pb-6">{{ mb_strimwidth($post->subtitle, 0, $limite_char, " ...") }}</a> --}}
                            <a href="{{ route('post.viewPost', ['post'=>$post->slug]) }}" class="uppercase text-gray-800 hover:text-black">Continuar leitura <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>
                @endforeach
    
                
                <div class="flex items-center py-2 w-full">
                    {{ $posts->links('components.pagination') }}
                </div>
    
            </section>
    
            <!-- Sidebar Section -->
            <aside class="w-full md:w-1/3 flex flex-col items-center px-3">
    
                <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                    <p class="text-xl font-semibold pb-5">Sobre nós</p>
                    <p class="pb-2">Bem-vindo ao EcoByte! Fundado em 2023, o EcoByte surgiu da necessidade de promover um setor de tecnologia mais sustentável e consciente.</p>
                    <a href="{{ route('about') }}" class="w-full bg-green-800 text-white font-bold text-sm uppercase rounded hover:bg-green-700 flex items-center justify-center px-2 py-3 mt-4">
                        Saiba mais
                    </a>
                </div>
    
            </aside>
    
</x-guest-layout>