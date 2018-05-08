
<!DOCTYPE html>
<?php
session_start(['cookie_lifetime' => 0]);
if (isset($_SESSION['first2'])) {
    unset($_SESSION['first2']);
}
?>
<html>
    <title>Fixfit</title>
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
                <a href="main.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>FIXFIT</a>
                <a href="profile.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white" style="background-color:grey;text-shadow: 3px 3px 3px #000000;">Profiili</a>
                <a href="treenit.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Treenit</a>
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
                        echo '<a href="profile.php" title="Profiili" class="w3-bar-item2 w3-button w3-teal"><i class="fa fa-user-circle-o fa-fw w3-margin-right w3-large"></i>' . $_SESSION['first'] . '</a>';
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
            </div>


            <!-- Navbar on small screens -->
            <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
                <a href="treenit.php" class="w3-bar-item w3-button">Treenit</a>
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
       <!--muokkaus modaali-->
              <div id="id01" class="w3-modal">
                <div class="w3-modal-content w3-card-4 w3-animate-top">
                  <header class="w3-container w3-teal w3-display-container"> 
                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
                    <h4>Tietojen muokkaus</h4>
                  </header>
                  <div class="w3-container">
                    <form class="w3-container w3-card-4 w3-padding-16 w3-white fontti" method="post" action="" enctype="multipart/form-data">
                      <?php
                      $config = parse_ini_file("../../config.ini");
                      $conn = mysqli_connect($config['dbaddr'],$config['username'],$config['password'],$config['dbname'],$config['dbport']);
                                       // Check connection
                      if (!$conn) {
                       die("Connection failed!: " . mysqli_connect_error());
                     }

                     if(isset($_SESSION['email'])){
                      $email = mysqli_real_escape_string($conn, $_SESSION['email']);
                      $checkemail = "SELECT email FROM weight WHERE email = '$email'";
                      $result1 = mysqli_query($conn, $checkemail);
                      $check = $result1->fetch_assoc();
                      $birthday = "SELECT date_of_birth FROM user WHERE email = '$email'";
                      $bdquery = mysqli_query($conn, $birthday);

                      $row3 = $bdquery->fetch_assoc();

                    if ($check) { // if user exists
                     if ($check['email'] === $email) {
                                                   //echo "User already exist"; toimii!
                     }
                   } else {
                     $update = "INSERT INTO weight (email) VALUES ('$email')";
                     $result2 = mysqli_query($conn, $update);
                     $check2 = mysqli_fetch_assoc($result2);
                                               //var_dump($result2);
                   }

                   $lastsave1 = "SELECT * FROM user WHERE email = '$email'";
                   $sqllast = mysqli_query($conn, $lastsave1);
                   $rowU = $sqllast->fetch_assoc();

                   $lastsave2 = "SELECT * FROM weight WHERE email = '$email'";
                   $sqllast2 = mysqli_query($conn, $lastsave2);
                   $rowW = $sqllast2->fetch_assoc();

                 }
                 ?>
                 <div class="w3-container pad2">
                  <label class="w3-left labels">Pituus
                    <input class="inputs w3-right" type="number" step="0.01" name="height" placeholder="m" value="<?= $rowU['height'] ?>">
                  </label>
                </div>
                <div class="w3-container pad2">
                  <label class="w3-left labels">Paino
                    <input class="inputs w3-right" type="number" name="weight" placeholder="kg" value="<?= $rowW['value'] ?>">
                  </label>
                </div>
                <div class="w3-container pad2">
                  <label class="w3-left labels">Tavoite paino
                    <input class="inputs w3-right" type="number" name="weight2" placeholder="kg" value="<?= $rowW['target'] ?>">
                  </label>
                </div>
                <div class="w3-container pad2">
                  <label class="w3-left labels">Sukupuoli
                    <select class="inputs w3-right" name="gender" value="<?= $rowU['gender'] ?>">
                      <option value="Mies">Mies</option>
                      <option value="Nainen">Nainen</option>
                      <option value="Muu">Muu</option>
                      <option value="Ei">En halua kertoa</option>
                    </select>
                  </label>
                </div>
                <div class="w3-container pad2">
                  <label class="w3-left labels">Kaupunki
                    <input class="inputs w3-right" type="text" name="town" value="<?= $rowU['city'] ?>">
                  </label>
                </div>
                <div class="w3-container pad2">
                  <label class="w3-left labels">Minusta
                    <input type="textarea" style="height:auto" class="w3-input w3-right" type="text" name="minusta" maxlength="500" rows="4" cols="50"  value="<?= $rowU['bio'] ?>">
                  </label>
                  <br> 
                </div>
                <input type="submit" style="display:inline;margin-right:2px" class="w3-button w3-medium w3-right w3-theme" value="Tallenna" name="Tallenna" onclick="">
              </form>
            </div>
            <footer class="w3-container w3-teal">
              <p>Modal footer</p>
            </footer>
          </div>
        </div>

        <?php

        if(isset($_SESSION['email'])){

         $sqldb = "SELECT height, gender, city, bio FROM user WHERE email = '$email'";
         $resultdb = mysqli_query($conn, $sqldb);

         $sqldb2 = "SELECT value, target FROM weight WHERE email = '$email'";
         $resultdb2 = mysqli_query($conn, $sqldb2);

         $row = $resultdb->fetch_assoc();
         $row2 = $resultdb2->fetch_assoc();

         if(isset($_POST['Tallenna'])){

           $height = mysqli_real_escape_string($conn, htmlentities($_POST['height']));
           $weight = mysqli_real_escape_string($conn, htmlentities($_POST['weight']));
           $goal = mysqli_real_escape_string($conn, htmlentities($_POST['weight2']));
           $gender = mysqli_real_escape_string($conn, htmlentities($_POST['gender']));   
           $city = mysqli_real_escape_string($conn, htmlentities($_POST['town']));
           $bio = mysqli_real_escape_string($conn, htmlentities($_POST['minusta']));

           $sql1 = "UPDATE user SET height = '$height', gender = '$gender', city = '$city', bio = '$bio' WHERE email = '$email'";
           $query1 = mysqli_query($conn, $sql1);
                                               //$recheck1 = mysqli_fetch_assoc($query1);
                                               //echo $sql1; toimii

           $sql2 = "UPDATE weight SET date = NOW(), value = '$weight', target = '$goal' WHERE email = '$email'";
           $query2 = mysqli_query($conn, $sql2);
                                               //$recheck2 = mysqli_fetch_assoc($query2);
                                               //echo $sql2; toimii

           $sql3 = "SELECT height, gender, city, bio FROM user WHERE email = '$email'";
           $result3 = mysqli_query($conn, $sql3);

           $sql4 = "SELECT value, target FROM weight WHERE email = '$email'";
           $result4 = mysqli_query($conn, $sql4);

           $row = $result3->fetch_assoc();
           $row2 = $result4->fetch_assoc();

         }
       }
       ?>
       
        <!--Profiili-->
        <div class="w3-row w3-row-padding-64">
            <form action="" method="post" class="w3-container w3-padding w3-card-4 center3 profiili fontti pad">
              <div class="w3-container w3-center pad2">
                <h2><?php echo $_SESSION['first'];?></h2>
              </div>
              <hr>
              <div class="w3-container pad2">
                <label class="labels w3-left">Syntymäaika
                  <span class="w3-right"><?php echo date("d.m.Y", strtotime($row3["date_of_birth"]));?></span>
                </label>
              </div>
              <div class="w3-container pad2">
                <label class="labels w3-left">Sukupuoli
                  <span class="w3-right"><?php echo $row["gender"];?></span>
                </label>
              </div>
              <div class="w3-container pad2">
                <label class="labels w3-left">Kaupunki
                  <span class="w3-right"><?php echo $row["city"];?></span>
                </label>
              </div>
              <hr>
              <div class="w3-container pad2">
                <label class="labels w3-left">Pituus (m)
                  <input class="w3-right inputbox" type="text" id="height" value="<?php echo $row["height"];?>" readonly>
                </label>
              </div>
              <div class="w3-container pad2">
                <label class="labels w3-left">Paino (kg)
                  <input class="w3-right inputbox" type="text" id="weight" value="<?php echo $row2["value"];?>" readonly>
                </label>
              </div>
              <div class="w3-container pad2">
                <label class="labels w3-left">Tavoite paino (kg)
                  <span class="w3-right"><?php echo $row2["target"];?></span>
                </label>
              </div>
              <hr>
              <div class="w3-container w3-center pad2">
                <label class="pad3" style="width: 100%;">Haluatko tietää oman BMI:n eli painoindeksin?</label><br>                
                <div class="w3-container">
                  <input type="button" value="Laske BMI!" onclick="Laske()"><br>
                  <span id="output"></span>
                </div>
                <a class="pad3" href="https://www.terveyskirjasto.fi/terveyskirjasto/tk.koti?p_artikkeli=dlk01001" alt="painoindeksista">Lue lisää painoindeksistä.</a>
              </div>
              <hr>
              <div class="w3-container pad2">
                <label>Kerro jotain itsestäsi <i class="fa fa-smile-o fa-fw"></i>
                  <textarea wrap="off" cols="30" rows="5" maxlength="250" class="w3-left w3-input area" readonly><?php echo $row["bio"];?></textarea>
                </label>
              </div>
              <div>
                <button type="button" class="w3-button w3-teal w3-right" onclick="document.getElementById('id01').style.display='block'" title="Muokkaa">Muokkaa profiilia</button>
              </div>
            </form>
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
            function Laske(){
                //Obtain user inputs
                var height = Number(document.getElementById("height").value);

                var weight = Number(document.getElementById("weight").value);

                //Perform calculation
                var BMI = weight/Math.pow(height,2);
                //Display result of calculation

                document.getElementById("output").innerHTML = Math.round(BMI * 100)/100; 
              }
            </script>
    </body>
</html>
