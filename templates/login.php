<!-- 
    Abbas Raza (mar2wcb) & Ayub Shahab (as9qp)
    URL: https://cs4640.cs.virginia.edu/mar2wcb/sprint2/index.html
 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- styling for main page -->
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/login.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>College Marketplace</title>
    <!-- custom google font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>

    <!-- includes the two navbars -->
    <header class="header">
        <!-- The Main Navbar -->
        <nav class="navbar-custom">

            <!-- The main Website Logo -->
            <a href="?command=homepage" class="logo">College Marketplace</a>

            <!-- Search bar -->
            <div class="wrap">
                <div class="search">
                    <input type="text" class="searchTerm" placeholder="Search...">
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search" title="Search"></i>
                    </button>
                </div>
            </div>

            <!-- The main nav links -->
            <ul class="nav-menu-custom">
                <li class="nav-item-custom">
                    <a href="?command=login-existing" class="nav-link-custom">Login</a>
                </li>
                <li class="nav-item-custom">
                    <a href="#" class="nav-link-custom">Post</a>
                </li>
                <li class="nav-item-custom">
                    <a href="#" class="nav-link-custom">Profile</a>
                </li>
            </ul>

            <!-- The hamburger icon when the screen width is reduced -->
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>

        <!-- The Mini Navbar -->
        <nav class="navbar mini-navbar">
            <ul class="nav-menu-mini">
                <li class="hamburger-custom">
                    <!-- <div class="hamburger mini-hamburger">
                        <span class="bar mini-bar"></span>
                        <span class="bar mini-bar"></span>
                        <span class="bar mini-bar"></span>
                    </div> -->
                    <a>All</a>
                </li>
                <li class="nav-item-mini ">
                    <a href="#" class="nav-link-mini">Furniture</a>
                </li>
                <li class="nav-item-mini ">
                    <a href="#" class="nav-link-mini">Men's Clothing</a>
                </li>
                <li class="nav-item-mini ">
                    <a href="#" class="nav-link-mini">Women's Clothing</a>
                </li>
                <li class="nav-item-mini ">
                    <a href="#" class="nav-link-mini">Textbooks</a>
                </li>
                <li class="nav-item-mini ">
                    <a href="#" class="nav-link-mini">Classroom Accessories</a>
                </li>
            </ul>
        </nav>

    </header>

    <section>
        <div class="login-page">
            <div class="login-parent-container">
                <div class="login-inner-container">

                    <!-- with the login/signup text -->
                    
                    <div class="login-inner-left">
                        <div class="login-toggle-container">
                            <!-- onClick={showLoginPanel} style={{ backgroundColor:
                                toggleStatus[2].givenColor }} -->
                            <div class="login-div" id="login-div" onclick="showLoginPanel()">
                                Login
                            </div>
                            <!-- onClick={showSignUpPanel} style={{ backgroundColor:
                                toggleStatus[3].givenColor }} -->
                            <div class="sign-up-div" id="sign-up-div" onclick="showSignUpPanel()">
                                Sign Up
                            </div>
                        </div>

                        <!-- style={toggleStatus[0]} -->
                        <div class="sign-in-and-up-toggle-container cont-1" id="sign-in-cont">
                            <!-- onSubmit={comparePasswords} -->
                            <?php
                                if (!empty($error_msg)) {
                                    echo "<div class='alert alert-danger'>$error_msg</div>";
                                }
                            ?>
                            <form class="login-form" action="?command=login-existing" method="post">
                                <h1>Welcome Back!</h1>
                                <br />
                                <input type="text" class="email-text-input" placeholder="Email Address" name="email"
                                    required />
                                <input type="password" class="name-text-input" placeholder="Password" name="password"
                                    required />
                                <br />
                                <input type="submit" class="btn-hover color-3 shrink-on-hover" value="Login" />
                            </form>
                        </div>
                        <!-- style={toggleStatus[1]} -->
                        <div class="sign-in-and-up-toggle-container cont-2" id="sign-up-cont">
                            <form name="signupForm" class="sign-up-form" onsubmit="submit()" action="?command=login-new" method="post">
                                <h1>Sign Up</h1>
                                <br>
                                <input type="text" class="name-text-input" placeholder="First Name" name="first_name"
                                    required />
                                <input type="text" class="name-text-input" placeholder="Last Name" name="last_name"
                                    required />
                                <input type="text" class="email-text-input" placeholder="Email Address" name="email"
                                    required />
                                <input id="pw" type="password" class="name-text-input" placeholder="Password"
                                    name="password" required minlength="6" maxlength="12" />
                                <input type="submit" class="btn-hover color-3 shrink-on-hover" 
                                onclick="CheckPassword(document.signupForm.password, 6, 12)" value="Join">
                            </form>
                        </div>
                    </div>

                    <!-- container for image on the right side -->
                    <div class="login-inner-right">
                        <!-- <img class="size-image"
                        src="https://lv7ms1pq6dm2sea8j1mrajzw-wpengine.netdna-ssl.com/wp-content/uploads/2020/09/shutterstock_634562399-1200x675.jpg"
                        alt="Shopping Cart">
                         -->
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="vertical-socials">
            <span><a href="https://discord.gg/BxXGmT72PT"><i class="fab fa-discord" /></a></span>
            <span><a href="https://www.instagram.com/outsmartodds/"><i class="fa fa-instagram" /></a></span>
            <span><a href="https://twitter.com/OutsmartOdds"><i class="fa fa-twitter" /></a></span>
        </div> -->
        <!-- </div> -->
    </section>
    <script>

        const selector = [
            { display: "flex" }, { display: "none" }, { givenColor: "rgba(176, 38, 255, 1)" }, { givenColor: "none" }
        ];

        function showLoginPanel() {
            document.getElementById('login-div').style.backgroundColor = 'transparent';
            document.getElementById('sign-up-div').style.backgroundColor = 'rgba(255, 255, 255, .25)';

            document.getElementById('sign-in-cont').style.display = "flex";
            document.getElementById('sign-up-cont').style.display = "none";

            // document.getElementById('sign-up-div').style.backgroundColor = 'rgba(255, 255, 255, .25)';
        }

        function showSignUpPanel() {
            document.getElementById('login-div').style.backgroundColor = 'rgba(255, 255, 255, .25)';
            document.getElementById('sign-up-div').style.backgroundColor = 'transparent';

            document.getElementById('sign-in-cont').style.display = "none";
            document.getElementById('sign-up-cont').style.display = "flex";
        }

        function CheckPassword(input, min, max) { 
            var passw=  /^[A-Za-z]\w{7,14}$/;
            if(input.value.length < min || input.value.length > max){
                console.log(input.value.length );

                console.log("Check if eror block exists: ",document.getElementById("ErrorBlock1"));
                if(document.getElementById("ErrorBlock1") == null){
                    // create new div for error and submit
                    var iDiv = document.createElement('div');
                    iDiv.id = 'ErrorBlock1';
                    iDiv.className = 'ErrorBlock';
                    iDiv.innerHTML = "Length of password should be between " + min + " and " + max +" characters";
                    document.getElementById('sign-up-cont').appendChild(iDiv);
                }
            }
        
        }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>