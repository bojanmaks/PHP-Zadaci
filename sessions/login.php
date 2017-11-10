<?php

session_start();

$username = 'Student';
$password = 'Pa$$w0rd';

if($_POST) {
    if($_POST['access_requested']) {
        if($_POST['uname'] == $username && $_POST['pword'] == $password) {
            $_SESSION['logiran'] = 1;
        }
        else {
            $_SESSION['logiran'] = 0;
        }
        
        if($_SESSION['logiran']) {
            echo "Access granted!";
            echo '<pre>';
            print_r($_SESSION);
            exit;
        }
        else {
            echo "Incorect username/password!";

        }
    }
    else {
        echo "Nice try!";
        exit;
    }
}

?>
<form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <p>Username: <input type="text" name="uname"></p>
    <p>Password: <input type="password" name="pword"></p>
    <input type="hidden" name="access_requested" value="1">
    <p><input type="submit" value="Login"></p>
</form>

