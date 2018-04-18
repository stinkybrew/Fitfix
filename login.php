<?php
// Open .ini file
$config = parse_ini_file("../../config.ini");
// Try and connect to the database  
$conn = mysqli_connect($config['dbaddr'],$config['username'],$config['password'],$config['dbname'],$config['dbport']);
// Check connection
if (!$conn) {
    die("Connection failed!: " . mysqli_connect_error());
}

if($_POST['login']){
    //normally, user data is stored in database
    $dbemail = ($_POST['email']);
    $email = "select email from user where email = " . $dbemail;
    $dbpwd = password_hash("salasana", PASSWORD_DEFAULT);
    $bdname = "select first from user where email = " . $dbemail;
    $bdupdatelogin = "UPDATE user SET loggedin = 1 WHERE email = " . $dbemail;
    $home = "main.php";
    //echo $dbpwd;

    if(htmlentities($_POST['email']) == $dbemail && password_verify($_POST['pwd'], $dbpwd)) {
        echo "<br>Hello, $dbemail!";
        $_SESSION['email'] = $dbemail;
        header( "$bdupdatelogin" ); }
    else {
    echo "Sorry, login failed...";
        //user is logged in, maybe show the "logout" button/link
    echo "Hello " . $bdname . "! <a href='logout.php'>logout</a>";
    header( "Location: $home" );
    }
}
?>