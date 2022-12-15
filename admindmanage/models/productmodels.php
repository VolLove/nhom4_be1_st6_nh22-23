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

    //get product by manufacturer
    public function getProductByManu($manu_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `manu_id` = ?");
        $sql->bind_param("i", $manu_id);
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
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `type_id` = 4 AND `feature` = 1");
        $sql->execute(); //return an object

        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Topselling Table
    public function gettopsellingTablets()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `type_id` = 5 AND `feature` = 1");
        $sql->execute(); //return an object

        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    // get all product
    public function getAlltype()
    {
        $sql = self::$connection->prepare("SELECT * FROM `protypes`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getTypeName($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `protypes` where `type_id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
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
        $sql = self::$connection->prepare("SELECT * FROM `uploadimages` where `id_product` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    // get all Manufacturer
    public function getAllManufacturer()
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    //add new product
    public function addProduct($name, $manu_id, $type_id, $price, $image, $description, $created_at, $details)
    {

        $sql = self::$connection->prepare('INSERT INTO products( `name`, `manu_id`, `type_id`, `price`, `image`, `description`, `created_at`, `details`) VALUES (?,?,?,?,?,?,?,?)');
        $sql->bind_param('siiissss', $name, $manu_id, $type_id, $price, $image, $description, $created_at, $details);
        return $sql->execute();
    }

    //add new type
    public function addType($type_name, $image)
    {

        $sql = self::$connection->prepare('INSERT INTO protypes(`type_name`, `image`) VALUES (?,?)');
        $sql->bind_param('ss', $type_name, $image);
        return $sql->execute();
    }
    //add new manu
    public function addManufactures($manu_name, $logo)
    {

        $sql = self::$connection->prepare('INSERT INTO manufactures(`manu_name`, `logo`) VALUES (?,?)');
        $sql->bind_param('ss', $manu_name, $logo);
        return $sql->execute();
    }

    //remove product
    public function removeProduct($id)
    {

        $sql = self::$connection->prepare('DELETE FROM `products` WHERE id=?');
        $sql->bind_param('i', $id);
        return $sql->execute();
    }

    //remove type
    public function removeType($id)
    {
        $sql = self::$connection->prepare('DELETE FROM `protypes` WHERE type_id=?');
        $sql->bind_param('i', $id);
        return $sql->execute();
    }

    //remove manu
    public function removeManufactures($id)
    {
        $sql = self::$connection->prepare('DELETE FROM `manufactures` WHERE manu_id=?');
        $sql->bind_param('i', $id);
        return $sql->execute();
    }

    //update product
    public function updateProduct($id, $name, $manu_id, $type_id, $price, $image, $description, $details)
    {

        if ($image != "") {
            $sql = self::$connection->prepare('UPDATE `products` SET `name`=?,`manu_id`=?,`type_id`=?,`price`=?,`image`=?,`description`=?,`details`=? WHERE `id`=?');
            $sql->bind_param('siiisssi', $name, $manu_id, $type_id, $price, $image, $description, $details, $id);
            return $sql->execute();
        } else {
            $sql = self::$connection->prepare('UPDATE `products` SET `name`=?,`manu_id`=?,`type_id`=?,`price`=?,`description`=?,`details`=? WHERE `id`=?');
            $sql->bind_param('siiissi', $name, $manu_id, $type_id, $price, $description, $details, $id);
            return $sql->execute();
        }
    }
    //update manu
    public function updateManufactures($manu_id, $manu_name, $logo)
    {
        if ($logo != "") {
            $sql = self::$connection->prepare('UPDATE `manufactures` SET `manu_name`=?,`logo`= ? WHERE `manu_id`= ?');
            $sql->bind_param('ssi', $manu_name, $logo, $manu_id);
            return $sql->execute();
        } else {
            $sql = self::$connection->prepare('UPDATE `manufactures` SET `manu_name`=? WHERE `manu_id`= ?');
            $sql->bind_param('si', $manu_name, $manu_id);
            return $sql->execute();
        }
    }

    //update type
    public function updateType($type_id, $type_name, $image)
    {
        if ($image != "") {
            $sql = self::$connection->prepare('UPDATE `protypes` SET `type_name`=?,`image`=? WHERE `type_id`= ?');
            $sql->bind_param('ssi', $type_name, $image, $type_id);
            return $sql->execute();
        } else {
            $sql = self::$connection->prepare('UPDATE `protypes` SET `type_name`=? WHERE `type_id`= ?');
            $sql->bind_param('si', $type_name, $type_id);
            return $sql->execute();
        }
    }
    public function getManuByID($manu_id)
    {
        $sql = self::$connection->prepare('SELECT * FROM `manufactures` WHERE `manu_id`= ?');
        $sql->bind_param('i', $manu_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getTypeByID($type_id)
    {
        $sql = self::$connection->prepare('SELECT * FROM `protypes` WHERE `type_id`= ?');
        $sql->bind_param('i', $type_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}