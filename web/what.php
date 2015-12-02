<?php
$user="crice";
$password="password";

$dbconn = pg_connect("host=flowers.mines.edu dbname=csci403 user=$user password=$password") or die('Could not connect: ' . pg_last_error());

// Performing SQL query
$query = 'SELECT code, type_name FROM offense_code';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
echo "<select>\n";
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
