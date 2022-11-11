<?php
class product extends Db
{
    public function getAllProduct()
    {
        $sql = self::$connection->prepare("SELECT * FROM products 
        ORDER BY `id` DESC");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function getProductByID($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products 
        where `id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function getNewProduct()
    {
        $sql = self::$connection->prepare("SELECT * FROM products 
        ORDER BY  `id` DESC LIMIT 0,10");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function search($keywork)
    {
        $sql = self::$connection->prepare("SELECT * FROM products 
        where `description` LIKE ?");
        $keywork = "%$keywork%";
        $sql->bind_param("s", $keywork);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
}