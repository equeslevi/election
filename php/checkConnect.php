<?php

require_once('config.php');

$query = "SELECT * FROM settings";

$response = @mysqli_query($db, $query);

if ($response) {
	header("location: ../v/vote.html");
 } else {
	header("location: ../error.html");
}

?>