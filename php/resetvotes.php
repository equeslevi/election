 <?php  
  require_once('config.php');

	$q = "UPDATE candidates SET votes=0";
	$result = mysqli_query($db, $q);

header("location: ../v/candidatelist.html");

?>  