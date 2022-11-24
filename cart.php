<?php session_start();
if (isset($_GET['add_id'])) :
    $id = $_GET['add_id'];
    if (isset($_SESSION['cart'][$id])) :
        $_SESSION['cart'][$id]++;
    else :
        $_SESSION['cart'][$id] = 1;
    endif;
elseif (isset($_GET['remove_id'])) :
    $id = $_GET['remove_id'];
    unset($_SESSION['cart'][$id]);
endif;
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;