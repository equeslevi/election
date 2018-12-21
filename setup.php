<?php

define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'election');
$db = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE)
OR die('Could not connect to MySQL ' . mysqli_connect_error());

//create database election
$sql = "CREATE DATABASE election";
if (mysqli_query($db, $sql)) {
    echo "Database created successfully";
} else {
    echo "<br>Error creating database: <br>->" . mysqli_error($db);}

// candidates list setup
$q = "SELECT * FROM candidates";
$result = mysqli_query($db, $q);

if(empty($result)) {
  echo '<p>Candidates table created</p>';
  $q = "CREATE TABLE candidates (
            candidateNo int(3) NOT NULL,
            firstname varchar(255) NOT NULL,
            lastname varchar(255) NOT NULL,
            votes int(6) NOT NULL
            )";
  $result = mysqli_query($db, $q);
  $lname = array('Rogers', 'Odinson', 'Banner', 'Romanoff', 'Rhodes', 'Wilson', 'Barnes', 'Maximoff', 'Shade', 'Quill', 'Strange', 'Parker');
  $fname = array('Steven', 'Thor', 'Robert Bruce', 'Natasha Alianovna', 'James Rupert', 'Samuel Thomas', 'James Buchanan', 'Wanda', 'Victor', 'Peter Jason', 'Stephen Vincent', 'Peter Benjamin');
  $w = count($lname) - 1;
  for ($x = 0; $x <= $w; $x++) {
      $z = $x + 1;
      $y = ($z);
      $sql = "INSERT INTO candidates (candidateNo, lastname, firstname, votes)
      VALUES ('$z', '$lname[$x]', '$fname[$x]', 0 )";
      if ($db->query($sql) === TRUE) {
          echo "-> " . $y . " created successfully</p>";
      } else {
          echo "-> Error: " . $sql . "<br>" . $db->error . "<br>";
      }
  }
} else { 
  echo "<br><br>Candidates table already existing";}

// voters list setup
$q = "SELECT * FROM voters";
$result = mysqli_query($db, $q);

if(empty($result)) {
  $q = "CREATE TABLE voters (
            voterId int(6) NOT NULL,
            voterFName varchar(255) NOT NULL,
            voterLName varchar(255) NOT NULL,
            voterVoted int(1) NOT NULL,
            voterDate datetime,
            votes varchar(255)
            )";
  $result = mysqli_query($db, $q);  
  $id = array(4601,4602,8403,5904,8505,4126,8847,1548,7539,4510,3311,2212);
  $lname = array('Rogers', 'Odinson', 'Banner', 'Romanoff', 'Rhodes', 'Wilson', 'Barnes', 'Maximoff', 'Shade', 'Quill', 'Strange', 'Parker');
  $fname = array('Steven', 'Thor', 'Robert Bruce', 'Natasha Alianovna', 'James Rupert', 'Samuel Thomas', 'James Buchanan', 'Wanda', 'Victor', 'Peter Jason', 'Stephen Vincent', 'Peter Benjamin');

  $z = count($id) - 1;
  echo '<p>Voters table created</p>';
  for ($x = 0; $x <= $z; $x++) {
      $sql = "INSERT INTO voters (voterId,voterLName, voterFName) 
      VALUES ($id[$x], '$lname[$x]', '$fname[$x]')";
      if ($db->query($sql) === TRUE) {
      echo "-> Voter ID:" . $id[$x] . " created successfully<br>";
      } else {
          echo "<br>Error: " . $sql . "<br>" . $db->error;
      }
  }
} else { 
  echo "<br><br>Voters table already existing";}

  echo '
        <br>
        <br>
        <a href="admin/index.html">Return Home</a>';
?>