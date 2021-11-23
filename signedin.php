<?php 
session_start();
include 'connect.php';
?>


<!DOCTYPE>
<html lang="en"> 
<head>
    <meta charset="UTF-8" />
    <title>PHP Wall</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
<h1>Post Wall</h1>
    <div id="wrapper"> 
        <br><br>
        <div id="content"> 
<?php
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {
    echo 'You are already signed in.<br>';
    echo '<br><a href="index.php">Home</a><br>'; 
    echo '<a href="signout.php">Sign out</a><br>';
} else {
    $activity = $_REQUEST['activity'];
    
    if ($activity == "signin") {
        $name = $_REQUEST['user_name']; 
        $pass = $_REQUEST['user_pass'];

        $query = "SELECT user_id, user_name, user_level, user_pass FROM users" . " WHERE user_name = '$name';";

        $rows = $db->query($query);

        if($rows == null) {
            echo 'Something went wrong while signing in. Please try again.'; 
        } else {
            $rowAry = $rows->fetch($rows->FETCH_ASSOC);
            if((password_verify($pass, $rowAry['user_pass']) == false) || 
                (count($rowAry) == 0) ||
                ($rowAry == null))
            {
                echo  'You have supplied a wrong user/password combination. Please  try again.';
            } else {
                session_regenerate_id();
                $_SESSION['signed_in'] = true;
                $_SESSION['user_id'] = $rowAry['user_id']; 
                $_SESSION['user_name'] = $rowAry['user_name']; 
                $_SESSION['user_level'] = $rowAry['user_level'];
                
                echo 'Welcome, ' . $_SESSION['user_name'] . '.<br>'; 
                echo '<br><a href="index.php">Home</a><br>';
                echo '<a href="signout.php">Sign out</a><br>';
            } 
        }
    } 
}

include 'footer.php';
?>