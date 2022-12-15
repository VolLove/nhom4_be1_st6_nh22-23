<!DOCTYPE html>
<html lang="en">
<?php
include 'header.php';
?>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <?php include 'nav.php';
        include 'sidebar.php';
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Type Edit</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Type Edit</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <form action="handle.php" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <?php
                        if (isset($_GET['id'])) :
                            $id = $_GET['id'];
                            $getTypeByID = $product->getTypeByID($id);
                            foreach ($getTypeByID as $value) :
                        ?>
                        <div class="col-md-12">
                            <div class="card-body">
                                <input type="hidden" name="type_edit" value="<?php echo $value['type_id'] ?>">
                                <div class="form-group">
                                    <label for="name">Type name</label>
                                    <input type="text" value="<?php echo $value['type_name'] ?>" id="name" name="name"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="image">Logo</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>

                            <!-- /.card-body -->
                        </div>
                        <?php
                            endforeach;
                        endif;
                        ?>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="#" class="btn btn-secondary">Cancel</a>
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