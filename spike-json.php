<?php

header('Content-type: application/json');
include 'credentials.php';

$con = mysql_connect($hostname, $username, $password) or die('Cannot connect to DB'.mysql_error());

mysql_select_db($dbname,$con) or die('Cannot select the DB');

$query = "select event_main.event_id, name, gname, start_date, end_date, princess, prince, queen, king, highness, royal, mic_sname, mol_sname, armored, rapier, archery, combat_archery, thrown, equestrian, hound, youth, siege from event_main, activities where publish = 1 and event_main.event_id = activities.event_id order by end_date;";

$sth = mysql_query($query);
echo "[\n";

$to_fix = array("princess", "prince", "queen", "king", "highness", "royal", "armored", "rapier", "archery", "combat_archery", "thrown", "equestrian", "hound", "youth", "siege");

// json_encode uses more memory than the webhost allows.  As such, we're
// partially encoding by hand.
$first = true;
while($r = mysql_fetch_assoc($sth)) {
	foreach ($to_fix as &$value) {
		if ($r[$value] == "0") {
			$r[$value] = false;
		} 
		if ($r[$value] == "1") {
			$r[$value] = true;
		} 
		if ($r[$value] == NULL) {
			$r[$value] = false;
		}
	}
	if ($first) { $first = false; } else { echo ",\n";}
	echo json_encode($r, JSON_PRETTY_PRINT);
}
echo "\n]\n";
?>
