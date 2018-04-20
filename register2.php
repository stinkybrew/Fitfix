<!DOCTYPE html>
<html>
    <title>FIXFIT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="w3-update.css">
    <link rel="stylesheet" href="w3-theme-black.css">
    <link rel="stylesheet" href="font-awesome_min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <body id="myPages" class="register">
        
        <!-- Navbar -->
        <div class="w3-top">
            <div class="w3-bar w3-theme-d2 w3-left-align">
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
                <a href="main.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>
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
                <div class="w3-third w3-display-middle">
                    <h1 class="w3-center">Rekisteröidy tästä!</h1>
                    <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="lahetys.php" method="post">
                        <div class="w3-section">
                            <label>Etunimi</label>
                            <input class="w3-input" type="text" name="name" required>
                        </div>
                        <div class="w3-section">
                            <label>Sukunimi</label>
                            <input class="w3-input" type="text" name="name" required>
                        </div>
                        <div class="w3-section">
                            <label>Syntymäaika</label>
                            <input class="w3-input" type="date" name="dob" required>
                        </div>
                        <div class="w3-section">
                            <label>Sähköpostiosoite</label>
                            <input class="w3-input" type="text" name="email" required>
                        </div>
                        <div class="w3-section">
                            <label>Käyttäjätunnus (testi.esimerkki@gmail.com)</label>
                            <input class="w3-input" type="text" name="email" required>
                        </div>
                        <div class="w3-section">
                            <label for="password">Salasana (minimi 8 merkkiä)</label>
                            <input class="w3-input" type="password" name="password" required>
                        </div>                   
                        <div class="w3-section">
                            <label for="psw-repeat">Toista salasana</label>
                            <input type="password" name="psw-repeat" required>
                        </div>
                        <button type="reset" style="display:inline" class="w3-button w3-large w3-right w3-theme" value="Reset">Tyhjennä</button>
                        <input type="submit" style="display:inline;margin-right:2px" class="w3-button w3-large w3-right w3-theme" value="Lähetä">

                        <button type="button" onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-large w3-theme" title="Kysymys">Kysymyksiä?</button>
                    </form>
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
                                    <input class="w3-input" type="text" name="email">
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
