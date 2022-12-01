<?php
session_start();
if (isset($_SESSION['username'])) {
    echo "User name: " . $_SESSION['username'] . "<br>";
}
if (isset($_SESSION['code'])) {
    echo "Code: " . $_SESSION['code'];
}