<?php
session_start();
include "models/db.php";
include "config.php";
include "login/productaccount.php";
$productacc = new Productacc;

if (isset($_POST['typehandle'])) {
    $typehandle = $_POST['typehandle'];
    if ($typehandle == "login") {
        $loginaccuracy = $productacc->login($_POST['username'], $_POST['password']);
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $count = count($loginaccuracy);
        if ($count == 1) {
            if (isset($_POST['remember'])) {
                foreach ($loginaccuracy as $value) {
                    setcookie('remember', $value['id'], time() + 86400 * 30, "/", "", 0);
                    break;
                }
            } else {
                if (isset($_COOKIE['remember'])) {
                    setcookie('remember', '', time() - 86400, "/");
                }
            }
            foreach ($loginaccuracy as $value) {
                $_SESSION['login'] = $value['id'];
                break;
            }
            header('Location: http://localhost:82/Project/');
        } else {
            header("location:  http://localhost:82/Project/login");
            setcookie("error", "Đăng nhập không thành công!", time() + 1, "/", "", 0);
        }
    }
    if ($typehandle == "register") {

        $loginaccuracy = $productacc->userex($_POST['username']);
        $count = count($loginaccuracy);
        if ($count == 1) {
            header("location:  http://localhost:82/Project/register.php");
            setcookie("error", "Tài khoản tồn tại!", time() + 1, "/", "", 0);
        } else {
            $pass1 = $_POST['password'];
            $pass2 = $_POST['confirm_passwd'];
            if ($pass1 == $pass2) :
                header("location:  http://localhost:82/Project/login");
                $productacc->register($_POST['username'], $_POST['password'], $_POST['fullname']);
                setcookie("success", "Tạo tài khoản thành công!", time() + 1, "/", "", 0);
            else :
                header("location:  http://localhost:82/Project/login");
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
            $_SESSION['username'] = $_POST['username'];
            setcookie("code", $str, time() + 1, "/", "", 0);
            $_SESSION['code'] = $str;
            header("location:  http://localhost:82/Project/login/chanpassword.php");
        } else {
            header("location:  http://localhost:82/Project/login/chanpassword.php");
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
                header("location:  http://localhost:82/Project/login/chanpassword.php");
                setcookie("error", "Vui lòng nhập đúng mật khẩu", time() + 1, "/", "", 0);
                setcookie("code", $_SESSION['code'], time() + 1, "/", "", 0);
            endif;
        else :
            header("location:  http://localhost:82/Project/login/chanpassword.php");
            setcookie("error", "Vui lòng nhập đúng mã", time() + 1, "/", "", 0);
            setcookie("code", $_SESSION['code'], time() + 1, "/", "", 0);
        endif;
    }
}
if (isset($_GET['logout'])) {
    if (isset($_SESSION['login'])) {
        unset($_SESSION['login']);
    }
    if (isset($_COOKIE['remember'])) {
        setcookie('remember', '', time() - 86400, "/");
    }
    header('Location: http://localhost:82/Project/');
}