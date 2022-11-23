<?php
class Products extends Db
{
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY `id` DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getNewProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` ORDER BY `created_at` DESC LIMIT 0,10");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function get3Products()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` ORDER BY `products`.`id` DESC LIMIT 0,3");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function get4Products()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` ORDER BY `products`.`id` DESC LIMIT 4,4");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getProductByProtype($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ?");
        $sql->bind_param("i", $type_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductByManu($manu)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE manu_id = ?");
        $sql->bind_param("i", $manu);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function search($keyword, $protype)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `name` LIKE? AND `type_id`=?");
        $keyword = "%$keyword%";
        $sql->bind_param("si", $keyword, $protype);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function countByProtype($protype)
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'qty'FROM products WHERE `type_id` =?");
        $sql->bind_param("i", $protype);
        $sql->execute(); //return an object
        $qty = $sql->get_result()->fetch_assoc();
        return $qty['qty']; //return an array
    }

    public function countByManu($manu)
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'qty'FROM products WHERE `manu_id` =?");
        $sql->bind_param("i", $manu);
        $sql->execute(); //return an object
        $qty = $sql->get_result()->fetch_assoc();
        return $qty['qty']; //return an array
    }

    public function getHotDeals()
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE sold>20 ");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    // đếm số lượng sản phẩm hot deal
    public function countHotDeals()
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'qty'FROM products WHERE sold > 20");

        $sql->execute(); //return an object
        $qty = $sql->get_result()->fetch_assoc();
        return $qty['qty']; //return an array
    }

    // đếm số lượng tất cả sản phẩm 
    public function countAllProducts()
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'qty'FROM products");
        $sql->execute(); //return an object
        $qty = $sql->get_result()->fetch_assoc();
        return $qty['qty']; //return an array
    }
    // lấy 3 sản phẩm hotdeal đầu danh sách
    public function getHotDealsByTypeId($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `type_id` = $type_id AND sold>20 LIMIT 0,3");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    // lấy 3 sản phẩm hotdeal tiếp theo
    public function getHotDealsByTypeIdNext($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `type_id` = $type_id AND sold>20 LIMIT 3,3");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Lấy sản phẩm liên quan theo loại
    public function getRelatedProducts($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `type_id` = $type_id  LIMIT 0,4");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getFirst6Products()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` ORDER BY `products`.`id` DESC LIMIT 0,6");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function countSearchProducts($keyword, $protype)
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'qty' FROM products WHERE `name` LIKE? AND `type_id`=?");
        $keyword = "%$keyword%";
        $sql->bind_param("si", $keyword, $protype);
        $sql->execute(); //return an object
        $qty = $sql->get_result()->fetch_assoc();
        return $qty['qty']; //return an array
    }
    public function searchAll($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `name` LIKE?");
        $keyword = "%$keyword%";
        $sql->bind_param("s", $keyword);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    // hàm lấy tất cả sản phẩm phân trang 
    function getProductsPage($page, $perPage)
    {
        // Tính số thứ tự trang bắt đầu
        $firstLink = ($page - 1) * $perPage;
        //Dùng LIMIT để giới hạn số lượng hiển thị 1 trang
        $sql = self::$connection->prepare("SELECT * FROM products LIMIT $firstLink, $perPage");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    // hàm lấy sản phẩm hot deal phân trang 
    function getProductsPageHotDeal($page, $perPage)
    {
        // Tính số thứ tự trang bắt đầu
        $firstLink = ($page - 1) * $perPage;
        //Dùng LIMIT để giới hạn số lượng hiển thị 1 trang
        $sql = self::$connection->prepare("SELECT * FROM products WHERE sold > 20 LIMIT $firstLink, $perPage");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    // hàm lấy sản phẩm theo protype phân trang 
    function getProductsPageProtype($page, $perPage, $type_id)
    {
        // Tính số thứ tự trang bắt đầu
        $firstLink = ($page - 1) * $perPage;
        //Dùng LIMIT để giới hạn số lượng hiển thị 1 trang
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ? LIMIT $firstLink, $perPage");
        $sql->bind_param("i", $type_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    // hàm phân trang
    function paginate($url, $total, $page, $perPage, $offset, $type_id)
    {
        if ($total <= 0) {
            return "";
        }
        $totalLinks = ceil($total / $perPage);
        if ($totalLinks <= 1) {
            return "";
        }
        $from = $page - $offset;
        $to = $page + $offset;
        if ($from <= 0) {
            $from = 1;
            $to = $offset * 2;
        }
        if ($to > $totalLinks) {
            $to = $totalLinks;
        }
        $link = "";
        for ($j = $from; $j <= $to; $j++) {
            $link = $link . "<a href = '$url?page=$j&typeid=$type_id'> $j </a>";
        }
        return $link;
    }
}
