<?php
$server = "localhost";
$username = "someuser";
$password = "Hello123";
$database = "testlab5";

$db = null;

try
{
    $db = new PDO("mysql:dbname=".$database.";host=".$server."",
    $username, $password);
}
catch (PDOException $e)
{
    // echo 'Message: ' .$e->getMessage();
    exit('Error: could not establish database connection');
}

// $rows = $db->query("SELECT * FROM users;");
// print_r($rows);
?>