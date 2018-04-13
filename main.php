<!DOCTYPE html>
<html>
    <title>W3.CSS Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="w3-update.css">
    <link rel="stylesheet" href="w3-theme-black.css">
    <link rel="stylesheet" href="font-awesome.min.css">
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
                <a href="treenit.php">
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
                <a href="#work" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Work</a>
                <a href="#pikatreenit" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Pikareenit</a>
                <a href="#contact" class="w3-bar-item w3-button w3-hide-small w3-hover-white">palaute</a>
                <div class="w3-dropdown-hover w3-hide-small">
                    <button class="w3-button" title="Notifications">Dropdown <i class="fa fa-caret-down"></i></button>     
                    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                        <a href="#" class="w3-bar-item w3-button">Link</a>
                        <a href="#" class="w3-bar-item w3-button">Link</a>
                        <a href="#" class="w3-bar-item w3-button">Link</a>
                    </div>
                </div>
                <a href="register.php" style="float:right" class="w3-bar-item w3-button w3-hide-small w3-hover-white">register</a>
                <a style="float:right;background:ffffff;padding-top:4px" class="w3-hide-small">
                    <form action=".php">
                        <label for="psw"></label>
                        <input type="text" id="psw" name="password" placeholder="Password..">
                    </form>
                </a>
                <a style="float:right;background:ffffff;padding-top:4px" class="w3-hide-small">
                    <form action=".php">
                        <label for="email"></label>
                        <input type="text" id="email" name="email adress" placeholder="email adress..">
                    </form>
                </a>
                <a style="float:right;background:ffffff;padding-top:4px" class="w3-hide-small">
                    <form action="">
                        <input type="submit" value="Login">
                    </form>
                </a>
                <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-teal" title="Search"><i class="fa fa-search"></i></a>
            </div>

            <!-- Navbar on small screens -->
            <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
                <a href="#team" class="w3-bar-item w3-button">Team</a>
                <a href="#work" class="w3-bar-item w3-button">Work</a>
                <a href="#pricing" class="w3-bar-item w3-button">Price</a>
                <a href="#contact" class="w3-bar-item w3-button">Contact</a>
                <a href="#" class="w3-bar-item w3-button">Search</a>
            </div>
        </div>

        <!-- Image Header -->
        <div class="w3-display-container w3-animate-opacity">
            <img src="img/running_man_wider.jpg" alt="runningman" style="width:100%;min-height:150px;max-height:600px;">
            <div class="w3-container w3-display-bottomleft w3-margin-bottom">  
                <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-xlarge w3-theme w3-hover-teal" title="Go To W3.CSS">mainosbanneri</button>
            </div>
        </div>

        <!-- Modal -->
        <div id="id01" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-top">
                <header class="w3-container w3-teal w3-display-container"> 
                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
                    <h4>Oh snap! We just showed you a modal..</h4>
                    <h5>Because we can <i class="fa fa-smile-o"></i></h5>
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

        <!-- Team Container -->
        <div class="w3-container w3-padding-64 w3-center" id="team">
            <h2>jotain tekstiä!</h2>
            <p>kuvatekstiä</p>

            <div class="w3-row"><br>

                <div class="w3-quarter">
                    <img src="/img/avatar.jpg" alt="This could be image here" style="width:45%" class="w3-circle w3-hover-opacity">
                    <h3>title text</h3>
                    <p>small text</p>
                </div>

            </div>
        </div>

        <!-- Work Row -->
        <div class="w3-row-padding w3-padding-64 w3-theme-l1" id="work">
            <div class="w3-quarter">
                <h2>Workout</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>

            <div class="w3-quarter">
                <div class="w3-card w3-white">
                    <img src="img/greenbanner.png" alt="bannergreen" style="width:100%;margin-top:4px">
                    <div class="w3-container">
                        <h3>Treeni 1</h3>
                        <h4>Ohjelma</h4>
                        <p>Blablabla</p>
                        <p>Blablabla</p>
                        <p>Blablabla</p>
                        <p>Blablabla</p>
                    </div>
                </div>
            </div>

            <div class="w3-quarter">
                <div class="w3-card w3-white">
                    <img src="img/greenbanner.png" alt="bannergreen" style="width:100%;margin-top:4px">
                    <div class="w3-container">
                        <h3>Treeni 2</h3>
                        <h4>Ohjelma</h4>
                        <p>Blablabla</p>
                        <p>Blablabla</p>
                        <p>Blablabla</p>
                        <p>Blablabla</p>
                    </div>
                </div>
            </div>

            <div class="w3-quarter">
                <div class="w3-card w3-white">
                    <img src="img/greenbanner.png" alt="bannergreen" style="width:100%;margin-top:4px">
                    <div class="w3-container">
                        <h3>Treeni 3</h3>
                        <h4>Ohjelma</h4>
                        <p>Blablabla</p>
                        <p>Blablabla</p>
                        <p>Blablabla</p>
                        <p>Blablabla</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Container -->
        <div class="w3-container" style="position:relative">
            <a onclick="w3_open()" class="w3-button w3-xlarge w3-circle w3-teal"
               style="position:absolute;top:-28px;right:24px">+</a>
        </div>

         <!-- Pikatreenit Row -->
        <div class="w3-row-padding w3-center w3-padding-64" id="pikatreenit">
            <h2>Päivän pikareenit</h2>
            <p>Valitse haluamasi treenikohde!</p><br>
            <div class="w3-third w3-margin-bottom">
                <ul class="w3-ul w3-border w3-hover-shadow">
                    <li class="w3-theme">
                        <p class="w3-xlarge">Vatsa</p>
                    </li>
                    <iframe width="425" height="344" src="https://www.youtube.com/embed/EB8Iom51fdA?" frameborder="0" allowfullscreen>
                    </iframe>
                    <li class="w3-padding-16"><b>Treenaa:</b></li>
                    <li class="w3-padding-16">syviä</li>
                    <li class="w3-padding-16">suoria</li>
                    <li class="w3-padding-16">vinoja vatsalihaksia</li>
                        <h2 class="w3-wide"><i class="fa"></i> 5 sarjaa</h2>
                        <span class="w3-opacity">6min</span>
                    </li>
                    <li class="w3-theme-l5 w3-padding-24">
                        <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                    </li>
                </ul>
            </div>

            <div class="w3-third w3-margin-bottom">
                <ul class="w3-ul w3-border w3-hover-shadow">
                    <li class="w3-theme">
                        <p class="w3-xlarge">Jalat</p>
                    </li>
                    <iframe width="425" height="344" src="https://www.youtube.com/embed/Og4AkUfCTGM?" frameborder="0" allowfullscreen>
                    </iframe>
                    <li class="w3-padding-16"><b>Treenaa:</b></li>
                    <li class="w3-padding-16">Etureidet ja takareidet</li>
                    <li class="w3-padding-16">Pohjelihakset</li>
                    <li class="w3-padding-16">Reiden lähentäjät ja loitontajat</li>
                        <h2 class="w3-wide"><i class="fa"></i> 7 sarjaa</h2>
                        <span class="w3-opacity">6min</span>
                    </li>
                    <li class="w3-theme-l5 w3-padding-24">
                        <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                    </li>
                </ul>
            </div>
        </div>

            <div class="w3-third w3-margin-bottom">
                <ul class="w3-ul w3-border w3-hover-shadow">
                    <li class="w3-theme">
                        <p class="w3-xlarge">Kädet</p>
                    </li>
                    <iframe width="425" height="344" src="https://www.youtube.com/embed/8fvT3sYfzLo?" frameborder="0" allowfullscreen>
                    </iframe>
                    <li class="w3-padding-16"><b>Treenaa:</b></li>
                    <li class="w3-padding-16">Ojentajat ja hauslihakset</li>
                    <li class="w3-padding-16">Ranteen koukistaja- ja ojentajalihakset</li>
                    <li class="w3-padding-16">Olka- ja olka-värttinäluulihas</li>

                        <h2 class="w3-wide"><i class="fa"></i> 7 sarjaa</h2>
                        <span class="w3-opacity">8min</span>
                    </li>
                    <li class="w3-theme-l5 w3-padding-24">
                        <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="w3-third w3-margin-bottom">
            <ul class="w3-ul w3-border w3-hover-shadow">
                <li class="w3-theme">
                    <p class="w3-xlarge">Rinta</p>
                </li>
                <iframe width="425" height="344" src="https://www.youtube.com/embed/8mOjYFwmgxk?" frameborder="0" allowfullscreen>
                </iframe>
                <li class="w3-padding-16"><b>Treenaa:</b></li>
                <li class="w3-padding-16">Ylä-</li>
                <li class="w3-padding-16">Keski-</li>
                <li class="w3-padding-16">Alarintalihakset</li>
                    <h2 class="w3-wide"><i class="fa"></i> 6 sarjaa</h2>
                    <span class="w3-opacity">6min</span>
                </li>
                <li class="w3-theme-l5 w3-padding-24">
                    <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                </li>
            </ul>
        </div>

        <div class="w3-third w3-margin-bottom">
            <ul class="w3-ul w3-border w3-hover-shadow">
                <li class="w3-theme">
                    <p class="w3-xlarge">Selkä</p>
                </li>
                <iframe width="425" height="344" src="https://www.youtube.com/embed/I2Mu3lpUfMY?" frameborder="0" allowfullscreen>
                </iframe>
                <li class="w3-padding-16"><b>Treenaa:</b></li>
                <li class="w3-padding-16">Selän ojentajat</li>
                <li class="w3-padding-16">Leveät selkälihakset</li>
                <li class="w3-padding-16">Epäkäslihakset</li>
                    <h2 class="w3-wide"><i class="fa"></i> 6 sarjaa</h2>
                    <span class="w3-opacity">6min</span>
                </li>
                <li class="w3-theme-l5 w3-padding-24">
                    <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Treenaa</button>
                </li>
            </ul>
        </div>
        <!-- Contact Container -->
        <div class="w3-container w3-padding-64 w3-theme-l5" id="contact">
            <div class="w3-row">
                <div class="w3-col m5">
                    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Contact Us</span></div>
                    <h3>Address</h3>
                    <p>Something funny text</p>
                    <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>  Helsinki, FI</p>
                    <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>  +00 1515151515</p>
                    <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>  test@test.com</p>
                </div>
                <div class="w3-col m7">
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
                            <label>Message</label>
                            <input class="w3-input" type="text" name="Message" required>
                        </div>  
                        <input class="w3-check" type="checkbox" checked name="Like">
                        <label>I Like it!</label>
                        <button type="submit" class="w3-button w3-right w3-theme">Send</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Google Maps -->
        <div id="googleMap" style="width:100%;height:420px;"></div>
        <script>
            function myMap()
            {
                myCenter=new google.maps.LatLng(41.878114, -87.629798);
                var mapOptions= {
                    center:myCenter,
                    zoom:12, scrollwheel: true, draggable: true,
                    mapTypeId:google.maps.MapTypeId.ROADMAP
                };
                var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

                var marker = new google.maps.Marker({
                    position: myCenter,
                });
                marker.setMap(map);
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
        <!--
        To use this code on your website, get a free API key from Google.
        Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
        -->

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
