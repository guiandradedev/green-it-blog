<x-guest-layout>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <section class="w-full flex flex-col items-center px-3">
        <p class="text-md text-gray-600">A logística reversa é um instrumento que se da por um conjunto de ações, visando garantir um reinserção do resíduo na cadeia produtiva e/ou dar um destinação correta para esse lixo. Pode-se citar como exemplo o lixo eletrônico que caso não haja a destinação correta, pode gerar contaminação do solo e água, incêndios e outros danos a saúde pública. No Brasil é tratada pela lei de número 12.305 de 2010, a qual deixa o manejo adequado desse tipo de resíduo com as empresas que os produzem.</p>
        @if($post)
            <p class="text-lg text-gray-600">Para saber mais sobre este tema, <a href="{{ route('post.viewPost', ['post'=>$post->slug]) }}" class="text-blue-600 font-bold">clique aqui</a></p>
        @endif
        <br>
        <p class="text-lg text-gray-600">Nesta página mostramos os principais ecopontos de Campinas e região.</p>
        <div id="map" style="height: 500px; width: 1000px"></div>
    </section>
    <script>
        var latitude = -22.833821589924444; // Latitude de São Paulo
        var longitude = -47.05196195768564; // Longitude de São Paulo
        var map = L.map('map').setView([latitude, longitude], 13); // Define o centro do mapa
        
        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; Listagem dos ecopontos',
            subdomains: 'abcd',
            maxZoom: 19
        }).addTo(map);
        
        fetch("{{ route('ecomap.list') }}") // Endpoint criado no Laravel
            .then(response => response.json())
            .then(data => {
                console.log(data); // Verificar se o retorno está correto
                data.forEach(point => {
                    L.marker([point.latitude, point.longitude])
                        .addTo(map)
                        .bindPopup(`<b>${point.name}</b><br>${point.address}, ${point.postal_code}<br>${point.city}-${point.state}<br>Funcionamento: ${point.opening_hours} as ${point.closing_hours}`);
                        // <br><br>Descrição: ${point.description}
                });
            })
            .catch(error => {
                console.error('Erro ao carregar os pontos de coleta:', error);
            });

    </script>

</x-guest-layout>