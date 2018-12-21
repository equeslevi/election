
<?php
session_start();
require_once('config.php');
$voterid = "";
$errors = array(); 

if (isset($_POST['voterID'])) {
  $voterid = mysqli_real_escape_string($db, $_POST['voterID']);

  if (empty($voterid)) {
  	$_SESSION['msg'] = "Voter's ID required!";
    header("location: ../v/vote.html");
  } else { 
    $query = "SELECT * FROM voters WHERE voterId='$voterid'";
  	$results = mysqli_query($db, $query);

  	if (mysqli_num_rows($results) == 1) {
      
      $query = "SELECT * FROM voters WHERE voterId='$voterid' AND voterVoted='0'";
      $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
      	  $_SESSION['voterid'] = $voterid;
      	  unset($_SESSION['msg']);
      	  header("location: ../v/voting.html");
        }else {
          $_SESSION['msg'] = "Voter ID has been used";
          header("location: ../v/vote.html");
        }


  	}else {
  		$_SESSION['msg'] = "Invalid Voter's ID!";
      header("location: ../v/vote.html");
  	} 
  }
} 

if (isset($_SESSION['msg'])) {
  echo '<h1 style="    
    height: 50px;
    width: 100%;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #ff3d3d;
    overflow-x: hidden;
    text-align: center">' . $_SESSION['msg'] . '</h1><br><hr>' ;
}

?>