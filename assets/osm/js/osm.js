let h2 = document.querySelector('h2');
import "https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"

class lilooOSM {
    constructor(obj) {
        this.lat = obj.lat
        this.lng = obj.lng
        this.map = null
        this.zoomInit = 16      
        this.circle = obj.circle
        this.polygon = obj.polygon
        if(obj.zoomInit){
            if(obj.zoomInit > 19){
                this.zoomInit = 16
            }else{
                this.zoomInit = obj.zoomInit
            }
        }
    
        // Inicia o Mapa
        this.Map()

    }

    /**
     * Inicia o mapa utilizando leaflet
     */
    Map() {
        this.map = L.map('location-map').setView([this.lat, this.lng], this.zoomInit)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://openstreetmap.org">OpenStreetMap</a>',
            maxZoom: 20,
        }).addTo(this.map);

        L.marker([-23.96689216869079, -46.31946819114906])
            .addTo(this.map)
            .bindPopup('<h1>Eu estou aqui</h1><p><img src="./1-logotipo.png"></p><a href="#">Link</a>')
            .openPopup()

        L.marker([-23.971048912521248, -46.31723659336094])
            .addTo(this.map)
            .bindPopup('<h1>Eu estou aqui</h1><p><img src="./1-logotipo.png"></p><a href="#">Link</a>')
            .openPopup()

        // Cria uma layer em formato de circulo no Mapa
        if (this.circle) {
            L.circle([this.lat, this.lng],
                this.circle
            ).addTo(this.map).bindPopup('<h1>Eu estou aqui</h1><p><img src="./1-logotipo.png">></p><a href="#">Link</a>')
        }

        if (this.polygon) {
            L.polygon(this.polygon).addTo(this.map).bindPopup('<h1>Eu estou aqui</h1><p><img src="./1-logotipo.png">></p><a href="#">Link</a>')
        }

        function onMapClick(e) {
            L.popup()
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                .openOn(this.map)
        }
        //
        this.map.on('click', onMapClick)

    }





}

// let Map = L.map('location-map').setView([-1.4572002, -48.4653295], 17)
//         L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//             attribution: '&copy; <a href="https://openstreetmap.org">OpenStreetMap</a>',
//             maxZoom: 20,
//         }).addTo(Map);


// watchPosition
navigator.geolocation.getCurrentPosition(
    position => {
        const { latitude, longitude } = position.coords;
      
        new lilooOSM({  
            lat: latitude, 
            lng: longitude,
            zoomInit: 16,
            circle: {
                color: 'red', // Cor da borda
                fillColor: 'red', // Cor ao Cirdulo
                fillOpacity: 0.8, // Opacidade
                radius: 500 // Raio do circulo
            },
            polygon: [
                [-1.4591, -48.46365],
                [-1.46069, -48.462],
                [-1.45709, -48.46071]
            ]
        })

      },
    (err) => {
        console.warn('ERROR(' + err.code + '): ' + err.message)
    }, 
    {
        enableHighAccuracy: true,
        timeout: 50000
    }
)


// new lilooOSM({  
//     lat: -23.97011105218452, 
//     lng: -46.317196529124026,
//     zoomInit: 16,
//     circle: {
//         color: 'red', // Cor da borda
//         fillColor: 'red', // Cor ao Cirdulo
//         fillOpacity: 0.8, // Opacidade
//         radius: 500 // Raio do circulo
//     },
//     polygon: [
//         [-1.4591, -48.46365],
//         [-1.46069, -48.462],
//         [-1.45709, -48.46071]
//     ]
// })



// let watchID = navigator.geolocation.watchPosition(
//     pos =>{
//         let crd = pos.coords
//         console.log(crd)
//     },
//     err => {
//         console.warn('ERROR(' + err.code + '): ' + err.message)
//     }, 
//     {
//         enableHighAccuracy: true,
//         timeout: 50000
//     }
// )

// navigator.geolocation.watchPosition(
//     position => {
//         const { latitude, longitude } = position.coords;
//         // Show a map centered at latitude / longitude.
//       },
//     (err) => {
//         console.warn('ERROR(' + err.code + '): ' + err.message)
//     }, 
//     {
//         enableHighAccuracy: true,
//         timeout: 50000
//     }
// )





// Init


// function success(pos) {
//     console.log(pos.coords.latitude, pos.coords.longitude);
//     h2.textContent = `Latitude:${pos.coords.latitude}, Longitude:${pos.coords.longitude}`;
// }

// function error(err) {
//     console.log(err);
// }

// var watchID = navigator.geolocation.watchPosition(success, error, {
//     enableHighAccuracy: true,
//     timeout: 5000
// });

//navigator.geolocation.clearWatch(watchID);


// // Seta a localização no map
// var map = L.map('location-map').setView([-1.4572002, -48.4653295], 17);

// L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//     maxZoom: 19,
//     attribution: '© OpenStreetMap'
// }).addTo(map);

// var marker = L.marker([-1.4572002, -48.4653295]).addTo(map);
