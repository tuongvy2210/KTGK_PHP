<?php
include "admin/classes/Subscriber.php";

$subscriber = new Subscriber($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $subscriber->subscriber_email = $_POST['dEmail'];
        if ($subscriber->add()) {
            $status = "Đăng ký thành công!";
        }
    }
}
?>

<footer class="s-footer">

    <div class="s-footer__main">

        <div class="row">

            <div class="column large-3 medium-6 tab-12 s-footer__info">

                <h5>About Our Site</h5>

                <p>
                    <?php
                    // $stmt_user = $user->read_all();
                    // $row_user = $stmt_user->fetch();
                    // echo $row_user['user_info'];
                    ?>
                </p>

            </div> <!-- end s-footer__info -->

            <div class="column large-2 medium-3 tab-6 s-footer__site-links">

                <h5>Site Links</h5>

                <ul>
                    <li><a href="#0">About Us</a></li>
                    <li><a href="#0">Blog</a></li>
                    <li><a href="#0">FAQ</a></li>
                    <li><a href="#0">Terms</a></li>
                    <li><a href="#0">Privacy Policy</a></li>
                </ul>

            </div> <!-- end s-footer__site-links -->

            <div class="column large-2 medium-3 tab-6 s-footer__social-links">

                <h5>Follow Us</h5>

                <ul>
                    <li><a href="#0">Twitter</a></li>
                    <li><a href="#0">Facebook</a></li>
                    <li><a href="#0">Dribbble</a></li>
                    <li><a href="#0">Pinterest</a></li>
                    <li><a href="#0">Instagram</a></li>
                </ul>

            </div> <!-- end s-footer__social links -->

            <div class="column large-3 medium-6 tab-12 s-footer__subscribe">

                <h5>Sign Up for Newsletter</h5>

                <p>Signup to get updates on articles, interviews and events.</p>

                <div class="subscribe-form">

                    <form id="mc-form" method="post" class="group" novalidate="true">

                        <input type="email" value="" name="dEmail" class="email" id="mc-email" placeholder="Your Email Address" required="">

                        <input type="submit" name="add">

                        <label for="mc-email" class="subscribe-message"></label>

                    </form>

                </div>

            </div> <!-- end s-footer__subscribe -->

        </div> <!-- end row -->

    </div> <!-- end s-footer__main -->

    <div class="s-footer__bottom">
        <div class="row">
            <div class="column">
                <div class="ss-copyright">
                    <span>© Copyright Calvin 2020</span>
                    <span>Design by <a href="https://www.styleshout.com/">StyleShout</a></span>
                </div> <!-- end ss-copyright -->
            </div>
        </div>

        <div class="ss-go-top">
            <a class="smoothscroll" title="Back to Top" href="#top">
                <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15">
                    <path d="M7.5 1.5l.354-.354L7.5.793l-.354.353.354.354zm-.354.354l4 4 .708-.708-4-4-.708.708zm0-.708l-4 4 .708.708 4-4-.708-.708zM7 1.5V14h1V1.5H7z" fill="currentColor"></path>
                </svg>
            </a>
        </div> <!-- end ss-go-top -->
    </div> <!-- end s-footer__bottom -->

</footer>