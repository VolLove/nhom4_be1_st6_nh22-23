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
                    <?php
                    if (isset($_GET['id'])) :
                        $id = $_GET['id'];
                        $getManuByID = $product->getManuByID($id);
                        foreach ($getManuByID as $value) :
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="manufactures_edit" value="<?php echo $value['manu_id'] ?>">
                            <div class="form-group">
                                <label for="name">Manufactures name</label>
                                <input type="text" id="name" value="<?php echo $value['manu_name'] ?>" name="name"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image">Logo</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                    </div>
                    <?php
                        endforeach;
                    endif;
                    ?>
                    <div class="row">
                        <div class="col-12">
                            <a href="#" class="btn btn-secondary">Cancel</a>
                            <input type="submit" value="Save Changes" class="btn btn-success float-right">
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