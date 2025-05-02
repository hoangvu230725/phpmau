<?php
include "header.php";
include "sidebar.php";
?>
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
        <h1>Manage User</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <h5>Users</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered
                                    table-striped">
                            <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $count = 10;
                                // Lấy số trang trên thanh địa chỉ
                                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                // Tính tổng số dòng, ví dụ kết quả là 18
                                $total = count($getUser);
                                // lấy đường dẫn đến file hiện hành
                                $url = $_SERVER['PHP_SELF'] . "?all";
                                $getUser2 = $thanhvien->getUser2($page, $count);
                                foreach ($getUser2 as $value): ?>
                                    <tr class="">
                                        <td><?php echo $value['id'] ?></td>
                                        <td><?php echo $value['username'] ?></td>
                                        <td><?php echo $pass = password_hash($value['password'],PASSWORD_DEFAULT) ?></td>
                                        <td><?php echo $value['level'] ?></td>
                                        <td>
                                            <a href="form_edit_user.php?id=<?php echo $value['id']?>" class="btn
                                                    btn-success btn-mini">Edit</a>
                                            <form action="delete.php" method="post">
                                                <input type="hidden" name="user-id" value="<?php echo $value['id'] ?>">
                                                <input type="hidden" name="level" value="<?php echo $value['level'] ?>">
                                                <input type="submit" class="btn btn-danger
                                                        btn-mini" value="Delete">
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
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
</div>
<!-- END CONTENT -->
<?php include "footer.php" ?>