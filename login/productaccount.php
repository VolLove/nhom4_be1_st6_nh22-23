<?php
class Productacc extends Db
{
    public function login($username, $password)
    {
        $sql = self::$connection->prepare("SELECT * FROM login where `username` = '$username' and `password` = '$password'");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getuser($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM login where `id` = $id");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function userex($username)
    {
        $sql = self::$connection->prepare("SELECT `username` FROM login where username = '$username'");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function register($username, $password, $fullname)
    {
        $sql = self::$connection->prepare("INSERT INTO login( `username`, `password`, `fullname`) VALUES (?,?,?)");
        $sql->bind_param("sis", $username, $password, $fullname);
        $sql->execute();
    }
    public function chancepassword($username, $password)
    {
        $sql = self::$connection->prepare("UPDATE `login` SET `password`= ? WHERE `username` = '$username'");
        $sql->bind_param("s", $password);
        $sql->execute();
    }
}