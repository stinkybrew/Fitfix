<!DOCTYPE html>
<html lang="if">
    <head>
        <title>W3.CSS Template</title>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="refresh" content="5.0;main.php" />  
        <link rel="stylesheet" href="w3-update.css">
        <link rel="stylesheet" href="w3-theme-black.css">
        <link rel="stylesheet" href="font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <?php
    session_start(['cookie_lifetime' => 0]);
    if (isset($_SESSION['first2'])) {
        unset($_SESSION['first2']);
    }
    ?>
    <body id="myPage" class="backgroundimg">

        <!-- Sidebar on click -->
        <nav class="w3-sidebar w3-bar-block w3-white w3-card w3-animate-left w3-xxlarge" style="display:none;z-index:2" id="mySidebar">
            <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-display-topright w3-text-teal">Sulje
                <i class="fa fa-remove"></i>
            </a>
            <a href="#" class="w3-bar-item w3-button">Link 1</a>
            <a href="#" class="w3-bar-item w3-button">Link 2</a>
            <a href="#" class="w3-bar-item w3-button">Link 3</a>
            <a href="#" class="w3-bar-item w3-button">Link 4</a>
            <a href="#" class="w3-bar-item w3-button">Link 5</a>
        </nav>

        <!-- Navbar -->
        <div class="w3-top">
            <div class="w3-bar w3-theme-d2 w3-left-align">
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
                <a href="main.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>FIXFIT</a>
                <?php

                // Open config.ini file, that contains login-info for DB.
                $config = parse_ini_file("../../config.ini");
                // connect to the database  
                $conn = mysqli_connect($config['dbaddr'],$config['username'],$config['password'],$config['dbname'],$config['dbport']);
                // Check connection
                if (!$conn) {
                    die("Yhteys epäonnistui!: " . mysqli_connect_error());
                }
                if(!empty($_SESSION['email'])){
                    // if user is not yet logged in
                    $fields = fopen("profilenavbar.txt", "r") or die("Tiedoston avaaminen epäonnistui!");
                    echo fread($fields,filesize("profilenavbar.txt"));
                    fclose($fields);
                }
                ?>
                <?php
                    $config = parse_ini_file("../../config.ini");
                    $conn = mysqli_connect($config['dbaddr'],$config['username'],$config['password'],$config['dbname'],$config['dbport']);
                    if (!$conn) {
                        die("Connection failed!: " . mysqli_connect_error());
                    }
                    // checs if session is on. if its no, treenit navbar field is visible!
                    if(!empty($_SESSION['email'])){       
                        $fields = fopen("treenit.txt", "r") or die("Unable to open file!");
                        echo fread($fields,filesize("treenit.txt"));
                        fclose($fields);
                    }
                ?>
                <a href="yhteystiedot.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Yhteystiedot</a>
                <div>

                </div>
            </div>
            <!-- Navbar on small screens -->
            <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
                <?php
                $config = parse_ini_file("../../config.ini");
                $conn = mysqli_connect($config['dbaddr'],$config['username'],$config['password'],$config['dbname'],$config['dbport']);
                if (!$conn) {
                    die("Connection failed!: " . mysqli_connect_error());}
                 elseif(!empty($_SESSION['email'])){       
                    $fields = fopen("smallnavbartreenit.txt", "r") or die("Unable to open file!");
                    echo fread($fields,filesize("smallnavbartreenit.txt"));
                    fclose($fields);
                }               
                ?>
                <a href="yhteystiedot.php" class="w3-bar-item w3-button">Yhteystiedot</a>
                <?php
                $config = parse_ini_file("../../config.ini");
                $conn = mysqli_connect($config['dbaddr'],$config['username'],$config['password'],$config['dbname'],$config['dbport']);
                if (!$conn) {
                    die("Connection failed!: " . mysqli_connect_error());
                }
                if(empty($_SESSION['email'])){
                    $fields = fopen("button_logreg.txt", "r") or die("Unable to open file!"); // if user is not yet logged in
                    echo fread($fields,filesize("button_logreg.txt"));
                    fclose($fields);
                }
                elseif(!empty($_SESSION['email'])){       
                    $fields = fopen("button_logout.txt", "r") or die("Unable to open file!");
                    echo fread($fields,filesize("button_logout.txt"));
                    fclose($fields);
                }
                if(isset($_POST['logout'])) {
                    session_start();
                    $_SESSION = array();
                    $logout = "UPDATE user SET loggedin = 0 WHERE email = '" . $_SESSION['email'] . "'"; // Update login info to database!
                    if(mysqli_query($conn, $logout)){
                        echo $userlogin;
                        echo $logout;
                    } 
                    else {
                        echo "ERROR: Could not able to execute $updatelogin. " . mysqli_error($conn);
                    }
                    if (ini_get("session.use_cookies")) {
                        $params = session_get_cookie_params();
                        setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
                    }
                    session_unset();
                    session_destroy();
                    header("Location: main.php");
                    exit();
                }
                ?>
            </div>
        </div>
        <!-- Image Header -->
        <div class="w3-display-container w3-animate-opacity">
            <img src="img/jogging-wide.jpg" alt="joggingman" style="width:100%;min-height:150px;max-height:600px;">
            <div class="w3-container w3-display-bottomleft w3-margin-bottom">  
                <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-xlarge w3-theme w3-hover-teal blink_me" title="Go To W3.CSS"><h1 style="font-size:200%">KIITOS PALAUTTEESTASI!</h1></button>
            </div>
        </div>
        <div style="margin-top: 50px;font-size: 150%">
        </div>    
        <!-- login/register modal -->
        <div id="id02" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-top">
                <header class="w3-container w3-teal w3-display-container"> 
                    <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
                    <h5>Kirjaudu tai rekisteröidy käyttäjäksi <i class="fa fa-smile-o"></i></h5>
                </header>
                <div class="w3-container" style="margin:3%">
                    <div style="background-color:ffffff" class="w3-hide-medium">
                        <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="main.php" method="post">
                            <div class="w3-section">
                                <label for="email"></label>
                                <input style="margin-top:5px" type="text" name="email" placeholder="email address.." required>
                            </div>
                            <div class="w3-section">
                                <label for="psw"></label>
                                <input style="margin-top:5px" type="password" name="password" placeholder="Password.." required>
                            </div>
                            <div class="w3-section">
                                <input style="border:none" class="w3-bar-item w3-button w3-hide-medium w3-hover-white modalcolors" type="submit" name="login" value="Kirjaudu">
                            </div>
                            <a href="register2.php" style="border:none" class="w3-bar-item w3-button w3-hide-medium w3-hover-white modalcolors">Rekisteröidy</a>
                        </form>

                    </div>
                </div>
                <footer class="w3-container w3-teal">
                </footer>
            </div>
        </div>            

        <!-- Footer -->
        <footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
            <h4>Follow Us</h4>
            <a class="w3-button w3-large w3-teal" href="https://www.facebook.com/FixFit-213286389269513/" title="Facebook"><i class="fa fa-facebook"></i></a>
            <a class="w3-button w3-large w3-teal" href="https://www.instagram.com/fixfittreenit/" title="instagram"><i class="fa fa-instagram"></i></a>
            <p>Powered by <a href="main.php" target="_blank">&copy;Team FixFit</a></p>

            <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
                <span class="w3-text w3-padding w3-teal w3-hide-small">Go To Top</span>   
                <a class="w3-button w3-theme" href="#myPage"><span class="w3-xlarge">
                    <i class="fa fa-chevron-circle-up"></i></span></a>
            </div>
        </footer>

        <script>
            // Script for side navigation
            function w3_open() {
                var x = document.getElementById("mySidebar");
                x.style.width = "300px";
                x.style.paddingTop = "10%";
                x.style.display = "block";
            }

            // Close side navigation
            function w3_close() {
                document.getElementById("mySidebar").style.display = "none";
            }

            // Used to toggle the menu on smaller screens when clicking on the menu button
            function openNav() {
                var x = document.getElementById("navDemo");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                } else { 
                    x.className = x.className.replace(" w3-show", "");
                }
            }

        </script>
    </body>
</html>
