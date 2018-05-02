
<!DOCTYPE html>
<?php
session_start(['cookie_lifetime' => 0]);
if (isset($_SESSION['first2'])) {
    unset($_SESSION['first2']);
}

/*
// Here i open a text file that contains longin function
$testia = fopen("login_function.txt", "r") or die("Unable to open file!");
echo fread($testia,filesize("login_function.txt"));
fclose($testia);
*/
?>
<html>
    <title>FIXFIT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="w3-update.css">
    <link rel="stylesheet" href="w3-theme-black.css">
    <link rel="stylesheet" href="font-awesome_min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <a href="main.php" class="w3-bar-item w3-button w3-teal">FIXFIT</a>
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
                    <div class="w3-dropdown-hover w3-hide-small">
                        <button class="w3-button" title="Notifications"><a href="treenit.php" class="textdeco">Treenit </a><i class="fa fa-caret-down"></i></button>
                        <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                        <a href="treenit.php#Käsitreenit" class="w3-bar-item w3-button">Kädet</a>
                        <a href="treenit.php#Jalkatreenit" class="w3-bar-item w3-button">Jalat</a>
                        <a href="treenit.php#Rintatreenit" class="w3-bar-item w3-button">Rinta</a>
                        <a href="treenit.php#Vatsatreenit" class="w3-bar-item w3-button">Vatsa</a>
                        <a href="treenit.php#Selkätreenit" class="w3-bar-item w3-button">Selkä</a>
                        <a href="treenit.php#Kokokehon" class="w3-bar-item w3-button">Koko keho</a>
                    </div>
                </div>
                <a href="yhteystiedot.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Yhteystiedot</a>
                <div>
                    <?php
                    $config = parse_ini_file("../../config.ini");
                    $conn = mysqli_connect($config['dbaddr'],$config['username'],$config['password'],$config['dbname'],$config['dbport']);
                    if (!$conn) {
                        die("Connection failed!: " . mysqli_connect_error());
                    }
                    // checs if session is on. if its no, login navbar field is visible!
                    if(empty($_SESSION['email'])){
                        $fields = fopen("login_register.txt", "r") or die("Unable to open file!"); // if user is not yet logged in
                        echo fread($fields,filesize("login_register.txt"));
                        fclose($fields);
                        echo "<b style='color:#32FC42;float:right;padding-top:8px;margin-top:0px'> " . $_SESSION['success'] . "</b>";
                    }
                    elseif(!empty($_SESSION['email'])){       
                        $fields = fopen("logout.txt", "r") or die("Unable to open file!");
                        echo fread($fields,filesize("logout.txt"));
                        fclose($fields);
                        echo "<b style='color:#32FC42;float:right;padding-top:8px;margin-top:0px'>Hei " . $_SESSION['first'] . "</b>";
                    }
                    // LOGOUT function !
                    $postemail = $_POST['email'];
                    if(isset($_POST['logout'])) {
                        session_start();
                        $_SESSION = array();
                        $logout = "UPDATE user SET loggedin = 0 WHERE email = '$postemail'"; // Update login info to database!
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
                    // action if LOGIN buttom is pressed
                    $emailtest = $_POST['email'];
                    if (isset($_POST['login'])){
                        $sqlfetch = "select * from user where email = '" . $_POST['email'] . "'";  //select * user users where username = ..., or something samelike sql-code
                        $result = $conn->query($sqlfetch);
                        $pwd2 = password_hash($userpwd, PASSWORD_DEFAULT);
                        if ($result->num_rows > 0) {                    // Check data of columns!     
                            while($row = $result->fetch_assoc()) {      // output data of rows needed
                                $userlogin = $row["loggedin"];
                                $userfirst = $row["first"];
                                $useremail = $row["email"];
                                $userpwd = $row["password"];
                                // If login email and password are valid or invalid.
                                if ((htmlentities($_POST['email'])) == $useremail && (htmlentities($_POST['password'] == $userpwd))) {
                                    $_SESSION['email'] = $useremail;
                                    $_SESSION['first'] = $userfirst;   

                                    // UPDATE loggedin to 1, and 1 means that you are logged in!
                                    $updatelogin = "UPDATE user SET loggedin = 1 WHERE email = '" . (htmlentities($_POST['email'])) . "'";
                                    if(mysqli_query($conn, $updatelogin)){

                                    } 
                                    else {
                                        echo "ERROR: Could not able to execute $updatelogin. " . mysqli_error($conn);
                                    }
                                }
                            }
                        }
                        else  {
                            echo '<script type="text/javascript">alert("invalid email-address or password!")</script>';
                        }
                        header("location:main.php");
                    }
                    mysqli_close($conn);
                    ?>
                </div>    
                <div>
                    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-teal" title="Search"><i class="fa fa-search"></i>
                    </a>
                </div>
            </div>
            <!-- Navbar on small screens -->
            <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
                <a href="main.php" class="w3-bar-item w3-button">FIXFIT</a>
                <div class="w3-dropdown-hover w3-hide-small">
                    <button class="w3-button" title="Notifications"><a href="treenit.php" class="textdeco">Treenit </a><i class="fa fa-caret-down"></i></button>
                    <div class="w3-dropdown-content w3-card-4 w3-bar-block">

                        <a href="treenit.php#Käsitreenit" class="w3-bar-item w3-button">Kädet</a>
                        <a href="treenit.php#Jalkatreenit" class="w3-bar-item w3-button">Jalat</a>
                        <a href="treenit.php#Rintatreenit" class="w3-bar-item w3-button">Rinta</a>
                        <a href="treenit.php#Vatsatreenit" class="w3-bar-item w3-button">Vatsa</a>
                        <a href="treenit.php#Selkätreenit" class="w3-bar-item w3-button">Selkä</a>
                        <a href="treenit.php#Kokokehon" class="w3-bar-item w3-button">Koko keho</a>
                    </div>
                </div>
                <a href="yhteystiedot.php" class="w3-bar-item w3-button">Yhteystiedot</a>
            </div>
        </div>
        <!-- Image Header -->
        <div class="w3-display-container w3-animate-opacity">
            <img class="mySlides w3-animate-left" src="img/jogging-wide.jpg" alt="jogging men" style="width:100%;min-height:150px;max-height:600px;">
            <img class="mySlides w3-animate-left" src="img/runner-in-snow-wider.jpg" alt="running in the snow" style="width:100%;min-height:150px;max-height:600px;">
            <img class="mySlides w3-animate-left" src="img/running-cloudy-day_wider.jpg" alt="running in cloudy fields" style="width:100%;min-height:150px;max-height:600px;">
            <img class="mySlides w3-animate-left" src="img/stretching-legs-pre-run_wider.jpg" alt="Streching" style="width:100%;min-height:150px;max-height:600px;">
            <img class="mySlides w3-animate-left" src="img/running_man_wider.jpg" alt="runningman" style="width:100%;min-height:150px;max-height:600px;">
            <img class="mySlides w3-animate-left" src="img/strong-ladies_wider.jpg" alt="rflexing women" style="width:100%;min-height:150px;max-height:600px;">
            <img class="mySlides w3-animate-left" src="img/jenny-hill-wider.jpg" alt="runningman in the field" style="width:100%;min-height:150px;max-height:600px;">
            <img class="mySlides w3-animate-left" src="img/ayo-ogunseinde-wider.jpg" alt="pushups" style="width:100%;min-height:150px;max-height:600px;">
            <div class="w3-container w3-display-bottomleft w3-margin-bottom right_marging">  
                <h1 class="w3-xlarge" style="padding:10px"><img src="img/FixFit_red_white-border.png" alt="fixfit_logo" style="width:30%"></h1>
            </div>
        </div>
        <!-- Modal -->
        <div id="id01" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-top">
                <header class="w3-container w3-teal w3-display-container"> 
                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
                    <h4>Login or</h4>
                    <h5>register and account <i class="fa fa-smile-o"></i></h5>
                </header>
                <div class="w3-container" style="margin:3%">
                    <div style="background-color:fff" class="w3-hide-medium">
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
                                <input style="border:none" class="w3-bar-item w3-button w3-hide-medium w3-hover-white" type="submit" name="login" value="login">
                            </div>
                            <a href="register2.php" style="border:none" class="w3-bar-item w3-button w3-hide-medium w3-hover-white">register</a>
                        </form>

                    </div>
                </div>
                <footer class="w3-container w3-teal">
                </footer>
            </div>
        </div>
        <!-- Container -->
        <div class="w3-container" style="position:relative">
            <a onclick="w3_open()" class="w3-button w3-xlarge w3-circle w3-teal"
               style="position:absolute;top:-28px;right:24px">+</a>
        </div>
                 <!-- Pikatreenit Row -->
        <hr class="hr">
        <div class="w3-container w3-padding-small w3-center">
            <div class="w3-row-padding w3-center w3-padding-small" id="pikatreenit">
                <div class="w3-container w3-padding-large w3-center">
                    <p class="w3-xxlarge">Pikatreenejä lihasryhmien mukaan</p>
                </div>
                <div class="w3-padding-16 treenit">  
                    <div class="treenitpad w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-hover-shadow">
                            <li class="w3-theme">
                                <h3>Vatsa</h3>
                            </li>
                            <iframe width="100%" height="344" src="https://www.youtube.com/embed/EB8Iom51fdA?" frameborder="0" allowfullscreen>
                            </iframe>
                            <li class="w3-padding-16"><b>Treenaa:</b></li>
                            <li class="w3-padding-16">Syviä</li>
                            <li class="w3-padding-16">Suoria</li>
                            <li class="w3-padding-16">Vinoja vatsalihaksia</li>
                            <li><h2 class="w3-wide"><i class="fa"></i>6 liikettä</h2>
                                <span class="w3-opacity">6min</span>
                            </li>
                            <li class="w3-theme-l5 w3-padding-24">
                                <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                            </li>
                        </ul>
                    </div>

                    <div class="treenitpad w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-hover-shadow">
                            <li class="w3-theme">
                                <h3>Jalat</h3>
                            </li>
                            <iframe width="100%" height="344" src="https://www.youtube.com/embed/Og4AkUfCTGM?" frameborder="0" allowfullscreen>
                            </iframe>
                            <li class="w3-padding-16"><b>Treenaa:</b></li>
                            <li class="w3-padding-16">Etureidet ja takareidet</li>
                            <li class="w3-padding-16">Pohjelihakset</li>
                            <li class="w3-padding-16">Reiden lähentäjät ja loitontajat</li>
                            <li>   <h2 class="w3-wide"><i class="fa"></i> 7 sarjaa</h2>
                                <span class="w3-opacity">6min</span>
                            </li>
                            <li class="w3-theme-l5 w3-padding-24">
                                <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                            </li>
                        </ul>
                    </div>

                    <div class="treenitpad w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-hover-shadow">
                            <li class="w3-theme">
                                <h3>Kädet</h3>
                            </li>
                            <iframe width="100%" height="344" src="https://www.youtube.com/embed/8fvT3sYfzLo?" frameborder="0" allowfullscreen>
                            </iframe>
                            <li class="w3-padding-16"><b>Treenaa:</b></li>
                            <li class="w3-padding-16">Ojentajat ja hauslihakset</li>
                            <li class="w3-padding-16">Ranteen koukistaja- ja ojentajalihakset</li>
                            <li class="w3-padding-16">Olka- ja olka-värttinäluulihas</li>
                            <li>
                                <h2 class="w3-wide"><i class="fa"></i> 7 sarjaa</h2>
                                <span class="w3-opacity">8min</span>
                            </li>
                            <li class="w3-theme-l5 w3-padding-24">
                                <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <div class="treenitpad w3-third w3-margin-bottom">
                            <ul class="w3-ul w3-border w3-hover-shadow">
                                <li class="w3-theme">
                                    <h3>Rinta</h3>
                                </li>
                                <iframe width="100%" height="344" src="https://www.youtube.com/embed/8mOjYFwmgxk?" frameborder="0" allowfullscreen>
                                </iframe>
                                <li class="w3-padding-16"><b>Treenaa:</b></li>
                                <li class="w3-padding-16">Ylä-</li>
                                <li class="w3-padding-16">Keski-</li>
                                <li class="w3-padding-16">Alarintalihakset</li>
                                <li>    <h2 class="w3-wide"><i class="fa"></i> 6 sarjaa</h2>
                                    <span class="w3-opacity">6min</span>
                                </li>
                                <li class="w3-theme-l5 w3-padding-24">
                                    <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                                </li>
                            </ul>
                        </div>

                        <div class="treenitpad w3-third w3-margin-bottom">
                            <ul class="w3-ul w3-border w3-hover-shadow">
                                <li class="w3-theme">
                                    <h3>Selkä</h3>
                                </li>
                                <iframe width="100%" height="344" src="https://www.youtube.com/embed/I2Mu3lpUfMY?" frameborder="0" allowfullscreen>
                                </iframe>
                                <li class="w3-padding-16"><b>Treenaa:</b></li>
                                <li class="w3-padding-16">Selän ojentajat</li>
                                <li class="w3-padding-16">Leveät selkälihakset</li>
                                <li class="w3-padding-16">Epäkäslihakset</li>
                                <li>   <h2 class="w3-wide"><i class="fa"></i> 6 sarjaa</h2>
                                    <span class="w3-opacity">6min</span>
                                </li>
                                <li class="w3-theme-l5 w3-padding-24">
                                    <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
            <h4>Seuraa meitä</h4>
            <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Facebook"><i class="fa fa-facebook"></i></a>
            <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Twitter"><i class="fa fa-twitter"></i></a>
            <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-google-plus"></i></a>
            <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-instagram"></i></a>
            <a class="w3-button w3-large w3-teal w3-hide-small" href="javascript:void(0)" title="Linkedin"><i class="fa fa-linkedin"></i></a>
            <p>Powered by <a href="main.php" target="_blank">&copy;Team FixFit</a></p>

            <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
                <span class="w3-text w3-padding w3-teal w3-hide-small">Go To Top</span>   
                <a class="w3-button w3-theme" href="#myPage"><span class="w3-xlarge">
                    <i class="fa fa-chevron-circle-up"></i></span></a>
            </div>
        </footer>
        <script>
            function myFunction() {
                alert("invalid email-address or password!");
            }
        </script>
        <script>
            // script for slideshow
            var myIndex = 0;
            carousel();

            function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";  
                }
                myIndex++;
                if (myIndex > x.length) {myIndex = 1}    
                x[myIndex-1].style.display = "block";  
                setTimeout(carousel, 8000); // Change image every 8 seconds
            }
        </script>
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
