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
    <link rel="stylesheet" href="styles/myListings.css">
    <link rel="stylesheet" href="styles/login.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>College Marketplace</title>
    <!-- custom google font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;100&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
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
                            <a href="#" class="nav-link-custom"><?=$_COOKIE["first_name"]?></a>
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
        <div class="my-listing-page">
            <div class="my-listing-parent-container">
                <h1 class = "mb-3 listingTitle" id = "listingsTitle">HERE ARE ALL THE LISTINGS YOU HAVE MADE</h1>
                <div class="my-listing-inner-container" id = "listingsContainer">
                    <div class = "mb-3">
                        <table class="table table-bordered my-table">
                            <thead><tr>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Condition</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Edit / Delete</th>
                            </thead>
                            <tbody class = "table-body" id="tableBody" style = "border-radius: border-box; padding: 20px;">
                                                                   
                            </tbody>
                        </table>
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
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script>

    var allListings = null;
    var userId = null;

    getAllListings();
    function getAllListings() {
        // instantiate the object
        var ajax = new XMLHttpRequest();
        ajax.open("GET", "?command=get-all-listings", true);
        ajax.responseType = "json";
        ajax.send(null);
        ajax.addEventListener("load", function() {
            // set question
            console.log(this.status);
            if (this.status == 200) { // worked 
                allListings = this.response;
                console.log(this.response[0].user_id);
                getUserId();                
                setTimeout(function() {
                    for(let key in allListings){
                        if(allListings[key].user_id === userId){
                            console.log(allListings[key]);
                            let dataRow = document.createElement('tr');
                            dataRow.className = "UserDataRow";
                            dataRow.id = "dataRow";

                            let listingTitle = document.createElement('td'); 
                            listingTitle.innerText = allListings[key].title;

                            let listingPrice = document.createElement('td'); 
                            listingPrice.innerText = allListings[key].price;

                            let listingCondition = document.createElement('td'); 
                            listingCondition.innerText = allListings[key].listing_condition;

                            let listingCategory = document.createElement('td'); 
                            listingCategory.innerText = allListings[key].category;
                        
                            let listingDescription = document.createElement('td'); 
                            listingDescription.innerText = allListings[key].description;

                            //the edit/delete listing area
                            let editDelete = document.createElement('td');
                            editDelete.className = "edit-delete-listing";


                            // https://www.geeksforgeeks.org/how-to-create-a-form-dynamically-with-the-javascript/
                            // Create a form dynamically
                            var form = document.createElement("form");
                            form.setAttribute("method", "post");
                            form.setAttribute("action", "");

                            var Edit = document.createElement("input");
                            Edit.setAttribute("type", "submit");
                            Edit.setAttribute("name", "action");
                            Edit.setAttribute("value", "Edit");

                            var editSpan = document.createElement("span");
                            editSpan.className = "btn btn-primary";
                            editSpan.append(Edit);

                            form.append(editSpan);

                            var Delete = document.createElement("input");
                            Delete.setAttribute("type", "submit");
                            Delete.setAttribute("name", "action");
                            Delete.setAttribute("value", "Delete");

                            var deleteSpan = document.createElement("span");
                            deleteSpan.className = "btn btn-danger";
                            deleteSpan.append(Delete);

                            form.append(deleteSpan);

                            var extra = document.createElement("input");
                            extra.setAttribute("type", "hidden");
                            extra.setAttribute("name", "id");
                            extra.setAttribute("value", allListings[key].id );

                            form.append(extra);

                            editDelete.append(form);

                            // create the two edit/delete listings buttons
                            dataRow.append(listingTitle, listingPrice, listingCondition, listingCategory, listingDescription, editDelete);
                            let myTable = document.querySelector(".table-body");
                            myTable. append(dataRow);
                        }
                    }
                }, 100);
            }
        });
    
        // What happens on error
        ajax.addEventListener("error", function() {
            // document.getElementById("message").innerHTML = 
            //     "<div class='alert alert-danger'>An Error Occurred</div>";
            alert("Error loading user data");
        });
    }

    // jQuery
    $("#listingsTitle").click(function(){
        $("#listingsContainer").slideToggle();
    });


    function getUserId(){
        // instantiate the object
        var ajax = new XMLHttpRequest();
        // open the request
        ajax.open("GET", "?command=get-user-id", true);
        // ask for a specific response
        ajax.responseType = "json";
        // send the request
        ajax.send(null);
    
        // What happens if the load succeeds
        ajax.addEventListener("load", function() {
            userId = this.response;
        });
    
        // What happens on error
        ajax.addEventListener("error", function() {
            alert("Error in retrieving User Id");
        });
    }

</script>
</html>

