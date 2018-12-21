 <?php  
 //insert.php  
session_start(); 

  if (!isset($_SESSION['voterid'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../v/vote.html');
  }
  if (isset($_SESSION['logout'])) {
  	session_destroy();
  	unset($_SESSION['voterid']);
  	header('location: ../v/vote.html');
  }
  
  require_once('config.php');
 $votelist = $_POST["votelist"];
 $loggedid = $_SESSION['voterid'];
 if(isset($_POST["cand1"]))  
 {  
    $cand1 = mysqli_real_escape_string($db, $_POST["cand1"]);
    if(isset($_POST["cand2"])){$cand2 = mysqli_real_escape_string($db, $_POST["cand2"]);}
    if(isset($_POST["cand3"])){$cand3 = mysqli_real_escape_string($db, $_POST["cand3"]);}
    if(isset($_POST["cand4"])){$cand4 = mysqli_real_escape_string($db, $_POST["cand4"]);}
    if(isset($_POST["cand5"])){$cand5 = mysqli_real_escape_string($db, $_POST["cand5"]);}
    if(isset($_POST["cand6"])){$cand6 = mysqli_real_escape_string($db, $_POST["cand6"]);}
    if(isset($_POST["cand7"])){$cand7 = mysqli_real_escape_string($db, $_POST["cand7"]);}
    if(isset($_POST["cand8"])){$cand8 = mysqli_real_escape_string($db, $_POST["cand8"]);}
    if(isset($_POST["cand9"])){$cand9 = mysqli_real_escape_string($db, $_POST["cand9"]);}
    if(isset($_POST["cand10"])){$cand10 = mysqli_real_escape_string($db, $_POST["cand10"]);}
	if(isset($_POST["cand11"])){$cand11 = mysqli_real_escape_string($db, $_POST["cand11"]);}
	if(isset($_POST["cand12"])){$cand12 = mysqli_real_escape_string($db, $_POST["cand12"]);}
	if(isset($_POST["cand13"])){$cand13 = mysqli_real_escape_string($db, $_POST["cand13"]);}
	if(isset($_POST["cand14"])){$cand14 = mysqli_real_escape_string($db, $_POST["cand14"]);}
	if(isset($_POST["cand15"])){$cand15 = mysqli_real_escape_string($db, $_POST["cand15"]);}
	if(isset($_POST["cand16"])){$cand16 = mysqli_real_escape_string($db, $_POST["cand16"]);}
	if(isset($_POST["cand17"])){$cand17 = mysqli_real_escape_string($db, $_POST["cand17"]);}
	if(isset($_POST["cand18"])){$cand18 = mysqli_real_escape_string($db, $_POST["cand18"]);}
	if(isset($_POST["cand19"])){$cand19 = mysqli_real_escape_string($db, $_POST["cand19"]);}
	if(isset($_POST["cand20"])){$cand20 = mysqli_real_escape_string($db, $_POST["cand20"]);}


	$q = "SELECT * FROM candidates";
	$result = mysqli_query($db, $q);
	if(empty($result)) {
		echo "ERROR: NO CANDIDATES FOUND";		  
	} else { 
		if ($result) {
			while($row = mysqli_fetch_array($result)){
				if ($row['candidateNo'] == 1) { $current1 = $row['votes']; $final1 = $current1 + $cand1;}
				if ($row['candidateNo'] == 2) { $current2 = $row['votes']; $final2 = $current2 + $cand2;}
				if ($row['candidateNo'] == 3) { $current3 = $row['votes']; $final3 = $current3 + $cand3;}
				if ($row['candidateNo'] == 4) { $current4 = $row['votes']; $final4 = $current4 + $cand4;}
				if ($row['candidateNo'] == 5) { $current5 = $row['votes']; $final5 = $current5 + $cand5;}
				if ($row['candidateNo'] == 6) { $current6 = $row['votes']; $final6 = $current6 + $cand6;}
				if ($row['candidateNo'] == 7) { $current7 = $row['votes']; $final7 = $current7 + $cand7;}
				if ($row['candidateNo'] == 8) { $current8 = $row['votes']; $final8 = $current8 + $cand8;}
				if ($row['candidateNo'] == 9) { $current9 = $row['votes']; $final9 = $current9 + $cand9;}
				if ($row['candidateNo'] == 10) { $current10 = $row['votes']; $final10 = $current10 + $cand10;}
				if ($row['candidateNo'] == 11) { $current11 = $row['votes']; $final11 = $current11 + $cand11;}
				if ($row['candidateNo'] == 12) { $current12 = $row['votes']; $final12 = $current12 + $cand12;}
				if ($row['candidateNo'] == 13) { $current13 = $row['votes']; $final13 = $current13 + $cand13;}
				if ($row['candidateNo'] == 14) { $current14 = $row['votes']; $final14 = $current14 + $cand14;}
				if ($row['candidateNo'] == 15) { $current15 = $row['votes']; $final15 = $current15 + $cand15;}
				if ($row['candidateNo'] == 16) { $current16 = $row['votes']; $final16 = $current16 + $cand16;}
				if ($row['candidateNo'] == 17) { $current17 = $row['votes']; $final17 = $current17 + $cand17;}
				if ($row['candidateNo'] == 18) { $current18 = $row['votes']; $final18 = $current18 + $cand18;}
				if ($row['candidateNo'] == 19) { $current19 = $row['votes']; $final19 = $current19 + $cand19;}
				if ($row['candidateNo'] == 20) { $current20 = $row['votes']; $final20 = $current20 + $cand20;}
			}
		}
	}

	// 1
	$q = "UPDATE candidates SET votes=$final1 WHERE candidateNo=1";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Candidate 1 updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}
	// 2
	$q = "UPDATE candidates SET votes=$final2 WHERE candidateNo=2";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Candidate 2 updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}
	// 3
	$q = "UPDATE candidates SET votes=$final3 WHERE candidateNo=3";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Candidate 3 updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}
	// 4
	$q = "UPDATE candidates SET votes=$final4 WHERE candidateNo=4";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Candidate 4 updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}
	// 5
	$q = "UPDATE candidates SET votes=$final5 WHERE candidateNo=5";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Candidate 5 updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}
	// 6
	$q = "UPDATE candidates SET votes=$final6 WHERE candidateNo=6";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Candidate 6 updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}
	// 7
	$q = "UPDATE candidates SET votes=$final7 WHERE candidateNo=7";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Candidate 7 updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}
	// 8
	$q = "UPDATE candidates SET votes=$final8 WHERE candidateNo=8";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Candidate 8 updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}
	// 9
	$q = "UPDATE candidates SET votes=$final9 WHERE candidateNo=9";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Candidate 9 updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}
	// 10
	$q = "UPDATE candidates SET votes=$final10 WHERE candidateNo=10";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Candidate 10 updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}
	// 11
	$q = "UPDATE candidates SET votes=$final11 WHERE candidateNo=11";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Candidate 11 updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}
	// 12
	$q = "UPDATE candidates SET votes=$final12 WHERE candidateNo=12";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Candidate 12 updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}
	// 13
	$q = "UPDATE candidates SET votes=$final13 WHERE candidateNo=13";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Candidate 13 updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}
	// 14
	$q = "UPDATE candidates SET votes=$final14 WHERE candidateNo=14";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Candidate 14 updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}
	// 15
	$q = "UPDATE candidates SET votes=$final15 WHERE candidateNo=15";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Candidate 15 updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}
	// 16
	$q = "UPDATE candidates SET votes=$final16 WHERE candidateNo=16";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Candidate 16 updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}
	// 17
	$q = "UPDATE candidates SET votes=$final17 WHERE candidateNo=17";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Candidate 17 updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}
	// 18
	$q = "UPDATE candidates SET votes=$final18 WHERE candidateNo=18";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Candidate 18 updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}
	// 19
	$q = "UPDATE candidates SET votes=$final19 WHERE candidateNo=19";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Candidate 19 updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}
	// 20
	$q = "UPDATE candidates SET votes=$final20 WHERE candidateNo=20";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Candidate 20 updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}


//for update of votervoted
$q = "UPDATE voters SET voterVoted=1 WHERE voterId='$loggedid' ";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Updated VoterVoted";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}
//for update of voterDate
$q = "UPDATE voters SET voterDate=NOW() WHERE voterId='$loggedid' ";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Updated voterDate";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}
//for update of votes
$q = "UPDATE voters SET votes='$votelist' WHERE voterId='$loggedid' ";
	$result = mysqli_query($db, $q);
	if ($result) {
	    echo "Updated votes";
	} else {
	    echo "Error updating record: " . mysqli_error($db);
	}



 }  

?>  