<?php

// 5 dynamic behaviors:
// input validation -> both via required and min/max lengh as well as custom funciton
// dom manipulation -> add div for erro message
// login -> switch between login and signup
// homepage -> change colors on mouse over
// change color on hover on the logo

// event listerens for each card in homepage
// changes color on hover

// functions 
// event listener for cards on homepage have anonymous functions and arrow


class CollegeController  {
    private $command;

    private $db;
    
    // If using Monolog (with Composer)
    //private $logger;

    public function __construct($command) {
        //***********************************
        // If we use Composer to include the Monolog Logger
        // global $log;
        // $this->logger = new \Monolog\Logger("FinanceController ");
        // $this->logger->pushHandler($log);
        //***********************************

        $this->command = $command;

        $this->db = new Database();
    }

    public function run() {
        switch($this->command) {
            case "homepage":
                $this->Homepage();
                break;
            case "logout":
                $this->destroyCookies();
            case "login-existing":
                $this->loginExisting();
                break;
            case "login-new":
                $this->loginNew();
                break;
            case "create-listing":
                $this->createListing();
                break;
            case "my-listings":
                $this->listingHistory();
                break;
            case "edit-listing":
                $this->editListing();
                break;
            case "get-all-listings":
                $this->getAllListings();
                break;
            case "get-user-id":
                $this-> getuserId();
                break;
            default:
                $this->loginExisting();
        }
    }

    public function getAllListings() {
        $data = $this->db->query("select * from listings;");
        if (!isset($data[0])) {
            die("No Listings in the database");
        }
        $allListings = $data;
        
        // Return JSON only
        header("Content-type: application/json");
        echo json_encode($allListings, JSON_PRETTY_PRINT);
    }

    public function getUserId(){
        if(isset($_COOKIE["user_id"])){
            echo $_COOKIE["user_id"];
        }
    }

    private function Homepage(){
        if(isset($_COOKIE["user_id"])){
            include("templates/homepage.php");
        }else{
            header("Location: ?command=login-existing");
        }
    }

    private function destroyCookies() {
        setcookie("first_name", "", time() - 3600);
        setcookie("last_name", "", time() - 3600);
        setcookie("email", "", time() - 3600);
        setcookie("user_id", "", time() - 3600);
    }

    private function loginExisting(){
        if(isset($_POST["email"])){ //if they typed somethign in & not null
            $pattern = "/^([a-zA-Z0-9-.+]+)@([a-zA-Z0-9-.]+).([a-zA-Z]+)$/";
            //if the email format is valid
            if(preg_match($pattern, $_POST["email"])) {
                $data = $this->db->query("select * from cm_user where email = ?;", "s", $_POST["email"]);
                // setcookie("data", implode($data), time() + 3600);

                if ($data === false) {
                    $error_msg = "Error checking for user";
                } else if (!empty($data)) {
                    if (password_verify($_POST["password"], $data[0]["password"])) {
                        setcookie("first_name", $data[0]["first_name"], time() + 3600);
                        setcookie("last_name", $data[0]["last_name"], time() + 3600);
                        setcookie("email", $data[0]["email"], time() + 3600);
                        // setcookie("score", $data[0]["score"], time() + 3600);
                        setcookie("user_id", $data[0]["id"], time() + 3600);
                        header("Location: ?command=homepage");
                    } else {
                        $error_msg = "Wrong password";
                    }
                }
                header("Location: ?command=homepage");
            }
            else {

                $error_msg = "Email is not in a valid format";
            }
             
        }
        include("templates/login.php");
    }
    private function loginNew() {
        if(isset($_POST["email"])){ //if they typed somethign in & not null
            $pattern = "/^([a-zA-Z0-9-.+]+)@([a-zA-Z0-9-.]+).([a-zA-Z]+)$/";
            if(preg_match($pattern, $_POST["email"])) {
                $insert = $this->db->query("insert into cm_user (first_name,last_name, email, password) values (?, ?, ?, ?);", 
                        "ssss", $_POST["first_name"], $_POST["last_name"], $_POST["email"],
                        password_hash($_POST["password"], PASSWORD_DEFAULT));

                if ($insert === false) {
                    $error_msg = "Error inserting user";
                } else {
                    $data = $this->db->query("select * from cm_user where email = ?;", "s", $_POST["email"]);

                    setcookie("first_name", $_POST["first_name"], time() + 3600);
                    setcookie("last_name", $_POST["last_name"], time() + 3600);
                    setcookie("email", $_POST["email"], time() + 3600);
                    setcookie("user_id", $data[0]["id"], time() + 3600);
                    header("Location: ?command=homepage");
                }
            }
            else {
                $error_msg = "Email is not in a valid format";
            }
             
        }
        include("templates/login.php");
    }

    private function createListing(){
        if (isset($_POST["title"])) {
            
            $insert = $this->db->query("insert into listings (user_id, title, price, listing_condition, category, description) values (?, ?, ?, ?, ?, ?);","ssssss",$_COOKIE["user_id"], $_POST["title"] , $_POST["price"], $_POST["condition"], $_POST["category"], $_POST["description"]);
            header("Location: ?command=my-listings");
        }
        include("templates/createlisting.php");
    }

    private function listingHistory(){
        if(isset($_POST["action"])){
            if ($_POST['action'] && $_POST['id']) {
                if ($_POST['action'] == 'Edit') {
                    setcookie("item_id", $_POST["id"], time() + 3600);
                    header("Location: ?command=edit-listing");
                }
                if ($_POST['action'] == 'Delete') {
                    $this->db->query("Delete from listings where id = ?", "s", $_POST["id"]);
                }
            }
        }
        include("templates/myListings.php");
    }

    private function editListing(){
        // $data = $this->db->query("select * from listings where user_id = ?;", "s", $_POST["email"]);
        //after editing listing detele the cookie and go to my listings
        if(isset($_POST["title"])){

            //upate the db
            $data = $this->db->query(
                "Update listings 
                SET title = '".$_POST['title']."', 
                price = '".$_POST['price']."', 
                listing_condition = '".$_POST['condition']."',
                category = '".$_POST['category']."', 
                description = '".$_POST['description']."' 
                WHERE id = ?;", "s", $_COOKIE["item_id"]);

            //delete cookie
            setcookie("item_id", "", time() - 3600);
            header("Location: ?command=my-listings");
            

        }
        include("templates/editListing.php");
    }
}