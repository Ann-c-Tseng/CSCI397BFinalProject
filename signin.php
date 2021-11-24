<script> 
        function checkValidation() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            // alert('username: ' + username + '\npassword: ' + password);
            if(username == "") {
                alert("The username cannot be empty");
                return false;
            }
            if(password == "") {
                alert("The password cannot be empty");
                return false;
            }

            var testusername = /^[a-zA-Z0-9!@*]*$/.test(username);
            var testpassword = /^[a-zA-Z0-9!@*]*$/.test(password);

            if(!testusername || !testpassword) {
                alert("Please check your username or password again, as we only allow numbers, letters and the following special characters: ! @ and * in both fields");
                return false;
            }

            if(username.length <= 2 || username.length >= 29) {
                alert("A username must be greater than 2 characters and less than 29 characters");
                return false;
            }            
        
            if(password.length <= 7 || password.length >= 254) {
                alert("A password must be greater than 7 characters and less than 254 characters");
                return false;
            }
            // alert('all checks passed in sign in!')
            return true;
            document.getElementById("signinform").submit();
        }
</script>

<?php
include 'header.php';

if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {
    echo 'You are already signed in.<br>';
    echo '<br><a href="index.php">Home</a><br>'; 
    echo '<a href="signout.php">Sign out</a><br>';
} else {
    echo '<h3>Sign in</h3>';
    echo '<form method="post" action="signedin.php" id="signinform">
    <input type="hidden" name="activity" value="signin"> 
    <label>Username: <input type="text" name="username" id="username"></label> 
    <label>Password: <input type="password" name="password" id="password"></label>
    <button type="submit" onclick="return checkValidation()"/>sign in</button>
    </form>';
}
?>