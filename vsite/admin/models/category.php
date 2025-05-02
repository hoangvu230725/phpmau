<?php
class Category extends Db{
    public function getAllCate(){
        $sql = self::$connection->prepare("SELECT * FROM `categories`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getAllCate2($page, $count){
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare("SELECT * FROM `categories` LIMIT ?,?");
        $sql->bind_param("ii", $start, $count);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getCateById($cate_id){
        $sql = self::$connection->prepare("SELECT * FROM `categories` WHERE `id` = ? ");
        $sql->bind_param("i",$cate_id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    
    function delete($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `categories` WHERE `id`=?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }
    function add($name)
    {
        $sql = self::$connection->prepare("INSERT INTO `categories`(`name`) 
        VALUES(?)");
        $sql->bind_param("s", $name);
        return $sql->execute();
    }
    function update($id,$name)
    {
        $sql = self::$connection->prepare("UPDATE `categories` SET `name`=? WHERE `id`=?");
        $sql->bind_param("si", $name,$id);
        return $sql->execute();
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

}