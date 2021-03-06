<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Google Map API</title>
</head>
<body>

<div id="js-map-container"></div>

<script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>

<script src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>
<script type="application/javascript">


    $(window).ready(function(e){
        initialize();
    });

    function initialize() {
        var mapOptions = {
            center: new google.maps.LatLng(13.0900, 80.2700),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('js-map-container'), mapOptions);
        map.setZoom(10);
    }

    function addMarker(i, lat, lng, img, name, price) {
        if (lat != null && lng != null) {
            myLatLng = new google.maps.LatLng(lat, lng);
            bounds = new google.maps.LatLngBounds();
            var imageUrl = base_url+ 'marker.png';
            var markerImage = new google.maps.MarkerImage(imageUrl);
            eval('var marker' + i + ' = new google.maps.Marker({ position: myLatLng,  map: map, icon: markerImage, zIndex: i});');
            var marker_obj = eval('marker' + i);
            bounds.extend(marker_obj.position);
            markersArray.push(eval('marker' + i));
            marker_obj.title = name;
            var li_obj = '.js-map-num' + i;
            image = '';
            if(img != ''){
                image = '<img src="'+base_url+'images/'+img+'" class="img-responsive img-thumbnail" />';
            }
            var content = '<div class="">'+image+'<h4>' + name + '</h4><h4><span class="label label-danger"> $'+ price +'</span></h4></div>';
            eval('var infowindow' + i + ' = new google.maps.InfoWindow({ content: content,  maxWidth: 370});');
            var infowindow_obj = eval('infowindow' + i);
            var marker_obj = eval('marker' + i);
            google.maps.event.addListener(marker_obj, 'click', function () {
                infowindow_obj.open(map, marker_obj);
            });
        }
    }

    $.getJSON('properties.php',function(data){
        if(data.success == true) {
            if(data.data.length > 0){
                $.each(data.data,function(index, value){
                    lat = data.data[index].latitude;
                    i = data.data[index].id;
                    lng = data.data[index].longitude;
                    name = data.data[index].name;
                    image = data.data[index].image;
                    price = data.data[index].price;
                    addMarker(i, lat, lng,image, name, price);
                    i++;
                });
            }
        }
    });

</script>
</body>
</html>