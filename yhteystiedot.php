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

    <body id="myPage">
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
                <a href="main.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>
                <a href="profile.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Profiili</a>
                <div class="w3-dropdown-hover w3-hide-small">
                    <button class="w3-button" title="Notifications">Treenit <i class="fa fa-caret-down"></i></button>
                    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                        <a href="treenit.php#Käsitreenit" class="w3-bar-item w3-button">Kädet</a>
                        <a href="treenit.php#Jalkatreenit" class="w3-bar-item w3-button">Jalat</a>
                        <a href="treenit.php#Rintatreenit" class="w3-bar-item w3-button">Rinta</a>
                        <a href="treenit.php#Vatsatreenit" class="w3-bar-item w3-button">Vatsa</a>
                        <a href="treenit.php#Selkätreenit" class="w3-bar-item w3-button">Selkä</a>
                        <a href="treenit.php#Kokokehon" class="w3-bar-item w3-button">Koko kehon</a>
                    </div>
                </div>
                <a href="#work" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Work</a>
                <a href="#pikatreenit" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Pikareenit</a>
                <a href="yhteystiedot.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Yhteystiedot</a>
                <div>
                <a href="register.php" style="float:right" class="w3-bar-item w3-button w3-hide-small w3-hover-white">register</a>
                <div style="float:right;background-color:fff;padding-top:4px" class="w3-hide-small">
                    <form action=".php">
                        <label for="psw"></label>
                        <input type="text" id="psw" name="password" placeholder="Password..">
                        <label for="email"></label>
                        <input type="text" id="email" name="email adress" placeholder="email adress..">
                        <input type="submit" value="Login">
                    </form>
                </div>
                <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-teal" title="Search"><i class="fa fa-search"></i>
                </a>
            </div>
             
            <!-- Navbar on small screens -->
            <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
                <a href="main.php" class="w3-bar-item w3-button">Home</a>
                <a href="profile.php" class="w3-bar-item w3-button">Profiili</a>
                <a href="#work" class="w3-bar-item w3-button">Workout</a>
                <a href="#pikatreenit" class="w3-bar-item w3-button">Pikatreenit</a>
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
        </div>
        <!--
//Image Header
<div class="w3-display-container w3-animate-opacity">
<img src="/w3images/sailboat.jpg" alt="boat" style="width:100%;min-height:350px;max-height:600px;">
<div class="w3-container w3-display-bottomleft w3-margin-bottom">
<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-xlarge w3-theme w3-hover-teal" title="Go To W3.CSS">LEARN W3.CSS</button>
</div>
</div>
-->
        <!-- Contact Container -->

        <div class="w3-container w3-padding-64 w3-theme-l5" id="contact">
            <div class="w3-row w3-center">
                <div class="w3-margin-bottom ">
                    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Yhteystiedot</span></div>
                    <h3>Jäikö jokin mietityttämään?</h3>
                    <h3>Ota meihin yhteyttä!</h3>
                    <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>    Metropolia Ammattikorkeakoulu</p>
                    <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>    <a href="info.fixfit@gmail.com">info.fixfit@gmail.com</a></p>
                    <div class="w3-display-container w3-animate-opacity">
                        <p><i class="fa fa-chevron-circle-down w3-text-teal w3-xlarge"></i>    Voit myös antaa palautetta!</p>

                    <div class="w3-container w3-margin-bottom" style="display:block">  
                         <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-xlarge w3-theme w3-hover-teal" title="Go To W3.CSS"><b>Palaute</b></button>
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
                            <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="/action_page.php" target="_blank">
                                <div class="w3-section">
                                    <label>Name</label>
                                    <input class="w3-input" type="text" name="Name" required>
                                </div>
                                <div class="w3-section">
                                    <label>Email</label>
                                    <input class="w3-input" type="text" name="Email" required>
                                </div>
                                <div class="w3-section">
                                    <label>Palaute</label>
                                    <textarea style="height:auto" class="w3-input" type="text" name="Message" rows="4" cols="50" required>
                                    </textarea> 
                                </div>
                                <input class="w3-check" type="checkbox" checked name="Like">
                                <label>I Like it!</label>
                                <button type="submit" class="w3-button w3-right w3-theme">Lähetä</button>
                            </form>
                            
                            <!-- Tähän PHP-osio joka lähetää kirjotetut FixFit mailiiin -->'
                            <?php
                            $to = "info.fixfit@gmail.com";
                            $subject = "HTML email";

                            $message = "
                            <html>
                            <head>
                            <title>HTML email</title>
                            </head>
                            <body>
                            <p> htmlentities($_POST["Email"]) </p>
                            <table>
                            <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            </tr>
                            <tr>
                            <td>John</td>
                            <td>Doe</td>
                            </tr>
                            </table>
                            </body>
                            </html>
                            ";

                            // Aseta aina sisällön-tyyppi HTML emailia lähetettäessä
                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                            // More headers
                            $headers .= htmlentities($_POST["Email"]); . "\r\n";
                            mail($to,$subject,$message,$headers);
                            ?>
                        </div>
                        <footer class="w3-container w3-teal">
                            <p>Kiitos palauteesta!</p>
                        </footer>
                    </div>
                </div>

            </div>
        </div>

        <!-- Team Container -->
        <div class="w3-container w3-padding-64 w3-center" id="team">
            <h3>Onko sinulla kehitysideoita sivulle?</h3>
            <h4>Kehittäjät</h4>
            <div class="w3-row"><br>
                <div class="w3-quarter w3-teal">
                    <!--<img src="/w3images/avatar.jpg" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">-->
                    <h3>Sofia Lampinen</h3>
                    <p>HTML & CSS & SQL</p>
                    <p>sofiala@metropolia.fi</p>
                </div>

                <div class="w3-quarter w3-white">

                    <h3>Tomi Salo</h3>
                    <p>????</p>
                    <p>Tomi.Salo2@metropolia.fi</p>
                </div>

                <div class="w3-quarter w3-teal">

                    <h3>Elias Sulva</h3>
                    <p>HTML & TREENIT</p>
                    <p>eliassul@metropolia.fi</p>
                </div>

                <div class="w3-quarter w3-white">

                    <h3>Wille Tuovinen</h3>
                    <p>HTML & CSS & PHP & MYSQL</p>
                    <p>willetu@metropolia.fi</p>
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
