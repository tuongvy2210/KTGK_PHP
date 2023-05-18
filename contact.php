<?php
include "admin/classes/Database.php";
include "admin/classes/Contact.php";
include "admin/includes/show_alert.php";


$database = new database;
$db = $database->connect();
$contact = new Contact($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $contact->contact_fullname = $_POST['cName'];
        $contact->contact_phone = $_POST['cPhone'];
        $contact->contact_email = $_POST['cEmail'];
        $contact->contact_message = $_POST['cMessage'];
        if ($contact->add()) {
            $status = "Liên hệ thành công!";
        }
    }
}

$stmt = $contact->readAll();
$contacts = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Contact - Calvin</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="./assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/vendor.css">

    <!-- script
    ================================================== -->
    <script src="/js/modernizr.js"></script>
    <script defer src="js/fontawesome/all.min.js"></script>

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
    <?php
    include "header_s.php";
    ?>

    <!-- end s-header -->


    <!-- content
    ================================================== -->
    <section class="s-content">

        <div class="row">
            <div class="column large-12">

                <?php if (isset($status)) :
                    show_alert($status);
                endif;
                ?>

                <article class="s-content__entry">

                    <div class="s-content__media">
                        <img src="images/thumbs/contact/contact-1050.jpg" srcset="images/thumbs/contact/contact-2100.jpg 2100w, 
                                        images/thumbs/contact/contact-1050.jpg 1050w, 
                                        images/thumbs/contact/contact-525.jpg 525w" sizes="(max-width: 2100px) 100vw, 2100px" alt="">
                    </div> <!-- end s-content__media -->

                    <div class="s-content__entry-header">
                        <h1 class="s-content__title">Get In Touch With Us.</h1>
                    </div> <!-- end s-content__entry-header -->

                    <div class="s-content__primary">

                        <div class="s-content__page-content">

                            <p class="lead">
                                Lorem ipsum Deserunt est dolore Ut Excepteur nulla occaecat magna occaecat Excepteur nisi esse veniam
                                dolor consectetur minim qui nisi esse deserunt commodo ea enim ullamco non voluptate consectetur minim
                                aliquip Ut incididunt amet ut cupidatat.
                            </p>

                            <br>

                            <div class="row block-large-1-2 block-tab-full s-content__blocks">
                                <div class="column">
                                    <h4>Where to Find Us</h4>
                                    <p>
                                        1600 Amphitheatre Parkway<br>
                                        Mountain View, CA<br>
                                        94043 US
                                    </p>
                                </div>

                                <div class="column">
                                    <h4>Contact Info</h4>
                                    <p>
                                        someone@yourdomain.com<br>
                                        info@yourdomain.com <br>
                                        Phone: (+63) 555 1212
                                    </p>
                                </div>
                            </div> <!-- end s-content__blocks -->

                            <form name="cForm" id="cForm" class="s-content__form" method="POST" action="" onsubmit="return check_all()">
                                <fieldset>

                                    <div class="form-field">
                                        <input name="cName" type="text" id="cName" onblur="check_name()" class="h-full-width h-remove-bottom" placeholder="Your Name" value="">
                                        <p id="message_name"></p>
                                    </div>

                                    <div class="form-field">
                                        <input name="cPhone" type="text" id="cPhone" onblur="check_phone()" class="h-full-width h-remove-bottom" placeholder="Your Phone" value="">
                                        <p id="message_phone"></p>
                                    </div>

                                    <div class="form-field">
                                        <input name="cEmail" type="text" id="cEmail" onblur="check_email()" class="h-full-width h-remove-bottom" placeholder="Email" value="">
                                        <p id="message_email"></p>
                                    </div>

                                    <div class="message form-field">
                                        <textarea name="cMessage" id="cMessage" class="h-full-width" placeholder="Your Message"></textarea>
                                    </div>

                                    <br>
                                    <button type="submit" name="add" class="submit btn btn--primary h-full-width">Submit</button>
                                </fieldset>
                            </form> <!-- end form -->

                        </div> <!-- end s-entry__page-content -->

                    </div> <!-- end s-content__primary -->
                </article> <!-- end entry -->

            </div> <!-- end column -->
        </div> <!-- end row -->

    </section> <!-- end s-content -->


    <!-- footer
    ================================================== -->
    <?php
    include "footer.php";
    ?>
    <!-- end s-footer -->


    <!-- Java Script
    ================================================== -->
    <script src="./assets/js/jquery-3.5.0.min.js"></script>
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

    <script>
        function check_name() {
            var status = false;
            var message = "";
            var pattern = /\w+/;
            if (document.cForm.cName.value == "") {
                message = "Name is require.";
                document.cForm.cName.focus();
            } else {
                if (!pattern.test(document.cForm.cName.value)) {
                    message = "Name is invalid";
                    document.cForm.cName.focus();
                }
                status = true;
            }
            document.getElementById("message_name").innerHTML = message;
            return status;
        }

        function check_phone() {
            var status = false;
            var message = "";
            var pattern = /^(84|0[3|5|7|8|9])+([0-9]{8})$/;
            if (document.cForm.cPhone.value == "") {
                message = "Phone is require.";
                document.cForm.cPhone.focus();
            } else {
                if (!pattern.test(document.cForm.cPhone.value)) {
                    message = "Phone is incvalid";
                    document.cForm.cPhone.focus();
                }
                status = true;
            }
            document.getElementById("message_phone").innerHTML = message;
            return status;
        }

        function check_email() {
            var status = false;
            var message = "";
            var pattern = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
            if (document.cForm.cEmail.value == "") {
                message = "Email is require.";
                document.cForm.cEmail.focus();
            } else {
                if (!pattern.test(document.cForm.cEmail.value)) {
                    message = "Email is incvalid";
                    document.cForm.cEmail.focus();
                }
                status = true;
            }
            document.getElementById("message_email").innerHTML = message;
            return status;
        }

        function check_all() {
            if (check_name() && check_phone() && check_email()) {
                return true;
            }
            return false;
        }
    </script>
</body>

</html>