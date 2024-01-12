<?php 

    session_start();
    include 'connectdb.php'; 
    require_once 'config/db.php';
    // echo("Connected");

    if (isset($_POST['signup'])) {
        $name_titles = $_POST['name_titles'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $tel = $_POST['tel'];
        //$picture = $_POST['picture'];
        //$urole = 'user';

        if (empty($name_titles)) {
            $_SESSION['error'] = 'กรุณาเลือกคำนำหน้า';
            //header("location: register.php"); 
        } else if (empty($firstname)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อ';
            //("location: register.php");
        } else if (empty($lastname)) {
            $_SESSION['error'] = 'กรุณากรอกนามสกุล';
            //("location: register.php");
        } else if (empty($email)) {
            $_SESSION['error'] = 'กรุณากรอกอีเมล';
            //("location: register.php");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
            //("location: register.php");
        } else if (empty($password)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            //("location: register.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            //("location: register.php");
        } else if (empty($c_password)) {
            $_SESSION['error'] = 'กรุณายืนยันรหัสผ่าน';
            //("location: register.php");
        } else if ($password != $c_password) {
            $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
            //("location: register.php");
        } else if (empty($tel)){
            $_SESSION['error'] = 'กรุณากรอกเบอร์โทรศัพท์';
            //("location: register.php");
        } else {
            try {
                $check_email = $conn->prepare("SELECT email FROM admin WHERE email = :email");
                $check_email->bindParam(":email", $email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if ($row['email'] == $email) {
                    $_SESSION['warning'] = "มีอีเมลนี้อยู่ในระบบแล้ว <a href='login.php'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location:register.php");
                } else if (!isset($_SESSION['error'])) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO admin(name_titles,firstname, lastname, email, password, tel) 
                                            VALUES(:name_titles, :firstname, :lastname, :email, :password, :tel)");
                    $stmt->bindParam(":name_titles", $name_titles);
                    $stmt->bindParam(":firstname", $firstname);
                    $stmt->bindParam(":lastname", $lastname);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->bindParam(":tel", $tel);
                    //$stmt->bindParam(":picture", $picture);
                    //$stmt->bindParam(":urole", $urole);
                    $stmt->execute();
                    
                    $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว! <a href='login.php' class='alert-link'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location:register.php");
                } else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                    header("location:register.php");
                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>