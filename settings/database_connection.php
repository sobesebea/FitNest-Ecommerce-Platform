<?php
// Database credentials
require('db_cred.php');

// Creating a connection to link your database
$database_connection = mysqli_connect(Server, Username, Passwd, Database);


if (!$database_connection) {
    die("Connection failed: " . mysqli_connect_error());
} else {
   
    echo "<h1>Connected to the Database Successfully!</h1>";
    echo "<p>You are now connected to the <strong>" . Database . "</strong> database.</p>";
}

// Close the connection 
mysqli_close($database_connection);
?>