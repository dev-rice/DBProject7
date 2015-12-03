<?php
$code = $_GET['code'];
$ext = $_GET['ext'];

$user="crice";
$password="password";

$dbconn = pg_connect("host=flowers.mines.edu dbname=csci403 user=$user password=$password") or die('Could not connect: ' . pg_last_error());

// Performing SQL query
$query = "SELECT geo_lon, geo_lat FROM crime WHERE offense_code=$code";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

echo "{\n";
echo "\"locations\":[\n";
$locations_str = "";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    $latitude = $line["geo_lat"];
    $longitude = $line["geo_lon"];
    $locations_str = $locations_str . "\t{\"latitude\":$latitude, \"longitude\":$longitude},";
}
$locations_str = trim($locations_str, ",");
echo $locations_str;
echo "]\n";
echo "}";


// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);

?>
