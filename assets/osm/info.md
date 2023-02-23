# Tudo sobre Open Street Map (OSM)

Pesquisa realizada - 27/07/2022
https://tasafo.org/2017/06/12/utilizando-o-open-street-maps-em-seus-projetos/


### Bibliotecas
Biblioteca JavaScript de código aberto para mapas interativos compatíveis com dispositivos móveis.
Lambrando que essa lib suporta diversas API de Geolocalização como Google Maps, OpenStreetMap e etc.
https://leafletjs.com/


### E-book online Gratuito explicando sobre a biblioteca leaflet
https://leanpub.com/leaflet-tips-and-tricks/read

### Entendendo
Seus mapas se parecem com os de todo mundo? Você está pagando altas taxas apenas para incluir mapas em seu site? Mude para o OpenStreetMap e descubra como você pode construir belos mapas a partir dos melhores dados de mapas do mundo. Damos-lhe os dados gratuitamente; você pode fazer qualquer mapa que quiser com ele. Ou beneficie-se da experiência de quem já usa o OpenStreetMap. Hospede-o em seu hardware ou em outro lugar. Você tem controle. switch2osm.org explica como fazer a mudança – desde os primeiros princípios até as instruções técnicas.
https://switch2osm.org/

### Geocodificação de código aberto com dados do OpenStreetMap
O Nominatim usa dados do OpenStreetMap para encontrar locais na Terra por nome e endereço (geocodificação). Ele também pode fazer o inverso, encontrar um endereço para qualquer local do planeta
https://nominatim.org/

### Link para a Documentação Completa 
https://nominatim.org/release-docs/develop/

Link poderoso para fazer as verificações e teste
https://nominatim.openstreetmap.org/ui/search.html

### Empresas que utilizam e vendem planos
Empresas que utilizam o projeto OSM como Mapbox 
https://www.mapbox.com/

Obtendo LatLong 
https://www.youtube.com/watch?v=ZFge8WrnWHo


## Abstração da biblioteca
Segue abaixo o passo a passo para a implementação do mapa dinamico, todos os recuros necessários 
para criar e personalizar o mapa:

### CDN
CSS

`<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ==" crossorigin="" />`

Javascript

`<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>`

Init
```javascript
lilooMaps.Render({
    element: '#location-map',
    watch: true,
    place: true,
    zoomInit: 15,
    circle: {
        color: 'red',
        fillColor: '#000',
        fillOpacity: 0.8,
        radius: 50
    },
    etc ...
})
```

### Opções
<table class="uk-table uk-table-divider uk-card uk-card-default uk-padding">
    <thead>
        <tr>
            <th>Opção</th>
            <th>Exemplo</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <tbody>   
        <tr>
            <td>element</td>
            <td>#id-do-elemento</td>
            <td>Id do elemento HTML que deseja renderizar o mapa</td>
        </tr>
        <tr>
            <td>watch</td>
            <td>Padrão 'true'</td>
            <td>Atualiza em tempo real as mudanças de localização do dispositivo. Ideal para Mobile</td>
        </tr>
        <tr>
            <td>place</td>
            <td>Padrão 'true'</td>
            <td>Obtem o posição atual do dispositivo ao carregar</td>
        </tr>
        <tr>
            <td>zoomInit</td>
            <td>Padrão '16'</td>
            <td>Defini o zoom ao carregar o Mapa</td>
        </tr>
        <tr>
            <td>circle</td>
            <td width="150px">
                circle: {
                    <br> &nbsp;&nbsp; color: 'red',
                    <br> &nbsp;&nbsp; fillColor: '#000',
                    <br> &nbsp;&nbsp; fillOpacity: 0.8,
                    <br> &nbsp;&nbsp; radius: 50
                <br>}
            </td>
            <td>Cria um circulo com o raio na região setada. Os valores são correspondentes a: cor da borda, cor do circulo, opacidade e raio do circulo</td>
        </tr>
    </tbody>
</table>
