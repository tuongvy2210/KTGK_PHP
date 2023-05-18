<?php
include './classes/Database.php';
include './classes/User.php';
include './classes/Subscriber.php';
include './includes/show_alert.php';

$database = new Database();
$db = $database->connect();
$subscriber = new Subscriber($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_REQUEST['frm'] == 'delete') {
        $subscriber->subscriber_id = $_REQUEST['subscriber_id'];
        if ($subscriber->delete()) {
            $status = "Xóa thành công!";
        }
    }
}

$subscribers = $subscriber->readAll()->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './includes/metas.php' ?>

    <!-- Title Page-->
    <title>Blog Subscriber</title>

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
                                    <h2 class="title-1">Blog Subscriber</h2>
                                </div>
                            </div>
                        </div>

                        <?php if (isset($status)) :
                            show_alert($status);
                        endif; ?>

                        <div class="row m-t-15">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Email</th>
                                                <th>Date Create</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($subscribers as $key => $subscriber) : ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $subscriber['subscriber_email'] ?></td>
                                                    <td><?= $subscriber['subscriber_date_created'] ?></td>
                                                    <td>
                                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteSubscriber<?= $subscriber['subscriber_id'] ?>">Delete</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>

                        <!-- footer -->
                        <?php include './includes/footer.php' ?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
            <?php foreach ($subscribers as $key => $subscriber) : ?>
                <!-- Modal Delete -->
                <div class="modal fade" id="deleteSubscriber<?= $subscriber['subscriber_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <form action="" method="post" novalidate="novalidate">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p> Bạn có chắc chắn muốn xóa???? </p>
                                    <input type="hidden" name="frm" value="delete">
                                    <input type="hidden" name='subscriber_id' value="<?= $subscriber['subscriber_id'] ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--End Modal Delete -->
            <?php endforeach; ?>
        </div>
    </div>

    <?php include './includes/scripts.php' ?>

</body>

</html>
<!-- end document-->