<x-guest-layout>
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        <article class="flex flex-col shadow my-4 w-full">
            <div class="bg-white flex flex-col justify-start p-6">
                <header class="header">
                    <div class="container">
                        <h1 class="text-4xl font-bold text-green-800">EcoByte</h1>
                        <p class="text-xl mt-2">Promovendo práticas sustentáveis em TI</p>
                    </div>
                </header>

                <section class="about-section my-6">
                    <h2 class="text-2xl font-semibold mb-4 text-green-800">Sobre Nós</h2>
                    <p class="mb-6">Bem-vindo ao EcoByte! Fundado em 2024, o EcoByte surgiu da necessidade de promover um setor de tecnologia mais sustentável e consciente.</p>
                    <img src="{{ asset('images/imagem.jpg') }}" width="300" height="200" style="display: block; margin: auto;">
                    
                    <h2 class="text-2xl font-semibold mb-4 text-green-800">Nossa Missão</h2>
                    <p class="mb-6">Na EcoByte, acreditamos que a tecnologia pode ser parte da solução para os desafios ambientais. Nossa missão é conscientizar sobre a importância da TI Verde, promovendo práticas que reduzem o consumo de energia e aumentam a eficiência nos recursos tecnológicos.</p>

                    <h2 class="text-2xl font-semibold mb-4 text-green-800">Nossa História</h2>
                    <p class="mb-6">A EcoByte começou como um projeto na disciplina de Desenvolvimento Sustentável na Engenharia, apresentado pelo professor Rafael Souza de Faria. Nosso objetivo é conscientizar os profissionais da área de TI sobre como eles podem ajudar a tornar a tecnologia mais sustentável.</p>

                    <h2 class="text-2xl font-semibold mb-4 text-green-800">Nossos Valores</h2>
                    <ul class="list-disc list-inside space-y-2">
                        <li><strong>Sustentabilidade:</strong> Promovemos práticas que preservam o meio ambiente e garantem um uso responsável dos recursos tecnológicos.</li>
                        <li><strong>Consciência:</strong> Incentivamos a conscientização sobre o impacto ambiental do setor de TI.</li>
                        <li><strong>Inovação:</strong> Acreditamos que a tecnologia pode transformar o mundo em um lugar mais sustentável.</li>
                    </ul>

                    <h2 class="text-2xl font-semibold mb-4 mt-6 text-green-800">Junte-se a Nós!</h2>
                    <p>Convidamos você a nos acompanhar nessa jornada em busca de um futuro mais sustentável para a tecnologia. Fique à vontade para explorar nossos artigos e aprender sobre como a TI Verde pode beneficiar o planeta e sua organização.</p>

                    <p class="mt-6"><strong>A equipe EcoByte</strong></p>
                </section>

            </div>
        </article>
        <div class="w-full text-center md:text-left md:flex-row shadow bg-white mt-5 mb-5 p-6">
            <h3 class="font-bold text-2xl text-green-700 mb-2">Participantes</h3>

            <div class="flex flex-wrap -mx-4">
                @foreach ($members as $member)
                    <a href="{{ route('author.show', ['author'=>$member->username]) }}" class="w-full sm:w-1/2 md:w-1/4 px-4 mb-4">
                        <div class="bg-white shadow-md rounded-lg p-4 h-full text-center">
                            <div class="flex justify-center my-2">
                                <img src="{{ asset('storage/avatars/' . $member->avatar) }}" class="rounded-full shadow h-32 w-32">
                            </div>
                            <h3 class="font-semibold text-lg text-green-900">{{ $member->name }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <aside class="w-full md:w-1/3 flex flex-col items-center px-3">
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