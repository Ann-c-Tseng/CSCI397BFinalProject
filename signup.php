<script> 
        function checkValidation() {
            var username = document.getElementById("user_name").value;
            var password = document.getElementById("user_pass").value;
            var passwordcheck = document.getElementById("user_pass_check").value;
            var email = document.getElementById("user_email").value;

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
            if(email == "") {
                alert("The email cannot be empty");
                return;
            }

            //Check to make sure password and passwordcheck are equal 
            if(passwordcheck != password) {
                alert("Your password inputs do not match, please check them again");
                return;
            }

            //Check to make sure all username, password, and email are within the range
            //and that the username, password, and email only have the accepted characters, numbers, and symbols. 
            var testusername = /^[a-zA-Z0-9!@*]*$/.test(username);
            var testpassword = /^[a-zA-Z0-9!@*]*$/.test(password);
            var testemail = /^[a-zA-Z0-9!*]+@[a-zA-Z0-9]+\.[a-zA-Z]{3,4}$/.test(email);

            if(!testusername || !testpassword) {
                alert("Please check your username or password again, as we only allow numbers, letters and the following special characters: ! @ and * in both fields");
                return;
            }
            if(!testemail) {
                alert("Please check your email format again. The format should be similar to Email@company.xxx. Numbers, letters and special characters such as ! and * are allowed. @ can only be used once.");
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
            if((email.length <= 5 || email.length >= 254)) {
                alert("The email must be greater than 5 characters and less than 254 characters");
                return;
            }

            //In terms of the @ sign, there can be only one.
            //It must have a period followed by at least three letters at the end (to catch .com, .net, .org, .mobi, ...etc...)

            document.getElementById("signupform").submit();
        }
</script>

<?php
include 'connect.php';
include 'header.php';

$activity = $_REQUEST['activity'];
if($activity=="signup")
{
    date_default_timezone_set('America/Los_Angeles');
    $name = $_REQUEST['user_name'];
    $pass = password_hash($_REQUEST['user_pass'], PASSWORD_DEFAULT);
    $email = $_REQUEST['user_email'];
    $sql = "INSERT INTO 
	    users(user_id, user_name, user_pass, user_email, user_date, user_level)
	    VALUES(?, ?, ?, ?, ?, ?)";

    $stmt= $db->prepare($sql);
    $status = $stmt->execute([NULL, $name, $pass, $email, date("Y-m-d H:i:s"), 0]);
    
    if($status != 1){
        echo 'Something went wrong while signing up. Please try again later.';
    } else {
        echo 'Successfully  signed  up. You can now <a href="signin.php"> Sign In </a>';
    }

} else {
    echo '<h3>Sign up</h3>';
    echo '<form method="get" action="" id="signupform">
        <input type="hidden" name="activity" value="signup">
        <label>Username: <input type="text" name="user_name" id="user_name"></label> <br>
        <label>Password: <input type="password" name="user_pass" id="user_pass"></label> <br>
        <label>Password again: <input type="password" name="user_pass_check" id="user_pass_check"></label> <br>
        <label>E-mail: <input type="text" name="user_email" id="user_email"></label> <br>
        <input type="button" value="Sign Up" onclick="checkValidation()"/>
    </form>';
}

include 'footer.php';
?>
