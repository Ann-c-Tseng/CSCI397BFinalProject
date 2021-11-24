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

                //grab all categories from 'posts' where viewerviewable == true
                $catQ = "SELECT ALL category FROM posts;";

                $cats = $db->query($catQ);


                if($cats == null){
                    echo 'Something went wrong while signing in. Please try again.';
                }

                else{
                    echo '<br> made it into else <br>';

                    //$catsArr = $cats->fetch(PDO::FETCH_ASSOC); 
                    //echo '<br>'.print_r($catsArr);

                    while($row = $cats->fetch(PDO::FETCH_ASSOC)){
                        $result[] = $row;
                    }
                    
                    // Array of all column names
                    $columnArr = array_column($result, 'category');

                    for($i = 0; $i < count($columnArr); $i++){
                        echo $columnArr[$i].'<br>';
                    }

                    /*if($rowAry['permission']=="superuser") 
                    {
                        echo 'User is a superuser';
                    }
                    if($rowAry['permission']=="admin") 
                    {
                        echo 'User is an admin';
                    }
                    if($rowAry['permission']=="poster") 
                    {
                        echo 'User is a poster';
                    }
                    else{
                        echo 'Error occurred';
                    }*/
                }

            }
            else{
                echo 'not signed in, can only view';
            }
               ?>
            
</div>
