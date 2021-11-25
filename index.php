<?php
    include 'header.php';
    include 'connect.php'
?>

<!-- Check if user is viewer or signed in, show corresponding categories-->

<!-- Populate the "content" div with categories, topics, and posts based on if user is signed in or not -->
<div id="content"> 
    <?php
        /* Don't think this works but might be an okay starting place? not sure though. i'll leave it commented */
            if(isset($_SESSION['signed_in']))
            {
                echo 'signed in. user is a superuser, admin, or poster';

                $name = $_SESSION['username'];

                //grab all categories from 'posts' because all categories are viewable when we are signed in
                $catQ = "SELECT DISTINCT * FROM posts;";
                $cats = $db->query($catQ);

                if($cats == null){
                    echo 'No Categories created yet.';
                } else{

                    while($row = $cats->fetch(PDO::FETCH_ASSOC)){
                        $result[] = $row;
                    }
                    
                    // Array of all column names
                    $columnArr = array_column($result, 'category');
                    
                    echo '<form action="./topics.php" id = "homeForm" name="homeForm">';
                    for($i = 0; $i < count($columnArr); $i++){
                        //otherwise, just show the value from 'category' with a link to topics.
                        echo '<button type="submit" class="category" id="'.$columnArr[$i].'" name="'.$columnArr[$i].'">'.$columnArr[$i].'</button>';
                    }
                    echo '.</form>';
                }

            }
            else{
                    echo 'not signed in';
                    //If not signed in, still show all categories but when reaching viewerviewable==0(false), print out signin prompt

                    //all categories where signed in users can see
                    $catQ = "SELECT DISTINCT * FROM posts where viewerviewable = 1;";
                    $cats = $db->query($catQ);

                    //all categories where non signed in users can't access
                    $viewsQ = "SELECT DISTINCT * FROM posts where viewerviewable = 0;";
                    $views = $db->query($viewsQ);

                    if($cats == null && $views == null){
                        echo 'No Categories created yet.';

                    } else{
                        //everyone can view
                        while($row = $cats->fetch(PDO::FETCH_ASSOC)){
                            $result1[] = $row;
                        }
                        
                        //not everyone can view
                        while($row = $views->fetch(PDO::FETCH_ASSOC)){
                            $result2[] = $row;
                        }
                        
                        //Array that everyone can see
                        $catsArr = array_column($result1, 'category');

                        //Array that not everyone can see
                        $viewsArr = array_column($result2, 'category');


                        //First form to send user to sign in
                       // echo '<form action="./signin.php">';
                       echo '<ul>';
                        //Viewable to only signed in
                        for($i = 0; $i < count($viewsArr); $i++){
                            echo '<li class="category"><a href="signin.php" >'.$viewsArr[$i].' --sign in to view</a></li>';
                        }
                        echo '</ul>';
                       // echo '</form>';

                       // echo '<button class="category"><a href="signin.php">'.$viewsArr[$i].' --sign in to view</a></button>';


                        //second form to send user to topics page
                        echo '<form action="./topics.php" id = "homeForm" name="homeForm">';
                        for($i = 0; $i < count($catsArr); $i++){
                            echo '<button type="submit" class="category" id="'.$catsArr[$i].'" name="'.$catsArr[$i].'">'.$catsArr[$i].'</button>';
                        }
                        echo '</form>';
                    }
            } ?>
            
</div><!-- content --> 
</body>
</html>
