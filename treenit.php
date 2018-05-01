
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

$main = "main.php";
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
        <nav class="w3-sidebar w3-bar-block w3-white w3-card w3-animate-left w3-xxlarge" style="display:none;z-index:2" id="mySidebar">
            <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-display-topright w3-text-teal">Close
                <i class="fa fa-remove"></i>
            </a>
            <a href="#" class="w3-bar-item w3-button">Link 1</a>
            <a href="#" class="w3-bar-item w3-button">Link 2</a>
            <a href="#" class="w3-bar-item w3-button">Link 3</a>
            <a href="#" class="w3-bar-item w3-button">Link 4</a>
            <a href="#" class="w3-bar-item w3-button">Link 5</a>
            <a href="#" class="w3-bar-item w3-button">Link 6</a>
            <a href="#" class="w3-bar-item w3-button">Link 7</a>
            <a href="#" class="w3-bar-item w3-button">Link 8</a>
            <a href="#" class="w3-bar-item w3-button">Link 9</a>
        </nav>

        <!-- Navbar -->
        <div class="w3-top">
            <div class="w3-bar w3-theme-d2 w3-left-align">
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
                <a href="main.php" class="w3-bar-item w3-button w3-teal">FIXFIT</a>
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
                <a href="main.php" class="w3-bar-item w3-button">FIXFIT</a>
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
                <a href="yhteystiedot.php" class="w3-bar-item w3-button">Yhteystiedot</a>
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

            <!--modals for navbar-->

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
                        <p>TEAM FIXFIT/LOGO</p>
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
                        <p>TEAM FIXFIT/LOGO</p>
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
                        <p>TEAM FIXFIT/LOGO</p>
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
                        <p>TEAM FIXFIT/LOGO</p>
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
                        <p>TEAM FIXFIT/LOGO</p>
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

                    <div class="w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-hover-shadow">
                            <li class="w3-theme">
                                <p class="w3-xlarge">Hauikset</p>
                            </li>
                            <iframe width="100%" height="344" src="https://www.youtube.com/embed/kzohU7hbN9I?" frameborder="0" allowfullscreen>
                            </iframe>
                            <li class="w3-theme-l5 w3-padding-24">
                                <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                            </li>
                        </ul>
                    </div>

                    <div class="w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-hover-shadow">
                            <li class="w3-theme">
                                <p class="w3-xlarge">Ojentajat</p>
                            </li>
                            <iframe width="100%" height="344" src="https://www.youtube.com/embed/8B_uf-lR8cI?" frameborder="0" allowfullscreen>
                            </iframe>

                            <li class="w3-theme-l5 w3-padding-24">
                                <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                            </li>
                        </ul>
                    </div>
                    <div class="w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-hover-shadow">
                            <li class="w3-theme">
                                <p class="w3-xlarge">Kyynärvarret</p>
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
                <p class="w3-xxlarge">Jalkatreenit</p>
                <div class="w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-hover-shadow">
                        <li class="w3-theme">
                            <p class="w3-xlarge">1.</p>
                        </li>
                        <iframe width="100%" height="344" src="https://www.youtube.com/embed/4H920oAfowE?" frameborder="0" allowfullscreen>
                        </iframe>

                        <li class="w3-theme-l5 w3-padding-24">
                            <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                        </li>
                    </ul>
                </div>

                <div class="w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-hover-shadow">
                        <li class="w3-theme">
                            <p class="w3-xlarge">2.</p>
                        </li>
                        <iframe width="100%" height="344" src="https://www.youtube.com/embed/q3FLp036yhk?" frameborder="0" allowfullscreen>
                        </iframe>

                        <li class="w3-theme-l5 w3-padding-24">
                            <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                        </li>
                    </ul>
                </div>
                <div class="w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-hover-shadow">
                        <li class="w3-theme">
                            <p class="w3-xlarge">3.</p>
                        </li>
                        <iframe width="100%" height="344" src="https://www.youtube.com/embed/MAHMUc3vEWo?" frameborder="0" allowfullscreen>
                        </iframe>

                        <li class="w3-theme-l5 w3-padding-24">
                            <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="hr">
            <div class="w3-container w3-padding-32 w3-center" id="Rintatreenit">
                <p class="w3-xxlarge">Rintatreenit</p>
                <div class="w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-hover-shadow">
                        <li class="w3-theme">
                            <p class="w3-xlarge">1.</p>
                        </li>
                        <iframe width="100%" height="344" src="https://www.youtube.com/embed/kBJTLMaJZrQ?" frameborder="0" allowfullscreen>
                        </iframe>

                        <li class="w3-theme-l5 w3-padding-24">
                            <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                        </li>
                    </ul>
                </div>

                <div class="w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-hover-shadow">
                        <li class="w3-theme">
                            <p class="w3-xlarge">2.</p>
                        </li>
                        <iframe width="100%" height="344" src="https://www.youtube.com/embed/XqPe_iAm8lI?" frameborder="0" allowfullscreen>
                        </iframe>

                        <li class="w3-theme-l5 w3-padding-24">
                            <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                        </li>
                    </ul>
                </div>
                <div class="w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-hover-shadow">
                        <li class="w3-theme">
                            <p class="w3-xlarge">3.</p>
                        </li>
                        <iframe width="100%" height="344" src="https://www.youtube.com/embed/FU_5LPjtjus?" frameborder="0" allowfullscreen>
                        </iframe>

                        <li class="w3-theme-l5 w3-padding-24">
                            <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="hr">
            <div class="w3-container w3-padding-32 w3-center" id="Vatsatreenit">
                <p class="w3-xxlarge">Vatsatreenit</p>
                <div class="w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-hover-shadow">
                        <li class="w3-theme">
                            <p class="w3-xlarge">1.</p>
                        </li>
                        <iframe width="100%" height="344" src="https://www.youtube.com/embed/bx9SssAikQo?" frameborder="0" allowfullscreen>
                        </iframe>

                        <li class="w3-theme-l5 w3-padding-24">
                            <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                        </li>
                    </ul>
                </div>

                <div class="w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-hover-shadow">
                        <li class="w3-theme">
                            <p class="w3-xlarge">2.</p>
                        </li>
                        <iframe width="100%" height="344" src="https://www.youtube.com/embed/LgdoQgmCA-A?" frameborder="0" allowfullscreen>
                        </iframe>

                        <li class="w3-theme-l5 w3-padding-24">
                            <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                        </li>
                    </ul>
                </div>
                <div class="w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-hover-shadow">
                        <li class="w3-theme">
                            <p class="w3-xlarge">3.</p>
                        </li>
                        <iframe width="100%" height="344" src="https://www.youtube.com/embed/9VsDP584zyQ?" frameborder="0" allowfullscreen>
                        </iframe>

                        <li class="w3-theme-l5 w3-padding-24">
                            <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="hr">

            <div class="w3-container w3-padding-64 w3-center" id="Selkätreenit">
                <p class="w3-xxlarge">Selkätreenit</p>
                <div class="w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-hover-shadow">
                        <li class="w3-theme">
                            <p class="w3-xlarge">1.</p>
                        </li>
                        <iframe width="100%" height="344" src="https://www.youtube.com/embed/mjnseqLiVXM?" frameborder="0" allowfullscreen>
                        </iframe>

                        <li class="w3-theme-l5 w3-padding-24">
                            <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                        </li>
                    </ul>
                </div>

                <div class="w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-hover-shadow">
                        <li class="w3-theme">
                            <p class="w3-xlarge">2.</p>
                        </li>
                        <iframe width="100%" height="344" src="https://www.youtube.com/embed/I2Mu3lpUfMY?" frameborder="0" allowfullscreen>
                        </iframe>

                        <li class="w3-theme-l5 w3-padding-24">
                            <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                        </li>
                    </ul>
                </div>
                <div class="w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-hover-shadow">
                        <li class="w3-theme">
                            <p class="w3-xlarge">3.</p>
                        </li>
                        <iframe width="100%" height="344" src="https://www.youtube.com/embed/pjkZUmzvb1M?" frameborder="0" allowfullscreen>
                        </iframe>

                        <li class="w3-theme-l5 w3-padding-24">
                            <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                        </li>
                    </ul>
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
                <div class="w3-third w3-margin-bottom">
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

                <div class="w3-third w3-margin-bottom">
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

                <div class="w3-third w3-margin-bottom">
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
