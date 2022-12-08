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
                            <h1>Project Add</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Project Add</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <form action="handle.php" method="post">
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
                                    <div class="form-group">
                                        <label for="inputName">Product name</label>
                                        <input type="text" id="inputName" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Project Description</label>
                                        <textarea id="inputDescription" class="form-control" rows="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Type</label>
                                        <select id="inputStatus" class="form-control custom-select">
                                            <option selected disabled>Select one</option>
                                            <option>On Hold</option>
                                            <option>Canceled</option>
                                            <option>Success</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Manufacturer</label>
                                        <select id="inputStatus" class="form-control custom-select">
                                            <?php


                                            ?>
                                            <option selected disabled>Select one</option>
                                            <option>On Hold</option>
                                            <option>Canceled</option>
                                            <option>Success</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputClientCompany">Client Company</label>
                                        <input type="text" id="inputClientCompany" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputProjectLeader">Project Leader</label>
                                        <input type="text" id="inputProjectLeader" class="form-control">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
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