<?php session_start();
$id;
if (isset($_GET['add_id'])) :
    $id = $_GET['add_id'];
    if (isset($_SESSION['wish'][$id])) :
        $_SESSION['wish'][$id]++;
    else :
        $_SESSION['wish'][$id] = 1;
    endif;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
elseif (isset($_GET['remove_id'])) :
    $id = $_GET['remove_id'];
    unset($_SESSION['wish'][$id]);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
elseif (isset($_GET['number']) && isset($_GET['id'])) :
    $id = $_GET['id'];
    $num = $_GET['number'];
    $_SESSION['cart'][$id] = $num;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
elseif (isset($_GET['cart_remove'])) :
    $id = $_GET['cart_remove'];
    unset($_SESSION['cart'][$id]);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
endif;