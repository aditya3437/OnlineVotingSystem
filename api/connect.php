<?php

define("HOSTNAME", "localhost:3307");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "voting");

// Establishing a connection to the database
$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

// Checking if the connection was successful
if (!$conn) {
    die("Couldn't connect to database: " . mysqli_connect_error());
} 
else{
  echo "connection successful";
}

?>