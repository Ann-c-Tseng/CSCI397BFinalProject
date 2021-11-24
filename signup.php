<script> 
        function checkValidation() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var passwordcheck = document.getElementById("password_check").value;

            //Check to make sure all fields are not empty
            if(username == "") {
                alert("The username cannot be empty");
                return;
            }
            if(password == "") {
                alert("The password cannot be empty");
                return;
            }
            if(passwordcheck == "") {
                alert("The repeat password field cannot be empty");
                return;
            }

            //Check to make sure password and passwordcheck are equal 
            if(passwordcheck != password) {
                alert("Your password inputs do not match, please check them again");
                return;
            }

            //Check to make sure all username and password are within the range
            //and that the username, password only have the accepted characters, numbers, and symbols. 
            var testusername = /^[a-zA-Z0-9!@*]*$/.test(username);
            var testpassword = /^[a-zA-Z0-9!@*]*$/.test(password);
            var testemail = /^[a-zA-Z0-9!*]+@[a-zA-Z0-9]+\.[a-zA-Z]{3,4}$/.test(email);

            if(!testusername || !testpassword) {
                alert("Please check your username or password again, as we only allow numbers, letters and the following special characters: ! @ and * in both fields");
                return;
            }
            if(username.length <= 2 || username.length >= 29) {
                alert("A username must be greater than 2 characters and less than 29 characters");
                return;
            }            
            if((password.length <= 7 || password.length >= 254) && (passwordcheck.length <= 7 || passwordcheck.length >= 254)) {
                alert("A password must be greater than 7 characters and less than 254 characters");
                return;
            }

            document.getElementById("signupform").submit();
        }
</script>

<?php
include 'connect.php';
include 'header.php';

$activity = $_REQUEST['activity'];
if($activity=="signup")
{
    $name = $_REQUEST['username'];
    $pass = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
    $permission = $_REQUEST['permission'];
    $sql = "INSERT INTO 
	    users(user_id, username, password, permission)
	    VALUES(?, ?, ?, ?)";

    $stmt= $db->prepare($sql);
    $status = $stmt->execute([0, $name, $pass, $permission]);
    
    if($status != 1){
        echo 'Something went wrong while signing up. Please try again later.';
    } else {
        echo 'Successfully  signed  up. You can now <a href="signin.php"> Sign In </a>';
    }

} else {
    echo '<h3>Sign up</h3>';
    echo '<form method="get" action="" id="signupform">
                <input type="hidden" name="activity" value="signup">
                <label>Username: <input type="text" name="username" id="username"></label> <br>
                <label>Password: <input type="password" name="password" id="password"></label> <br>
                <label>Password again: <input type="password" name="password_check" id="password_check"></label> <br>
                
                <label for="permission">Choose a user level:</label>
                <select id="permission" name="permission">
                  <option value="superuser">superuser</option>
                  <option value="admin">admin</option>
                  <option value="poster">poster</option>
                </select>
                <br><br>

                <input type="button" value="Sign Up" onclick="checkValidation()"/>
        </form>';
}

include 'footer.php';
?>