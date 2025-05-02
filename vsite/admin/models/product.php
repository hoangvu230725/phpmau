<?php
class Product extends Db
{
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT `products`.*,`categories`.`name` AS catename 
        FROM `products`,`categories`
        WHERE `products`.`category` = `categories`.`id`
        ORDER BY `created_at` DESC; ");
        $sql->execute();
        $products = array();
        $products = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $products;
    }
    public function getProduct($product_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `id` = ?");
        $sql->bind_param("i", $product_id);
        $sql->execute();
        $product = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $product;
    }
    public function getAllProducts2($page, $count)
    {
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare("SELECT `products`.*,`categories`.`name` AS catename 
        FROM `products`,`categories`
        WHERE `products`.`category` = `categories`.`id`
        ORDER BY `created_at` DESC 
        LIMIT ?,?");
        $sql->bind_param("ii", $start, $count);
        $sql->execute();
        $products = array();
        $products = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $products;
    }
    public function getProductByCate($cate_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` 
        WHERE `category` = ? LIMIT 0,1");
        $sql->bind_param("i", $cate_id);
        $sql->execute();
        $products = $sql->get_result()->fetch_assoc();
        return $products;
    }
    public function search($keyword, $page, $count)
    {
        // Tính số thứ tự trang bắt đầu
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare("SELECT `products`.*,`categories`.`name` AS catename 
        FROM `products`,`categories`
        WHERE  `products`.`name` LIKE ? and `products`.`category` = `categories`.`id`
        LIMIT ?,?");
        $keyword = "%$keyword%";
        $sql->bind_param("sii", $keyword, $start, $count);
        $sql->execute();
        $products = array();
        $products = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $products;
    }
    public function searchCount($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` 
        WHERE `name` LIKE ?");
        $keyword = "%$keyword%";
        $sql->bind_param("s", $keyword);
        $sql->execute();
        $products = array();
        $products = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $products;
    }
    function paginate($url, $total, $page, $count, $offset)
    {
        if ($total <= 0) {
            return "";
        }
        $totalLinks = ceil($total / $count);
        if ($totalLinks <= 1) {
            return "";
        }
        $from = $page - $offset;
        $to = $page + $offset;
        //$offset quy định số lượng link hiển thị ở 2 bên trang hiện hành
        //$offset = 2 và $page = 5,lúc này thanh phân trang sẽ hiển thị: 3 4 5 6 7
        if ($from <= 0) {
            $from = 1;
            $to = $offset * 2;
        }
        if ($to > $totalLinks) {
            $to = $totalLinks;
        }
        $link = "";
        $prev = "";
        $next = "";
        for ($j = $from; $j <= $to; $j++) {
            if ($page == $j) {
                $link = $link . "<a class = " . "current_page" . "  href = '$url&page=$j'> $j </a>";
            } else  $link = $link . "<a  href = '$url&page=$j'> $j </a>";
        }
        if ($page > 1) {
            $prevPage = $page - 1;
            $prev = "<a href='$url&page=$prevPage'> Prev Link </a>";
        }
        if ($page < $totalLinks) {
            $nextPage = $page + 1;
            $next = "<a  href ='$url&page=$nextPage'>
            Next Link </a>";
        }
        return $prev . $link . $next;
    }

    function delete($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `products` WHERE `id`=?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }
    function addItem($name, $price, $content, $image, $category, $featured)
    {
        $sql = self::$connection->prepare("INSERT INTO `products`(`name`, `image`, `category`, `price`, `content`, `feature`) 
        VALUES(?,?,?,?,?,?)");
        $sql->bind_param("ssiisi", $name, $image, $category, $price, $content, $featured);
        return $sql->execute();
    }
    function update($id, $name, $price, $content, $image, $category, $featured)
    {
        if ($image != "") {
            $sql = self::$connection->prepare("UPDATE `products` 
        SET `name`=? ,`image`=?,`category`=?,`price`=?,`content`=?,`feature`=? 
        WHERE `id`=?");
            $sql->bind_param("ssiisii", $name, $image, $category, $price, $content, $featured, $id);
        } else {
            $sql = self::$connection->prepare("UPDATE `products` 
        SET `name`=? ,`category`=?,`price`=?,`content`=?,`feature`=? 
        WHERE `id`=?");
            $sql->bind_param("siisii", $name, $category, $price, $content, $featured, $id);
        }

        return $sql->execute();
    }
}
