<?php
    include 'header.php';
    include 'connect.php'
?>

<!-- Check if user is viewer or signed in, show corresponding categories-->

<div id="content"> 
    <?php
            if(isset($_SESSION['signed_in'])) //If signed in, show all categories
            {

                $catQ = "SELECT ALL category FROM posts;";

                $cats = $db->query($catQ);


                if($cats == null){
                    echo 'Something went wrong while accessing the database. Please try again later.';
                } else {
                    // echo '<br> made it into else <br>';

                    while($row = $cats->fetch(PDO::FETCH_ASSOC)){
                        $result[] = $row;
                    }
                    
                    // Array of all column names (Super crucial for search bar as well!)
                    $columnArr = array_column($result, 'category');
                        
                    for($i = 0; $i < count($columnArr); $i++){
                        echo "<a href=\"topics.php\">".$columnArr[$i]."</a><br>";
                    }
                }

            } else{ //If not signed in, still show all categories but when reaching viewerviewable==0(false), print out signin prompt
                $catQ = "SELECT ALL category FROM posts;";
                $cats = $db->query($catQ);

                $viewableQ = "SELECT viewerviewable FROM `posts` WHERE 1;";
                $viewable = $db->query($viewableQ);

                if($cats == null){
                    echo 'Something went wrong while accessing the database. Please try again later.';
                } else {
                    // echo '<br> made it into else <br>';

                    while($row = $cats->fetch(PDO::FETCH_ASSOC)){
                        $result[] = $row;
                    }

                    while($row= $viewable->fetch(PDO::FETCH_ASSOC)) {
                        $viewableresult[] = $row;
                    }
                    
                    // Array of all values from the 'category' column (Super crucial for search bar as well!)
                    $columnArr = array_column($result, 'category');

                    //Array of all values from the 'viewerviewable' column
                    $viewableArr = array_column($viewableresult, 'viewerviewable');

                    for($i = 0; $i < count($columnArr); $i++){
                        if($viewableArr[$i]==0) { //If viewerviewable==0(false), we tell viewer they need to signin
                            echo "<p>".$columnArr[$i]." is only viewable when signed in.</p><br>";
                        } else { //otherwise, just show the value from 'category' with a link to topics.
                            echo "<a href=\"topics.php\">".$columnArr[$i]."</a><br>";
                        }
                    }
                }
            } 
    ?>
</div>
