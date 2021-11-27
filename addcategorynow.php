<?php
include 'header.php';
include 'connect.php';


    $input = null;
    if (isset($_GET['catinput'])) {
        $input = $_GET['catinput'];
    } else {
        echo "There's no input";
    }

    $view = null;
    if(isset($_GET['viewable'])){
        //checkbox checked?
        if(!empty($_GET['viewable'])) {    
            $view = $_GET['viewable'];
        }
    }
    //checkbox unchecked
    else{
        $view = 0;
    }
    $ID = $_SESSION['user_id'];

    //$createQ = 'INSERT into posts(user_id, category, post, topic, viewerviewable) VALUES('.$ID.','.$input.',"","",'.$view.');';
    $createQ = 'INSERT into posts(user_id, category, post, topic, viewerviewable) VALUES(?,?,?,?,?);';

    $stmt= $db->prepare($createQ);
    $status = $stmt->execute([$ID, $input, "", "",$view]);

    if($status != 1){
        echo 'Something went wrong while creating category. Please try again later.';
    } else {
        echo 'Successfully created '.$input;
    }
    

?>