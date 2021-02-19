<?php
    //สร้างตัวแปรไว้เก็บกข้อมูลการเชื่อมต่อกับฐานข้อมูล
    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "millcon";

    //สร้างการเชื่อมต่อ
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //ตรวจสอบการเชื่อมต่อ
    if(!$conn){//ถ้าไม่มีการเชื่อมต่อ
        die("Connection faild: " .mysqli_connect_error());
    }/* else{
        echo "Connected Successfully";
    } */

?>