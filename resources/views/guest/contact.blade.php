<x-guest-layout>
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        <article class="flex flex-col shadow my-4 w-full">
            <div class="bg-white flex flex-col justify-start p-6">
                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    @method('POST')
                    <!-- Nome -->
                    <div class="my-2">
                        <x-input-label for="name" :value="__('Nome')" />
                        <x-text-input id="name" class="block mt-1 p-2 w-full" type="name" placeholder="Nome" name="name" :value="old('name')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <!-- Email -->
                    <div class="my-2">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full p-2" type="email" name="email" placeholder="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Text -->
                    <div class="mt-4">
                    <x-input-label for="name" :value="__('Conteúdo da Mensagem')" />
                            <!-- <label class="block mt-1 w-full p-4" for="qnt_invited">
                                Conteúdo da Mensagem
                            </label> -->
                            <textarea class="block mt-1 w-full" name="content" id="content" cols="30" rows="5" placeholder="Corpo do Texto">{{old('content')}}</textarea>
                    </div>

                    <x-primary-button class="ms-2">
                        {{ __('Enviar') }}
                    </x-primary-button>
                </div>
            </form>
        </article>

        {{-- <div class="w-full flex pt-6">
           
        </div>

        <div class="w-full flex flex-col text-center md:text-left md:flex-row shadow bg-white mt-10 mb-10 p-6">
            
        </div> --}}

    </section>

    <!-- Sidebar Section -->
    <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">Sobre Nós</p>
            <p class="pb-2">Bem-vindo ao EcoByte! Fundado em 2024, o EcoByte surgiu da necessidade de promover um setor de tecnologia mais sustentável e consciente.</p>
            <a href="#" class="w-full bg-green-800 text-white font-bold text-sm uppercase rounded hover:bg-green-700 flex items-center justify-center px-2 py-3 mt-4">
                Saiba mais
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