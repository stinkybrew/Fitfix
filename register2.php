
<!DOCTYPE html>
<html lang="fi">
    <head>
        <title>FIXFIT</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="w3-update.css">
        <link rel="stylesheet" href="w3-theme-black.css">
        <link rel="stylesheet" href="font-awesome_min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <?php
    session_start(['cookie_lifetime' => 3600]);
    if (isset($_POST['first2'])){
        echo "<script type='text/javascript'>window.location.href = 'main.php';</script>";
        exit();
    }    
    ?>
    <body id="myPages" class="register backgroundimg">

        <!-- Navbar -->
        <div class="w3-top">
            <div class="w3-bar w3-theme-d2 w3-left-align">
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
                <a href="main.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>FIXFIT</a>
            </div>
        </div>
  <div class="w3-third w3-card-4 w3-display-middle w3-padding-large w3-white">
        <h2 class="w3-center">Rekisteröidy tästä!</h2>
        <form class="w3-padding" action="register2.php" method="post">
            <div class="w3-section">
                <label >Etunimi
                    <input class="w3-input" type="text" name="first" required>
                </label>
            </div>
            <div class="w3-section">
                <label>Sukunimi
                    <input class="w3-input" type="text" name="last" required>
                </label>
            </div>
            <div class="w3-section">
                <label>Syntymäaika
                    <input class="w3-input" type="date" name="dob" required>
                </label>
            </div>
            <div class="w3-section">
                <label>Sähköpostiosoite
                    <input class="w3-input" type="email" name="email" placeholder="testi.esimerkki@gmail.com" required>
                </label>
            </div>
            <div class="w3-section">
                <select name="sukupuoli">
                    <option value="">Sukupuoli</option>
                    <option value="man">Mies</option>
                    <option value="man">Nainen</option>
                    <option value="man">Muu</option>
                </select>
            </div>
            <div class="w3-section">
                <label>Salasana (minimi 8 merkkiä)
                    <input class="w3-input" type="password" name="password" required>
                </label>
            </div>                   
            <div class="w3-section">
                <label>Toista salasana
                    <input class="w3-input" type="password" name="psw-repeat" required>
                </label>
            </div>
            <div>
                <input type="submit" style="display:inline;margin-right:2px" class="w3-button w3-right w3-large w3-theme" value="Rekisteröidy" name="laheta">
            </div>
        </form>

        <?php
        error_reporting(E_ALL);
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
            $email = mysqli_real_escape_string($conn, (htmlentities($_POST['email'])));
            $password1 = mysqli_real_escape_string($conn, (htmlentities($_POST['password'])));
            $password2 = mysqli_real_escape_string($conn, (htmlentities($_POST['psw-repeat'])));
            $dob = mysqli_real_escape_string($conn, (htmlentities($_POST['dob'])));
            $first = mysqli_real_escape_string($conn, (htmlentities($_POST['first'])));
            $last = mysqli_real_escape_string($conn, (htmlentities($_POST['last'])));
                            //echo $_POST['useremail']; AND THIS WORKS ! ! !
                            // by adding (array_push()) corresponding error unto $errors array
            if ($password1 !== $password2) {
                array_push($errors, "<b class='blink_me2' style='color:red'>The two passwords do not match<b/>");
            }

                            // first check the database to make sure 
                            // a user does not already exist with the same username and/or email
            $user_check_query = "SELECT email FROM user WHERE email = '$email'";
            $result = mysqli_query($conn, $user_check_query);
            $user = mysqli_fetch_assoc($result);

                            if ($user) { // if user exists
                                if ($user['email'] === $email) {
                                    array_push($errors, "<b class='blink_me2' style='color:red'>Email-address already exists</b>");
                                }
                            }

                            // Register user if there are no errors in the form
                            if (count($errors) == 0) {
                                $password = md5($password1);//encrypt the password before saving in the database

                                $insertquery = "INSERT INTO user (date_of_birth, email, password, first, last) 
                                VALUES('$dob', '$email', '$password', '$first', '$last')";
                                if(mysqli_query($conn, $insertquery)){
                                } 
                                else {
                                    echo "ERROR: Could not able to execute $insertquery. " . mysqli_error($conn);
                                }
                                echo"<br>";
                                //echo $insertquery;  PRINT QUERRY FOR TEST! IT WORKS!!
                                $_SESSION['first2'] = $first;
                                $_SESSION['insertquery'] = $insertquery;
                                $_SESSION['blaa'] = $first;
                                $_SESSION['success'] = "Voit nyt kirjautua sisään";
                                sleep(0.5);
                                echo "<script type='text/javascript'> document.location = 'main.php'; </script>";

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
                            else {
                            }
                        }

                        ?>
                    </div>
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
