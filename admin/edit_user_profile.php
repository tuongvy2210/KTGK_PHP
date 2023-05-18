<?php
include './classes/Database.php';
include './classes/User.php';
include './includes/func_upload_image.php';
include './includes/show_alert.php';

$database = new Database();
$db = $database->connect();
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user->user_id = 1;
    $user->user_fullname = $_REQUEST['user_fullname'];
    $user->user_phone = $_REQUEST['user_phone'];
    $user->user_email = $_REQUEST['user_email'];
    $user->user_image = upload_image('user_image', 'old_user_image');
    $user->user_message = $_REQUEST['user_message'];
    $user->user_date_updated = date('Y-m-d', time());

    if ($user->update()) {
        $status = "Sửa thành công!";
    }
}

$user->user_id = 1;
$user->read();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './includes/metas.php' ?>

    <!-- Title Page-->
    <title>Blog User</title>

    <?php include './includes/styles.php' ?>
</head>

<body class="animsition">
    <div class="page-wrapper">

        <?php include './includes/sidebar.php' ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include './includes/header.php' ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Edit User Profile</h2>
                                </div>
                            </div>
                        </div>

                        <?php if (isset($status)) :
                            show_alert($status);
                        endif; ?>

                        <div class="row m-t-15">
                            <div class="col-md-12">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="card">
                                        <div class="card-header">
                                            Edit User Profile
                                        </div>
                                        <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="user_fullname" class=" form-control-label">Fullname</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="user_fullname" name="user_fullname" class="form-control" value="<?= $user->user_fullname ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="user_phone" class=" form-control-label">Phone</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="user_phone" name="user_phone" class="form-control" value="<?= $user->user_phone ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="user_email" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="user_email" name="user_email" class="form-control" value="<?= $user->user_email ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="user_image" class=" form-control-label">Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <img src="./images/upload/<?= $user->user_image ?>" width="300" alt="">
                                                    <input type="file" id="user_image" name="user_image" class="form-control-file">
                                                    <input type="hidden" name="old_user_image" value="<?= $user->user_image ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="user_message" class=" form-control-label">Message</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="user_message" id="user_message" rows="9" placeholder="Content..." class="form-control"><?= $user->user_message ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Update User Profile
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- footer -->
                        <?php include './includes/footer.php' ?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>

    <?php include './includes/scripts.php' ?>

</body>

</html>
<!-- end document-->