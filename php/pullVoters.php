<?php

require_once('config.php');

$query = "SELECT * FROM voters";

$response = @mysqli_query($db, $query);
$voterData = array();
$voter = array();
if ($response) {
	$temp = 0;
	while($row = mysqli_fetch_array($response)){
		$temp++;
		$voterData[] = $row;
		// $voterNo[$temp] = $row['voterId'];
		// $voterLName[$temp] = $row['voterLName'];
		// $voterFName[$temp] = $row['voterFName'];
		// $voterDone[$temp] = $row['voterVoted'];
		// $voterVoteDate[$temp] = $row['voterDate'];
		// $voterVotes[$temp] = $row['votes'];
	}
	$voterTotal = $temp;
	$voter = json_encode($voterData);
} else {
	echo "Couldn't issue database query";
	echo mysqli_error($db);
}

?>