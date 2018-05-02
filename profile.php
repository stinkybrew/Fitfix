
<!DOCTYPE html>
<?php
session_start(['cookie_lifetime' => 0]);
if (isset($_SESSION['first2'])) {
    unset($_SESSION['first2']);
}
?>
<html>
    <title>W3.CSS Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="w3-update.css">
    <link rel="stylesheet" href="w3-theme-black.css">
    <link rel="stylesheet" href="font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <body id="myPage" class="backgroundimg">

        <!-- Sidebar on click -->
        <nav class="w3-sidebar w3-bar-block w3-white w3-card w3-animate-left w3-xxlarge" style="display:none;z-index:2" id="mySidebar">
            <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-display-topright w3-text-teal">Close
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
                <a href="profile.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white" style="background-color:grey">Profiili</a>
                <div class="w3-dropdown-hover w3-hide-small">
                    <button class="w3-button" title="Notifications"><a href="treenit.php">Treenit</a><i class="fa fa-caret-down"></i></button>
                    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                        <a href="#Käsitreenit" class="w3-bar-item w3-button">Kädet</a>
                        <a href="#Jalkatreenit" class="w3-bar-item w3-button">Jalat</a>
                        <a href="#Rintatreenit" class="w3-bar-item w3-button">Rinta</a>
                        <a href="#Vatsatreenit" class="w3-bar-item w3-button">Vatsa</a>
                        <a href="#Selkätreenit" class="w3-bar-item w3-button">Selkä</a>
                        <a href="#Kokokehon" class="w3-bar-item w3-button">Koko keho</a>
                    </div>
                </div>
                <a href="yhteystiedot.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Yhteystiedot</a>
                <div>
                    
                    <?php
                    session_start(['cookie_lifetime' => 0]);
                    
                    // Open config.ini file, that contains login-info for DB.
                    $config = parse_ini_file("../../config.ini");
                    // connect to the database  
                    $conn = mysqli_connect($config['dbaddr'],$config['username'],$config['password'],$config['dbname'],$config['dbport']);
                    // Check connection
                    if (!$conn) {
                        die("Connection failed!: " . mysqli_connect_error());
                    }
                    
                    // checs if session is on. if its no, login navbar field is visible!
                    elseif(!empty($_SESSION['email'])){
                        // if user is not yet logged in
                        $fields = fopen("logout.txt", "r") or die("Unable to open file!");
                        echo fread($fields,filesize("logout.txt"));
                        fclose($fields);
                        echo "<b style='color:#32FC42;float:right;padding-top:8px;margin-top:0px'>Hello " . $_SESSION['first'] . "</b>";
                    }
                    
                    // LOGOUT function !
                    $postemail = $_POST['email'];
                    if(isset($_POST['logout'])) {
                        session_start();
                        $_SESSION = array();
                        // Update login info to database!
                        $logout = "UPDATE user SET loggedin = 0 WHERE email = '$postemail'";
                        if(mysqli_query($conn, $logout)){
                            echo $userlogin;
                            echo $logout;
                        } 
                        else {
                            echo "ERROR: Could not able to execute $updatelogin. " . mysqli_error($conn);
                        }

                        if (ini_get("session.use_cookies")) {
                            $params = session_get_cookie_params();
                            setcookie(session_name(), '', time() - 42000,
                                $params["path"], $params["domain"],
                                $params["secure"], $params["httponly"]
                            );
                        }
                        session_unset();
                        session_destroy();
                        header("Location:main.php");
                    }
                    ?>
                </div>    
                <div>
                    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-teal" title="Search"><i class="fa fa-search"></i>
                    </a>
                </div>
            </div>


            <!-- Navbar on small screens -->
            <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
                <a href="main.php" class="w3-bar-item w3-button">Home</a>
                <a href="yhteystiedot.php" class="w3-bar-item w3-button">Yhteystiedot</a>
            </div>
        </div>
        <!-- profile -->
            <div class="w3-container w3-padding-64">
                <!--Profiili-->
                <div class="w3-row">
                    <div class="w3-container center2">
                    <div class="w3-container w3-padding w3-card-4 shadow center backgroundcolor pad">
                        <div class="w3-round w3-container">
                            <p class="w3-center"><img src="img/FixFit.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
                        </div>
                        <hr>
                        <div class="w3-container pad2">
                            <label class="labels w3-left"><i class="fa fa-circle fa-fw w3-margin-right w3-text-theme"></i>Pituus</label>
                            <span class="w3-right" value="<?php echo $pituus?>"></span>
                        </div>
                        <div class="w3-container pad2">
                            <label class="labels w3-left"><i class="fa fa-circle fa-fw w3-margin-right w3-text-theme"></i>Paino</label>
                            <span class="w3-right" value="<?php ?>"></span>
                        </div>
                        <div class="w3-container pad2">
                            <label class="labels w3-left"><i class="fa fa-circle fa-fw w3-margin-right w3-text-theme"></i>Tavoite paino</label>
                            <span class="w3-right" value="<?php echo "select target from user where email = '" . $_POST['email'] . "'"?>"></span>
                        </div>
                        <div class="w3-container pad2">
                            <label class="labels w3-left"><i class="fa fa-circle fa-fw w3-margin-right w3-text-theme"></i>BMI</label>
                            <span class="w3-right" id="output"></span>
                        </div>
                        <br><hr>
                        <div class="w3-container pad2">
                            <label class="labels w3-left"><i class="fa fa-transgender-alt fa-fw w3-margin-right w3-text-theme"></i>Sukupuoli</label>
                            <span class="w3-right" value="<?php echo $sukupuoli?>"></span>
                        </div>
                        <div class="w3-container pad2">
                            <label class="labels w3-left"><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i>Kaupunki</label>
                            <span class="w3-right" value="<?php echo $kaupunki?>"></span>
                        </div>
                        <div class="w3-container pad2">
                            <br>
                            <label>Minusta</label>
                            <textarea style="height:100%; width: 100%" type="text" maxlength="250" class="w3-right w3-input" value="<?php echo $minusta?>" readonly></textarea>
                        </div>
                        <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-medium w3-theme w3-hover-teal w3 w3-right" title="Muokkaa">Muokkaa</button>
                    </div>
                </div>
                </div>
            </div>
            
            <div id="id01" class="w3-modal">
                <div class="w3-modal-content w3-card-4 w3-animate-top">
                    <header class="w3-container w3-teal w3-display-container"> 
                        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
                        <h4>Tietojen muokkaus</h4>
                    </header>
                    <div class="w3-container">
                        <form class="w3-container w3-card-4 w3-padding-16 w3-white" method="post" action="" enctype="multipart/form-data">

                            <div class="w3-container pad2">
                                <label class="labels w3-left">Pituus</label>
                                <input class="inputs" type="number" name="height" step="0.01" placeholder="m">
                            </div>
                            <div class="w3-container pad2">
                                <label class="labels w3-left">Paino</label>
                                <input class="inputs" type="number" name="weight" placeholder="kg">
                            </div>
                            <div class="w3-container pad2">
                                <label class="labels w3-left">Tavoite paino</label>
                                <input class="inputs" type="number" name="weight2" placeholder="kg">
                            </div>
                            <div class="w3-container pad2">
                                <label class="labels w3-left">BMI</label>
                                <input type="button" value="Laske" onclick="Laske()"/>
                            </div>
                            <div class="w3-container pad2">
                                <label class="labels w3-left">Sukupuoli</label>
                                <select class="inputs" name="gender">
                                    <option value="man">Mies</option>
                                    <option value="woman">Nainen</option>
                                    <option value="other">Muu</option>
                                    <option value="no">En halua kertoa</option>
                                </select>
                            </div>

                            <div class="w3-container pad2">
                                <label class="labels w3-left">Kaupunki</label>
                                <input class="inputs" type="text" name="town">
                            </div>
                            <div class="w3-container pad2">
                                <label class="labels w3-left">Minusta</label>
                                <textarea style="height:auto" class="w3-input" type="text" name="minusta" maxlength="500" rows="4" cols="50"></textarea> 
                            </div>

                            <button type="reset" style="display:inline" class="w3-button w3-medium w3-right w3-theme" value="Reset">Tyhjennä</button>
                            <input type="submit" style="display:inline;margin-right:2px" class="w3-button w3-medium w3-right w3-theme" value="Tallenna" name="Tallenna" onclick="">
                        </form>
                    </div>
                    <footer class="w3-container w3-teal">
                        <p>Modal footer</p>
                    </footer>
                </div>
            </div>
            
        <!-- Footer -->
        <footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
            <h4>Follow Us</h4>
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
