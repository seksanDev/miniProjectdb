<?php
    session_start();
    require_once 'config/db.php';

?>
<script type='text/javascript'> //คำสั่งห้ามป้อนอักษรพิเศษ
        function check_char(elm) {
            if (!elm.value.match(/^[ก-ฮa-z0-9]+$/i) && elm.value.length > 0) {
                alert('ไม่สามารถใช้ตัวอักษรพิเศษได้');
                elm.value = '';
            }
        }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="icon" type="image/png" href="image/scooter.png"/>
    <!--link_bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--connect css-->
    <link rel="stylesheet" href="myself.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
    <div class="alert color-myself h4 text-center mt-3 mb-3" role="alert">สมัครสมาชิก</div>
        <form action="signup_db.php" method="post" > 
            <!-----------------Caack error and Success----------------------->
            <?php if(isset($_SESSION['error'])){  ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                       echo $_SESSION['error'];
                       unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])){  ?>
                <div class="alert alert-success" role="alert">
                    <?php
                       echo $_SESSION['success'];
                       unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['warning'])){  ?>
                <div class="alert alert-warning" role="alert">
                    <?php
                       echo $_SESSION['warning'];
                       unset($_SESSION['warning']);
                    ?>
                </div>
            <?php } ?>
            <!-------------------------------------------------------------->
             <div class="mb-3">
                    <input type="radio" name="name_titles"  value="นาย" required=""> นาย  &nbsp;
                    <input type="radio" name="name_titles"  value="นาง" required=""> นาง &nbsp;
                    <input type="radio" name="name_titles"  value="นางสาว" required=""> นางสาว &nbsp;
                </div>
            <div class="mb-3">
                    <label for="firstname" class="form-label">ชื่อ</label>
                    <input type="txt" class="form-control" name="firstname" aria-describedby="firstname" required="" autocomplete="on">
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">นามสกุล</label>
                    <input type="txt" class="form-control" name="lastname" aria-describedby="lastname" required="" autocomplete="on">
                </div>
            <div class="mb-3">
                    <label for="email" class="form-label">อีเมล์</label>
                    <input type="email" class="form-control" name="email" aria-describedby="email" required="" autocomplete="on">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">รหัสผ่าน</label>
                    <input type="text" onkeyup='check_char(this)' class="form-control" name="password" required="" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="confirm password" class="form-label">ยืนยันรหัสผ่าน</label>
                    <input type="password" onkeyup='check_char(this)' class="form-control" name="c_password" required="" autocomplete="off"> 
                </div>
               
                <div class="mb-3">
                    <label for="tel" class="form-label">เบอร์โทรศัพท์</label>
                    <input type="txt" onkeyup='check_char(this)' class="form-control" name="tel" aria-describedby="tel" required="" autocomplete="on">
                </div>

                <button type="submit" name="signup" class="btn btn-primary mb-1"><label title="สมัครสมาชิก"> สมัครสมาชิก</label></button>
                <a href="register.php" type="cancel" name="cancel" class="btn btn-secondary mb-1"><label title="ยกเลิก"> ยกเลิก</label></a>
                <a href="login.php" type="login" name="login" class="btn btn-danger"><label title = "กลับไปหน้าเข้าสู่ระบบ"> กลับไปหน้าเข้าสู่ระบบ</label></a>
        </form>
    </div>
</body>
</html>