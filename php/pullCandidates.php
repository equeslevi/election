<?php

require_once('config.php');

$query = "SELECT * FROM candidates";

$response = @mysqli_query($db, $query);
$candData = array();
$cand = array();
if ($response) {
	$temp = 0;
	while($row = mysqli_fetch_array($response)){
		$temp++;
		$candData[] = $row;
	}
	$candTotal = $temp;
	$cand = json_encode($candData);
} else {
	echo "Couldn't issue database query";
	echo mysqli_error($db);
}

?>