const lilooMaps = {

    lat: null,
    lng: null,
    acc: null,
    map: undefined,
    position: null,

    // Tratamento de Output
    success: function (pos) {
        let crd = pos.coords;
        lilooMaps.lat = crd.latitude
        lilooMaps.lng = crd.longitude
        lilooMaps.acc = crd.accuracy
        console.log('Sua posição atual é:')
        console.log('Latitude : ' + lilooMaps.lat)
        console.log('Longitude: ' + lilooMaps.lng)
        console.log('Mais ou menos ' + lilooMaps.acc + ' metros.')
        h2.textContent = `Latitude:${lilooMaps.lat}, Longitude:${lilooMaps.lng}`
    },

    // Tratamento de Error
    error: function (err) {
        console.warn('ERROR(' + err.code + '): ' + err.message)
    },

    // Renderiza o Map com todas as Informações
    Render: function (Obj) {

        Obj.zoomInit = !Obj.zoomInit ? 16 : Obj.zoomInit

        // Posição Inicial
        // navigator.geolocation.getCurrentPosition(
        //     lilooMaps.success,
        //     lilooMaps.error,
        //     {
        //         enableHighAccuracy: true, // Aumenta a precisão
        //         timeout: 5000 // Tempo em milesegundos para pausar a busca da localização
        //     }
        // )

        var watchID = navigator.geolocation.watchPosition(
            lilooMaps.success,
            lilooMaps.error, {
                enableHighAccuracy: true,
                timeout: 5000
            }
        )
        console.log(watchID)


        // Inicia a localização no map
        if (lilooMaps.map === undefined) {
            lilooMaps.map = L.map('location-map').setView([-1.4572002, -48.4653295], Obj.zoomInit)
        } else {
            lilooMaps.map.remove()
            lilooMaps.map = L.map('location-map').setView([-1.4572002, -48.4653295], Obj.zoomInit)
        }

        // Cria uma camada acima do map para 
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://openstreetmap.org">OpenStreetMap</a>',
            maxZoom: 20,
        }).addTo(lilooMaps.map);

        // Cria o Marcador
        var marker = L.marker([-1.4572002, -48.4653295])
            .addTo(lilooMaps.map)
            .bindPopup('<h1>Eu estou aqui</h1><p>Fdmglmfdlg</p><a href="#">Link</a>')
            .openPopup()

        // Cria uma layer em formato de circulo no Mapa
        if (Obj.circle) {
            L.circle([-1.4572002, -48.4653295],
                Obj.circle
            ).addTo(lilooMaps.map).bindPopup('<h1>Eu estou aqui</h1><p>Fdmglmfdlg</p><a href="#">Link</a>')
        }

        if (Obj.polygon) {
            L.polygon(Obj.polygon).addTo(lilooMaps.map).bindPopup('<h1>Eu estou aqui</h1><p>Fdmglmfdlg</p><a href="#">Link</a>')
        }

        if (Obj.onClick) {

        }

        //
        lilooMaps.map.on('click', lilooMaps.onMapClick)

    },

    // Ao clicar no mapa dispara esta função
    onMapClick: function (e) {
        L.popup()
            .setLatLng(e.latlng)
            .setContent("You clicked the map at " + e.latlng.toString())
            .openOn(lilooMaps.map)
    }


}


lilooMaps.Render({
    element: '#location-map',
    watch: true,
    place: true,
    zoomInit: 15,

    // Cria um Circulo com o Raio na região lat e long
    circle: {
        color: 'red', // Cor da borda
        fillColor: 'red', // Cor ao Cirdulo
        fillOpacity: 0.8, // Opacidade
        radius: 500 // Raio do circulo
    },

    // Cria um poligono com as cordenadas passadas
    polygon: [
        [-1.4591, -48.46365],
        [-1.46069, -48.462],
        [-1.45709, -48.46071]
    ],

    // Cria um marcador encima das cordenadas
    marker: {

    },

    // Ao clicar no mapa dispara um popup e aciona o retorno da função
    onClickPopup: {
        content: "Obtendo a latitude e longetude:", // Pode ser HTML
        latlng: true // Mostra a lat e lng
    }


})