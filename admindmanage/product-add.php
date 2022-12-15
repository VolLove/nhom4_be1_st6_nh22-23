<!DOCTYPE html>
<html lang="en">

<?php
include 'header.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">

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
                            <h1>Product Add</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Product Add</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section style="padding-bottom: 20px;" class="content ">
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
                                <div class="card-body">
                                    <input type="hidden" name="product_add">
                                    <div class="form-group">
                                        <label for="inputName">Product name</label>
                                        <input required type="text" id="inputName" name="name" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="type">Type</label>

                                        <select id="type" name="type" class="form-control custom-select">
                                            <option selected disabled>Select one</option>
                                            <?php
                                            $product = new Product();
                                            $getalltype = $product->getAlltype();
                                            $getallmanu = $product->getAllManufacturer();
                                            foreach ($getalltype as $value) :
                                            ?>
                                            <option value="<?php echo $value['type_id']; ?>">
                                                <?php echo $value['type_name']; ?>
                                            </option>

                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Manufacturer</label>
                                        <select id="manufacturer" name="manufacturer"
                                            class="form-control custom-select">
                                            <option selected disabled>Select one</option>
                                            <?php foreach ($getallmanu as $value) : ?>
                                            <option value="<?php echo $value['manu_id'] ?>">
                                                <?php echo $value['manu_name']; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input required name="price" type="text" id="price" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input required type="file" name="image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="description"> Description</label>
                                        <textarea required id="description" name="description" class="form-control"
                                            rows="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="details"> Details</label>
                                        <textarea required id="details" name="details" class="form-control"
                                            rows="4"></textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->
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