<?php
    include 'header.php';
    include 'connect.php';
?>

<!-- Show corresponding topics-->
<div id="content">
    
    <?php
        $category = $_REQUEST['cc'];
        //Use ^^^^^ to query. something like select all topic from posts where category = $category ???????????

        $topQ = 'SELECT DISTINCT topic FROM posts WHERE category = "'.$category.'"';

        $tops = $db->query($topQ);

        if($tops == null){
            echo 'Something went wrong while accessing the database. Please try again later.';
        } else {
            while($row = $tops->fetch(PDO::FETCH_ASSOC)){
                $result[] = $row;
            }
            // Array of all values from the 'topic' column
            $columnArr = array_column($result, 'topic');
                
            for($i = 0; $i < count($columnArr); $i++){
                // echo $columnArr[$i].'<br>';
                echo "<a href=\"posts.php\">".$columnArr[$i]."</a><br>";
            }
        }
    ?>    
</div>