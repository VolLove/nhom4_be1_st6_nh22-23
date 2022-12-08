<!DOCTYPE html>
<html lang="en">
<?php
include 'header.php';
?>

<body class="hold-transition sidebar-mini">

    <!-- Site wrapper -->
    <div class="wrapper">

        <?php
        include 'nav.php';
        include 'sidebar.php';
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Project Edit</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Project Edit</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <form action="handle.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add new product</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <?php
                                if (isset($_GET['id'])) :
                                    $id = $_GET['id'];
                                    $getProductByID = $product->getProductById($id);
                                    $getalltype = $product->getAlltype();
                                    $getallmanu = $product->getAllManufacturer();
                                    foreach ($getProductByID as $value) :
                                ?>
                                <div class="card-body">
                                    <input type="hidden" name="product_edit">
                                    <div class="form-group">
                                        <label for="inputName">Product name</label>
                                        <input required type="text" value="<?php echo $value['name'] ?>" id="inputName"
                                            name="name" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="type">Type</label>

                                        <select id="type" name="type" class="form-control custom-select">
                                            <?php
                                                    foreach ($getalltype as $type) :
                                                    ?>
                                            <option value="<?php echo $type['type_id']; ?>">
                                                <?php echo $type['type_name']; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Manufacturer</label>
                                        <select id="manufacturer" name="manufacturer"
                                            class="form-control custom-select">
                                            <?php foreach ($getallmanu as $manu) : ?>
                                            <option value="<?php echo $manu['manu_id'] ?>">
                                                <?php echo $manu['manu_name']; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input name="price" value="<?php echo $value['price'] ?>" required type="text"
                                            id="price" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input required type="file" name="image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="description"> Description</label>
                                        <textarea id="description" name="description" class="form-control" rows="4">
                                            <?php echo $value['description'] ?>
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="details"> Details</label>
                                        <textarea id="details" name="details" class="form-control" rows="4">
                                            <?php echo $value['details'] ?></textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="product-table.php" class="btn btn-secondary">Cancel</a>
                            <input type="submit" value="Create new Porject" class="btn btn-success float-right">
                        </div>
                    </div>
                </form>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include 'footer.php' ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php include 'jquerylink.php'; ?>
</body>

</html>