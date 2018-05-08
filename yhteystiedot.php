
<!DOCTYPE html>
<html>
    <head>
        <!--testikommentti-->
        <title>FIXFIT</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="w3-update.css">
        <!--<link rel="stylesheet" href="w3-theme-black.css">-->
        <link rel="stylesheet" href="font-awesome_min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <?php
    session_start(['cookie_lifetime' => 0]);
    if (isset($_SESSION['first2'])) {
        unset($_SESSION['first2']);
    }
    ?>
    <body id="myPage" class="backgroundimg">
        <!-- Navbar -->
        <div class="w3-top">
            <div class="w3-bar w3-theme-d2 w3-left-align">
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
                <a href="main.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>FIXFIT</a>
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
                <a href="yhteystiedot.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white" style="background-color:grey;text-shadow: 3px 3px 3px #000000;">Yhteystiedot</a>
                <div>
                    <?php
                    // Open config.ini file, that contains login-info for DB.
                    $config = parse_ini_file("../../config.ini");
                    // connect to the database  
                    $conn = mysqli_connect($config['dbaddr'],$config['username'],$config['password'],$config['dbname'],$config['dbport']);
                    // Check connection
                    if (!$conn) {
                        die("Connection failed!: " . mysqli_connect_error());
                    }

                    // checs if session is on. if its no, login navbar field is visible!
                    if(empty($_SESSION['email'])){
                        // if user is not yet logged in
                        $fields = fopen("login_register.txt", "r") or die("Unable to open file!");
                        echo fread($fields,filesize("login_register.txt"));
                        fclose($fields);
                    }
                    elseif(!empty($_SESSION['email'])){
                        // if user is not yet logged in
                        $fields = fopen("logout.txt", "r") or die("Unable to open file!");
                        echo fread($fields,filesize("logout.txt"));
                        fclose($fields);
                        echo '<a href="profile.php" title="Profiili" class="w3-bar-item2 w3-button w3-teal"><i class="fa fa-user-circle-o fa-fw w3-margin-right w3-large"></i>' . $_SESSION['first'] . '</a>';
                    }
                    ?>
                </div>
            </div>

            <!-- Navbar on small screens -->
            <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
                <?php
                $config = parse_ini_file("../../config.ini");
                $conn = mysqli_connect($config['dbaddr'],$config['username'],$config['password'],$config['dbname'],$config['dbport']);
                if (!$conn) {
                    die("Connection failed!: " . mysqli_connect_error());}
                if(!empty($_SESSION['email'])){       
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
        <!-- Contact Container -->
        <div class="w3-container w3-padding-24" style="margin-top:40px;margin-bottom:120px">
            <div class="w3-center w3-card w3-padding-16 backroundcolor center">
                <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Yhteystiedot</span>
                    <h3>Jäikö jokin mietityttämään? Onko sinulla kehitysideoita?</h3>
                    <h3>Ota meihin yhteyttä!</h3>
                </div>
                <div class="w3-padding-16 boxover center boxcolor" style="width:70%">
                    <div class="box w3-right">
                        <i class="fa fa-map-marker w3-text-teal w3-xxlarge"></i><h4>Metropolia<br>Ammattikorkeakoulu</h4>
                    </div>
                    <div class="box w3-left">
                        <i class="fa fa-envelope-o w3-xxlarge"></i><h4>Fixfit info:<br>
                        <a href="info.fixfit@gmail.com">info.fixfit@gmail.com</a></h4>
                    </div>
                    <div class="boxunder">
                        <br>
                        <h4>Voit myös antaa palautetta!</h4>
                        <p><i class="fa fa-chevron-circle-down w3-center w3-xxlarge"></i></p>
                        <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-xlarge w3-theme w3-hover-teal" title="Palaute">Palaute</button>
                    </div>
                </div>
            </div>

            <!-- login/register modal -->
            <div id="id02" class="w3-modal">
                <div class="w3-modal-content w3-card-4 w3-animate-top">
                    <header class="w3-container w3-teal w3-display-container"> 
                        <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
                        <h5>Kirjaudu tai rekisteröidy käyttäjäksi <i class="fa fa-key"></i></h5>
                    </header>
                    <div class="w3-container" style="margin:3%">
                        <div style="background-color:#ffffff" class="w3-hide-medium">
                            <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="main.php" method="post">
                                <div class="w3-section">
                                    <label class="labels">Sähköpostiosoite
                                        <input class="inputs w3-right" style="margin-top:5px" type="text" name="email" placeholder="Sähköpostiosoite.." required>
                                    </label>
                                </div>
                                <div class="w3-section">
                                    <label class="labels w3-left">Salasana
                                        <input class="inputs w3-right" style="margin-top:5px" type="password" name="password" placeholder="Salasana.." required>
                                    </label>
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

            <!-- Modal -->
            <div id="id01" class="w3-modal">
                <div class="w3-modal-content w3-card-4 w3-animate-top">
                    <header class="w3-container w3-teal w3-display-container"> 
                        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
                        <h4>Palaute</h4>
                    </header>
                    <div class="w3-container">
                        <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="lahetys.php" method="post">
                            <div class="w3-section">
                                <label class="labels w3-left">Nimi
                                    <input class="inputs w3-right" type="text" name="name">
                                </label>
                            </div>
                            <div class="w3-section">
                                <label class="labels w3-left">Sähköposti
                                    <input class="inputs w3-right" type="email" name="email">
                                </label>
                            </div>
                            <div class="w3-section">
                                <label class="labels">Palaute
                                    <textarea style="height:auto" class="w3-input" name="message" maxlength="500" rows="4" cols="50"></textarea>
                                </label>
                            </div>
                            <input class="w3-check" type="checkbox" checked name="like">
                            <label class="labels">Tykkään</label>
                            <button type="reset" style="display:inline" class="w3-button w3-right w3-theme" value="Reset">Tyhjennä</button>
                            <input type="submit" style="display:inline;margin-right:2px" class="w3-button w3-right w3-theme" value="Lähetä">
                        </form>
                    </div>
                    <footer class="w3-container w3-teal">
                        <p>Kiitos palauteesta!</p>
                    </footer>
                </div>
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
            // testiä!
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
