<?php 
session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าระบบ</title>
    <link rel="icon" type="image/png" sizes="16x16" href="image/scooter.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="myself.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <br><br><br><br>
    <div class="container">
        <div class="alert color-myself h4 text-center mt-4 " role="alert">
            เข้าสู่ระบบ
        </div>
        <form method="post" action="signin_db.php" >
            <?php if(isset($_SESSION['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php 
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        ?>
                    </div>
                <?php } ?>
                <?php if(isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php 
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        ?>
                    </div>
                <?php } ?>
                
            <label for="email">อีเมล:</label>
                <input type="email" name="email" class="form-control" required="" placeholder="ชื่อบัญชี..."><br>
            
            <label for="password">รหัสผ่าน:</label>
                <input type="password" name="password" class="form-control" required="" placeholder="รหัสผ่าน..."><br>
            
            <div class="text-center btb">
                <input class="btn btn-light" type="submit" name="loginsubmit" value="เข้าสู่ระบบ">
            </div>
        </form>
        <br><br><br>
        <div class="text-center">
            ถ้าคุณต้องการเป็นสมาชิก <a href="register.php">สมัครสมาชิก</a>?
        </div>
    </div>


</body>

</html>