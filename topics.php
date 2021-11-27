<?php
    include 'header.php';
    include 'connect.php';
?>
<script>
    function topicchoice(tc) {
        //convert _ back to spaces for the query
        document.getElementById('tc').value = (tc.id).replaceAll('_', ' ');

        if(tc.id == '' || tc.id == null){
            alert(tc.id);
            return false;
        }else{
            return true;
        }
    }
</script>

<!-- Show corresponding topics-->
<div id="content">
    
    <?php
        include 'search.php';
        $category = $_REQUEST['cc'];
        
        echo '<h1>'.$category.'</h1>';

        //if admin or super user, create topic button here
        //both can remove any topic as well

        $topQ = 'SELECT DISTINCT topic FROM posts WHERE category = "'.$category.'"';

        $tops = $db->query($topQ);

        if($tops == null){
            echo 'Something went wrong while accessing the database. Please try again later.';
        } else {
            $result = null;
            while($row = $tops->fetch(PDO::FETCH_ASSOC)){
                $result[] = $row;
            }
            
            if($result == null){
                echo "There are no topics in this category yet!";
            } else{
                // Array of all values from the 'topic' column
                $columnArr = array_column($result, 'topic');

                //replace all spaces with _ to make button valid
                for($i = 0; $i < count($columnArr); $i++){
                    $columnArr[$i] = str_replace(' ','_',$columnArr[$i]);
                }
                
                echo '<form action="./posts.php" id = "topicsForm" name="topicsForm">';
                for($i = 0; $i < count($columnArr); $i++){
                    if($columnArr[$i] != ""){
                        //if topic has space in it that was previously converted to _, display the topic with space instead
                        echo '<button type="submit" class="category" onclick="return topicchoice('.$columnArr[$i].')" id="'.$columnArr[$i].'">'.str_replace('_',' ',$columnArr[$i]).'</button>';
                    }
                }
                echo '<input type = "hidden" id="tc" name="tc" value="">';
                echo '<input type = "hidden" id="cc" name="cc" value="'.$category.'">';
                echo '</form>';
            } // Query was not empty/null
        }
    ?>    
</div>