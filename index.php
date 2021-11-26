<?php
    include 'header.php';
    include 'connect.php'
?>

<script>
    function categorychoice(cc) {
        //convert _ back to spaces for the query
        document.getElementById('cc').value = (cc.id).replace('_', ' ');

        if(cc.id == '' || cc.id == null){
            alert(cc.id);
            return false;
        }else{
            return true;
        }
    }
</script>

<!-- Check if user is viewer or signed in, show corresponding categories-->

<!-- Populate the "content" div with categories, topics, and posts based on if user is signed in or not -->
<div id="content"> 
    <?php
            if(isset($_SESSION['signed_in']))
            {
                echo 'Signed in: ';

                $name = $_SESSION['username'];

                //grab all categories from 'posts' because all categories are viewable when we are signed in
                $catQ = "SELECT DISTINCT category FROM posts;";
                $cats = $db->query($catQ);

                if($cats == null) {
                    echo '<br> No Categories created yet.';
                } else{

                    while($row = $cats->fetch(PDO::FETCH_ASSOC)){
                        $result[] = $row;
                    }
                    
                    // Array of all values in the 'category' column
                    $columnArr = array_column($result, 'category');
                    
                    //replace all spaces with _ to make button valid
                    for($i = 0; $i < count($columnArr); $i++){
                        $columnArr[$i] = str_replace(' ','_',$columnArr[$i]);
                    }
                    
                    echo '<form action="./topics.php" id = "homeForm" name="homeForm">';
                    for($i = 0; $i < count($columnArr); $i++){
                        //convert the text for the button back to spaces for the user to see
                        echo '<button type="submit" class="category" onclick="return categorychoice('.$columnArr[$i].')" id="'.$columnArr[$i].'">'.str_replace('_',' ',$columnArr[$i]).'</button>';
                    }          
                    echo '<input type = "hidden" id="cc" name="cc" value="">';
                    echo '</form>';
                }

            }
            else{
                    echo 'Not signed in:';
                    //If not signed in, still show all categories but when reaching viewerviewable==0(false), print out signin prompt

                    //all categories where signed in users can see
                    $catQ = "SELECT DISTINCT category FROM posts where viewerviewable = 1;";
                    $cats = $db->query($catQ);


                    //all categories where non signed in users can't access
                    $viewsQ = "SELECT DISTINCT category FROM posts where viewerviewable = 0;";
                    $views = $db->query($viewsQ);

                    if($cats == null && $views == null) {
                        echo '<br> No Categories created yet.';
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

                        //replace all spaces with _ to make button valid
                        for($i = 0; $i < count($catsArr); $i++){
                            $catsArr[$i] = str_replace(' ','_',$catsArr[$i]);
                        }

                        //replace all spaces with _ to make button valid
                        for($i = 0; $i < count($viewsArr); $i++){
                            $viewsArr[$i] = str_replace(' ','_',$viewsArr[$i]);
                        }


                       echo '<ul>';
                        //Viewable to only signed in
                        for($i = 0; $i < count($viewsArr); $i++){
                            echo '<li class="category"><a href="signin.php" >'.str_replace('_',' ',$viewsArr[$i]).' --sign in to view</a></li>';
                        }
                        echo '</ul>';


                        //second form to send user to topics page
                        echo '<form action="./topics.php" id = "homeForm" name="homeForm">';
                        for($i = 0; $i < count($catsArr); $i++){
                            echo '<button type="submit" class="category" onclick="return categorychoice('.$catsArr[$i].')" id="'.$catsArr[$i].'">'.str_replace('_',' ',$catsArr[$i]).'</button>';
                        }          
                        echo '<input type = "hidden" id="cc" name="cc" value="">';
                        echo '</form>';
                    }
            } ?>
            
</div>
</body>
</html>
