<?php
    include 'Database.php';

    class crud_database extends Database {

        // Lấy danh sách danh mục
        public function layDSDanhMuc() {
            $sql = self::$connection->prepare("SELECT * FROM danhmuc");
            $sql->execute();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;
        }

        // Lấy thông tin sản phẩm theo IDsss
        public function layDSSanPhamId($id) {
            $sql = self::$connection->prepare("SELECT * FROM sanpham WHERE id = ?");
            $sql->bind_param("i", $id);
            $sql->execute();
            return $sql->get_result()->fetch_assoc();
        }

        // Lấy danh sách sản phẩm với phân trang
        public function layDSSanPham($madanhmuc = null, $limit = 8, $offset = 0) {
            if ($madanhmuc) {
                $sql = self::$connection->prepare("SELECT * FROM sanpham WHERE madanhmuc = ? LIMIT ? OFFSET ?");
                $sql->bind_param("iii", $madanhmuc, $limit, $offset);
            } else {
                $sql = self::$connection->prepare("SELECT * FROM sanpham LIMIT ? OFFSET ?");
                $sql->bind_param("ii", $limit, $offset);
            }
            $sql->execute();
            return $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        // Tính tổng số sản phẩm
        public function getTotalProducts($madanhmuc = null) {
            if ($madanhmuc) {
                $sql = self::$connection->prepare("SELECT COUNT(*) AS total FROM sanpham WHERE madanhmuc = ?");
                $sql->bind_param("i", $madanhmuc);
            } else {
                $sql = self::$connection->prepare("SELECT COUNT(*) AS total FROM sanpham");
            }
            $sql->execute();
            $result = $sql->get_result()->fetch_assoc();
            return $result['total'];
        }
        // Tìm kiếm sản phẩm theo tên
        public function searchProducts($keyword, $madanhmuc = null, $limit = 8, $offset = 0) {
            if ($madanhmuc) {
                $sql = self::$connection->prepare("SELECT * FROM sanpham WHERE name LIKE ? AND madanhmuc = ? LIMIT ? OFFSET ?");
                $searchTerm = '%' . $keyword . '%';
                $sql->bind_param("siii", $searchTerm, $madanhmuc, $limit, $offset);
            } else {
                $sql = self::$connection->prepare("SELECT * FROM sanpham WHERE name LIKE ? LIMIT ? OFFSET ?");
                $searchTerm = '%' . $keyword . '%';
                $sql->bind_param("sii", $searchTerm, $limit, $offset);
            }
            $sql->execute();
            return $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        }
        //Thêm sản phẩm
        public function addProduct($id,$name, $price, $description, $image, $madanhmuc) {
            $sql = self::$connection->prepare("INSERT INTO sanpham (id ,name, price, description, image, madanhmuc) VALUES (?,?, ?, ?, ?, ?)");
            $sql->bind_param("isissi",$id, $name, $price, $description, $image, $madanhmuc);
            $sql->execute();
        }
    
        // Sửa sản phẩm
        public function updateProduct($id, $name, $price, $description, $image, $madanhmuc) {
            $sql = self::$connection->prepare("UPDATE sanpham SET name = ?, price = ?, description = ?, image = ?, madanhmuc = ? WHERE id = ?");
            $sql->bind_param("sdsdii", $name, $price, $description, $image, $madanhmuc, $id);
            $sql->execute();
        }
        
    
        // Xóa sản phẩm
        public function deleteProduct($id) {
            $sql = self::$connection->prepare("DELETE FROM sanpham WHERE id = ?");
            $sql->bind_param("i", $id);
            $sql->execute();
        }
    }
?>
