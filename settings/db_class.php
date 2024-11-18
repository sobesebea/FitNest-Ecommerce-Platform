<?php
// Database credentials
include_once('db_cred.php');

/**
 *@author David Sampa
 *@version 1.1
 */
class db_connection
{
    // Properties
    public $db = null;

    // Constructor for database connection
    public function __construct() {
        // Connection
        $this->db = mysqli_connect(Server, Username, Passwd, Database);

        // Test the connection
        if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error());
        }
    }

    // Execute a query
    /**
     * Query the Database
     * @param string $sqlQuery
     * @return mixed
     **/
    public function db_query($sqlQuery) {
        if ($this->db === null) {
            return false;
        }

        // Run query 
        return mysqli_query($this->db, $sqlQuery);
    }

    // Other methods (db_fetch_one, db_fetch_all, etc.) can be added as needed
}
?>
