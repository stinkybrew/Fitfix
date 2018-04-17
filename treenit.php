<!DOCTYPE html>
<html>
    <title>W3.CSS Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="w3-update.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="font-awesome_min.css">
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
            <a href="#" class="w3-bar-item w3-button">Link 6</a>
            <a href="#" class="w3-bar-item w3-button">Link 7</a>
            <a href="#" class="w3-bar-item w3-button">Link 8</a>
            <a href="#" class="w3-bar-item w3-button">Link 9</a>
        </nav>

        <!-- Navbar -->
        <div class="w3-top">
            <div class="w3-bar w3-theme-d2 w3-left-align">
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
                <a href="main.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>
                <a href="profile.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Profiili</a>
                <div class="w3-dropdown-hover w3-hide-small">
                    <button class="w3-button" title="Notifications">Treenit <a href="treenit.php"></a><i class="fa fa-caret-down"></i></button>
                    <div class="w3-dropdown-content w3-card-4 w3-bar-block">

                        <a href="#Käsitreenit" class="w3-bar-item w3-button">Kädet</a>
                        <a href="#Jalkatreenit" class="w3-bar-item w3-button">Jalat</a>
                        <a href="#Rintatreenit" class="w3-bar-item w3-button">Rinta</a>
                        <a href="#Vatsatreenit" class="w3-bar-item w3-button">Vatsa</a>
                        <a href="#Selkätreenit" class="w3-bar-item w3-button">Selkä</a>
                        <a href="#Kokokehon" class="w3-bar-item w3-button">Koko keho</a>
                    </div>
                </div>

                <a href="main.php#pikatreenit" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Pikareenit</a>
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

                    <a href="register.php" style="float:right;margin-left:2px" class="w3-bar-item w3-button w3-hide-small w3-hover-white">register</a>
                    <div style="float:right;background-color:fff" class="w3-hide-small">
                        <form action=".php">
                            <label for="psw"></label>
                            <input style="margin-top:5px" type="text" id="psw" name="password" placeholder="Password..">
                            <label for="email"></label>
                            <input style="margin-top:5px" type="text" id="email" name="email adress" placeholder="email adress..">
                            <input style="margin-right:2px" class="w3-bar-item w3-button w3-hide-small w3-hover-white" type="submit" value="Login">
                        </form>
                    </div>


                <!-- Navbar on small screens -->
                <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
                    <a href="#team" class="w3-bar-item w3-button">Team</a>
                    <a href="treenit.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Treenit</a>
                    <a href="#pricing" class="w3-bar-item w3-button">Price</a>
                    <a href="#contact" class="w3-bar-item w3-button">Contact</a>
                    <a href="#" class="w3-bar-item w3-button">Search</a>
                </div>
            </div>
        </div>
        <div class="w3-container w3-padding-64 w3-center">
            <div class="w3-container w3-padding-64 w3-center" id="Käsitreenit">

                <h2 class="w3-wide"><i class="fa"></i>Käsitreenit</h2>
                <iframe width="70%" height="505" src="https://www.youtube.com/embed/kzohU7hbN9I?" frameborder="0" allowfullscreen>
                </iframe>
            </div>
            <div class="w3-container w3-padding-64 w3-center" id="Jalkatreenit">
                <h2 class="w3-wide"><i class="fa"></i>Jalkatreenit</h2>
                <iframe width="70%" height="505" src="https://www.youtube.com/embed/q3FLp036yhk?" frameborder="0" allowfullscreen>
                </iframe>
            </div>

            <div class="w3-container w3-padding-64 w3-center" id="Rintatreenit">
                <h2 class="w3-wide"><i class="fa"></i>Rintatreenit</h2>
                <iframe width="70%" height="505" src="https://www.youtube.com/embed/kBJTLMaJZrQ?" frameborder="0" allowfullscreen>
                </iframe>
            </div>
            <div class="w3-container w3-padding-64 w3-center" id="Vatsatreenit">
                <h2 class="w3-wide"><i class="fa"></i>Vatsatreenit</h2>
                <iframe width="70%" height="505" src="https://www.youtube.com/embed/bx9SssAikQo?" frameborder="0" allowfullscreen>
                </iframe>
            </div>
            <div class="w3-container w3-padding-64 w3-center" id="Selkätreenit">
                <h2 class="w3-wide"><i class="fa"></i>Selkätreenit</h2>
                <iframe width="70%" height="505" src="https://www.youtube.com/embed/mjnseqLiVXM?" frameborder="0" allowfullscreen>
                </iframe>
            </div>
        </div>
        <!-- Pikatreenit Row -->
        <div class="w3-row-padding w3-center w3-padding-64" id="Koko kehon">
            <h2 class="w3-wide"><i class="fa"></i>Koko kehon treenejä</h2>
            <p>Valitse tasosi mukaan!</p><br>
            <div class="w3-third w3-margin-bottom">
                <ul class="w3-ul w3-border w3-hover-shadow">
                    <li class="w3-theme">
                        <p class="w3-xlarge">Aloittelija</p>
                    </li>
                    <iframe width="100%" height="344" src="https://www.youtube.com/embed/5eV33roibqc?" frameborder="0" allowfullscreen>
                    </iframe>
                    <li class="w3-padding-16"> <b>Vatsa</b></li>
                    <li class="w3-padding-16"> <b>Selkä</b></li>
                    <li class="w3-padding-16"> <b>Jalat</b></li>
                    <li class="w3-padding-16"> <b>Rinta</b></li>
                    <span class="w3-opacity">20min</span>
                    <li><h2 class="w3-wide"><i class="fa"></i> +30min kardiota</h2>
                    </li>
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
                    <li class="w3-padding-16"> <b>Vatsa</b></li>
                    <li class="w3-padding-16"> <b>Selkä</b></li>
                    <li class="w3-padding-16"> <b>Jalat</b></li>
                    <li class="w3-padding-16"> <b>Rinta</b></li>
                    <span class="w3-opacity">20min</span>
                    <li><h2 class="w3-wide"><i class="fa"></i> +30min kardiota</h2>
                    </li>
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
                    <iframe width="100%" height="344" src="https://www.youtube.com/embed/LqgGhJywnHI?" frameborder="0" allowfullscreen>
                    </iframe>
                    <li class="w3-padding-16"> <b>Vatsa</b></li>
                    <li class="w3-padding-16"> <b>Selkä</b></li>
                    <li class="w3-padding-16"> <b>Jalat</b></li>
                    <li class="w3-padding-16"> <b>Rinta</b></li>
                    <span class="w3-opacity">20min</span>
                    <li><h2 class="w3-wide"><i class="fa"></i> +30min kardiota</h2>
                    </li>
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
