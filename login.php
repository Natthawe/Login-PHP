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
    <title>Sign In</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="mill">
        <img src="Mill-Logo-01.png" class="header-logo" alt="" width="150" height="150">
    </div>

    <div class="header">
        <h2>Sign In</h2>
    </div>

    <form action="login_db.php" method="post">
    <?php include('errors.php'); ?>
        <!-- เพิ่ม notification message -->
        
        <?php if(isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']); // ไม่ต้องให้ข้อความอยู่ตลอด เมื่อกด refresh แล้วจะหาย
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <div class="input-group">
            <!-- <label for="username">Username</label> -->
            <i class="fa fa-user icon"></i>
            <input type="text" name="username" class="input-field" placeholder="Username">
        </div>
        <div class="input-group">
            <!-- <label for="password">Password</label> -->
            <i class="fa fa-key icon"></i>
            <input type="password" name="password" class="input-field" placeholder="Password">
        </div>
        <div class="input-group">
            <button type="submit" name="login_employee" class="btn"><h3>Sign In</h3></button>
        </div>
        <div class="signup">
            <p>Don't have an account? <strong><a href="register.php">REGISTER NOW</a></strong></p>
        </div>
        
    </form>
</body>
</html>