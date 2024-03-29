<?php
class Product extends Db
{
    // get all product
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    //get product by id
    public function getProductById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object 

        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }


    //get product by type
    public function getProductByType($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `type_id` = ?");
        $sql->bind_param("i", $type_id);
        $sql->execute(); //return an object

        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }


    //search
    public function search($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `name` LIKE ?");
        $keyword = "%$keyword%";
        $sql->bind_param("s", $keyword);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    //get laptop    
    public function getLapTops()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`,`protypes` WHERE `products`.`type_id` = `protypes`.`type_id`AND `protypes`.`type_id` = 2");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    //get smartphone   
    public function getSmartPhone()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`,`protypes` WHERE `products`.`type_id` = `protypes`.`type_id`AND `protypes`.`type_id` = 1");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    //get pc    
    public function getPC()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`,`protypes` WHERE `products`.`type_id` = `protypes`.`type_id`AND `protypes`.`type_id` = 4");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    //get Accessories    
    public function getAccessories()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`,`protypes` WHERE `products`.`type_id` = `protypes`.`type_id`AND `protypes`.`type_id` = 3");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    //get Tablet    
    public function getTablet()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`,`protypes` WHERE `products`.`type_id` = `protypes`.`type_id`AND `protypes`.`type_id` = 5");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }


    //get related products by type_id
    public function getRelatedProducts($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, `protypes` WHERE `products`.`type_id` = `protypes`.`type_id` and `protypes`.`type_id` = ?");
        $sql->bind_param("i", $type_id);
        $sql->execute(); //return an object

        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    //get 3 product by type
    public function get3ProductByType($type_id, $page, $perPage)
    {
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ? LIMIT ?,?");
        $sql->bind_param("iii", $type_id, $firstLink, $perPage);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllLiMitProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `feature`= 1");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    //Topselling Smartphone
    public function gettopsellingSmartphone()
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `type_id` = 1 AND `feature` = 1");
        $sql->execute(); //return an object

        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Topselling Laptops
    public function gettopsellingLaptops()
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `type_id` = 2 AND `feature` = 1");
        $sql->execute(); //return an object

        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Topselling Accessories
    public function gettopsellingAccessoriess()
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `type_id` = 3 AND `feature` = 1");
        $sql->execute(); //return an object

        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Topselling PC
    public function gettopsellingPC()
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `type_id` = 4 AND `feature` = 1");
        $sql->execute(); //return an object

        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Topselling Table
    public function gettopsellingTablets()
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `type_id` = 5 AND `feature` = 1");
        $sql->execute(); //return an object

        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    // get all product
    public function getAlltype()
    {
        $sql = self::$connection->prepare("SELECT * FROM protypes");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getTypeName($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM protypes where `type_id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    //get smartphone   
    public function chance()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`,`protypes` WHERE `products`.`type_id` = `protypes`.`type_id`AND `protypes`.`type_id` = 1");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    function getPage($page, $perPage)
    {
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM `products` LIMIT $firstLink, $perPage");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getImageById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM uploadimages where `id_product` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}