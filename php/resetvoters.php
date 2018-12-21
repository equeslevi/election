	 <?php  
  require_once('config.php');

	$q = "UPDATE voters SET voterVoted=0";
	$result = mysqli_query($db, $q);

	$q = "UPDATE voters SET voterDate=NULL";
	$result = mysqli_query($db, $q);

		$q = "UPDATE voters SET votes=NULL";
	$result = mysqli_query($db, $q);

header("location: ../v/voterlist.html");

?>  