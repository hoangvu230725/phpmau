<?php include "header.php";
if (isset($_POST['save'])) {
    $id = $_SESSION['user']['id'];
    $fullName = $_POST['name'];
    $company = $_POST['company'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $getUpdate = $thanhvien->getUpdate($id,$fullName,$company,$email,$phone,$address);
}
?>

<!--breadcrumb area start-->
<div class="breadcrumb_container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a> ></li>
                        <li>My account</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--breadcrumb area end-->

<!-- Start Maincontent  -->
<section class="main-content-area my-account ptb-100">
    <div class="container">
        <div class="account-dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <ul role="tablist" class="nav flex-column dashboard-list">
                        <li><a href="#account-details" data-toggle="tab" class="nav-link active">Account details</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard-content">
                        <div class="tab-pane fade active" id="account-details">
                            <h3>Account details </h3>
                            <div class="login">
                                <div class="login-form-container">
                                    <div class="account-login-form">
                                        <form action="my_account.php " method="post">
                                            <?php 
                                            $getUser = $thanhvien->getUser($_SESSION['user']);
                                            foreach($getUser as $value):
                                             ?>
                                            <label>Full Name</label>
                                            <input type="text" name="name" value="<?php echo $value['fullName']?>">
                                            <label>Email</label>
                                            <input type="text" name="email" value="<?php echo $value['email']?>">
                                            <label>Phone</label>
                                            <input type="text" name="phone" value="<?php echo $value['phone']?>">
                                            <label>Address</label>
                                            <input type="text" name="address" value="<?php echo $value['address']?>">
                                            <label>Company</label>
                                            <input type="text" name="company" value="<?php echo $value['company']?>">

                                            <div class="save-button primary-btn ">
                                                <button type="submit" name="save">Save</button>
                                            </div>
                                            <?php endforeach;?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Maincontent  -->

<?php include "footer.php" ?>