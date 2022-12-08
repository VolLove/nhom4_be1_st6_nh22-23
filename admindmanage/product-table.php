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
                                    <a href="product-add" type="button" class="btn btn-primary btn-lg">Add new</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Manufacturer</th>
                                                <th>Price (VND)</th>
                                                <th>Total sales</th>
                                                <th>Created at</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $getAllProduct = $product->getAllProducts();
                                            $getAllType = $product->getAlltype();
                                            $getAllManufaturer = $product->getAllManufacturer();
                                            foreach ($getAllProduct as $value) :
                                            ?>
                                            <tr>
                                                <td>
                                                    <img style="width: 100px;"
                                                        src="./img/<?php echo $value['image'] ?>">
                                                </td>
                                                <td>
                                                    <?php echo $value['name'] ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        foreach ($getAllType as $type) {
                                                            if ($type['type_id'] == $value['type_id']) {
                                                                echo $type['type_name'];
                                                            }
                                                        }
                                                        ?>
                                                </td>
                                                <td>

                                                    <?php
                                                        foreach ($getAllManufaturer as $manu) {
                                                            if ($manu['manu_id'] == $value['manu_id']) {
                                                                echo $manu['manu_name'];
                                                            }
                                                        }
                                                        ?>

                                                </td>
                                                <td>
                                                    <?php echo number_format($value['price']); ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['sales']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['created_at']; ?>
                                                </td>
                                                <td>
                                                    <a href="product-edit.php?id=<?php echo $value['id'] ?>"
                                                        type="button" class="btn btn-block btn-default btn-xs">Edit</a>
                                                    <a href="handle.php?productdelete=<?php echo $value['id'] ?>"
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
        $("#example").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": false,
        }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
    });
    </script>
</body>

</html>