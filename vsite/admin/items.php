<?php
include "header.php";
include "sidebar.php";
?>
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.php" title="Go to Home"
                class="tip-bottom current"><i
                    class="icon-home"></i> Home</a></div>
        <h1>Manage Products</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><a
                                href="form_add_item.php"> <i class="icon-plus"></i>
                            </a></span>
                        <h5>Items</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered
                                    table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Feature</th>
                                    <th>Price</th>
                                    <th>Created at</th>
                                    <th>Content</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 6;
                                // Lấy số trang trên thanh địa chỉ
                                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                // Tính tổng số dòng, ví dụ kết quả là 18
                                $total = count($getAllProducts);
                                // lấy đường dẫn đến file hiện hành
                                $url = $_SERVER['PHP_SELF'] . "?all";
                                $getAllProducts2 = $product->getAllProducts2($page, $count);
                                foreach ($getAllProducts2 as $value):
                                ?>
                                    <tr class="">
                                        <td width="250">
                                            <img
                                                src="../assets/img/image/<?php echo $value['image']?>" />
                                        </td>
                                        <td><?php echo $value['id'] ?></td>
                                        <td><?php echo $value['name'] ?></td>
                                        <td><?php echo $value['catename'] ?></td>
                                        <td><?php echo $value['feature'] ?></td>
                                        <td><?php echo $value['price'] ?></td>
                                        <td><?php echo $value['created_at'] ?></td>
                                        <td><?php echo $value['content'] ?></td>
                                        <td>
                                            <a href="form-edit-item.php?id=<?php echo $value['id']?>" class="btn
                                                    btn-success btn-mini">Edit</a>
                                            <a href="delete.php?id=<?php echo $value['id'] ?>" class="btn
                                                    btn-danger btn-mini">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row" style="margin-left: 18px;">
                            <div class="page_list_clearfix  text-center">
                                <?php echo $product->paginate($url, $total, $page, $count, 1) ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->
<?php include "footer.php" ?>