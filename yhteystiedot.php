
<!DOCTYPE html>
<html>
    <!--testikommentti-->
    <title>FIXFIT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="w3-update.css">
    <!--<link rel="stylesheet" href="w3-theme-black.css">-->
    <link rel="stylesheet" href="font-awesome_min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <body id="myPage" class="backgroundimg">
        <!-- Navbar -->
        <div class="w3-top">
            <div class="w3-bar w3-theme-d2 w3-left-align">
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
                <a href="main.php" class="w3-bar-item w3-button w3-teal">FIXFIT</a>
                <?php
                session_start(['cookie_lifetime' => 3600]);
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
                    <form action="treenit.php">
                        <button class="w3-button textdeco" title="Notifications">Treenit <i class="fa fa-caret-down"></i></button>
                        <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                            <a href="treenit.php#Käsitreenit" class="w3-bar-item w3-button">Kädet</a>
                            <a href="treenit.php#Jalkatreenit" class="w3-bar-item w3-button">Jalat</a>
                            <a href="treenit.php#Rintatreenit" class="w3-bar-item w3-button">Rinta</a>
                            <a href="treenit.php#Vatsatreenit" class="w3-bar-item w3-button">Vatsa</a>
                            <a href="treenit.php#Selkätreenit" class="w3-bar-item w3-button">Selkä</a>
                            <a href="treenit.php#Kokokehon" class="w3-bar-item w3-button">Koko kehon</a>
                        </div>
                    </form>    
                </div>
                <a href="yhteystiedot.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white" style="background-color:grey">Yhteystiedot</a>
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
                        echo "<b style='color:#32FC42;float:right;padding-top:8px;margin-top:0px'>Hei " . $_SESSION['first'] . "</b>";
                    }
                    ?>
                    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-teal" title="Search"><i class="fa fa-search"></i>
                    </a>
                </div>

                <!-- Navbar on small screens -->
                <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
                    <a href="main.php" class="w3-bar-item w3-button">FIXFIT</a>
                    <a href="yhteystiedot.php" class="w3-bar-item w3-button" style="background-color:grey">Yhteystiedot</a>
                </div>
            </div>
        </div>

        <!--Image Header-->
        <div class="w3-display-container w3-animate-opacity">
            <!-- <img src="img/running_man_wider.jpg" alt="runningman" style="width:100%;min-height:350px;max-height:600px;"> -->
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
                                <label>Nimi</label>
                                <input class="w3-input" type="text" name="name">
                            </div>
                            <div class="w3-section">
                                <label>Sähköposti</label>
                                <input class="w3-input" type="email" name="email">
                            </div>
                            <div class="w3-section">
                                <label>Palaute</label>
                                <textarea style="height:auto" class="w3-input" type="text" name="message" maxlength="500" rows="4" cols="50"></textarea> 
                            </div>
                            <input class="w3-check" type="checkbox" checked name="like">
                            <label>Tykkään</label>
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
