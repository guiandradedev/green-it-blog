<!-- resources/views/about.blade.php -->
<x-guest-layout>
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        <article class="flex flex-col my-4 w-full">
            <header class="header">
                <div class="container">
                    <h1 class="text-4xl font-bold text-green-800">Green IT</h1>
                    <p class="text-xl mt-2">Promovendo práticas sustentáveis em TI</p>
                </div>
            </header>

            <section class="about-section my-6 px-4">
                <div class="container">
                    <h2 class="text-2xl font-semibold mb-4 text-green-800">Sobre Nós</h2>
                    <p class="mb-6">Bem-vindo ao Green IT! Fundado em 2023, o Green IT surgiu da necessidade de promover um setor de tecnologia mais sustentável e consciente.</p>
                    <img src="{{ asset('images/imagem.jpg') }}" width="300" height="200" style="display: block; margin: auto;">
                    
                    <h2 class="text-2xl font-semibold mb-4 text-green-800">Nossa Missão</h2>
                    <p class="mb-6">No Green IT, acreditamos que a tecnologia pode ser parte da solução para os desafios ambientais. Nossa missão é conscientizar sobre a importância da TI Verde, promovendo práticas que reduzem o consumo de energia e aumentam a eficiência nos recursos tecnológicos.</p>

                    <h2 class="text-2xl font-semibold mb-4 text-green-800">Nossa História</h2>
                    <p class="mb-6">O Green IT começou como um projeto na disciplina de Desenvolvimento Sustentável na Engenharia, apresentado pelo professor Rafael Souza de Faria. Nosso objetivo é conscientizar os profissionais da área de TI sobre como eles podem ajudar a tornar a tecnologia mais sustentável.</p>

                    <h2 class="text-2xl font-semibold mb-4 text-green-800">Nossos Valores</h2>
                    <ul class="list-disc list-inside space-y-2">
                        <li><strong>Sustentabilidade:</strong> Promovemos práticas que preservam o meio ambiente e garantem um uso responsável dos recursos tecnológicos.</li>
                        <li><strong>Consciência:</strong> Incentivamos a conscientização sobre o impacto ambiental do setor de TI.</li>
                        <li><strong>Inovação:</strong> Acreditamos que a tecnologia pode transformar o mundo em um lugar mais sustentável.</li>
                    </ul>

                    <h2 class="text-2xl font-semibold mb-4 mt-6 text-green-800">Junte-se a Nós!</h2>
                    <p>Convidamos você a nos acompanhar nessa jornada em busca de um futuro mais sustentável para a tecnologia. Fique à vontade para explorar nossos artigos e aprender sobre como a TI Verde pode beneficiar o planeta e sua organização.</p>

                    <p class="mt-6"><strong>A equipe Green IT</strong></p>
                </div>
            </section>
        </article>
    </section>
</x-guest-layout>
