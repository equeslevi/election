<?php
   define('DB_HOST', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'election');
   $db = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE)
   OR die('Could not connect to MySQL ' . mysqli_connect_error());
?>