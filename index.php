<?php 
    session_start();

    if(!isset($_SESSION['username'])){
        $_SESSION['msg'] = "You must login first";
        header('location: login.php');
    }

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="mill">
        <img src="Mill-Logo-01.png" class="header-logo" alt="" width="150" height="150">
    </div>

    <div class="header">
        <h2><p class="welcome">Welcome <strong class="name"><?php echo $_SESSION['username']; ?></strong></p></h2>
    </div>

    <div class="content">
        <!-- เพิ่ม notification message -->
        <?php if(isset($_SESSION['success'])) : ?>
            <div class="success">
                <h3>
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']) // ไม่ต้องให้ข้อความอยู่ตลอด
                    ?>
                </h3>
            </div>
        <?php endif ?>

    <!-- เช็ค session ว่ามี session username หรือ มีการ login เข้ามาหรือเปล่า ถ้ามีก็จะให้แสดงข้อมูลของ username ออกมา -->
    <?php if(isset($_SESSION['username'])) : ?> <!-- isset แปลว่า มี  -->
        <!-- <div class="input-group">
            <p class="welcome">Welcome <strong class="name"><?php echo $_SESSION['username']; ?></strong></p>
        </div> -->

        <div class="input-group example" >
            <input type="text" placeholder="Search from PO .." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </div>

        <div class="input-group">
            <!-- <button type="submit" ><a href="index.php?logout='1'">Logout</a></button> -->
            <button onclick="location.href='logout.php'" class="btn"><h3>Sign out</h3></button>
        </div>
    <?php endif ?>
    </div>
</body>
</html>