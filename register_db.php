<?php 
    session_start();//ประกาศ session ทุกครั้ง เมื่อมีการเก็บ session
    include('server.php');
    $errors = array(); //เก็บ errors เป็น array

    if(isset($_POST['register_users'])){ //เช็คว่ามีการกด submit จากปุ่ม register หรือเปล่า
        //สร้างตัวแปรเก็บข้อมูลจาก input
        $username = mysqli_real_escape_string($conn, $_POST['username']);  //mysqli_real_escape_string ป้องการพวกอักขระพิเศษ
        $email = mysqli_real_escape_string($conn, $_POST['email']); 
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']); 
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']); 

        if(empty($username)){
            array_push($errors, "Username is required!");
        }
        if(empty($email)){
            array_push($errors, "Email is required!");
        }
        if(empty($password_1)){
            array_push($errors, "Password is required!");
        }
        if($password_1 != $password_2){
            array_push($errors, "The password not match!");
            $_SESSION['error'] = "The password not match!";
        }

        /* เช็คว่ามี username & email ในระบบหรือยัง */
        $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' ";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query); //ข้อมูลที่ทำการ query เก็บไว้ในตัวแปร result

        if($result){ //ถ้ามี user อยู่ในระบบ
            if($result['username'] === $username){
                array_push($errors, "Username already exists!");
            }
            if($result['email'] === $email){
                array_push($errors, "Email already exists!");
            }
        }
        //เช็ค count error ว่ามี error อะไรอีกหรือเปล่า
        if(count($errors) == 0){ //ถ้าไม่มีก็ insert ข้อมูลลง database

            $password = md5($password_1);
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        }else {
            array_push($errors, "Username or Password already exists!");
            $_SESSION['error'] = "Username or Password already exists!";
            header("location: register.php");
        }
    }

?>