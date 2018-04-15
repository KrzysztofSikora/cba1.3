



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>


    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgbGJPg4C2xdOVxfRWiriJsbW1gNqanfE">
    </script>
</head>


<body>







<script>




    console.log("n",navigator.geolocation.getCurrentPosition(function(position) {

                // Get the coordinates of the current possition.
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;


                alert("lat", lat);
                console.log("lat, lng", lat, lng);

        }));




</script>

</body>
</html>