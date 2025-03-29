<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    if($email == 'admin@gmail.com' && $pass == '12345'){
        header('Location: crud.php');
    }
    else{
        echo "Khong dung, Nhap lai!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="#">
        <label>Email:</label>
        <input type="email" name="email" required placeholder="admin@gmail.com">
        <br><br>
        <label>Password:</label>
        <input type="password" name="password" required placeholder="12345">
        <br><br>
        <button type="submit">Login</button>
        <br> <br>
        <a href="index.php">Quay trở lại <<</a>
    </form>
</body>
</html>
