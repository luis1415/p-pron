<div id="map"></div>
<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: {lat: 6.28333, lng: -75.555}
        });

        // se crea una lista con ls kmls
        var layers = [];

        layers[0] = new google.maps.KmlLayer({
            url: 'http://luis1415.github.io/kml/MunicipiosAreaMetropolitana.kml',
            //map: map
        });

        layers[1] = new google.maps.KmlLayer({
            url: 'http://siata.gov.co/p-operacional/DatosOperacional/Temperatura.kml',
            //map: map
        });

        var municipios = document.getElementById("municipios");
        if(municipios.checked == true){
            layers[0].setMap(map);
        }
        else{
            layers[0].setMap(null);
        }
        var temperatura = document.getElementById("temperatura");
        if(temperatura.checked == true){
            layers[1].setMap(map);
        }
        else{
            layers[1].setMap(null);
        }
    }

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJ81DevSxS9W6lah24KWD6l-nOIKuQ-NE&callback=initMap">
</script>

<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><p style="text-align: center"> KML Group 1 </p></a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse panel-footer">
            <p style="text-align: center"> Municipios del Valle <input type="checkbox" id="municipios" onclick="initMap();"/> </p>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"> <p style="text-align: center"> KML Group 2 </p></a>
            </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse panel-footer">
            <p style="text-align: center"> Temperatura <input type="checkbox" id="temperatura" onclick="initMap();"/> </p>
        </div>
    </div>
</div>
