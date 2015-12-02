<!DOCTYPE html>
<html>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <head>
        <style type="text/css">
            html, body { height: 90%; margin: 0; padding: 0; }
            #map { height: 100%; }
            #lat-lon-input {
                width: 300px;
            }
        </style>
    </head>
    <body>
        <div id="map"></div>
        <div id="interface">
            <div class="form-group" id="lat-lon-input">
            <?php include 'populate_crimes.php';?>
            
                <button type="button" class="btn btn-default" id="add_marker">Add Marker</button>
            </div>

        </div>
        <script type="text/javascript" src="maps_loader.js"/></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRIAh31ZR7A5cyxNBJCePfSvP1ZoSM9z8&callback=initMap">
        </script>
    </body>
</html>
