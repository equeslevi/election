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

	echo '</table>';
} else {
	echo "Couldn't issue database query";
	echo mysqli_error($db);
}

?>