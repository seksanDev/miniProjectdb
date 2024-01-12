<?php
include 'connectdb.php'; 
session_start();
if (!isset($_SESSION['email'])){
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location:login.php');
}

$pro_id = $_GET['id'];
$sql = "DELETE FROM product WHERE pro_id='$pro_id' ";

if(mysqli_query($conn,$sql)){
    echo "<script> alert('ลบข้อมูลเรียบร้อย'); </script>";
    echo "<script> window.location='show_product.php'; </script>";
}else{
    echo "Error : ". $sql . mysqli_error($conn);
    echo "<script> alert('ไม่สามารถลบข้อมูลเรียบร้อย'); </script>";
}

mysqli_close($conn);









?>