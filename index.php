<?php
    include 'header.php';
?>

<!-- Check if user is viewer or signed in, show corresponding categories-->

<!-- Populate the "content" div with categories, topics, and posts based on if user is signed in or not -->
<div id="content"> 
    <?php
        /* Don't think this works but might be an okay starting place? not sure though. i'll leave it commented
            if(isset($_SESSION['signed_in']))
            {
                echo 'signed in. user is a superuser, admin, or poster';

                $name = $_REQUEST['username'];

                $query = "SELECT user_id, username, password, permission FROM users WHERE username = '$name';";

                $rows = $db->query($query);

                if($rows == null){
                    echo 'Something went wrong while signing in. Please try again.';
                }

                else{
                    $rowAry = $rows->fetch($rows->FETCH_ASSOC);

                    if($rowAry['permission']=="superuser") can we even do this?
                    {
                        echo 'User is a superuser';
                    }
                    if($rowAry['permission']=="admin") ?
                    {
                        echo 'User is an admin';
                    }
                    if($rowAry['permission']=="poster") ?
                    {
                        echo 'User is a poster';
                    }
                    else{
                        echo 'Error occurred';
                    }
                }

            }
            else{
                echo 'not signed in, can only view';
            }
             */   ?>
            <div id="buttonsDiv">
                <button id = 'createCategory' name = 'createCategory' onclick='createCat()'>Create Category</button>
            </div>
</div>
<div id="buttonsDiv">
                <button id = 'createCategory' name = 'createCategory' onclick='createCat()'>Create Category</button>
            </div>
<script> 
function createCat(){
    alert('clicked');
}
</script>