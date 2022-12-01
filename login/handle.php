<?php
session_start();
include "db.php";
include "config.php";
include "productaccount.php";
$productacc = new Productacc;


if (isset($_POST['typehandle'])) {
    $typehandle = $_POST['typehandle'];
    if ($typehandle == "login") {
        $loginaccuracy = $productacc->login($_POST['username'], $_POST['password']);
        $count = count($loginaccuracy);
        if ($count == 1) {
            header("location:index.php");
            setcookie("success", "Đăng nhập thành công!", time() + 1, "/", "", 0);
        } else {
            header("location:index.php");
            setcookie("error", "Đăng nhập không thành công!", time() + 1, "/", "", 0);
        }
    }
    if ($typehandle == "register") {

        $loginaccuracy = $productacc->userex($_POST['username']);
        $count = count($loginaccuracy);
        if ($count == 1) {
            header("location:register.php");
            setcookie("error", "Tài khoản tồn tại!", time() + 1, "/", "", 0);
        } else {
            $pass1 = $_POST['password'];
            $pass2 = $_POST['confirm_passwd'];
            if ($pass1 == $pass2) :
                header("location:index.php");
                $productacc->register($_POST['username'], $_POST['password'], $_POST['fullname']);
                setcookie("success", "Tạo tài khoản thành công!", time() + 1, "/", "", 0);
            else :
                header("location:register.php");
                setcookie("error", "Vui lòng nhập đúng mật khẩu", time() + 1, "/", "", 0);
            endif;
        }
    }
    if ($typehandle == "userreport") {

        $loginaccuracy = $productacc->userex($_POST['username']);
        $count = count($loginaccuracy);
        if ($count == 1) {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $size = strlen($chars);
            for ($i = 0; $i <= 5; $i++) {
                $str .= $chars[rand(0, $size - 1)];
            }
            header("location:chanpassword.php");
            $_SESSION['username'] = $_POST['username'];
            setcookie("code", $str, time() + 1, "/", "", 0);
            $_SESSION['code'] = $str;
        } else {
            header("location:chanpassword.php");
            setcookie("error", "Vui lòng nhập đúng tài khoản", time() + 1, "/", "", 0);
        }
    }
    if ($typehandle == "userchance") {
        if ($_POST['code'] == $_SESSION['code']) :
            $pass1 = $_POST['password'];
            $pass2 = $_POST['confirm_passwd'];
            if ($pass1 == $pass2) :
                header("location:index.php");
                $productacc->chancepassword($_SESSION['username'], $_POST['password']);
                setcookie("success", "Thay đổi mật khẩu thành công!", time() + 1, "/", "", 0);
            else :
                header("location:chanpassword.php");
                setcookie("error", "Vui lòng nhập đúng mật khẩu", time() + 1, "/", "", 0);
                setcookie("code", $_SESSION['code'], time() + 1, "/", "", 0);
            endif;
        else :
            header("location:chanpassword.php");
            setcookie("error", "Vui lòng nhập đúng mã", time() + 1, "/", "", 0);
            setcookie("code", $_SESSION['code'], time() + 1, "/", "", 0);
        endif;
    }
}