<?php

require_once('config.php');

$query = "SELECT * FROM voters";

$response = @mysqli_query($db, $query);
$donevoters = 0;
$votercount = 0;
if ($response) {
	while($row = mysqli_fetch_array($response)){
		$votercount = $votercount +1;
		echo '<tr><td align="left" class="text-center">' . 
			$row['voterId'] . '</td><td align="left" class="text-center">' .
			$row['voterLName'] . '</td><td align="left" class="text-center">' . 
			$row['voterFName'] . '</td><td align="left" class="text-center">'; 
		if ($row['voterVoted'] == 1 ) {
			echo 'YES';
			$donevoters = $donevoters +1;
		}
		echo '</td><td align="left" class="text-center">' .
			$row['voterDate'] . '</td><td align="left" class="text-center">' .
			$row['votes'] . '</td></tr>';

	}
} else {
	echo "Couldn't issue database query";
	echo mysqli_error($db);
}

?>