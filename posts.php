<?php
include 'header.php';
include 'connect.php';
?>


<!-- Show corresponding topics-->
<div id="content">
    
    <?php
        $topic = $_REQUEST['tc'];

        $postQ = 'SELECT DISTINCT post FROM posts WHERE topic = "'.$topic.'"';

        $posts = $db->query($postQ);

        if($posts == null){
            echo 'Something went wrong while accessing the database. Please try again later.';
        } else {
            while($row = $posts->fetch(PDO::FETCH_ASSOC)){
                $result[] = $row;
            }
            // Array of all values from the 'topic' column
            $columnArr = array_column($result, 'post');
                
            //populate div with posts
            for($i = 0; $i < count($columnArr); $i++){
                echo '<p class="category">'.$columnArr[$i].'</p>';
            }
        }
    ?>    
</div>