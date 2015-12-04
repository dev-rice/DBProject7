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
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #map {
            position: absolute;
            right: 0px;
            height: 100%;
            width: 80%;
        }

        #interface {
            position: absolute;
            left: 0px;
            width: 20%;
        }

        #theform {
            padding: 10px;
        }

        #show_btn {
            margin-top: 10px;
            position: absolute;
            right: 0px;
        }

        #button_and_checkboxes {
            position: relative;
            display: block;
        }

        #splitter_thing {
            height: 2px;
            background-color: rgb(128, 128, 128);
        }
    </style>
</head>

<body>
    <div id="map"></div>
    <div id="interface">
        <div class="form-group" id="theform">
            <?php include 'populate_crimes.php';?>
                <div id="button_and_checkboxes">
                    <button type="button" class="btn btn-default" id="show_btn">Show</button>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="crimes" id="crimes_check" checked>Crimes</label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="traffic_accidents" id="traffic_check" checked>Traffic Accidents</label>
                    </div>
                </div>
                <div id="splitter_thing"></div>
                <h1 id="crime_counter">0 records</h1>
        </div>

    </div>
    <script type="text/javascript" src="maps_loader.js" /></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRIAh31ZR7A5cyxNBJCePfSvP1ZoSM9z8&callback=initMap">
    </script>
</body>

</html>
