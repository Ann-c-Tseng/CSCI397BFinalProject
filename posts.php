<?php
include 'header.php';
include 'connect.php';
?>


<script>
function hideform() {
        document.getElementById("hidebtn").style.display="none";
        document.getElementById("addPost").style.display="none";
    }

    function showform() {
        document.getElementById("addPost").style.display="block";
        document.getElementById("hidebtn").style.display="block";
    }

    function validate(){
        let input = document.getElementById('catinput').value;
        if(input == ''){
            alert("Can't add an empty category!");
            return false;
        } else{
            return true;
        }
    }
</script>
<!-- Show corresponding topics-->
<div id="content">
    
    <?php
        include 'search.php';
        $topic = $_REQUEST['tc'];
        echo '<h1>'.$topic.'</h1>';

        echo '<button id="createPost" name="createPost" onclick=showform()>Create New Post</button>';
        echo ' <button id ="hidebtn" type="button" onclick="hideform()"; style="display:none;">Hide Form</button>
                <form method="get" action="addPost.php" id="addPost" style="display:none;">
                <label>Your Post:</label><br>
                <input id="postinput" name="postinput" value=""><br>
                <button type="submit" onclick="return validate()">Submit Post</button>
                <input style="display:none" name="hiddencategory" value="'.$_GET['cc'].'">
                <input style="display:none" name="hiddentopic" value="'.$_GET['tc'].'">
                </form> <br>    
            ';

        //if not a viewer, create post button here.
        //This will have to be somewhere in this page but if post is from the user that is logged in, create delete button with the post
        //admin or super user should have delete buttons for each post

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
                if($columnArr[$i] != ""){
                    echo '<p class="category">'.$columnArr[$i].'</p>';
                }
            }
        }
    ?>    
</div>