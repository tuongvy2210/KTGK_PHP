<?php
include './classes/Database.php';
include './classes/Category.php';
include './classes/User.php';
include './classes/Blog.php';
include './includes/func_upload_image.php';
include './includes/show_alert.php';


$database = new Database();
$db = $database->connect();
$category = new Category($db);
$blog = new Blog($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $blog->blog_id = $_GET['id'];
    $blog->category_id = $_REQUEST['category_id'];
    $blog->blog_name = $_REQUEST['blog_name'];
    $blog->blog_summary = $_REQUEST['blog_summary'];
    $blog->blog_content = $_REQUEST['blog_content'];
    $blog->blog_main_image = upload_image('blog_main_image', 'old_blog_main_image');
    $blog->blog_alt_image = upload_image('blog_alt_image', 'old_blog_alt_image');
    $blog->blog_place = (!empty($_POST['blog_place'])) ? $_POST['blog_place'] : 0;
    $blog->blog_status = 1;
    $blog->blog_date_created = date('Y-m-d', time());

    if ($blog->update()) {
        header('Location: http://localhost/KTGK/admin/blog.php');
        exit();
    }
}

$categories = $category->readAll()->fetchAll();

$blog->blog_id = $_GET['id'];
$blog->read();
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
                                    <h2 class="title-1">Edit Blog</h2>
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
                                            Write Blog
                                        </div>
                                        <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="blog_name" class=" form-control-label">Blog Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="blog_name" name="blog_name" class="form-control" value="<?= $blog->blog_name ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Blog Category</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select id="category_id" name="category_id" class="form-control">
                                                        <?php foreach ($categories as $category) : ?>
                                                            <option value="<?= $category['category_id'] ?>" <?= $category['category_id'] == $blog->category_id ? 'selected' : '' ?>><?= $category['category_name'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="blog_main_image" class=" form-control-label">Blog Main Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <img src="./images/upload/<?= $blog->blog_main_image ?>" width="300" alt="">
                                                    <input type="file" id="blog_main_image" name="blog_main_image" class="form-control-file">
                                                    <input type="hidden" name="old_blog_main_image" value="<?= $blog->blog_main_image ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="blog_alt_image" class=" form-control-label">Blog Alt Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <img src="./images/upload/<?= $blog->blog_alt_image ?>" width="300" alt="">
                                                    <input type="file" id="blog_alt_image" name="blog_alt_image" class="form-control-file">
                                                    <input type="hidden" name="old_blog_alt_image" value="<?= $blog->blog_alt_image ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="blog_summary" class=" form-control-label">Blog Summary</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="blog_summary" id="blog_summary" rows="9" placeholder="Content..." class="form-control"><?= $blog->blog_summary ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="blog_content" class=" form-control-label">Blog Content</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="blog_content" id="blog_content" rows="9" placeholder="Content..." class="form-control"><?= $blog->blog_content ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Blog Home Place</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <div class="form-check">
                                                        <div class="radio">
                                                            <label for="radio1" class="form-check-label ">
                                                                <input type="radio" id="radio1" name="blog_place" value="option1" class="form-check-input" <?= $blog->blog_place == 1 ? 'checked' : '' ?>>Option 1
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio2" class="form-check-label ">
                                                                <input type="radio" id="radio2" name="blog_place" value="option2" class="form-check-input" <?= $blog->blog_place == 2 ? 'checked' : '' ?>>Option 2
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio3" class="form-check-label ">
                                                                <input type="radio" id="radio3" name="blog_place" value="option3" class="form-check-input" <?= $blog->blog_place == 3 ? 'checked' : '' ?>>Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Update Blog
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