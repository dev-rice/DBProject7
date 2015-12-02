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
                <?php
                $user="crice";
                $password="password";

                $dbconn = pg_connect("host=flowers.mines.edu dbname=csci403 user=$user password=$password") or die('Could not connect: ' . pg_last_error());

                // Performing SQL query
                $query = 'SELECT code, type_name FROM offense_code';
                $result = pg_query($query) or die('Query failed: ' . pg_last_error());

                // Printing results in HTML
                echo "<select class=\"form-control\">\n";
                while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                    $offense_code = $line['code'];
                    $offense_name = $line['type_name'];
                    echo "\t<option value=\"$offense_code\">$offense_name</option>\n";
                }
                echo "</select>\n";

                // Free resultset
                pg_free_result($result);

                // Closing connection
                pg_close($dbconn);
                ?>
            </div>

        </div>
        <script type="text/javascript" src="maps_loader.js"/></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRIAh31ZR7A5cyxNBJCePfSvP1ZoSM9z8&callback=initMap">
        </script>
    </body>
</html>
