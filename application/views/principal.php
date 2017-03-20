<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJ81DevSxS9W6lah24KWD6l-nOIKuQ-NE&callback=initMap">></script>
<script>
    var overlay;
    USGSOverlay.prototype = new google.maps.OverlayView();

    // Inicializa el Mapa centrado en el Valle

    function initMap(srcImage) {

        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat:6.19750 , lng: -75.5247},
            zoom: 11,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        // se crea una lista con los kmls
        var layers = [];

        // kml de municipios area metropolitana
        layers[0] = new google.maps.KmlLayer({
            url: 'http://luis1415.github.io/kml/MunicipiosAreaMetropolitana.kml',
            suppressInfoWindows: true,
            map: map
        });

        // kml de temperaturas
        layers[1] = new google.maps.KmlLayer({
            url: 'http://siata.gov.co/p-operacional/DatosOperacional/Temperatura.kml',
            suppressInfoWindows: true,
            map: map
        });

        // para cada uno de los checkbox que van al final se activa o desactiva
        //kml de municipios
        var municipios = document.getElementById("municipios");
        if(municipios.checked == true){
            layers[0].setMap(map);
        }
        else{
            layers[0].setMap(null);
        }

        // kml de temperaturas
        var temperatura = document.getElementById("temperatura");
        if(temperatura.checked == true){
            layers[1].setMap(map);
        }
        else{
            layers[1].setMap(null);
        }

        // kml de imagen de wrfout_Wind_d03
        var imagen_wrf = document.getElementById("imagen_wrf");
        if(imagen_wrf.checked == true){
            var bounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(5.00895,-76.7719),
                new google.maps.LatLng(7.40520,-74.3614)
            );

            overlay = new USGSOverlay(bounds, srcImage, map);
        }
        else{
            var bounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(5.00895,-76.7719),
                new google.maps.LatLng(7.40520,-74.3614)
            );

            overlay = new USGSOverlay(bounds, srcImage, null);
        }

    }

    function img_wrf() {
        var srcImage = 'http://siata.gov.co/data/imagenes_pronostico_wrf/20170304_0700/WRF_MP08/wrfout_Wind_d03_MP08_20170304_0700_20170305_2300.png';
        initMap(srcImage);
    }

    function municipios() {
        var srcImage = null;
        initMap(srcImage);
    }

    function temperatura() {
        var srcImage = null;
        initMap(srcImage);
    }

    /** @constructor */
    function USGSOverlay(bounds, image, map) {


        // Initialize all properties.
        this.bounds_ = bounds;
        this.image_ = image;
        this.map_ = map;



        // Define a property to hold the image's div. We'll
        // actually create this div upon receipt of the onAdd()
        // method so we'll leave it null for now.
        this.div_ = null;

        // Explicitly call setMap on this overlay.
        this.setMap(map);
    }

    /**
     * onAdd is called when the map's panes are ready and the overlay has been
     * added to the map.
     */
    USGSOverlay.prototype.onAdd = function() {

        var div = document.createElement('div');
        div.style.borderStyle = 'none';
        div.style.borderWidth = '0px';
        div.style.position = 'absolute';

        // Create the img element and attach it to the div.
        var img = document.createElement('img');
        img.src = this.image_;
        img.style.width = '100%';
        img.style.height = '100%';
        img.style.position = 'absolute';
        div.appendChild(img);

        this.div_ = div;
        this.div_.style.opacity = 0.4;

        // Add the element to the "overlayLayer" pane.
        var panes = this.getPanes();
        panes.overlayLayer.appendChild(div);
    };

    USGSOverlay.prototype.draw = function() {

        // We use the south-west and north-east
        // coordinates of the overlay to peg it to the correct position and size.
        // To do this, we need to retrieve the projection from the overlay.
        var overlayProjection = this.getProjection();

        // Retrieve the south-west and north-east coordinates of this overlay
        // in LatLngs and convert them to pixel coordinates.
        // We'll use these coordinates to resize the div.
        var sw = overlayProjection.fromLatLngToDivPixel(this.bounds_.getSouthWest());
        var ne = overlayProjection.fromLatLngToDivPixel(this.bounds_.getNorthEast());

        // Resize the image's div to fit the indicated dimensions.
        var div = this.div_;
        div.style.left = sw.x + 'px';
        div.style.top = ne.y + 'px';
        div.style.width = (ne.x - sw.x) + 'px';
        div.style.height = (sw.y - ne.y) + 'px';
    };

    // The onRemove() method will be called automatically from the API if
    // we ever set the overlay's map property to 'null'.
    USGSOverlay.prototype.onRemove = function() {
        this.div_.parentNode.removeChild(this.div_);
        this.div_ = null;
    };

    google.maps.event.addDomListener(window, 'load', initMap);
</script>

<div id="map"></div>

<!-- Grupo de Kmls -->
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><p style="text-align: center"> KML Group 1 </p></a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse panel-footer">
            <p style="text-align: center"> Municipios del Valle <input type="checkbox" id="municipios" onclick="municipios();" checked/> </p>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"> <p style="text-align: center"> KML Group 2 </p></a>
            </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse panel-footer">
            <p style="text-align: center"> Temperatura <input type="checkbox" id="temperatura" onclick="temperatura();"/> &nbsp; Imagen WRF ejemplo <input type="checkbox" id="imagen_wrf" onclick="img_wrf();"/> </p>
            <p style="text-align: center">  </p>
        </div>
    </div>

</div>
