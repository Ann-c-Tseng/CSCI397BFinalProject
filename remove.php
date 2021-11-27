<?php
include 'header.php';
include 'connect.php';


    $input = null;
    if (isset($_GET['cc'])) {
        $input = $_GET['cc'];
    } else {
        echo "There's no input";
    }

    $removeQ = 'DELETE from posts where category = "'.$input.'";';

    $stmt= $db->prepare($removeQ);
    $status = $stmt->execute([]);

    if($status != 1){
        echo 'Something went wrong while creating category. Please try again later.';
    } else {
        echo 'Successfully removed '.$input;
    }
    

?>