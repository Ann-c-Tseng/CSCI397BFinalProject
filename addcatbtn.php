<script>
    function hideform() {
        document.getElementById("hidebtn").style.display="none";
        document.getElementById("addcatbtnform").style.display="none";
    }

    function showform() {
        document.getElementById("addcatbtnform").style.display="block";
        document.getElementById("hidebtn").style.display="block";
    }
</script>

<?php
echo '
    <button type="button" onclick="showform()";>Add New Category?</button>
';

echo '
    <button id ="hidebtn" type="button" onclick="hideform()"; style="display:none;">Hide Form</button>
    <form method="post" action="addcategorynow.php" id="addcatbtnform" style="display:none;">
        <label>New Category Name:</label><br>
        <input value=""><br>
        <button type="submit"/>Submit Category</button>
    </form> <br>
';
?>