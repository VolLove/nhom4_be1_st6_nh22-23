<!DOCTYPE html>
<html lang="en">
<?php
include 'header.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
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
                            <h1>DataTables</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="type-add" type="button" class="btn btn-primary btn-lg">Add new</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>ID</th>
                                                <th>Type name</th>
                                                <th>Product</th>
                                                <th>Product</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($getAllType as $value) :
                                            ?>
                                            <tr>
                                                <td style="width: 100px;">
                                                    <img style="width: 100%;"
                                                        src="../img/<?php echo $value['image'] ?>">
                                                </td>
                                                <td>
                                                    <?php echo $value['type_id'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['type_name']; ?>
                                                </td>
                                                <td style="width: 100px;">
                                                    <?php $countProduct = 0;
                                                        $getAllProductByType = $product->getProductByType($value['type_id']);
                                                        foreach ($getAllProductByType as $item) {
                                                            $countProduct++;
                                                        }
                                                        echo $countProduct;
                                                        ?>
                                                </td>
                                                <td style="width: 100px;">
                                                    <a href="type-edit.php?id=<?php echo $value['type_id'] ?>"
                                                        type="button" class="btn btn-block btn-default btn-xs">Edit</a>
                                                    <a href="handle.php?typedelete=<?php echo $value['type_id'] ?>"
                                                        type="button" class="btn btn-block btn-danger btn-xs">Delete</a>
                                                </td>
                                            </tr>
                                            <?php
                                            endforeach;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
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

    <script>
    $(function() {

        $('#example').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    </script>
</body>

</html>