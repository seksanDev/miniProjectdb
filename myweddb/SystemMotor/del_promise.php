<?php
include 'connectdb.php'; 

session_start();
if (!isset($_SESSION['email'])){
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location:login.php');
}

$promise_id = $_GET['id'];
$sql = "DELETE FROM promise WHERE promise_id='$promise_id' ";

if(mysqli_query($conn,$sql)){
    echo "<script> alert('คืนรถจักยานยนตร์เรียบร้อย'); </script>";
    echo "<script> window.location='manage_rental.php'; </script>";
}else{
    echo "Error : ". $sql . mysqli_error($conn);
    echo "<script> alert('ไม่สามารถลบข้อมูลเรียบร้อย'); </script>";
}

mysqli_close($conn);

?>