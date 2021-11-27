<?php 
session_start();
?>

<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>CSCI397B Final Project</title>
    <link rel="stylesheet" href="./styles.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<h1> CSCI397B Final Project | Argon </h1>
    <div id="wrapper">
        <div id="menu">
            <a class="item" href="index.php"> Home </a>

            <div id="userbar">
                <?php   if(isset($_SESSION['signed_in'])) {
                            if($_SESSION['signed_in'])
                            {
                                echo 'Hello ' . $_SESSION['username']. 
                                '.&nbsp;&nbsp;<a href="signout.php">Sign out</a>';
                            }
                        }
                        else{
                            echo '<a href="signin.php">Sign in</a> or <a href="signup.php">Create an account</a>';
                        }
                    echo '
                        <button type="button" style="float:right" id="search" onclick="showfilter()";><i class="fa fa-search"></i></button>
                        <button type="button" style="float:right; display:none" id="cancel" onclick="hidefilter()";><i class="fa fa-close"></i></button>
                    ';
                
                ?>
                
            </div>
        </div>
        <br><br>