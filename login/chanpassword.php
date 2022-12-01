<?php
session_start();

?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="container">
        <?php
        if (isset($_COOKIE["error"])) {
        ?>
        <div class="alert alert-danger">
            <?php echo $_COOKIE["error"]; ?>
        </div>
        <?php } ?>
        <?php
        if (isset($_COOKIE["success"])) {
        ?>
        <div class="alert alert-success">
            <?php echo $_COOKIE["success"]; ?>
        </div>
        <?php } ?>
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Forgot your password</h3>
                </div>
                <div class="card-body">
                    <form action="handle.php" method="POST">


                        <?php
                        if (isset($_COOKIE["code"])) : ?>
                        <input type="hidden" name="typehandle" value="userchance">
                        <input type="hidden" name="username" value="userchance">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input name="code" type="code" class="form-control" placeholder="code">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input name="password" type="password" class="form-control" placeholder="new password">
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input name="confirm_passwd" type="password" class="form-control"
                                placeholder="confirm password">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Enter" class="btn float-right register_btn">
                        </div>


                        <?php
                        else :
                        ?>
                        <input type="hidden" name="typehandle" value="userreport">

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input name="username" type="text" class="form-control" placeholder="username">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="next" class="btn float-right register_btn">
                        </div>
                        <?php endif; ?>
                    </form>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center links">
                            <a href="index.php">Sign in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>