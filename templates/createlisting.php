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
    <link rel="stylesheet" href="styles/createlisting.css">
    <link rel="stylesheet" href="styles/login.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>College Marketplace</title>
    <!-- custom google font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;100&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


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
                    <?php
                        if(isset($_COOKIE["email"])){
                            ?>
                            <a href="?command=logout" class="nav-link-custom">Logout</a>
                            <?php
                        }else{
                            ?>
                            <a href="login.html" class="nav-link-custom">Login</a>
                            <?php
                        }
                    ?>
                </li>
                <li class="nav-item-custom">
                    <?php
                        if(isset($_COOKIE["email"]) && isset($_COOKIE["first_name"])){
                            ?>
                            <a href="?command=create-listing" class="nav-link-custom">Post</a>
                            <?php
                        }else{
                            ?>
                            <a href="#" class="nav-link-custom">Post</a>
                            <?php
                        }
                    ?>
                </li>
                <li class="nav-item-custom">
                    <?php
                        if(isset($_COOKIE["first_name"])){
                            ?>
                            <a href="?command=my-listings" class="nav-link-custom"><?=$_COOKIE["first_name"]?></a>
                            <?php
                        }else{
                            ?>
                            <a href="#" class="nav-link-custom">Profile</a>
                            <?php
                        }
                    ?>
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
        <div class="create-listing-page">
            <div class="create-listing-parent-container">
                <h1 class = "createTitle" id="createTitle">Create Listing</h1>
                <div class="create-listing-inner-container" id="toggleCont2">

                    <!-- with the login/signup text -->
                    <form class="post-form" action="?command=create-listing" method="post">
                        <div class="post-details">
                            <h1>Create My Listing</h1>
                            <br>
                            <!-- title input -->
                            <input type="text" class="title-text-input" placeholder="Title" name="title" required />
                            <!-- price input -->
                            <input type="number" min="0.00" placeholder="Price" max="10000.00" step="0.01" name="price"
                                required />
                            <!-- condition input -->
                            <!-- <input type="email" class="email-text-input" placeholder="Condition" name="email"
                                required /> -->
                            <select name="condition" id="condition" title="Condition">
                                <option value="new">New</option>
                                <option value="slightly-used">Slighly Used</option>
                                <option value="fair">Fair/Good</option>
                                <option value="used">Used</option>
                            </select>

                            <select name="category" id="category" title="Category">
                                <option value="furniture">Furniture</option>
                                <option value="school-accessories">School Accessories</option>
                                <option value="clothes">Clothes</option>
                                <option value="electronics">Electronics</option>
                                <option value="other">Other</option>
                            </select>
                            <textarea id="description" name="description" rows="4" cols="50" placeholder="Description"
                                required>
                            </textarea>
                            <!-- <textarea id="description" name="description">
                                It was a dark and stormy night... -->
                            <!-- </textarea>
                            <input type="email" class="email-text-input" placeholder="description" name="email"
                                required /> -->
                            <input type="submit" class="btn-hover color-3 shrink-on-hover" value="Post">

                        </div>
                        <!-- container for image on the right side -->
                        <div class="post-image">
                            <img class="size-image"
                                src="https://static8.depositphotos.com/1026550/1036/i/600/depositphotos_10361062-stock-photo-shopping-cart-symbol-at-the.jpg"
                                alt="Shopping Cart">
                        </div>
                    </form>
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
</body>
<script>
    // jQuery
    $("#createTitle").click(function(){
        $("#toggleCont2").slideToggle();
    });
</script>

</html>