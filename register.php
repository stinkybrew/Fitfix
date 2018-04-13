<!DOCTYPE html>
<html>
    <title>W3.CSS Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="w3-update.css">
    <link rel="stylesheet" href="w3-theme-black.css">
    <link rel="stylesheet" href="font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css%22%3E">
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
                <div class="w3-dropdown-hover w3-hide-small">
                    <button class="w3-button" title="Notifications">Dropdown <i class="fa fa-caret-down"></i></button>     
                    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                        <a href="#" class="w3-bar-item w3-button">Link</a>
                        <a href="#" class="w3-bar-item w3-button">Link</a>
                        <a href="#" class="w3-bar-item w3-button">Link</a>
                    </div>
                </div>
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
                <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-xlarge w3-theme w3-hover-teal" title="Go To W3.CSS">LEARN W3.CSS</button>
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
            <h2>Joku kiva kuva esim. voisi tulla tähän</h2>
            <p>kuvatekstiä...</p>

            <div class="w3-row"><br>

                <div class="w3-quarter">
                    <img src="/images/avatar.jpg" alt="This could be image here" style="width:45%" class="w3-circle w3-hover-opacity">
                    <h3>title text</h3>
                    <p>small text</p>
                </div>

            </div>
        </div>
        <!-- Contact Container -->
        <div class="w3-container w3-padding-64 w3-theme-l5" id="contact">
            <div class="w3-row">
                <div class="w3-col m5">
                    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Contact Us</span></div>
                    <h3>Address</h3>
                    <p>Swing by for a cup of coffee, or whatever.</p>
                    <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>  Chicago, US</p>
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
