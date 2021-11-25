<?php
    include 'header.php';
    include 'connect.php';
?>

<!-- Check if user is viewer or signed in, show corresponding categories-->
<!-- Populate the "content" div with categories, topics, and posts based on if user is signed in or not -->

<div id="content"> 
    <h4> Categories: <h4>
    <?php
            if(isset($_SESSION['signed_in']))
            {
                //grab all categories from 'posts'
                $catQ = "SELECT ALL category FROM posts;";

                $cats = $db->query($catQ);


                if($cats == null){
                    echo 'Something went wrong while accessing the database. Please try again later.';
                }

                else{

                    while($row = $cats->fetch(PDO::FETCH_ASSOC)){
                        $result[] = $row;
                    }
                    
                    // Array of all column names (Crucial for search bar!)
                    $columnArr = array_column($result, 'category');

                    for($i = 0; $i < count($columnArr); $i++){
                        echo '<div class="category" name="'.$columnArr[$i].'"> <a class="categoryName" href="topics.php">'.$columnArr[$i].'</a></div>';
                    }
                }

            } else {
                //If not signed in, still show all categories but when reaching viewerviewable==0(false), print out signin prompt
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
                            echo "<p> Topic: ".$columnArr[$i]." - must have an account and logged in to view!</p><br>";
                        } else { //otherwise, just show the value from 'category' with a link to topics.
                            echo '<div class="category" name="'.$columnArr[$i].'"> <a class="categoryName" href="topics.php">'.$columnArr[$i].'</a></div>';
                        }
                    }
                }
            }
    ?>  
</div>