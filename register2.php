
<!DOCTYPE html>
<html>
    <title>FIXFIT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="w3-update.css">
    <link rel="stylesheet" href="w3-theme-black.css">
    <link rel="stylesheet" href="font-awesome_min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <body id="myPages" class="register backgroundimg">

        <!-- Navbar -->
        <div class="w3-top">
            <div class="w3-bar w3-theme-d2 w3-left-align">
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
                <a href="main.php" class="w3-bar-item w3-button w3-teal">FIXFIT</a>
                <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-teal" title="Search"><i class="fa fa-search"></i></a>
            </div>

            <!-- Navbar on small screens -->
            <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
                <a href="#" class="w3-bar-item w3-button">Search</a>
            </div>
        </div>

        <!-- Contact Container -->
        <div class="w3-container">
            <div class="w3-row"><br>
                <div class="w3-third w3-display-middle" style="top:60%">
                    <h1 class="w3-center">Rekisteröidy tästä!</h1>
                    <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="" method="post">
                        <div class="w3-section">
                            <label>Etunimi</label>
                            <input class="w3-input" type="text" name="first" required>
                        </div>
                        <div class="w3-section">
                            <label>Sukunimi</label>
                            <input class="w3-input" type="text" name="last" required>
                        </div>
                        <div class="w3-section">
                            <label>Syntymäaika</label>
                            <input class="w3-input" type="date" name="dob" required>
                        </div>
                        <div class="w3-section">
                            <label>Sähköpostiosoite</label>
                            <input class="w3-input" type="email" name="email" placeholder="testi.esimerkki@gmail.com" required>
                        </div>
                        <div class="w3-section">
                            <label for="password">Salasana (minimi 8 merkkiä)</label>
                            <input class="w3-input" type="password" name="password" required>
                        </div>                   
                        <div class="w3-section">
                            <label for="psw-repeat">Toista salasana</label>
                            <input class="w3-input" type="password" name="psw-repeat" required>
                        </div>
                        <button type="reset" style="display:inline" class="w3-button w3-large w3-right w3-theme" value="Reset">Tyhjennä</button>
                        <input type="submit" style="display:inline;margin-right:2px" class="w3-button w3-large w3-right w3-theme" value="lähetä" name="laheta">

                        <button type="button" onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-large w3-theme" title="Kysymys">Kysymyksiä?</button>
                    </form>
                    <div>
                        <?php
                        session_start(['cookie_lifetime' => 3600]);
                        
                        // Open config.ini file, that contains login-info for DB.
                        $config = parse_ini_file("../../config.ini");
                        // connect to the database  
                        $conn = mysqli_connect($config['dbaddr'],$config['username'],$config['password'],$config['dbname'],$config['dbport']);
                        // Check connection
                        if (!$conn) {
                            die("Connection failed!: " . mysqli_connect_error());
                        }
                        
                        // initializing variables
                        $username = "";
                        $email    = "";
                        $errors = array(); 

                        // REGISTER USER
                        if (isset($_POST['laheta'])) {
                            // receive all input values from the form
                            $username = mysqli_real_escape_string($conn, $_POST['useremail']);
                            $email = mysqli_real_escape_string($conn, $_POST['email']);
                            $password1 = mysqli_real_escape_string($conn, $_POST['password']);
                            $password2 = mysqli_real_escape_string($conn, $_POST['psw-repeat']);
                            $dob = mysqli_real_escape_string($conn, $_POST['dob']);
                            $first = mysqli_real_escape_string($conn, $_POST['first']);
                            $last = mysqli_real_escape_string($conn, $_POST['last']);
                            //echo $_POST['useremail']; AND THIS WORKS ! ! !
                            // by adding (array_push()) corresponding error unto $errors array
                            if ($password1 !== $password2) {
                                array_push($errors, "<b class='blink_me' style='color:red>The two passwords do not match<b/>");
                            }

                            // first check the database to make sure 
                            // a user does not already exist with the same username and/or email
                            $user_check_query = "SELECT email FROM user WHERE email = '$email'";
                            $result = mysqli_query($conn, $user_check_query);
                            $user = mysqli_fetch_assoc($result);

                            if ($user) { // if user exists
                                if ($user['email'] === $email) {
                                    array_push($errors, "<b class='blink_me' style='color:red>Email-address already exists!</b>");
                                }
                            }
                            
                            $emailtest = test_input($email);
                            if (!filter_var($emailtest, FILTER_VALIDATE_EMAIL)) {
                                array_push($errors, "<b class='blink_me' style='color:red> Invalid email format</b>"); 
                            }
                            
                            // Register user if there are no errors in the form
                            if (count($errors) == 0) {
                                $password = md5($password1);//encrypt the password before saving in the database

                                $insertquery = "INSERT INTO user (date_of_birth, email, password, first, last) 
                                VALUES('$dob', '$email', '$password1', '$first', '$last')";
                                if(mysqli_query($conn, $insertquery)){
                                } 
                                else {
                                    echo "ERROR: Could not able to execute $insertquery. " . mysqli_error($conn);
                                }
                                echo"<br>";
                                //echo $insertquery;  PRINT QUERRY FOR TEST! IT WORKS!!
                                $_SESSION['first2'] = $first;
                                $_SESSION['insertquery'] = $insertquery;
                                $_SESSION['success'] = "Hi " . $_SESSION['first2'] . ". You can now login -->";
                                sleep(0.5);
                                header("location:main.php");
                            }
                            elseif  (count($errors) > 0) {
                                $arrlength=count($errors);
                                for($x=0;$x<$arrlength;$x++)
                                  {
                                  echo $errors[$x];
                                  echo "<br>";
                                  }
                                //echo "Something went wrong in your registering prosses";
                            }
                        }
                        
                        ?>
                    </div>    
                </div>
                <!--modal-->
                <div id="id01" class="w3-modal">
                    <div class="w3-modal-content w3-card-4 w3-animate-top">
                        <header class="w3-container w3-teal w3-display-container"> 
                            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal w3-large w3-display-topright"><i class="fa fa-remove"></i></span>
                            <h4>Kysymyksiä?</h4>
                        </header>
                        <div class="w3-container">
                            <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="lahetys.php" method="post">
                                <div class="w3-section">
                                    <label>Nimi</label>
                                    <input class="w3-input" type="text" name="name">
                                </div>
                                <div class="w3-section">
                                    <label>Sähköpostiosoite (testi.esimerkki@gmail.com)</label>
                                    <input class="w3-input" type="email" name="email">
                                </div>
                                <div class="w3-section">
                                    <label>Kysymys</label>
                                    <textarea style="height:auto" class="w3-input" type="text" name="message" maxlength="250"></textarea> 
                                </div>
                                <button type="reset" style="display:inline" class="w3-button w3-right w3-theme" value="Reset">Tyhjennä</button>
                                <input type="submit" style="display:inline;margin-right:2px" class="w3-button w3-right w3-theme" value="Lähetä">
                            </form>

                        </div>
                        <footer class="w3-container w3-teal">
                            <p>TEAM FIXFIT/LOGO</p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer 
<footer class="w3-container w3-padding-32 w3-theme-d1 w3-center w3-bottom w3-hide-small" id="footer">

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
-->
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

            function myFunction() {
                var x = document.getElementById("footer");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            } 
        </script>
    </body>
</html>
