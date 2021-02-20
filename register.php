<?php 
    session_start();
    include('server.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="mill">
        <img src="Mill-Logo-01.png" alt="" width="150" height="150">
    </div>

    <div class="header">
        <h2>Register</h2>
    </div>

<!--     เวลาที่มีการ click submit form ไฟล์นี้จะเป็นไฟล์ที่ทำเกี่ยวกับเรื่องของการทำระบบเบื้องหลัง
    เช่น เช็คว่ามีการรับ input แจ้ง error มีการเก็บข้อมูลลงใน database -->
    <form action="register_db.php" method="post">
    <?php include('errors.php'); ?>
    <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <div class="input-group">
            <!-- <label for="username">Username</label> -->
            <i class="fa fa-user icon"></i>
            <input type="text" name="username" class="input-field" placeholder="Username" >
        </div>
        <div class="input-group">
            <!-- <label for="email">Email</label> -->
            <i class="fa fa-envelope icon"></i>
            <input type="email" name="email" class="input-field" placeholder="Email" >
        </div>
        <div class="input-group">
            <!-- <label for="password_1">Password</label> -->
            <i class="fa fa-key icon"></i>
            <input type="password" name="password_1" class="input-field" placeholder="Password" >
        </div>
        <div class="input-group">
            <!-- <label for="password_2">Confirm Password</label> -->
            <i class="fa fa-key icon"></i>
            <input type="password" name="password_2" class="input-field" placeholder="Confirm-Password" >
        </div>
        <div class="input-group">
            <button type="submit" name="register_employee" class="btn"><h3>Register</h3></button>
        </div>

        <div class="login">
            <p>Already have an account? <strong><a href="login.php">Sign In</a></strong></p>
        </div>
        
    </form>
</body>
</html>