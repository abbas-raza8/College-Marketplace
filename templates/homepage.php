`<!-- 
    Abbas Raza (mar2wcb) & Ayub Shahab (as9qp)
    URL: https://cs4640.cs.virginia.edu/mar2wcb/sprint2/index.html
 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Marketplace</title>

    <!-- styling for main page -->
    <link rel="stylesheet" href="styles/styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- custom google font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;100&display=swap" rel="stylesheet">

    <!-- search button icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- For development, we may want a better-printed CSS, but with larger download size.  Ignore "min" -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.css" rel="stylesheet">




    <!-- boostrap imports -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
    <div class="offcanvas offcanvas-start canvas-backdrop" tabindex="-1" id="offcanvasExample" data-bs-scroll="true"
        data-bs-backdrop="false">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images,
                lists,
                etc.
            </div>
            <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown">
                    Dropdown button
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
    </div>
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
                            <a href="#" class="nav-link-custom">Login</a>
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
                    <a data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample">All</a>
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

    <!-- The Landing Section -->
    <section>
        <div class="outer">
            <div class="inner">
                <div class="left-main">
                    <div class="main-img">
                        <img class="size-image"
                            src="https://media.istockphoto.com/photos/many-hardbound-books-background-selective-focus-picture-id1209683444?k=20&m=1209683444&s=612x612&w=0&h=apRHyEOnUCQ7gXkIChHTyixwezHZ4Bm6tDyr7zwu32Y="
                            alt="Books">

                        <div class="main-text">
                            <h1>Welcome to College Marketplace!</h1>
                            <h5>Meeting the needs of all college students.</h5>
                            <p>Find used items other students at your local university are looking to sell for a
                                convenient
                                price!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="right-main">

                </div>
            </div>
        </div>
    </section>

    <!-- listings section with 3 carousels and adds -->
    <section>
        <!-- https://gosnippets.com/snippets/bootstrap-carousel-with-cards-in-3-columns -->
        <div class="outer outer2">
            <div class="left-listing">
                <div class = "user-posts" id ="user-posts-container">
                    <?php
                    $fetchedData = $this->db->query("select * from listings;");
                    // echo var_dump($fetchedData);
                    if(is_array($fetchedData)){
                        foreach($fetchedData as $data){
                            ?>
                            <div class="card" style="width: 18rem;"  id = "userPost<?php echo $data['id']; ?>">
                                <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                                <div class="card-body">
                                    <h2 class="card-title"><?php echo $data['title']; ?></h2>
                                    <h4>$<?php echo $data['price']; ?> | <?php echo $data['listing_condition']; ?></h4>
                                    <p class="card-text"><?php echo $data['description']; ?></p>
                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                </div>
                            </div>
                            <?php
                        }
                    }
                ?>
                </div>
                <div class="heading-navigation">
                    <h1>Furniture</h1>
                    <div class="arrow-buttons-container">
                        <a class="btn mb-3 mr-1 prev" href="#carouselExampleIndicators2" role="button"
                            data-slide="prev">
                            <i class="fa fa-arrow-left arrow-color" title="Previous"></i>
                        </a>
                        <a class="btn mb-3 next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                            <i class="fa fa-arrow-right arrow-color" title="Next"></i>
                        </a>
                    </div>
                </div>
                <div class="carousel-container">
                    <div id="carouselExampleIndicators2" class="carousel slide" data-interval="false"
                        data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row custom-row">
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://futonland.com/common/images/products/large/KFMOEPFRAMESET2-Sofa1.jpg"
                                                    alt="Black Futon">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Futon</h4>
                                                <p class="card-text">Black futon that converts into a bed in great
                                                    condition for $50. Located on JPA.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://images.furnituredealer.net/img/products/crown_mark/color/camelia_1210t-4272-base%2Bleg%2Bgl-b0.jpg"
                                                    alt="Glass Dining Table">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Dining Table</h4>
                                                <p class="card-text">Six seater glass dining table in pristine
                                                    condition. Pickup today at Lambeth for $100.</p>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://i5.walmartimages.com/asr/50c88d02-13a0-4294-84d6-9a590948a70e.6e55722aa36234b068f74d624409844d.jpeg"
                                                    alt="Full Size Bed">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Full Size Bed</h4>
                                                <p class="card-text">Wooden full size bedframe with mattress only used
                                                    for one semester. $120, price negotiable.</p>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://images.costco-static.com/ImageDelivery/imageService?profileId=12026540&itemId=1441802-847&recipeName=680"
                                                    alt="TV Stand">

                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">TV Stand</h4>
                                                <p class="card-text">Fits up to 60 inch TV, only $25! Located at Bice.
                                                </p>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item ">
                                <div class="row">
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://secure.img1-fg.wfcdn.com/im/93503461/resize-h755-w755%5Ecompr-r85/6164/61646144/Calvo+Oriental+Gray+Area+Rug.jpg"
                                                    alt="White Rug with design">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Rug</h4>
                                                <p class="card-text">White rug with a cool design. Dimensions: 9 ft by 8
                                                    ft. Price $75.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://m.media-amazon.com/images/I/618hlD8QZIL._AC_SX466_.jpg"
                                                    alt="Two Brown Lamps">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Lamps</h4>
                                                <p class="card-text">Two brown lamps great for a living room. $15 each,
                                                    pick up at Eagles Landing.</p>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://www.livingspaces.com/globalassets/productassets/200000-299999/240000-249999/244000-244999/244000-244099/244099/244099_grey_wood_nightstand_1.jpg?w=1911&h=1288&mode=pad"
                                                    alt="Grey Nightstand">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Nightstand</h4>
                                                <p class="card-text">Grey, two-drawer nightstand in great condition.
                                                    Need to get rid of ASAP. $30.</p>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://mobileimages.lowes.com/productimages/14834083-e761-4cae-8baa-49aa3463e675/16681463.jpg?size=pdhi"
                                                    alt="Black Dresser">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Dresser</h4>
                                                <p class="card-text">Black dresser with six drawers from IKEA. Pickup
                                                    today on JPA for $80! </p>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="heading-navigation">
                    <h1>Classroom Materials</h1>
                    <div class="arrow-buttons-container">
                        <a class="btn mb-3 mr-1 prev" href="#carouselExampleIndicators3" role="button"
                            data-slide="prev">
                            <i class="fa fa-arrow-left arrow-color" title="Previous"></i>
                        </a>
                        <a class="btn mb-3 next" href="#carouselExampleIndicators3" role="button" data-slide="next">
                            <i class="fa fa-arrow-right arrow-color" title="Next"></i>
                        </a>
                    </div>
                </div>
                <div class="carousel-container">
                    <div id="carouselExampleIndicators3" class="carousel slide" data-interval="false"
                        data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row custom-row">
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://i.ebayimg.com/images/g/YjgAAOSwyaNfcnsd/s-l400.jpg"
                                                    alt="iClicker">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">iClicker+</h4>
                                                <p class="card-text">Works perfectly fine. Only for $5 can meetup on
                                                    Grounds.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://images-na.ssl-images-amazon.com/images/I/41b9Y5N1NrL._SX396_BO1,204,203,200_.jpg"
                                                    alt="C++ Textbook">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Computer Science Textbook</h4>
                                                <p class="card-text">Used in CS 2150 selling for $20.</p>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://cdn.shopify.com/s/files/1/0268/0319/products/science_shepherd_homeschool_chemistry_curriculum_fundamentals_of_chemistry_textbook_cover-min.jpg?v=1562965777"
                                                    alt="Chemistry Textbook">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Chemistry Textbook</h4>
                                                <p class="card-text">Textbook for Intro to Chemistry. Bought it new
                                                    selling for only $30.</p>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://assets.thermofisher.com/TFS-Assets/CCG/Thermo-Scientific/product-images/19-1137126-11900-STD-00.png-650.jpg"
                                                    alt="Lab Notebook">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Physics Lab Notebook</h4>
                                                <p class="card-text">Notebook needed for Physics Lab. Rarely used,
                                                    selling for only $10.</p>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item ">
                                <div class="row">
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://i5.walmartimages.com/asr/0564303f-f353-4645-9c7e-f933eb885ace.309ffbedb1bb73b6eac53827e648ce86.jpeg"
                                                    alt="Lab Goggles">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Lab Goggles</h4>
                                                <p class="card-text">Never used them because my lab went online. Selling
                                                    for $8 located near Emmet Street.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://target.scene7.com/is/image/Target/GUEST_ba52ec54-82c2-41c7-8a1b-bfa12aba071c?wid=488&hei=488&fmt=pjpeg"
                                                    alt="Folders">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Folders</h4>
                                                <p class="card-text">Extra folders that I have no need for. Pick up for
                                                    free.</p>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://i5.walmartimages.com/asr/b2517b30-912b-4be3-b7f2-be015bbc9696.c9c78ee67c1c7a705a26c2685cc22ca7.jpeg"
                                                    alt="Colored Pens">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Colored Pens</h4>
                                                <p class="card-text">Brand new box of colored pens, giving away for
                                                    free. Pick up at Rice Hall.</p>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://www.redkap.com/on/demandware.static/-/Sites-redkap-master-catalog/default/dwfc43d319/5210/PS_RK_5210WH_F.png"
                                                    alt="Lab Coat">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Lab Coat</h4>
                                                <p class="card-text">Medium size white lab coat, only used a handful of
                                                    times. Selling for $10.</p>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="heading-navigation">
                    <h1>Electronics</h1>
                    <div class="arrow-buttons-container">
                        <a class="btn mb-3 mr-1 prev" href="#carouselExampleIndicators4" role="button"
                            data-slide="prev">
                            <i class="fa fa-arrow-left arrow-color" title="Previous"></i>
                        </a>
                        <a class="btn mb-3 next" href="#carouselExampleIndicators4" role="button" data-slide="next">
                            <i class="fa fa-arrow-right arrow-color" title="Next"></i>
                        </a>
                    </div>
                </div>
                <div class="carousel-container">
                    <div id="carouselExampleIndicators4" class="carousel slide" data-interval="false"
                        data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row custom-row">
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://i.pcmag.com/imagery/reviews/05R7ApclhnnV0xTx4drU4BE-1..v1617290389.jpg"
                                                    alt="Monitor">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">24 Inch Monitor</h4>
                                                <p class="card-text">24 Inch 4k Samsung Monitor, great for gaming.
                                                    Selling for only $100! </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://m.media-amazon.com/images/I/71NHCdOGs8L._AC_SL1500_.jpg"
                                                    alt="Keyboard">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Wireless Keyboard</h4>
                                                <p class="card-text">Wireless keyboard with led lights works perfectly.
                                                    Looking for $15.</p>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://pisces.bbystatic.com/image2/BestBuy_US/images/products/6405/6405232ld.jpg"
                                                    alt="50 inch TV">

                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">50 Inch LG TV</h4>
                                                <p class="card-text">50 inch 4k smart LG TV in perfect condition.
                                                    Selling for $120 pickup near Shamrock Road.</p>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://s.yimg.com/os/creatr-uploaded-images/2020-09/7e945160-f699-11ea-beef-f468e8c9049c"
                                                    alt="Airpod Pros">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Airpod Pros</h4>
                                                <p class="card-text">Selling Airpod Pros which work perfectly fine just
                                                    bought the newest ones. Selling for $50.</p>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item ">
                                <div class="row">
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://m.media-amazon.com/images/I/61I8BjnzubL._AC_SL1000_.jpg"
                                                    alt="Wireless Mouse">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Wireless Mouse</h4>
                                                <p class="card-text">Bluetooth mouse with led lights. Selling for $8
                                                    meet up at Newcomb.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://www.cnet.com/a/img/resize/60541f991f7138fbab04cdeebe2c33b0b57f8f7f/hub/2016/07/29/0bb7b98b-f479-47c5-9315-b748d1b5c3ef/xbox-one-s-03.jpg?auto=webp&width=768"
                                                    alt="Xbox One">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Xbox One Bundle</h4>
                                                <p class="card-text">Xbox One with two controllers, five games, and a
                                                    headset all for $200. Hmu to negotiate price.</p>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://media.cnn.com/api/v1/images/stellar/prod/211025072623-macbook-pro-14-display-5.jpg?q=w_4032,h_2268,x_0,y_0,c_fill"
                                                    alt="MacBook Pro">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">MacBook Pro</h4>
                                                <p class="card-text">Latest MacBook in like new condition, no longer
                                                    need it so I'm selling it for $1,500.</p>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-ms-6 card-container">
                                        <div class="card">
                                            <div class="card-image">
                                                <img class="size-image"
                                                    src="https://static.onecms.io/wp-content/uploads/sites/6/2021/11/12/xbox.jpg"
                                                    alt="Playstation 5">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Playstation 5</h4>
                                                <p class="card-text">Selling PS5 unopened for $750 located near JPA.</p>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="right-add">
                <img class="size-image"
                    src="https://images.squarespace-cdn.com/content/v1/5e51adbe32d3183c11f17408/1585953703129-2EWYVKDJ7C5CBXXN99N1/Sidebar.jpg?format=300w"
                    alt="placeholder for advertisement">
                <h1>hello</h1>
            </div>
        </div>
    </section>

    <!-- foooter section -->
    <!-- <section>

    </section> -->

    <script src="/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/less@4"></script>
    <script async src='/cdn-cgi/bm/cv/669835187/api.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <script>
        var userPostsContainer = document.getElementById("user-posts-container");
        for(let i = 0; i< userPostsContainer.childNodes.length; i++){
            var currentNode = userPostsContainer.childNodes[i];
            if(currentNode.nodeType == Node.ELEMENT_NODE){
                
                // https://www.codegrepper.com/code-examples/javascript/javascript+addEventListener+mouseover+size
                // anonymous function
                currentNode.addEventListener("mouseenter", function( event ) {   
                // highlight the mouseenter target
                    event.target.style.color = "green";
                }, false);

                // arrow function 
                currentNode.addEventListener("mouseleave", ( event ) => {   
                // highlight the mouseenter target
                    event.target.style.color = "black";
                }, false);
            }
        }
    </script>
</body>

<!-- delay function -->
<!-- // reset the color after a short delay
                    // setTimeout(function() {
                    //     event.target.style.color = "";
                    // }, 500); -->


</html>`