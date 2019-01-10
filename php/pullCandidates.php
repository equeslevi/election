<?php

require_once('config.php');

$query = "SELECT * FROM candidates";

$response = @mysqli_query($db, $query);

if ($response) {
	$temp = 0;
	while($row = mysqli_fetch_array($response)){
		$temp = $temp + 1;
		$candNo[$temp] = $row['candidateNo'];
		$candLName[$temp] = $row['lastname'];
		$candFName[$temp] = $row['firstname'];
		$candVotes[$temp] = $row['votes'];
		$candStatus[$temp] = $row['candidateStatus'];
	}
	$candTotal = $temp;
} else {
	echo "Couldn't issue database query";
	echo mysqli_error($db);
}

?>