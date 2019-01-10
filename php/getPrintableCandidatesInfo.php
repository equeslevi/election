<?php

require_once('config.php');

$query = "SELECT * FROM candidates ORDER BY votes DESC";

$response = @mysqli_query($db, $query);

if ($response) {
	echo '<div style="font-size:30px;padding:0;margin:0;float:left;">Official Election Results</div>';
	echo '<br><br>As of ' . date("d/m/Y") . ', ' . date("l") . ', ' . date("h:i:sa");
	$row_cnt = mysqli_num_rows($response);
	echo '<br> Number of Candidates: <b>' . $row_cnt . '</b><br>';
	$index = 0;
	while($row = mysqli_fetch_array($response)){
		$index = $index + 1;
 		echo '<tr class="border-2"><td align="left" class="text-center border-2">' . 
			$index . '</td><td align="left"  class="border-2 leftspace">' .
			$row['lastname'] . '</td><td align="left"  class="border-2 leftspace">' . 
			$row['firstname'] . '</td><td align="left"  class="border-2 text-center">' . 
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
					<td align="left"><b>&nbsp' . $donevoters . '</b></td>
					<td></td></tr>';
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