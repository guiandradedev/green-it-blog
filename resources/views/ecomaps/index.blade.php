<x-guest-layout>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <section class="w-full flex flex-col items-center px-3">
        <div id="map" style="height: 500px; width: 500px"></div>
    </section>
    <script>
        var latitude = -22.816736100125700; // Latitude de São Paulo
        var longitude = -47.09833806354330; // Longitude de São Paulo
        var map = L.map('map').setView([latitude, longitude], 13); // Define o centro do mapa
        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        console.log(map)

        
        fetch("{{ route('ecomap.list') }}") // Endpoint criado no Laravel
            .then(response => response.json())
            .then(data => {
                console.log(data); // Verificar se o retorno está correto
                data.forEach(point => {
                    L.marker([point.latitude, point.longitude])
                        .addTo(map)
                        .bindPopup(`<b>${point.name}</b><br>${point.address}`);
                });
            })
            .catch(error => {
                console.error('Erro ao carregar os pontos de coleta:', error);
            });

    </script>

</x-guest-layout>