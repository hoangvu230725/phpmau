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
        <h1>DashBoard</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <h5>Order</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered
                                    table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Customer name</th>
                                    <th>Email</th>
                                    <th>Phone at</th>
                                    <th>Address</th>
                                    <th>Note</th>
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
                                $getAll = $order->getAllOrder();
                                foreach ($getAll as $value):
                                ?>
                                    <tr class="">
                                        
                                        <td><?php echo $value['id'] ?></td>
                                        <td><?php echo $value['product'] ?></td>
                                        <td><?php echo $value['quantity'] ?></td>
                                        <td><?php echo $value['total'] ?></td>
                                        <td><?php echo $value['fullName'] ?></td>
                                        <td><?php echo $value['email'] ?></td>
                                        <td><?php echo $value['phone'] ?></td>
                                        <td><?php echo $value['address'] ?></td>
                                        <td><?php echo $value['note'] ?></td>
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