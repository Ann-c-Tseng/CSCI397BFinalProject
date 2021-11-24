<?php 
session_start();
?>

<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>CSCI397B Final Project</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
<h1> CSCI397B Final Project | Argon </h1>
    <div id="wrapper">
        <div id="menu">
            <a class="item" href="index.php"> Home </a>

            <div id="userbar">
                <?php
                            if($_SESSION['signed_in'])
                            {
                                echo 'Hello ' . $_SESSION['user_name'] . 
                                '.&nbsp;&nbsp;&nbsp;<a href="signout.php"> Sign out </a>';
                            }
                            else{
                                echo '<a href="signin.php"> Sign in </a> or <a href="signup.php"> Create an account </a>.';
                            }
                ?>
            </div>
        </div>
        <br><br>



        <!-- Populate the "content" div with categories, topics, and posts based on if user is signed in or not -->
        <div id="content"> 
        </div>