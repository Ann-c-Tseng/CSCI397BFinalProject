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
    <form id="addcatbtnform" style="display:none;">
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname" value="John"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname" value="Doe">
    </form>
    <button id ="hidebtn" type="button" onclick="hideform()"; style="display:none;">Hide Form</button>
';
?>