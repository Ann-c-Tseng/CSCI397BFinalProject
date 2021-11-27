<script>
    function hideform() {
        document.getElementById("hidebtn").style.display="none";
        document.getElementById("addcatbtnform").style.display="none";
    }

    function showform() {
        document.getElementById("addcatbtnform").style.display="block";
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

<?php
echo '
    <button type="button" onclick="showform()";>Add New Category?</button>
    <form method="get" action="removeCat.php">
    <button type="submit">Remove Category</button>
    </form>
';

echo '
    <button id ="hidebtn" type="button" onclick="hideform()"; style="display:none;">Hide Form</button>
    <form method="get" action="addcategorynow.php" id="addcatbtnform" style="display:none;">
        <label>New Category Name:</label><br>
        <input id="catinput" name="catinput" value=""><br>
        <input type="checkbox" id=""viewable" name="viewable" value="1">
        <label for="viewable">Everyone can view?</label>
        <button type="submit" onclick="return validate()">Submit Category</button>
    </form> <br>
';

?>
