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
    <?php include "header_s.php"; ?>
    <!-- end s-header -->


    <!-- content
    ================================================== -->
    <section class="s-content">

        <div class="row">
            <div class="column large-12">

                <article class="s-content__entry">

                    <div class="s-content__media">
                        <img src="images/thumbs/about/about-1050.jpg" 
                                srcset="images/thumbs/about/about-2100.jpg 2100w, 
                                        images/thumbs/about/about-1050.jpg 1050w, 
                                        images/thumbs/about/about-525.jpg 525w" sizes="(max-width: 2100px) 100vw, 2100px" alt="">

                    </div> <!-- end s-content__media -->

                    <div class="s-content__entry-header">
                        <h1 class="s-content__title">Learn More About Story.</h1>
                    </div> <!-- end s-content__entry-header -->

                    <div class="s-content__primary">

                        <div class="s-content__page-content">

                            <p class="lead">
                            Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi est eu 
                            exercitation incididunt adipisicing veniam velit id fugiat enim mollit amet anim veniam dolor dolor irure velit 
                            commodo cillum sit nulla ullamco magna amet magna cupidatat qui labore cillum sit in tempor veniam consequat non 
                            laborum adipisicing aliqua ea nisi sint ut quis proident ullamco ut dolore culpa occaecat ut laboris in sit minim 
                            cupidatat ut dolor voluptate enim veniam consequat occaecat fugiat in adipisicing in amet Ut nulla nisi non ut 
                            enim aliqua laborum mollit quis nostrud sed sed.
                            </p>
                            
                            <p>
                            Lorem ipsum Nisi cillum reprehenderit minim sunt dolore dolor eiusmod eu aliquip ad ut sint dolore laborum 
                            voluptate ullamco dolore aliquip enim. Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit 
                            nisi est eu exercitation incididunt adipisicing
                            </p> 

                            <p>
                            Lorem ipsum Cillum sit sunt dolore non aute enim pariatur deserunt magna reprehenderit veniam officia ullamco 
                            eiusmod laborum commodo veniam elit proident enim sit cillum ex aliquip dolore labore sint ut deserunt officia 
                            veniam consectetur in in quis eu consectetur non sint Duis mollit Ut magna irure.
                            </p>

                            <br>

                            <div class="row block-large-1-2 block-tab-full s-content__blocks">
                                <div class="column">
                                    <h4>Who.</h4>
                                    <p>
                                    Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui sit ex 
                                    occaecat et eu mollit nisi pariatur fugiat deserunt dolor veniam reprehenderit aliquip magna nisi 
                                    consequat aliqua veniam in aute ullamco Duis laborum ad non pariatur sit.
                                    </p>
                                </div>

                                <div class="column">
                                    <h4>When.</h4>
                                    <p>
                                    Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui sit ex 
                                    occaecat et eu mollit nisi pariatur fugiat deserunt dolor veniam reprehenderit aliquip magna nisi 
                                    consequat aliqua veniam in aute ullamco Duis laborum ad non pariatur sit.
                                    </p>
                                </div>

                                <div class="column">
                                    <h4>What.</h4>
                                    <p>
                                    Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui sit ex 
                                    occaecat et eu mollit nisi pariatur fugiat deserunt dolor veniam reprehenderit aliquip magna nisi 
                                    consequat aliqua veniam in aute ullamco Duis laborum ad non pariatur sit.
                                    </p>
                                </div>

                                <div class="column">
                                    <h4>How.</h4>
                                    <p>
                                    Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui 
                                    sit ex occaecat et eu mollit nisi pariatur fugiat deserunt dolor veniam reprehenderit aliquip 
                                    magna nisi consequat aliqua veniam in aute ullamco Duis laborum ad non pariatur sit.
                                    </p>
                                </div>

                            </div>
                        </div> <!-- end s-entry__page-content -->

                    </div> <!-- end s-content__primary -->
                </article> <!-- end entry -->

            </div> <!-- end column -->
        </div> <!-- end row -->

    </section> <!-- end s-content -->

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