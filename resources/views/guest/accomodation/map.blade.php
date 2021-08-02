@extends('layouts.mapLayout')
@section('content')
<div class="d-flex justify-content-center " >
    <form @submit.prevent="filterData" class="flex-wrap " id="searchForm" >
        <div class="d-flex filters-container align-items-center">
            <div class="input-search-map d-flex flex-column">
                <label for="city" class="forma-label mb-0">Città</label>
                <input class="" type="text" placeholder="Scegli la Città" id="city" value="{{ $city['city'] }}">
            </div>
            <div class="input-search-map d-flex flex-column">
                <label for="beds" class="forma-label mb-0">Posti Letto</label>
                <input type="text" placeholder="Es. 1" id="beds" value="{{ $number_beds['number_beds'] }}">
            </div>
            <div class="input-search-map d-flex flex-column">
                <label for="rooms" class="forma-label mb-0">Stanze</label>
                <input type="text" placeholder="Es. 3" id="rooms">
            </div>
            <div class="d-flex flex-column range-styler" >
                <div>
                    <label for="range" class="forma-label mb-0"><b>Distanza:</b></label>
                    <span id="ciccio" class="">20 Km</span>
                </div>
                <input class=" p-0" type="range" id="range" name="range" min="0" max="40" step="1" list="tickmarks" />
                <datalist id="tickmarks">
                    <option value="0"></option>
                    <option value="5"></option>
                    <option value="10"></option>
                    <option value="15"></option>
                    <option value="20"></option>
                    <option value="25"></option>
                    <option value="30"></option>
                    <option value="35"></option>
                    <option value="40"></option>
                </datalist>
            </div>
            <div>
                <div id="chevron-down" class="input-search-map d-flex flex-column" style="border:none;">
                    <p style="margin-bottom: 0; transform: translateY(-1px);"><b>Servizi </b><i
                            class="fas fa-chevron-down"></i></p>
                    <p style="margin-bottom: 0px; transform: translateY(-1px);">Aggiungi Servizi</p>
                </div>
                {{-- <div class="mb-3">ciao</div> --}}
                <div id="service-list" style="display: none">
                    @foreach($services as $service)
                    <label for="{{ $service->id }}">
                        <input type="checkbox" id="{{ $service->id }}" class="services" value="{{ $service->id }}"
                            name="service">
                        {{$service->title}}
                    </label>
                    @endforeach
                </div>
            </div>
            <div>
                <i class="lens-icon fas fa-search" type="button" id="element" value="FILTRA"></i>
                {{-- <input type="reset" value="RESET" onclick="doSomethingWith(20)"/> --}}
            </div>
        </div>
    </form>
</div>
<div class="container_map" id="container_map" style="height: calc(100vh - 225px);">
    <div class='control-panel'>
        <h1 style="color: black; font-weight: 500; padding-left: 50px; padding-top: 10px">Scopri tutti gli alloggi</h1>
        <div id='store-list' style="padding-bottom: 80px"></div>
    </div>
    <div class='map' id='map' style="height:100%; width: 40%"></div>
</div>

<script>
    var serviceList = document.getElementById("service-list")
    var chevron = document.getElementById("chevron-down")
    chevron.addEventListener("click", () => {
        if (serviceList.style.display === "none") {
            serviceList.style.display = "flex"
       }  else {
        serviceList.style.display = "none"
       }
    })
    //Mappa e suoi spostamenti
     let apiKey = 'x03gOYgHS1403BuzYDLDXT3SZEhCK1sB';
                let map = tt.map({
                    key: apiKey, 
                    container: 'map', 
                    center: [42, 12],
                    zoom: 5
                 });
        let moveMap = function(lnglat) {
            map.flyTo({
                center: lnglat,
                zoom: 10
            })
        }
        let handleResults = function(result) {
            if (result.results) {
                moveMap(result.results[0].position)
            }
        }
        let search = function() {
            tt.services.fuzzySearch({
                key: apiKey,
                query: document.getElementById("city").value,
            }).go().then(handleResults)    
        }
    var searchButton = document.getElementById("searchButton")
    var mapContainer = document.getElementById("container_map")
    var formDisplay = 1
    searchButton.addEventListener("click", function () {
        var form = document.getElementById("searchForm")
        if (form.style.display === "none") {
            form.style.display = "flex"; 
        } else {
            form.style.display = "none";         
  }
    })
    var dynamicRange = document.getElementById('range');
    dynamicRange.addEventListener('input', function(event) {
        var inputValue = event.target.value;
        doSomethingWith(inputValue);
    });
    function doSomethingWith(value) {
        console.log(value)
        var myel = document.getElementById("ciccio");
        myel.innerHTML = value + " Km"
    }
    var arrayAccomodation = [];
    var el = document.getElementById('element')
    el.addEventListener('click', function() {
        clearAccomodations()
    })
    el.addEventListener('click', function() {
        clearAccomodations()
    })
    el.addEventListener('click', function() {
        callAccomodations()
    })
    el.addEventListener('click', function() {
        search()
    })
    let stores = {
        "type": "FeatureCollection"
        , "features": arrayAccomodation
    };
    window.addEventListener('load', () => {
        callAccomodations()
    })
    window.addEventListener('load', () => {
        search()
    })
    function clearAccomodations() {
        arrayAccomodation = []
        var mylength = $('[id^=banana]').length
        if (mylength > 0) {
            for (i = 0; mylength; i++) {
                var myobj = document.getElementById("banana");
                myobj.remove();
            }
        }
        myMarkerLength = $(".mapboxgl-marker-anchor-bottom").length
        for (y = 0; y < myMarkerLength; y++) {
            $(".mapboxgl-marker-anchor-bottom").remove()
        }
    }
    function callAccomodations() {
        var filteredAccomodations = []
        stores = {
            "type": "FeatureCollection"
            , "features": arrayAccomodation
        };
        var city = document.getElementById('city').value
        var beds = document.getElementById('beds').value
        var rooms = document.getElementById('rooms').value
        var range = document.getElementById('range').value
        var services = document.getElementsByClassName('services')
        var empty = [].filter.call(services, function(el) {
            return !el.checked.value
        });
        var servicesValue = []
        $.each($("input[name='service']:checked"), function() {
            servicesValue.push(parseInt($(this).val()));
        });
        axios.get("/api/accomodation/filtered", {
                params: {
                    city: city
                    , number_beds: beds
                    , number_rooms: rooms
                    , services: servicesValue
                    , range: range
                }
            })
            .then((resp) => {
                filteredAccomodations = resp.data.results;
                for (i = 0; i < filteredAccomodations.length; i++) {
                    let servicesArray = []
                    for (p=0; p < filteredAccomodations[i].services.length; p++) {
                        servicesArray.push(filteredAccomodations[i].services[p].title)
                    }
                    console.log(servicesArray)
                    arrayAccomodation.push({
                        "type": "Feature"
                        , "geometry": {
                            "type": "Point"
                            , "coordinates": [
                                filteredAccomodations[i].lon
                                , filteredAccomodations[i].lat
                            ]
                        }
                        , "properties": {
                            //Aggiungere qua 1
                            "address": filteredAccomodations[i].street_name + " " + filteredAccomodations[i].building_number + ", " + filteredAccomodations[i].zip + " " + filteredAccomodations[i].province
                            , "city": filteredAccomodations[i].city
                            , "title": filteredAccomodations[i].title
                            , "number_rooms": filteredAccomodations[i].number_rooms
                            , "placeholder": filteredAccomodations[i].placeholder,
                            "link": filteredAccomodations[i].link,
                            "number_bathrooms": filteredAccomodations[i].number_bathrooms,
                            "number_beds": filteredAccomodations[i].number_beds,
                            "services": servicesArray
                        }
                    }, )
                }
                let markersCity = [];
                let list = document.getElementById('store-list');
                stores.features.forEach(function(store, index) {
                    //Aggiungere qua 2
                    let placeholder = store.properties.placeholder;
                    let city = store.properties.city;
                    let address = store.properties.address;
                    let location = store.geometry.coordinates;
                    let title = store.properties.title;
                    let link = store.properties.link
                    let number_beds = store.properties.number_beds
                    let number_bathrooms = store.properties.number_bathrooms
                    let services = store.properties.services
                    let marker = new tt.Marker().setLngLat(location).setPopup(new tt.Popup({
                        offset: 35
                    , }).setHTML(address)).addTo(map);
                    markersCity[index] = {
                        marker
                        //Forse aggiungere qua
                        , placeholder
                        , city
                        , title,
                        number_beds,
                        number_bathrooms
                    , };
                    let cityStoresList = document.getElementById(city);
                    if (cityStoresList === null) {
                        let cityStoresListHeading = list.appendChild(document.createElement('h3'));
                        // cityStoresListHeading.innerHTML = city;
                        cityStoresList = list.appendChild(document.createElement('div'));
                        cityStoresList.id = "banana";
                        cityStoresList.className = 'list-entries-container';
                        cityStoresListHeading.addEventListener('click', function(e) {
                            map.fitBounds(getMarkersBoundsForCity(e.target.innerText), {
                                padding: 50
                            });
                        });
                    }
                    let details = buildLocation(cityStoresList, address, title);
                    marker.getElement().addEventListener('click', function() {
                        let activeItem = document.getElementsByClassName('selected');
                        if (activeItem[0]) {
                            activeItem[0].classList.remove('selected');
                        }
                        details.classList.add('selected');
                        openCityTab(city);
                    });
                    details.addEventListener('click', function() {
                        let activeItem = document.getElementsByClassName('selected');
                        if (activeItem[0]) {
                            activeItem[0].classList.remove('selected');
                        }
                        details.classList.add('selected');
                        map.easeTo({
                            center: marker.getLngLat()
                            , zoom: 12
                        });
                        closeAllPopups();
                        marker.togglePopup();
                    });
                    function buildLocation(htmlParent, text) {
                        let details = htmlParent.appendChild(document.createElement('div'));
                        details.className = 'list-entry';
                        details.innerHTML = "<img style='height: 200px; width: 300px; margin-right: 20px' src='" + placeholder + "' alt=''> " + "<div style: display: flex; flex-direction: column; width: 100%>" +  "<h3>" + title + "</h3>" + "<p>" + text + "</p>" + "<hr style='width: 50px;'>" + "<p>" + "letti: " + number_beds + " - " + "bagni: " + number_bathrooms +  "</p>" + "<p>" + services + "</p>" + "<a target='_blanc' href='" + link +  "''>" + "Visualizza" +  "</a>" + "</div>";
                        return details;
                    }
                    function closeAllPopups() {
                        markersCity.forEach(markerCity => {
                            if (markerCity.marker.getPopup().isOpen()) {
                                markerCity.marker.togglePopup();
                            }
                        });
                    }
                    function getMarkersBoundsForCity(city) {
                        let bounds = new tt.LngLatBounds();
                        markersCity.forEach(markerCity => {
                            if (markerCity.city === city) {
                                bounds.extend(markerCity.marker.getLngLat());
                            }
                        });
                        return bounds;
                    }
                    function openCityTab(selected_id) {
                        let storeListElement = $('#store-list');
                        let citiesListDiv = storeListElement.find('div.list-entries-container');
                        for (let activeCityIndex = 0; activeCityIndex < citiesListDiv.length; activeCityIndex++) {
                            if (citiesListDiv[activeCityIndex].id === selected_id) {
                                storeListElement.accordion('option', {
                                    'active': activeCityIndex
                                });
                            }
                        }
                    }
                });
            })
    }
</script>
@endsection