<?php
include 'header.php';
include 'connect.php';

//9 Mins before deadline, no way I can pass category, and topic rn
//TODO: pass category, topic to add post page
    $input = null;
    if (isset($_GET['postinput'])) {
        $input = $_GET['postinput'];
    } else {
        echo "There's no input";
    }
    $category = $_GET['hiddencategory'];
    $topic = $_GET['hiddentopic'];

    
    if(isset($_SESSION['user_id'])){
        $ID=$_SESSION['user_id'];
    } else{
        $ID = 0;
    }

    $createQ = 'INSERT into posts(user_id, category, post, topic, viewerviewable) VALUES(?,?,?,?,?);';

    $stmt= $db->prepare($createQ);
    $status = $stmt->execute([$ID, $category, $input, $topic, 1]);

    if($status != 1){
        echo 'Something went wrong while creating your post. Please try again later.';
    } else {
        echo 'Successfully created your post!';
    }
    
    

?>