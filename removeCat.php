<script>
    function categorychoice(cc) {
        //convert _ back to spaces for the query
        document.getElementById('cc').value = (cc.id).replaceAll('_', ' ');

        if(cc.id == '' || cc.id == null){
            alert(cc.id);
            return false;
        }else{
            return true;
        }
    }
</script>

<?php
include 'header.php';
include 'connect.php';

 //grab all categories from 'posts' because all categories are viewable when we are signed in
 $catQ = "SELECT DISTINCT category FROM posts;";
 $cats = $db->query($catQ);
 $count = 0;

 while($row = $cats->fetch(PDO::FETCH_ASSOC)){
         $count++;
         $result[] = $row;
         // Array of all values in the 'category' column
         $columnArr = array_column($result, 'category');
     
     //replace all spaces with _ to make button valid
     for($i = 0; $i < count($columnArr); $i++){
         $columnArr[$i] = str_replace(' ','_',$columnArr[$i]);
     }
     
 }
 if($count>0){
     echo '<form action="./remove.php" id = "homeForm" name="homeForm">';
     for($i = 0; $i < count($columnArr); $i++){
         if($columnArr[$i] != ""){
             //convert the text for the button back to spaces for the user to see
             echo '<button type="submit" style="color: black; background-color: red; border: red;" class="category" onclick="return categorychoice('.$columnArr[$i].')" id="'.$columnArr[$i].'">'.str_replace('_',' ',$columnArr[$i]).'</button>';
         }   
     }       
     echo '<input type = "hidden" id="cc" name="cc" value="">';
     echo '</form>';
 }

 else{
         echo '<br>No categories created yet.';
 }

?>