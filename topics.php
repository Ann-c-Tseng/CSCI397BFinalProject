<?php
    include 'header.php';
    include 'connect.php'
?>

<!-- Show corresponding topics-->
<div id="content"> 
    <?php
            if(isset($_SESSION['signed_in']))
            {
                $topQ = "SELECT ALL topic FROM posts;";

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

            } else{
                echo 'not signed in: put the viewer\'s view here :)';
            } 
    ?>    
</div>