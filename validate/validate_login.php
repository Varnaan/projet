<?php
// Check HTTP request type, if 'POST' carries on;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // check if form was properly submited
    if (isset($_POST['submit'])) {
        /* User login process, checks if user exists and password is correct */
        // Escape email and password to protect against SQL injections
        $email_co = $mysqli->real_escape_string($_POST['email_connect']);
        $pwd_co = $mysqli->real_escape_string($_POST['password_connect']);
        // password_hash hashes password for security
        $password_hashco = password_hash($pwd_co, PASSWORD_DEFAULT);
        $result_co = $mysqli->query("SELECT * FROM users WHERE email='$email_co'");
        if ($result_co->num_rows == 0) { // User doesn't exist
            $_SESSION['message'] = "User with that email doesn't exist!";
            header("location: error.php");
        } else { // User exists
            $user_co = $result_co->fetch_assoc();
            if (password_verify($_POST['password_connect'], $user_co['password'])) { 
                //checks password then if corect checks rest of info
                $_SESSION['email'] = $user_co['email'];
                $_SESSION['username'] = $user_co['username'];
                $_SESSION['active'] = $user_connect['active'];
                // This is how we'll know the user is logged in
                $_SESSION['message'] = '';
                header("location: ./chatbox.php");
            } else {//returns wrong password error and redirects to login page
                $_SESSION['message'] = "You have entered wrong password, try again!";
                header("location: ./login.php");
            }
        }
    }
}
?>