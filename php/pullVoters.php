<?php

require_once('config.php');

$query = "SELECT * FROM voters";

$response = @mysqli_query($db, $query);
$voterData = array();
$voter = array();
$donevoters = 0;
if ($response) {
	$temp = 0;
	while($row = mysqli_fetch_array($response)){
		$temp++;
		if ($row['voterVoted'] == 1 ) {
			echo 'YES';
			$donevoters = $donevoters +1;
		}
		$voterData[] = $row;

	}
	$voterTotal = $temp;
	$voter = json_encode($voterData);
} else {
	echo "Couldn't issue database query";
	echo mysqli_error($db);
}

?>