<?php
    include 'header.php';
    include 'connect.php';
?>

<!-- Check if user is viewer or signed in, show corresponding categories-->

<!-- Populate the "content" div with categories, topics, and posts based on if user is signed in or not -->
<div id="content"> 
    <?php
    $keyword = $_REQUEST['keyword'];
    $category = $_REQUEST['filters'];
    echo $category;

    if($category=="any"){
        $query ="SELECT post FROM posts WHERE post LIKE '%".$keyword."%'";
    }
    else{
        $query = "SELECT post FROM posts WHERE post LIKE '%".$keyword."%' AND category='.$category';";
    }
    $rows = $db->query($query);
    $count = 0;
    while($row = $rows->fetch(PDO::FETCH_ASSOC)){
        $count++;
        $posts[] = $row;
        $columnArr = array_column($posts, 'post');
    }
    if($count>0){
        echo '<form action="./posts.php" id = "topicsForm" name="topicsForm">';
        for($i = 0; $i < count($columnArr); $i++){
            //if topic has space in it that was previously converted to _, display the topic with space instead
            echo '<button type="submit" class="category" onclick="return topicchoice('.$columnArr[$i].')" id="'.$columnArr[$i].'">'.str_replace('_',' ',$columnArr[$i]).'</button>';
        }
        echo '</form>';  
    }
    else{
        echo 'No posts found';
    }
      
?>
</div>
</body>
</html>