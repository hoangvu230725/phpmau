<?php
include "header.php";
include "sidebar.php";
?>
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
        <h1>Manage Categories</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><a href="form_add_category.php"> <i class="icon-plus"></i>
                            </a></span>
                        <h5>Categories</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered
                                    table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $count = 6;
                                // Lấy số trang trên thanh địa chỉ
                                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                // Tính tổng số dòng, ví dụ kết quả là 18
                                $total = count($getAllCate);
                                // lấy đường dẫn đến file hiện hành
                                $url = $_SERVER['PHP_SELF'] . "?all";
                                $getAllCates2 = $category->getAllCate($page, $count);
                                foreach ($getAllCates2 as $value):
                                    $getProductByCate = $product->getProductByCate($value['id']);
                                ?>
                                    <tr class="">
                                        <?php if (isset($getProductByCate['image'])) { ?>
                                            <td width="100"><img src="../assets/img/image/<?php echo $getProductByCate['image'] ?>"></td>
                                        <?php } else { ?>
                                            <td>CHƯA CÓ ẢNH MINH HỌA</td>
                                        <?php } ?>
                                        <td><?php echo $value['id'] ?></td>
                                        <td><?php echo $value['name'] ?></td>


                                        <td>
                                            <a href="form_edit_category.php?id=<?php echo $value['id']?>" class="btn
                                                    btn-success btn-mini">Edit</a>
                                            <a href="delete.php?cate-id=<?php echo $value['id'] ?>" class="btn
                                                    btn-danger btn-mini">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="row" style="margin-left: 18px;">
                            <div class="page_list_clearfix  text-center">
                                <?php echo $category->paginate($url, $total, $page, $count, 1) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END CONTENT -->
<?php include "footer.php" ?>