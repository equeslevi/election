<?php

require_once('config.php');

$query = "SELECT * FROM settings";

$response = @mysqli_query($db, $query);

if ($response) {
	while($row = mysqli_fetch_array($response)){
		$voteMax = $row['voteMax'];
		$voteMin = $row['voteMin'];
		$candidateTotal = $row['candidateTotal'];

	}
 } else {
	echo "Couldn't issue database query";
	echo mysqli_error($db);
}

?>