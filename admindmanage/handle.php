<?php
include "models/db.php";
include "config.php";
include "models/productmodels.php";
$product = new Product();
$price = 0;
if (isset($_POST['product_add'])) {
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['type'])) {
        $type_id = $_POST['type'];
    }
    if (isset($_POST['manufacturer'])) {
        $manu_id = $_POST['manufacturer'];
    }
    if (isset($_POST['price'])) {
        $price = $_POST['price'];
    }
    if (isset($_POST['description'])) {
        $description = $_POST['description'];
    }
    if (isset($_POST['details'])) {
        $details = $_POST['details'];
    }
    $target_dir = "../img/";
    $hinh = $target_dir . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $hinh);
    $image = $_FILES['image']['name'];
    $created_at = date("Y-m-d H:i:s");
    $add =  $product->addProduct($name, $manu_id, $type_id, $price, $image, $description, $created_at, $details);
    if ($add == 1) {
        header('Location: product-table.php');
        setcookie("success", "Sản phẩm đã được thêm vào!", time() + 1, "/", "", 0);
    } else {
        header('Location: product-table.php');
        setcookie("error", "Sản phẩm không thể thêm vào!", time() + 1, "/", "", 0);
    }
}

if (isset($_POST['type_add'])) {
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    $target_dir = "../img/";
    $hinh = $target_dir . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $hinh);
    $image = $_FILES['image']['name'];

    $add = $product->addType($name, $image);
    if ($add == 1) {
        header('Location: type-table.php');
        setcookie("success", "Loại sản phẩm mới đã được thêm vào!", time() + 1, "/", "", 0);
    } else {
        header('Location: type-table.php');
        setcookie("error", "Loại sản phẩm mới không thể thêm vào!", time() + 1, "/", "", 0);
    }
}

if (isset($_POST['manufactures_add'])) {
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    $target_dir = "../img/";
    $hinh = $target_dir . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $hinh);
    $image = $_FILES['image']['name'];
    $add = $product->addManufactures($name, $image);
    if ($add == 1) {
        header('Location: manufacturer-table.php');
        setcookie("success", "Nhãn hiệu mới đã được thêm vào!", time() + 1, "/", "", 0);
    } else {
        header('Location: manufacturer-table.php');
        setcookie("error", "Nhãn hiệu mới không thể thêm vào!", time() + 1, "/", "", 0);
    }
}

if (isset($_GET['productdelete'])) {
    $id = $_GET['productdelete'];
    $remove = $product->removeProduct($id);
    if ($remove == 1) {
        header('Location: product-table.php');
        setcookie("success", "Sản phẩm đã được xoá!", time() + 1, "/", "", 0);
    } else {
        header('Location: product-table.php');
        setcookie("error", "Sản phẩm không thể xoá!", time() + 1, "/", "", 0);
    }
}
if (isset($_GET['typedelete'])) {
    $id = $_GET['typedelete'];
    $remove = $product->removeType($id);
    if ($remove == 1) {
        header('Location: type-table.php');
        setcookie("success", "Loại sản phẩm đã được xoá!", time() + 1, "/", "", 0);
    } else {
        header('Location: type-table.php');
        setcookie("error", "Loại sản phẩm không được xoá!", time() + 1, "/", "", 0);
    }
}
if (isset($_GET['manudelete'])) {
    $id = $_GET['manudelete'];
    $remove = $product->removeManufactures($id);
    if ($remove == 1) {
        header('Location: manufacturer-table.php');
        setcookie("success", "Nhãn hiệu đã được xoá!", time() + 1, "/", "", 0);
    } else {
        header('Location: manufacturer-table.php');
        setcookie("error", "Nhãn hiệu không xoá được!", time() + 1, "/", "", 0);
    }
}

if (isset($_POST['manufactures_edit'])) {
    $id = $_POST['manufactures_edit'];
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    $target_dir = "../img/";
    $hinh = $target_dir . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $hinh);
    $image = $_FILES['image']['name'];
    $update = $product->updateManufactures($id, $name, $image);
    if ($update == 1) {
        header('Location: manufacturer-table.php');
        setcookie("success", "Nhãn hiệu đã được sửa!", time() + 1, "/", "", 0);
    } else {
        header('Location: manufacturer-table.php');
        setcookie("error", "Nhãn hiệu không sửa được!", time() + 1, "/", "", 0);
    }
}
if (isset($_POST['product_edit'])) {
    $id = $_POST['product_edit'];
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['type'])) {
        $type_id = $_POST['type'];
    }
    if (isset($_POST['manufacturer'])) {
        $manu_id = $_POST['manufacturer'];
    }
    if (isset($_POST['price'])) {
        $price = $_POST['price'];
    }
    if (isset($_POST['description'])) {
        $description = $_POST['description'];
    }
    if (isset($_POST['details'])) {
        $details = $_POST['details'];
    }
    $target_dir = "../img/";
    $hinh = $target_dir . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $hinh);
    $image = $_FILES['image']['name'];

    $update = $product->updateProduct($id, $name, $manu_id, $type_id, $price, $image, $description, $details);
    if ($update == 1) {
        header('Location: product-table.php');
        setcookie("success", "Sản phẩm đã được cập nhật!", time() + 1, "/", "", 0);
    } else {
        header('Location: product-table.php');
        setcookie("error", "Sản phẩm không thể cập nhật!", time() + 1, "/", "", 0);
    }
}
if (isset($_POST['type_edit'])) {
    $id = $_POST['type_edit'];
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    $target_dir = "../img/";
    $hinh = $target_dir . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $hinh);
    $image = $_FILES['image']['name'];

    $add = $product->updateType($id, $name, $image);

    if ($add == 1) {
        header('Location: type-table.php');

        setcookie("success", "Loại sản phẩm đã đươc cập nhậ!", time() + 1, "/", "", 0);
    } else {
        header('Location: type-table.php');
        setcookie("error", "Loại sản phẩm không thể cập nhật!", time() + 1, "/", "", 0);
    }
}