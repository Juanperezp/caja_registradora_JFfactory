@extends('adminlte::master')

@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop
    
@section('classes_body'){{ ($auth_type ?? 'login') . '-page' }}@stop
@section('body')

<br> 
<div class="container">
        <img src="{{asset('/images/logo.png')}}"width="250px" alt="">
<br> 

<div class="row">

<div class="col-md-12">

{{-- Card Box --}}
<div class="card {{ config('adminlte.classes_auth_card', 'card-outline card-primary') }}"
        style="box-shadow: 5px 0px 5px 0px #cccccc">
   
        <div class="card-header {{ config('adminlte.classes_auth_header', '') }}">
            <h3 class="card-title float-none text-center">
              <b> Registro de una nueva empresa </b>
            </h3>
        </div>
   
    {{-- Card Body --}}
    <div class="card-body {{ $auth_type ?? 'login' }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
      <form action="">
        <div class="row">
            <div class="col-md-3">
               <div class="form-group">
                <label for="logo">logo</label>
                <input type="file" id="file" name="logo" class="form-control">
                <br>
                <center><output id="list"></output></center>
                <script>
                    function archivo(evt) {
                        var files = evt.target.files; // Obtenemos la lista de archivos
                        // Recorremos los archivos seleccionados
                        for (var i = 0, f; f = files[i]; i++) {
                            // Solo admitimos imágenes
                            if (!f.type.match('image.*')) {
                                continue;
                            }
                            var reader = new FileReader();
                            reader.onload = (function (theFile) {
                                return function (e) {
                                    // Insertamos la imagen en el contenedor con el id "list"
                                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="70%" title="', escape(theFile.name), '"/>'].join('');
                                };
                            })(f);
                            reader.readAsDataURL(f); // Leemos el archivo como URL de datos
                        }
                    }
                
                    document.getElementById('file').addEventListener('change', archivo, false); // Añadimos el evento al input
                </script>
                
               </div>
            </div>
            <div class="col-md-9">
               <div class="row">
                <div class="col-md-4">
                    <div class="form-group">

                        <label for="pais">País</label>
                     <select name="" id="select_pais" class="form-control">
                        @foreach($paises as $paise)
                       <option value="{{$paise->id}}">{{$paise->name}}</option>
                        @endforeach
                     </select>
                   


                 </div>
                </div>
                <div class="col-md-4">

                    <div class="form-group">

                        <label for="departamentos">Estado/Provincia/Región</label>
                        <div id="respuesta_pais">

                        </div>
                 </div>
                </div>
                
                
                
                <div class="col-md-4">
                    <div class="form-group">

                        <label for="nombre_empresa">Nombre de la Empresa</label>
                     <input type="text" class="form-control">

            

                    </div>

                </div>
                <div class="col-md-4">

                    <div class="form-group">

                        <label for="nombre_empresa">Tipo  de la Empresa</label>
                     <input type="text" class="form-control">
                 </div>
                </div>
               </div>
               <div class="row">
                <div class="col-md-4">
                    <div class="form-group">

                        <label for="nit">Nit</label>
                     <input type="text" class='form-control'>
                   
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">

                        <label for="telefono">Telefonos de la Empresa</label>
                     <input type="text" class="form-control">

            

                    </div>

                </div>
                <div class="col-md-4">

                    <div class="form-group">

                        <label for="email">Email de la Empresa</label>
                     <input type="email" class="form-control">
                 </div>
                </div>
               </div>

               <div class="row">
                <div class="col-md-4">
                    <div class="form-group">

                        <label for="cantidad_impuesto">Cantidad de Impuesto</label>
                     <input type="number" class='form-control'>
                   
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">

                        <label for="nombre_impuesto">Nombre del Impuesto</label>
                     <input type="text" class="form-control">

            

                    </div>

                </div>
                <div class="col-md-4">

                    <div class="form-group">

                        <label for="moneda">Moneda</label>
                        <select name="" id="" class="form-control">
                            @foreach($monedas as $moneda) 
                           <option value="{{$moneda->symbol}}">{{$moneda->symbol}}</option>
                            @endforeach
                         </select>

                 </div>
                </div>
               </div>

               <hr>
               

                  <div class="row">
                <div class="col-md-4">
                    <div class="form-group">

                        <label for="direccion">Dirección de la Empresa</label>
                        <input id="pac-input" class="form-control" name="direccion" type="text" placeholder="Buscar..." required>
                        <br>
                        <div id="map" style="width: 100%;height: 400px"></div>
                   
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">

                        <label for="ciudad">Ciudad</label>
                        <select name="" id="" class="form-control">
                           
                         </select>

            

                    </div>

                </div>
                
               </div>
               <div class="row">
                <div class="col-md-4">
                    <div class="form-group" style="margin-top: 40%;">
                        <label for="codigo_postal">Código Postal</label>
                        <select name="codigo_postal" id="codigo_postal" class="form-control">
                            @foreach($paises as $paise)
                            <option value="{{ $paise->phone_code }}">{{ $paise->phone_code }}</option>
                            @endforeach
                        </select>
                    </div>
                
               </div>
                
            </div>
        </div>
      </form>
    </div>

    {{-- Card Footer --}}
    @hasSection('auth_footer')
        <div class="card-footer {{ config('adminlte.classes_auth_footer', '') }}">
            @yield('auth_footer')
        </div>
    @endif

</div>

</div>
</div>

</div>


@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')

<script src="https://maps.googleapis.com/maps/api/js?key={{env('MAP_KEY')}}&libraries=places&callback=initAutocomplete"
        async defer></script>
        
        <script>
            // This example adds a search box to a map, using the Google Place Autocomplete
            // feature. People can enter geographical searches. The search box will return a
            // pick list containing a mix of places and predicted search terms.
        
            // This example requires the Places library. Include the libraries=places
            // parameter when you first load the API. For example:
            // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
        
            function initAutocomplete() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    // Coordenadas de Monterrey, N.L., México
                    center: {lat: 4.7110, lng:-74.0721}, 
                    zoom: 13,
                    mapTypeId: 'roadmap'
                });
        
                // Create the search box and link it to the UI element.
                var input = document.getElementById('pac-input');
                var searchBox = new google.maps.places.SearchBox(input);
                // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input); // determina la posicion
        
                // Bias the SearchBox results towards current map's viewport.
                map.addListener('bounds_changed', function() {
                    searchBox.setBounds(map.getBounds());
                });
        
                var markers = [];
                // Listen for the event fired when the user selects a prediction and retrieve
                // more details for that place.
                searchBox.addListener('places_changed', function() {
                    var places = searchBox.getPlaces();
        
                    if (places.length == 0) {
                        return;
                    }
        
                    // Clear out the old markers.
                    markers.forEach(function(marker) {
                        marker.setMap(null);
                    });
                    markers = [];
        
                    // For each place, get the icon, name and location.
                    var bounds = new google.maps.LatLngBounds();
                    /*
                     * Para fines de minimizar las adecuaciones debido a que es este una demostración de adaptación mínima de código, se reemplaza forEach por some.
                     */
                    // places.forEach(function(place) {
                    places.some(function(place) {
                        if (!place.geometry) {
                            console.log("Returned place contains no geometry");
                            return;
                        }
                        var icon = {
                            url: place.icon,
                            size: new google.maps.Size(71, 71),
                            origin: new google.maps.Point(0, 0),
                            anchor: new google.maps.Point(17, 34),
                            scaledSize: new google.maps.Size(25, 25)
                        };
        
                        // Create a marker for each place.
                        markers.push(new google.maps.Marker({
                            map: map,
                            icon: icon,
                            title: place.name,
                            position: place.geometry.location
                        }));
        
                        if (place.geometry.viewport) {
                            // Only geocodes have viewport.
                            bounds.union(place.geometry.viewport);
                        } else {
                            bounds.extend(place.geometry.location);
                        }
                        // some interrumpe su ejecución en cuanto devuelve un valor verdadero (true)
                        return true;
                    });
                    map.fitBounds(bounds);
                });
            }
        </script>
        <script>
          $('#select_pais').on('change', function(){
    var id_pais = $('#select_pais').val();
    
    if(id_pais){
        $.ajax({
            url: "{{ url('/crear-empresa/') }}/"+id_pais,
            type: "GET",
            success: function(data) {
                $('#respuesta_pais').html(data);
            }
        });
    } else {
        alert('Por favor selecciona un país');
    }
});

</script>
<script>
    $(document).on('change', '#select_estado',functio() {

        var id_estado = $(this).val();
        alert(id_estado)
    });

</script>

@stop
