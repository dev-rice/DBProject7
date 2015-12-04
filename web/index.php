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
        }

        #button_and_checkboxes {
            position: relative;
        }

        .splitter_thing {
            height: 2px;
            margin-top: 10px;
            background-color: rgb(128, 128, 128);
        }

        h3 {
            margin-top: 0px;
        }
    </style>
</head>

<body>
    <div id="map"></div>
    <div id="interface">
        <div class="form-group" id="theform">
            <h3>Select a category</h3>
            <?php include 'populate_crimes.php';?>
                <div id="button_and_checkboxes">
                    <button type="button" class="btn btn-default" id="show_btn">Show</button>
                </div>
                <!-- <div class="splitter_thing" id="top_splitter"></div>
                <h3>Show all</h3>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="crimes" id="crimes_check">Crimes</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="traffic_accidents" id="traffic_check">Traffic Accidents</label>
                </div> -->
                <div class="splitter_thing"></div>
                <h1 id="crime_counter">0 records</h1>
        </div>

    </div>
    <script type="text/javascript" src="maps_loader.js" /></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRIAh31ZR7A5cyxNBJCePfSvP1ZoSM9z8&libraries=visualization&callback=initMap">
    </script>
</body>

</html>
