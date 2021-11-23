<?php
session_start (); 
?>

<!DOCTYPE>
<html lang="en"> 
<head>
    <meta charset="UTF-8" />
    <title>PHP Posts</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
<h1>Posts</h1>
    <div id="wrapper"> 
        <br><br>
        <div id="content"> 
<?php

session_regenerate_id(); 
$_SESSION['signed_in'] = false; 
$_SESSION['user_id'] = ""; 
$_SESSION['user_name'] = ""; 
$_SESSION['user_level'] = 0;

session_destroy();

echo 'You have signed out. <br>';
echo '<br><a href="index.php">Home</a><br>'; 
echo '<a href="signin.php">Sign in</a><br>';

include 'footer.php'; 
?>