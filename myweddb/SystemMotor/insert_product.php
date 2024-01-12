<?php
include 'connectdb.php'; 
session_start();
if (!isset($_SESSION['email'])){
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location:login.php');
}

$IDname = $_POST['IDname'];
$modelID = $_POST['modelID'];
$brandID = $_POST['brandID'];
$price = $_POST['price'];

// Upload image
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_image_name = 'pro_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "./image/".$new_image_name;
    move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "question-mark.png";
    }

$sql = "INSERT INTO product(pro_id,model_id,brand_id,price,image) 
VALUES ('$IDname','$modelID','$brandID','$price','$new_image_name')";
$result = mysqli_query($conn,$sql);
if($result){
echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script>";
echo "<script> window.location='show_product.php'; </script>";
}else{
    echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้'); </script>";
    echo "<script> window.location='show_product.php'; </script>";
}
?>