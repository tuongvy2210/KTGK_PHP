<?php  
include "admin/classes/Database.php";
include "admin/classes/User.php";
include "admin/classes/Category.php";
include "admin/classes/Blog.php";

$database = new database;
$db = $database->connect();

$user = new User($db);
$cate = new Category($db);
$blog = new Blog($db);



// if($_SERVER['REQUEST_METHOD']=='POST'){
//     echo "<pre>";
//     // print_r($_REQUEST);
//     echo "1234567";
//     echo "</pre>";
// }

?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Calvin</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="./assets/css/vendor.css">
    <link rel="stylesheet" href="./assets/css/styles.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script defer src="./assets/js/fontawesome/all.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">

</head>

<body id="top">
    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader"></div>
    </div>

    <!-- header
    ================================================== -->
    <?php include "header.php"; ?>
    <!-- end s-header -->

    <!-- banner
    ================================================== -->
    <?php include "banner.php"; ?>
    <!-- end s-banner -->

    <!-- content
    ================================================== -->
    <?php include "content.php"; ?>
    <!-- end s-content -->

    <!-- footer
    ================================================== -->
    <?php include "footer.php"; ?>
    <!-- end s-footer -->

    <!-- Java Script
    ================================================== -->
    <script src="./assets/js/jquery-3.5.0.min.js"></script>
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

</body>

</html>