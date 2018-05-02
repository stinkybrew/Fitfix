<!DOCTYPE html>
<html>
    <title>W3.CSS Template</title>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="5.0;main.php" />  
    <link rel="stylesheet" href="w3-update.css">
    <link rel="stylesheet" href="w3-theme-black.css">
    <link rel="stylesheet" href="font-awesome.min.css">
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
                <div class="w3-dropdown-hover w3-hide-small">
                    <button class="w3-button" title="Notifications">Treenit <i class="fa fa-caret-down"></i></button>
                    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                        <a href="treenit.php#Käsitreenit" class="w3-bar-item w3-button">Kädet</a>
                        <a href="treenit.php#Jalkatreenit" class="w3-bar-item w3-button">Jalat</a>
                        <a href="treenit.php#Rintatreenit" class="w3-bar-item w3-button">Rinta</a>
                        <a href="treenit.php#Vatsatreenit" class="w3-bar-item w3-button">Vatsa</a>
                        <a href="treenit.php#Selkätreenit" class="w3-bar-item w3-button">Selkä</a>
                        <a href="treenit.php#Koko kehon" class="w3-bar-item w3-button">Koko kehon</a>
                    </div>
                </div>
                <a href="yhteystiedot.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Yhteystiedot</a>
                <div>
 
                </div>
            </div>
            <!-- Navbar on small screens -->
            <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
                <a href="main.php" class="w3-bar-item w3-button">Home</a>
                <a href="profile.php" class="w3-bar-item w3-button">Profiili</a>
                <a href="#work" class="w3-bar-item w3-button">Workout</a>
                <a href="#pikatreenit" class="w3-bar-item w3-button">Pikatreenit</a>
                <a href="yhteystiedot.php" class="w3-bar-item w3-button">Yhteystiedot</a>
                <div class="w3-dropdown-hover w3-hide-small">
                    <button class="w3-button" title="Notifications">Dropdown <i class="fa fa-caret-down"></i></button>     
                    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="display:inline">
                        <a href="#" class="w3-bar-item w3-button">Link</a>
                        <a href="#" class="w3-bar-item w3-button">Link</a>
                        <a href="#" class="w3-bar-item w3-button">Link</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Image Header -->
        <div class="w3-display-container w3-animate-opacity">
            <img src="img/running_man_wider.jpg" alt="runningman" style="width:100%;min-height:150px;max-height:600px;">
            <div class="w3-container w3-display-bottomleft w3-margin-bottom">  
                <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-xlarge w3-theme w3-hover-teal blink_me" title="Go To W3.CSS"><h1 style="font-size:200%">KIITOS PALAUTTEESTASI!</h1></button>
            </div>
        </div>
        <div style="margin-top: 50px;font-size: 150%">
        </div>    
        <!-- Modal -->
        <div id="id01" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-top">
                <header class="w3-container w3-teal w3-display-container"> 
                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
                    <h4>Kiitos!</h4>
                    <h5>Because YOU can <i class="fa fa-smile-o"></i></h5>
                </header>
                <div class="w3-container">
                    <p>Cool huh? Ok, enough teasing around..</p>
                    <p>Go to our <a class="w3-text-teal" href="/w3css/default.asp">W3.CSS Tutorial</a> to learn more!</p>
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
            <p>Powered by <a href="main.php" target="_blank">Team FixFit</a></p>

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
