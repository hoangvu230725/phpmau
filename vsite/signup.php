<?php include "header.php";

if (isset($_POST['signup'])) {
    $username = $_POST['Username'];
    $password = $_POST['password'];
    $fullName = $_POST['Name'];
    $company = $_POST['Company'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $address = $_POST['Address'];
    $confirmPassword = $_POST['Confirm'];
    if (empty($username) || empty($password) || empty($confirmPassword)|| empty($address) || empty($email)|| empty($fullName)|| empty($phone)) {
        echo "Vui lòng điền đầy đủ thông tin.";
    } else {

        // Kiểm tra mật khẩu
        if ($password !== $confirmPassword) {
            echo "Mật khẩu không khớp!";
        } else {
            // Mã hóa mật khẩu
            $hashed_password = password_hash($password,PASSWORD_DEFAULT);
            // Gọi phương thức đăng ký
            $result = $thanhvien->getCheck($username);
            if ($result==null) {
                $signup = $thanhvien->getSignUp($username,$password,$fullName,$company,$email,$phone,$address);
                echo "Đăng ký thành công!";
                header("location:login.php");
            } else {
                echo "Đăng ký thất bại!";
            }
        }
    }
}
?>

<!--breadcrumb area start-->
<!--login section start-->

<div class="page_login_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="register_page_form">
                    <form action="signup.php" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="input_text">
                                    <label for="Username">Username <span>*</span></label>
                                    <input name="Username" type="text" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="input_text">
                                    <label for="Name">Full Name <span>*</span></label>
                                    <input name="Name" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="input_text">
                                    <label for="Company">Company Name</label>
                                    <input name="Company" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="input_text">
                                    <label for="Email">Email Address <span>*</span></label>
                                    <input name="Email" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="input_text">
                                    <label for="Phone">Phone<span>*</span></label>
                                    <input name="Phone" type="text">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input_text">
                                    <label for="Address">Address<span>*</span></label>
                                    <input name="Address" placeholder="Street address" type="text">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input_text">
                                    <label for="password">Account password<span>*</span></label>
                                    <input name="password" type="password" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input_text">
                                    <label for="Confirm">Confirm password<span>*</span></label>
                                    <input name="Confirm" type="password" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input_text">
                                    <input id="rememberme" type="checkbox">
                                    <label for="rememberme">I agree Terms & Condition</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="login_submit">
                                    <input class="inline" value="Sign Up" name="signup" type="submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumb area end-->



<!--login section start-->
<div class="page_login_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1">
                <div class="login_page_form">
                    <form action="signup.php" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="input_text">
                                    <label for="name">Username or email <span>*</span></label>
                                    <input id="name" name="username" type="text">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input_text">
                                    <label for="password">Passwords <span>*</span></label>
                                    <input id="password" name="password" type="password">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input_text">
                                    <label for="confirmPassword">Please re-enter your password to confirm <span>*</span></label>
                                    <input type="password" id="confirmPassword" name="confirmPassword" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="login_submit">
                                    <input class="inline" value="Sign Up" name="signup" type="submit">

                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>