<x-guest-layout>
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        <article class="flex flex-col shadow my-4 w-full">
            <div class="bg-white flex flex-col justify-start p-6">
                <h1 class="text-green-700 text-sm font-bold uppercase pb-4">Green IT</h1>

                <div class="w-full flex flex-col text-center md:text-left md:flex-row shadow bg-white mt-5 mb-5 p-6">
                    <div class="w-full md:w-1/5 flex justify-center md:justify-start pb-4">
                        <div>
                            <img src="{{ asset('storage/avatars'. $author->avatar) }}" class="rounded-full shadow h-32 w-32">
                        </div>
                    </div>
                    <div class="flex-1 flex flex-col justify-center md:justify-start">
                        <h2 class="font-bold text-2xl text-green-700 ">{{ $author->name }}</h2>
                        <p class="pt-2">{{ $author->about }}</p>
                    </div>
                </div>
                @if($author->linkedin || $author->github)
                    <div class="w-full text-center md:text-left shadow bg-white mt-5 mb-5 p-6">
                        <h3 class="font-bold text-2xl text-green-700">Redes sociais</h3>
                        
                        <div class="flex justify-center md:justify-start space-x-4 mt-2">
                            @if($author->linkedin)
                                <a href="{{ $author->linkedin }}" target="_blank" class="w-32 flex items-center">
                                    <img src="https://download.logo.wine/logo/LinkedIn/LinkedIn-Logo.wine.png" alt="LinkedIn" class="w-full">
                                </a>
                            @endif
                            @if($author->github)
                                <a href="{{ $author->github }}" target="_blank" class="w-32 flex items-center">
                                    <img src="https://images-ext-1.discordapp.net/external/frmOIMnRGgmiJICW7ZYEoo6HKiRiNJDHhweEMG4UT_4/%3Fcb%3D20231201024220/https/static.wikia.nocookie.net/windows/images/0/01/GitHub_logo_2013.png/revision/latest/thumbnail/width/360/height/360?format=webp&width=720&height=360" alt="GitHub" class="w-full">
                                </a>
                            @endif
                        </div>
                    </div>
                @endif
                
                @if($authorPosts->total() != 0)
                    <div class="w-full text-center md:text-left md:flex-row shadow bg-white mt-5 mb-10 p-6">
                        <h3 class="font-bold text-2xl text-green-700">Últimos Posts</h3>
                        <div>
                            @foreach($authorPosts as $post)
                                <a href="{{ route('post.viewPost', ['post'=>$post->slug]) }}">
                                    <article class="flex flex-col shadow my-4 w-full">
                                        <div class="bg-white flex flex-col justify-start p-6">
                                            <p class="text-2xl font-bold text-green-700 hover:text-gray-700 pb-2">{{$post->title}}</p>
                                            <p href="#" class="pb-4">{{ $post->subtitle }}</p>
                                            <p href="#" class="text-sm pb-2">
                                                Última atualização em {{$post->updated_at->translatedFormat('d \d\e F \d\e Y \à\s H:i')}}
                                            </p>
                                        </div>
                                    </article>
                                </a>
                            @endforeach
                            <div class="mt-4">
                                {{ $authorPosts->links('components.pagination') }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </article>
    </section>

    <aside class="w-full md:w-1/3 flex flex-col items-center px-3">
        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">About Us</p>
            <p class="pb-2">Bem-vindo ao Green IT! Fundado em 2023, o Green IT surgiu da necessidade de promover um setor de tecnologia mais sustentável e consciente.</p>
            <a href="#" class="w-full bg-green-800 text-white font-bold text-sm uppercase rounded hover:bg-green-700 flex items-center justify-center px-2 py-3 mt-4">
                Saiba Mais
            </a>
        </div>

        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">Últimos posts</p>
            
            <div>
                <ul>
                    @php
                        $limite_char = 40; // O número de caracteres que você deseja exibir
                    @endphp
                    @foreach ($posts as $post)
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