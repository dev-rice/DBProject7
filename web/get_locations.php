<?php
ini_set('max_execution_time', 300);

$code = $_GET['code'];
$ext = $_GET['ext'];
$crimes = $_GET['crimes'];
$traffic = $_GET['traffic'];

$user="crice";
$password="password";

$dbconn = pg_connect("host=flowers.mines.edu dbname=csci403 user=$user password=$password") or die('Could not connect: ' . pg_last_error());

echo "{\n";
echo "\"locations\":[\n";
$locations_str = "";

if ($crimes == "true" || $traffic == "true") {
    if ($crimes == "true") {
        error_log("Getting all crime");
        // Performing Crime query
        $query = "SELECT geo_lon, geo_lat FROM crime";
        $result = pg_query($query) or die('Query failed: ' . pg_last_error());

        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            $latitude = $line["geo_lat"];
            $longitude = $line["geo_lon"];
            $locations_str = $locations_str . "\t{\"latitude\":$latitude, \"longitude\":$longitude},";
        }
        // Free resultset
        pg_free_result($result);
    }

    if ($traffic == "true") {
        error_log("Getting all traffic accidents");
        // Performing Traffic Query
        $query = "SELECT geo_lon, geo_lat FROM traffic_accident";
        $result = pg_query($query) or die('Query failed: ' . pg_last_error());

        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            $latitude = $line["geo_lat"];
            $longitude = $line["geo_lon"];
            $locations_str = $locations_str . "\t{\"latitude\":$latitude, \"longitude\":$longitude},";
        }
        // Free resultset
        pg_free_result($result);
    }
} else {

    // Performing Crime query
    error_log("Performing search on crime database.");
    $query = "SELECT geo_lon, geo_lat FROM crime WHERE offense_code=$code AND offense_code_ext=$ext";
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());

    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        $latitude = $line["geo_lat"];
        $longitude = $line["geo_lon"];
        $locations_str = $locations_str . "\t{\"latitude\":$latitude, \"longitude\":$longitude},";
    }
    // Free resultset
    pg_free_result($result);

    // Performing Traffic Query
    error_log("Performing search on traffic_accident database.");
    $query = "SELECT geo_lon, geo_lat FROM traffic_accident WHERE offense_code=$code AND offense_code_ext=$ext";
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());

    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        $latitude = $line["geo_lat"];
        $longitude = $line["geo_lon"];
        $locations_str = $locations_str . "\t{\"latitude\":$latitude, \"longitude\":$longitude},";
    }
    // Free resultset
    pg_free_result($result);
}

$locations_str = trim($locations_str, ",");
echo $locations_str;
echo "]\n";
echo "}";

// Closing connection
pg_close($dbconn);

?>
