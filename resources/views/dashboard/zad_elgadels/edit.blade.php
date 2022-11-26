@extends('layouts.dashboard.master')

@section('page_header')
<h5 class="text-dark font-weight-bold my-1 mr-5">@lang('dashboard.zad_elgadels')</h5>
<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
    <li class="breadcrumb-item text-muted">
        <a href="/" class="text-muted">@lang('dashboard.dashboard')</a>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{url('dashboard/zad_elgadels')}}" class="text-muted">@lang('dashboard.zad_elgadels')</a>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="javascript:;" class="text-muted">{{$title}}</a>
    </li>
</ul>
@endsection
@push('js')
<script>
    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    var map2 , myLatLng , cityCircle , x={{old('distance' , $data->distance ?? 100)}}

    function initMap() {
        myLatLng = {
            lat: {{old("lat" , $data->lat) ?? '24.774265'}},
            lng: {{old("long" , $data->long) ?? '46.738586'}}
        };
        var map = new google.maps.Map(document.getElementById('googleMap'), {
            center: myLatLng,
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP,

        });
        var input = document.getElementById('pac-input');

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            draggable: true,
        });

         /******************************* */
         map2 = new google.maps.Map(document.getElementById('googleMapRelated'), {
            center: myLatLng,
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP,

        });

        var marker2 = new google.maps.Marker({
            position: myLatLng,
            map: map2,
            draggable: false,
        });

        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            marker2.setVisible(false);
            var place = autocomplete.getPlace();

            if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
                map2.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(12); // Why 17? Because it looks good.

                map2.setCenter(place.geometry.location);
                map2.setZoom(12);
            }
            marker.setIcon( /** @type {google.maps.Icon} */ ({
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(35, 35)
            }));
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            marker2.setIcon( /** @type {google.maps.Icon} */ ({
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(35, 35)
            }));
            marker2.setPosition(place.geometry.location);
            marker2.setVisible(true);
            
            var item_Lat = place.geometry.location.lat()
            var item_Lng = place.geometry.location.lng()
            var item_Location = place.formatted_address;


            //alert("Lat= "+item_Lat+"__Lang="+item_Lng+"__Location="+item_Location);
            $("#lat").val(item_Lat);
            $("#lng").val(item_Lng);
            $("#location").val(item_Location);

            google.maps.event.addListener(marker, 'dragend', function(evt) {
                document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
                item_Lat = evt.latLng.lat().toFixed(3);
                item_Lng = evt.latLng.lng().toFixed(3);
                item_Location = place.formatted_address;
                $("#lat").val(item_Lat);
                $("#lng").val(item_Lng);
                $("#pac-input").val(item_Location);

            });

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }

            infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address + '</div>');
            infowindow.open(map, marker);

            myLatLng = {lat:item_Lat,lng:item_Lng}
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
            var radioButton = document.getElementById(id);
            radioButton.addEventListener('click', function() {
                autocomplete.setTypes(types);
            });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);
    }

    
    function removeCircle()
    {
        if (cityCircle && cityCircle.setMap) {
            cityCircle.setMap(null);
        }
        $('#distance').val(null)
    }
  
    function drawOnclick(x = 100) {
            removeCircle();
            cityCircle = new google.maps.Circle({
                strokeColor: "#FF0000",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#FF0000",
                fillOpacity: 0.35,
                map: map2,
                center: myLatLng,
                // radius: 1000 * 100
                radius: x ,  // 10 miles in metres,
            });
            map2.fitBounds(cityCircle.getBounds());
            $('#distance').val(x)
    }
    
    function changeRadius(r){
        x =x +r;
        $('#distance').val(x)
        cityCircle.setRadius(x);
    }

</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBxzlvlX_3nEJk0sdxyS9Y4MT-nw-kPsQ&libraries=places&callback=initMap" async defer>

</script>
<script>
    $(document).ready(function() {
        @if($data->distance > 0)
        drawOnclick({{$data->distance}});
        @endif
        $('.insertion').select2({
            tags: true
        });
    });
</script>

<script>
    var uploadedDocumentMap = {}
    Dropzone.options.dpzMultipleFiles = {
        paramName: "dzfile", // The name that will be used to transfer the file
        //autoProcessQueue: false,
        maxFilesize: 5, // MB
        clickable: true,
        addRemoveLinks: true,
        acceptedFiles: 'image/*',
        dictFallbackMessage: " المتصفح الخاص بكم لا يدعم خاصيه تعدد الصوره والسحب والافلات ",
        dictInvalidFileType: "لايمكنك رفع هذا النوع من الملفات ",
        dictCancelUpload: "الغاء الرفع ",
        dictCancelUploadConfirmation: " هل انت متاكد من الغاء رفع الملفات ؟ ",
        dictRemoveFile: "حذف الصوره",
        dictMaxFilesExceeded: "لايمكنك رفع عدد اكثر من هضا ",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }

        ,
        url: "{{ route('dashboard.SaveImg') }}",
        success: function(file, response) {
            $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
            uploadedDocumentMap[file.name] = response.name
        },
        removedfile: function(file) {
            file.previewElement.remove()
            var name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedDocumentMap[file.name]
            }
            $('form').find('input[name="images[]"][value="' + name + '"]').remove()
        },
        // previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
        init: function() {
            @if(isset($event) && $event->document)
            var files = "{!!json_encode($event->document) !!}"
            for (var i in files) {
                var file = files[i]
                this.options.addedfile.call(this, file)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="images[]" value="' + file.file_name + '">')
            }
            @endif
        }
    }
</script>

<script>
    $("#place_type").change(
        function() {
            var getSort = $("#place_type option:selected").val();

            if (getSort == 'link') {
                $('.map').css('display', 'none');
                $('#link_address').css('display', 'block');

            } else {
                $('.map').css('display', 'block');
                $('#link_address').css('display', 'none');
            }
        });
</script>
@endpush

@section('content')
<div class="d-flex flex-column-fluid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom gutter-b ">
                    <div class="card-header">
                        <h3 class="card-title">{{$title}}</h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column-fluid">
                        <div class="container-fluid ">
                            <div class="card card-custom gutter-b">

                                <div class="card-body custom-nav">
                                    <ul class="nav nav-tabs custom-nav-tabs" id="myTab1" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info">
                                                <span class="nav-icon"><i class="flaticon-users-1"></i></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="image-tab" data-toggle="tab" href="#image">
                                                <span class="nav-icon"><i class="flaticon2-image-file"></i></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="ceo-tab" data-toggle="tab" href="#ceo">
                                                <span class="nav-icon"><i class="flaticon2-setup"></i></span>
                                            </a>
                                        </li>
                                       {{-- <li class="nav-item">
                                            <a class="nav-link" id="related-tab" data-toggle="tab" href="#related">
                                                <span class="nav-icon"><i class="flaticon2-heart-rate-monitor"></i></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="related-tab" data-toggle="tab" href="#near">
                                                <span class="nav-icon"><i class="flaticon2-architecture-and-city"></i></span>
                                            </a>
                                        </li>
--}}
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">@include('dashboard.zad_elgadels.includes._global_edit')</div>
                                        <div class="tab-pane fade show" id="image" role="tabpanel" aria-labelledby="image-tab">@include('dashboard.includes.gallery._place_gallery')</div>
                                        <div class="tab-pane fade show" id="ceo" role="tabpanel" aria-labelledby="location-tab">@include('dashboard.includes.ceo._global_ceo')</div>
                                       {{-- <div class="tab-pane fade show" id="related" role="tabpanel" aria-labelledby="location-tab">@include('dashboard.zad_elgadels.includes._global_related')</div>
                                        <div class="tab-pane fade show" id="near" role="tabpanel" aria-labelledby="location-tab">@include('dashboard.zad_elgadels.includes._global_near')</div>
                                    --}}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection