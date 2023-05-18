<?php
include './classes/Database.php';
include './classes/User.php';
include './classes/Category.php';
include './includes/show_alert.php';

$database = new Database();
$db = $database->connect();
$category = new Category($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_REQUEST['frm'] == 'add') {
        $category->category_name = $_REQUEST['category_name'];
        $category->category_description = $_REQUEST['category_description'];
        if ($category->add()) {
            $status = "Thêm thành công!";
        }
    }

    if ($_REQUEST['frm'] == 'edit') {
        $category->category_id = $_REQUEST['category_id'];
        $category->category_name = $_REQUEST['category_name'];
        $category->category_description = $_REQUEST['category_description'];
        if ($category->update()) {
            $status = "Sửa thành công!";
        }
    }

    if ($_REQUEST['frm'] == 'delete') {
        $category->category_id = $_REQUEST['category_id'];
        if ($category->delete()) {
            $status = "Xóa thành công!";
        }
    }
}

$stmt = $category->readAll();
$categories = $stmt->fetchAll();
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
                                    <h2 class="title-1">Blog Category</h2>
                                    <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
                                        Create
                                    </button>
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
                                                <th>ID</th>
                                                <th>Category name</th>
                                                <th>Category description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($categories as $key => $category) :
                                            ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $category['category_name'] ?></td>
                                                    <td><?= $category['category_description'] ?></td>
                                                    <td>
                                                        <button class="btn btn-warning" data-toggle="modal" data-target="#editCategory<?= $category['category_id'] ?>">Edit</button>
                                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteCategory<?= $category['category_id'] ?>">Delete</button>
                                                    </td>
                                                </tr>
                                            <?php
                                            endforeach;
                                            ?>
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
            <!-- Modal add -->
            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
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
                                <div class="form-group">
                                    <label for="category_name" class="control-label mb-1">Category name</label>
                                    <input id="category_name" name="category_name" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="category_description" class="control-label mb-1">Category description</label>
                                    <input id="category_description" name="category_description" type="text" class="form-control">
                                </div>
                                <input type="hidden" name="frm" value="add">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Create</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end modal add -->
            <?php
            foreach ($categories as $key => $category) :
            ?>
                <!-- Modal Edit -->
                <div class="modal fade" id="editCategory<?= $category['category_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
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
                                    <div class="form-group">
                                        <label for="category_name" class="control-label mb-1">Category name</label>
                                        <input id="category_name" name="category_name" type="text" class="form-control" value="<?= $category['category_name'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="category_description" class="control-label mb-1">Category description</label>
                                        <input id="category_description" name="category_description" type="text" class="form-control" value="<?= $category['category_description'] ?>">
                                    </div>
                                    <input type="hidden" name="frm" value="edit">
                                    <input type="hidden" name='category_id' value="<?= $category['category_id'] ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--End Modal Edit -->
                <!-- Modal Delete -->
                <div class="modal fade" id="deleteCategory<?= $category['category_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
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
                                    <p>
                                        Bạn có chắc chắn muốn xóa????
                                    </p>
                                    <input type="hidden" name="frm" value="delete">
                                    <input type="hidden" name='category_id' value="<?= $category['category_id'] ?>">
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