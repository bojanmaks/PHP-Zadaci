<?php

session_start();

require_once './connection.php';

if($_POST) {
    if($_POST['access_requested']) {
        $username = $_POST['uname'];
        $password = $_POST['pword'];
        
        $sql = 'SELECT * FROM users WHERE email = "'.$username.'" AND passwd = SHA("'.$password.'")';
        
        $results = $link_id->query($sql);
        
        // proveri dali imam eden red od baza
        if($results->num_rows) {
            $_SESSION['logiran'] = 1;
            $_SESSION['username'] = $username;
        }
        else {
            $_SESSION['logiran'] = 0;
        }
        
        if($_SESSION['logiran']) {
            echo 'Hi '.$_SESSION['username'].'. Your access is granted!';
            echo '<a href="logout.php">Log out</a>';
            exit;
        }
        else {
            echo "Incorect username/password!";
        }
    }
    else {
        echo 'Nice try!';
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

