
<!DOCTYPE html>
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
}
?>
<html>
    <title>W3.CSS Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="w3-update.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="font-awesome_min.css">
    <body id="myPage" class="backgroundimg">

        <!-- Sidebar on click -->

        <nav class=" w3-sidebar1 w3-bar-block1 w3-white w3-card w3-animate-left w3-xxlarge" style="display:none;z-index:2" id="mySidebar">
            <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-display-topright w3-text-teal">Sulje
                <i class="fa fa-remove"></i>
            </a>
            <div class="backgroundimg">
                <a href="#Käsitreenit" class="w3-bar-item w3-button">Kädet</a>
                <a href="#Jalkatreenit" class="w3-bar-item w3-button">Jalat</a>
                <a href="#Rintatreenit" class="w3-bar-item w3-button">Rinta</a>
                <a href="#Vatsatreenit" class="w3-bar-item w3-button">Vatsa</a>
                <a href="#Selkätreenit" class="w3-bar-item w3-button">Selkä</a>
                <a href="#Kokokehon" class="w3-bar-item w3-button">Koko keho</a>
            </div>
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
                ?>
                <div class="w3-dropdown-hover w3-hide-small">
                    <form action="treenit.php">
                        <button class="w3-button" title="Notifications" style="background-color:grey"><a href="treenit.php" class="textdeco">Treenit </a><i class="fa fa-caret-down"></i></button>
                        <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                            <a href="#Käsitreenit" class="w3-bar-item w3-button">Kädet</a>
                            <a href="#Jalkatreenit" class="w3-bar-item w3-button">Jalat</a>
                            <a href="#Rintatreenit" class="w3-bar-item w3-button">Rinta</a>
                            <a href="#Vatsatreenit" class="w3-bar-item w3-button">Vatsa</a>
                            <a href="#Selkätreenit" class="w3-bar-item w3-button">Selkä</a>
                            <a href="#Kokokehon" class="w3-bar-item w3-button">Koko keho</a>
                        </div>
                    </form>
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
                        echo '<a href="profile.php" title="Profiili" class="w3-bar-item2 w3-button w3-teal"><i class="fa fa-user-circle-o fa-fw w3-margin-right w3-large"></i>' . $_SESSION['first'] . '</a>';
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
                <!--
<div class="w3-dropdown-hover w3-hide-small">
<button class="w3-button" title="Notifications">Treenit <i class="fa fa-caret-down"></i></button>
<div class="w3-dropdown-content w3-card-4 w3-bar-block">
<a href="#Käsitreenit" class="w3-bar-item w3-button">Kädet</a>
<a href="#Jalkatreenit" class="w3-bar-item w3-button">Jalat</a>
<a href="#Rintatreenit" class="w3-bar-item w3-button">Rinta</a>
<a href="#Vatsatreenit" class="w3-bar-item w3-button">Vatsa</a>
<a href="#Selkätreenit" class="w3-bar-item w3-button">Selkä</a>
</div>
-->
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
        <!-- Sivuston kouluttajat -->
        <div class="w3-display-container w3-animate-opacity">
            <div class="w3-row-padding w3-padding-64 w3-theme-l1" id="work">
                <h2 class="w3-wide"><i class="fa"></i>Sivustolla esiintyvät kouluttajat</h2>
                <div class="w3-display-container w3-third">
                    <img src="img/athlean-x.jpg" alt="jeff" style="width:100%;margin-top:4px">
                    <h2>1. Jeff Cavalieren</h2>
                    <p>Jeff on fysiatri ja ammattilaisurheilijoiden kouluttaja, jonka videoista oppii lihaskuntoharjoittelulle olennaista anatomiaa, oikeaoppisia liikkeitä ja muuta tärkeätä tietoa treenaamisesta.</p>
                </div>
                <div class="w3-display-container w3-third nro2">
                    <img src="img/chris.jpg" alt="Chris Heria" style="width:100%;margin-top:4px">
                    <h2>2. Chris Heria</h2>
                    <p>Chris on uskomattoman vahva voimistelija, joka opettaa paljon kehonpainoa hyödyntäviä voimistelutreenejä kaikentasoisille ihmisille.</p>
                </div>
                <div class="w3-display-container w3-third nro3">
                    <img src="img/scooby.jpg" alt="Scooby" style="width:100%;height:100%;margin-top:4px">
                    <h2>3. Scooby</h2>
                    <p>Scoobilta löytyy hyviä ratkaisuja urheiluvälineiden hankkimiseen ja kotitreeneihin</p>
                </div>
            </div>
        </div>

        <!-- Modal navbar -->
        <div class="w3-bar w3-theme-d2 w3-left-align">
            <div class="w3-container centertreenit">
                <div class="w3-bar-item w3-button" style="display:block">
                    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-medium" title="Aloittelijoille"><b>Aloittelijat</b></button>
                </div>
                <div class="w3-bar-item w3-button" style="display:block">
                    <button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-medium" title="Terveys"><b>Terveys</b></button>
                </div>

                <div class="w3-bar-item w3-button" style="display:block">
                    <button onclick="document.getElementById('id03').style.display='block'" class="w3-button w3-medium" title="Ruokavalio"><b>Ruokavalio</b></button>
                </div>
                <div class="w3-bar-item w3-button" style="display:block">
                    <button onclick="document.getElementById('id04').style.display='block'" class="w3-button w3-medium" title="Kardiosta"><b>Kardiosta</b></button>
                </div>
                <div class="w3-bar-item w3-button" style="display:block">
                    <button onclick="document.getElementById('id05').style.display='block'" class="w3-button w3-medium" title="Treeneistä"><b>Treeneistä</b></button>
                </div>
            </div>
        </div>

        <!-- MODAL -->
        <div id="id02" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-top">
                <header class="w3-container w3-teal w3-display-container"> 
                    <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
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


        <!-- Aloittelijalle informaatiota -->

        <div id="id01" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-top">
                <header class="w3-container w3-teal w3-display-container">
                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
                    <h4>Aloittelijalle</h4>
                </header>
                <div class="w3-container">
                    <div class="w3-container w3-card-4 w3-padding-16">
                        <h5>Aloittelijalla tietoa treenaamisesta</h5>
                        <p>Infoa</p>
                    </div>
                </div>
                <footer class="w3-container w3-teal">
                    <p>TEAM <img src="img/FixFit_red_white-border.png" style="width:12%"></p>
                </footer>
            </div>
        </div>
        <!-- TERVEYS -->
        <div id="id02" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-top">
                <header class="w3-container w3-teal w3-display-container">
                    <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
                    <h4>Terveys</h4>
                </header>
                <div class="w3-container">
                    <div class="w3-container w3-card-4 w3-padding-16">
                        <h5>Tietoa terveydestä</h5>
                        <p>Terveys...</p>
                    </div>
                </div>
                <footer class="w3-container w3-teal">
                    <p>TEAM <img src="img/FixFit_red_white-border" style="width:12%"></p>
                </footer>
            </div>
        </div>

        <!-- RUOKAVALIO -->
        <div id="id03" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-top">
                <header class="w3-container w3-teal w3-display-container">
                    <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
                    <h4>Ruokavalio</h4>
                </header>
                <div class="w3-container">
                    <div class="w3-container w3-card-4 w3-padding-16 ">
                        <h5><b>Mikä on hyvä ruokavalio?   (Dr. Nūn Sava-Siva Amen-Ra)</b></h5>
                        <p>Ruokavalio, joka:</p>
                        <p>- tyydyttää makunystyrät?</p>
                        <p>- taltuttaa nälkää? </p>
                        <p>- edistää laihtumista?</p>
                        <p>Dr. Nūn Amen-Ran määritelmän mukaan hyvä ruokavalio on <b>optimaalinen ruokavalio</b>, joka teoreettisesti tai todistettavissa takaa maksamaalisen pitkäikäisyyden ja vireyden, vastustuskyvyn paranemisen ja neurokogtiviisisen toiminnallisuuden säilyttämisen tai lisäämisen.
                            Tärkein puoli ravinnosta on elintärkeiden ravinteiden saaminen.

                        </p>
                        <h5><b>Meal planner</b></h5>
                        <p>Scoobilta löytyy ohjelma, josta voi laskea mm. päivittäisen proteiinin, kalorien ja rasvan tarpeen riippuen tavoitteesta. <a href>http://scoobysworkshop.com/weight-loss-meal-planner/ </a></p>

                        <h5><b>Lisäravinteet</b></h5>
                        <p>Terveellinen ruokavalio sisältää harvoin kaikki tarpeelliset ravinteet. Lisätietoa lisäravinteista: <a href>https://www.youtube.com/watch?v=NhK0kyJj00s</a> </p>
                    </div>
                </div>
                <footer class="w3-container w3-teal">
                    <p>TEAM <img src="img/FixFit_red_white-border" style="width:12%"></p>
                </footer>
            </div>
        </div>
        <!-- Kardiosta -->  
        <div id="id04" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-top">
                <header class="w3-container w3-teal w3-display-container">
                    <span onclick="document.getElementById('id04').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
                    <h4>Kardiosta</h4>
                </header>
                <div class="w3-container">
                    <div class="w3-container w3-card-4 w3-padding-16">

                        <p>Kardiota on hyvä tehdä joka päivä (jopa jalkapäivänä).</p>
                        <p>Kardioita kalorinpolttotehokkuuden mukaan:</p><br>
                        <p>1. </p>
                        <p>2. </p>
                        <p>3. </p>
                        <p>4. </p>
                        <p>5. </p>
                        <p>6. </p>
                        <p>7. </p>
                        <p>8. </p>
                        <p>9. </p>
                    </div>
                </div>
                <footer class="w3-container w3-teal">
                    <p>TEAM <img src="img/FixFit_red_white-border" style="width:12%"></p>
                </footer>
            </div>
        </div>
        <!-- Treenauksesta -->
        <div id="id05" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-top">
                <header class="w3-container w3-teal w3-display-container">
                    <span onclick="document.getElementById('id05').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
                    <h4>Treenauksesta</h4>
                </header>
                <div class="w3-container">
                    <div class="w3-container w3-card-4 w3-padding-16">
                        <h5>Kuinka usein treenaat tiettyä lihasryhmää?</h5>
                        <p>Vatsalihakset (poikkeus)</p>
                        <p>Vatsalihakset ovat siinä mielessä erilainen lihasryhmä kuin muut, koska ne ovat rakentuneet ja tottuneet tekemään jatkuvasti töitä. Vatsalihakset pitävät yölläkin kehoa koossa. Niitä voi ja kannattaakin treenata joka päivä.</p>
                        <p>Jalkatreenit</p>
                        <p>Jaloissa on suuria lihaksia, joiden palautuminen vie enemmän aikaa, joten niiden palautumisessa kestää pitkään(n. 6 päivää).</p>
                    </div>
                </div>
                <footer class="w3-container w3-teal">
                    <p>TEAM <img src="img/FixFit_red_white-border" style="width:12%"></p>
                </footer>
            </div>
        </div>
        <div class="w3-container w3-padding-large w3-center">
            <p class="w3-xxxlarge">Treenejä lihasryhmien mukaan</p>
        </div>
        <!-- Treenit joka kehon osalle erikseen -->
        <hr class="hr">
        <div class="w3-container w3-padding-small w3-center">
            <div class="w3-container w3-padding-small w3-center" id="Käsitreenit">
                <div class="w3-container w3-padding-large w3-center">
                    <p class="w3-xxlarge">Käsitreenit</p>
                </div>
                <div class="w3-padding-16 treenit">
                    <div class="treenitpad w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-hover-shadow">
                            <li class="w3-theme">
                                <h3>Hauikset</h3>
                            </li>
                            <iframe width="100%" height="344" src="https://www.youtube.com/embed/kzohU7hbN9I?" frameborder="0" allowfullscreen>
                            </iframe>
                            <li class="w3-theme-l5 w3-padding-24">
                                <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                            </li>
                        </ul>
                    </div>

                    <div class="treenitpad w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-hover-shadow">
                            <li class="w3-theme">
                                <h3>Ojentajat</h3>
                            </li>
                            <iframe width="100%" height="344" src="https://www.youtube.com/embed/8B_uf-lR8cI?" frameborder="0" allowfullscreen>
                            </iframe>

                            <li class="w3-theme-l5 w3-padding-24">
                                <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                            </li>
                        </ul>
                    </div>
                    <div class="treenitpad w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-hover-shadow">
                            <li class="w3-theme">
                                <h3>Kyynärvarret</h3>
                            </li>
                            <iframe width="100%" height="344" src="https://www.youtube.com/embed/kSxKXaxujRg?" frameborder="0" allowfullscreen>
                            </iframe>

                            <li class="w3-theme-l5 w3-padding-24">
                                <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <hr class="hr">
            <div class="w3-container w3-padding-32 w3-center" id="Jalkatreenit">
                <div class="w3-container w3-padding-large w3-center">
                    <p class="w3-xxlarge">Jalkatreenit</p>
                </div>
                <div class="w3-padding-16 treenit">
                    <div class="treenitpad w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-hover-shadow">
                            <li class="w3-theme">
                                <h3>Treeni 1</h3>
                            </li>
                            <iframe width="100%" height="344" src="https://www.youtube.com/embed/4H920oAfowE?" frameborder="0" allowfullscreen>
                            </iframe>

                            <li class="w3-theme-l5 w3-padding-24">
                                <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                            </li>
                        </ul>
                    </div>

                    <div class="treenitpad w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-hover-shadow">
                            <li class="w3-theme">
                                <h3>Treenit 2</h3>
                            </li>
                            <iframe width="100%" height="344" src="https://www.youtube.com/embed/q3FLp036yhk?" frameborder="0" allowfullscreen>
                            </iframe>

                            <li class="w3-theme-l5 w3-padding-24">
                                <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                            </li>
                        </ul>
                    </div>
                    <div class="treenitpad w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-hover-shadow">
                            <li class="w3-theme">
                                <h3>Treeni 3</h3>
                            </li>
                            <iframe width="100%" height="344" src="https://www.youtube.com/embed/MAHMUc3vEWo?" frameborder="0" allowfullscreen>
                            </iframe>

                            <li class="w3-theme-l5 w3-padding-24">
                                <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <hr class="hr">
            <div class="w3-container w3-padding-32 w3-center" id="Rintatreenit">
                <div class="w3-container w3-padding-large w3-center">
                    <p class="w3-xxlarge">Rintatreenit</p>
                </div>
                <div class="w3-padding-16 treenit">    
                    <div class="treenitpad w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-hover-shadow">
                            <li class="w3-theme">
                                <h3>Treeni 1</h3>
                            </li>
                            <iframe width="100%" height="344" src="https://www.youtube.com/embed/kBJTLMaJZrQ?" frameborder="0" allowfullscreen>
                            </iframe>

                            <li class="w3-theme-l5 w3-padding-24">
                                <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                            </li>
                        </ul>
                    </div>

                    <div class="treenitpad w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-hover-shadow">
                            <li class="w3-theme">
                                <h3>Treenit 2</h3>
                            </li>
                            <iframe width="100%" height="344" src="https://www.youtube.com/embed/XqPe_iAm8lI?" frameborder="0" allowfullscreen>
                            </iframe>

                            <li class="w3-theme-l5 w3-padding-24">
                                <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                            </li>
                        </ul>
                    </div>
                    <div class="treenitpad w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-hover-shadow">
                            <li class="w3-theme">
                                <h3>Treeni 3</h3>
                            </li>
                            <iframe width="100%" height="344" src="https://www.youtube.com/embed/FU_5LPjtjus?" frameborder="0" allowfullscreen>
                            </iframe>

                            <li class="w3-theme-l5 w3-padding-24">
                                <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="hr">
            <div class="w3-container w3-padding-32 w3-center" id="Vatsatreenit">
                <div class="w3-container w3-padding-large w3-center">
                    <p class="w3-xxlarge">Vatsatreenit</p>
                </div>
                <div class="w3-padding-16 treenit">
                    <div class="treenitpad w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-hover-shadow">
                            <li class="w3-theme">
                                <h3>Treeni 1</h3>
                            </li>
                            <iframe width="100%" height="344" src="https://www.youtube.com/embed/bx9SssAikQo?" frameborder="0" allowfullscreen>
                            </iframe>

                            <li class="w3-theme-l5 w3-padding-24">
                                <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                            </li>
                        </ul>
                    </div>

                    <div class="treenitpad w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-hover-shadow">
                            <li class="w3-theme">
                                <h3>Treeni 2</h3>
                            </li>
                            <iframe width="100%" height="344" src="https://www.youtube.com/embed/LgdoQgmCA-A?" frameborder="0" allowfullscreen>
                            </iframe>

                            <li class="w3-theme-l5 w3-padding-24">
                                <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                            </li>
                        </ul>
                    </div>
                    <div class="treenitpad w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-hover-shadow">
                            <li class="w3-theme">
                                <h3>Treeni 3</h3>
                            </li>
                            <iframe width="100%" height="344" src="https://www.youtube.com/embed/9VsDP584zyQ?" frameborder="0" allowfullscreen>
                            </iframe>

                            <li class="w3-theme-l5 w3-padding-24">
                                <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="hr">

            <div class="w3-container w3-padding-64 w3-center" id="Selkätreenit">
                <div class="w3-container w3-padding-large w3-center">
                    <p class="w3-xxlarge">Selkätreenit</p>
                </div>
                <div class="w3-padding-16 treenit">
                    <div class="treenitpad w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-hover-shadow">
                            <li class="w3-theme">
                                <h3>Treeni 1</h3>
                            </li>
                            <iframe width="100%" height="344" src="https://www.youtube.com/embed/mjnseqLiVXM?" frameborder="0" allowfullscreen>
                            </iframe>

                            <li class="w3-theme-l5 w3-padding-24">
                                <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                            </li>
                        </ul>
                    </div>

                    <div class="treenitpad w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-hover-shadow">
                            <li class="w3-theme">
                                <h3>Treeni 2</h3>
                            </li>
                            <iframe width="100%" height="344" src="https://www.youtube.com/embed/I2Mu3lpUfMY?" frameborder="0" allowfullscreen>
                            </iframe>

                            <li class="w3-theme-l5 w3-padding-24">
                                <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                            </li>
                        </ul>
                    </div>
                    <div class="treenitpad w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-hover-shadow">
                            <li class="w3-theme">
                                <h3>Treeni 3</h3>
                            </li>
                            <iframe width="100%" height="344" src="https://www.youtube.com/embed/pjkZUmzvb1M?" frameborder="0" allowfullscreen>
                            </iframe>

                            <li class="w3-theme-l5 w3-padding-24">
                                <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <hr class="hr">
        <!-- Koko keho Row -->
        <div class="w3-row-padding w3-center w3-padding-64" id="Kokokehon">
            <div class="w3-container w3-padding-24 w3-center">
                <p class="w3-xxxlarge">Koko kehon treenejä</p>
            </div>
            <hr class="hr">
            <div class="w3-container w3-padding"><h2 class="w3-wide">Valitse tasosi mukaan!</h2></div>
            <div class="w3-padding-16 treenit">
                <div class="treenitpad w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-hover-shadow">
                        <li class="w3-theme">
                            <p class="w3-xlarge">Aloittelija</p>
                        </li>
                        <iframe width="100%" height="344" src="https://www.youtube.com/embed/5eV33roibqc?" frameborder="0" allowfullscreen>
                        </iframe>
                        <li class="w3-theme-l5 w3-padding-24">
                            <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                        </li>
                    </ul>
                </div>

                <div class="treenitpad w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-hover-shadow">
                        <li class="w3-theme">
                            <p class="w3-xlarge">Keskitaso</p>
                        </li>
                        <iframe width="100%" height="344" src="https://www.youtube.com/embed/ZA8GzhFh_CQ?" frameborder="0" allowfullscreen>
                        </iframe>
                        <li class="w3-theme-l5 w3-padding-24">
                            <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                        </li>
                    </ul>
                </div>

                <div class="treenitpad w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-hover-shadow">
                        <li class="w3-theme">
                            <p class="w3-xlarge">Vaikea</p>
                        </li>
                        <iframe width="100%" height="344" src="https://www.youtube.com/embed/MABMQy8CCNc?" frameborder="0" allowfullscreen>
                        </iframe>
                        <li class="w3-theme-l5 w3-padding-24">
                            <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                        </li>
                    </ul>
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
