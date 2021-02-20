<?php 
    session_start();
    include('server.php');
    $errors = array();

    if(isset($_POST['login_employee'])){ //เช็คเมื่อมีการกดปุ่ม login เข้ามา
       //สร้างตัวแปรรับค่า
       $username = mysqli_real_escape_string($conn, $_POST['username']);
       $password = mysqli_real_escape_string($conn, $_POST['password']);

        //  เช็คว่ามี username password login เข้ามาหรือยัง ถ้าไม่มีให้แสดงข้อความ errors
        if(empty($username)){
            array_push($errors, "Username is required");
        }
        if(empty($password)){
            array_push($errors, "Password is required");
        }

    //ถ้าหากไม่มี errors
    if(count($errors) == 0){
        //เช็ครหัสว่าตรงกันหรือไม่
        $password = md5($password);
        $query = "SELECT * FROM employee WHERE username = '$username' AND password = '$password' ";
        $result = mysqli_query($conn, $query);

            //เช็คว่ามี result อยู่จริงหรือไม่
            if(mysqli_num_rows($result) == 1){
                //ถ้ามีอยู่จริง เก็บ session
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                header("location: index.php");
            } else {
                array_push($errors, "Wrong username or password");
                $_SESSION['error'] = "Wrong username or password try again!";
                header("location: login.php");
            }
        }else {
            array_push($errors, "Username & Password is required");
            $_SESSION['error'] = "Username & Password is required";
            header("location: login.php");
        }
    }
?>