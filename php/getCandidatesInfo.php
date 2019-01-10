<?php

require_once('config.php');

$query = "SELECT * FROM candidates";

$response = @mysqli_query($db, $query);

if ($response) {
	echo '<div class="vote-admin" style="font-size:30px;padding:0;margin:0;float:left;">Official Election Results';
	echo '<br>As of ' . date("d/m/Y") . ', ' . date("l") . ', ' . date("h:i:sa") . '</div><br><br><br><br>';
	while($row = mysqli_fetch_array($response)){
		echo '<tr><td align="left" class="text-center">' . 
		$row['candidateNo'] . '</td><td align="left">' .
		$row['lastname'] . '</td><td align="left">' . 
		$row['firstname'] . '</td><td align="left" class="text-center">' . 
		$row['votes'] . '</td></tr>';
	}
	$query = "SELECT * FROM voters";
		$response = @mysqli_query($db, $query);
		$donevoters = 0;
		if ($response) {
			while($row = mysqli_fetch_array($response)){
				if ($row['voterVoted'] == 1 ) {
					$donevoters = $donevoters +1;
				}
			}
			echo '<tr>
					<td></td>
					<td align="right"><b>Members Voted: </b></td>
					<td align="left"><b>&nbsp' . $donevoters . '</b></td></tr>';
		} else {
			echo "Couldn't issue database query";
			echo mysqli_error($db);
		}


	echo '</table>';
} else {
	echo "Couldn't issue database query";
	echo mysqli_error($db);
}

?>