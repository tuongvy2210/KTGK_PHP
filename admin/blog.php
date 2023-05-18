<?php
include './classes/Database.php';
include './classes/Category.php';
include './classes/User.php';
include './classes/Blog.php';
include './includes/show_alert.php';

$database = new Database();
$db = $database->connect();
$category = new Category($db);
$blog = new Blog($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_REQUEST['frm'] == 'delete') {
        $blog->blog_id = $_REQUEST['blog_id'];
        if ($blog->delete()) {
            $status = "Xóa thành công!";
        }
    }
}

$blogs = $blog->readAll()->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './includes/metas.php' ?>

    <!-- Title Page-->
    <title>Blog Category</title>

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
                                    <h2 class="title-1">Blog Post</h2>
                                    <a href="write_blog.php" class="btn btn-primary">Create</a>
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
                                                <th>Blog Id</th>
                                                <th>Blog Name</th>
                                                <th>Category Name</th>
                                                <th>Date Create</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($blogs as $key => $blog) : ?>
                                                <?php
                                                $category->category_id = $blog['category_id'];
                                                $category->read();
                                                ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $blog['blog_id'] ?></td>
                                                    <td><?= $blog['blog_name'] ?></td>
                                                    <td><?= $category->category_name ?></td>
                                                    <td><?= $blog['blog_date_created'] ?></td>
                                                    <td>
                                                        <a href="edit_blog.php?id=<?= $blog['blog_id'] ?>" class="btn btn-warning">Edit</a>
                                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteBlog<?= $blog['blog_id'] ?>">Delete</button>
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
            <?php foreach ($blogs as $key => $blog) : ?>
                <!-- Modal Delete -->
                <div class="modal fade" id="deleteBlog<?= $blog['blog_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
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
                                    <input type="hidden" name='blog_id' value="<?= $blog['blog_id'] ?>">
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