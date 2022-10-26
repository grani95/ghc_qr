<?php
session_start();
require 'connection.php';
require_once 'phpqrcode/qrlib.php';
// include('../lib/full/qrlib.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet"/>

</head>
<body>
<?php
if(isset($_GET['doc_id'])){
    $conn=Connection();
    $stm= "select * from doctors where doc_id=:doc_id";
    $query =$conn->prepare($stm);
    $query->bindParam(':doc_id', $_GET['doc_id']);
    $query->execute();
    // fetch row 
    $row = $query->fetch();
  
if($row){
    
    ?>
    <div class="container">
    <div class="row">
<div class="col-6">
<?php

ob_start();
QRCode::png($_SERVER['REQUEST_URI'], null);
$imageString = base64_encode( ob_get_contents() );
ob_end_clean();
?><img src="data:image/png;base64,<?php echo $imageString ?>" />
<h3>لقد أعطية هذه الوثيقة من قبل الجهات المسؤولة لمنحه المعني بممارت عمله الطبي بشكل قانوني</h3>
</div>
</div>
<button class = "btn btn-primary" onclick="window.print()">طباعة</button>

</div>
    <?php
}else{
    die("لقد حدث خطأ");
}

}else{
header("Location:login.php");

}

?>
</body>
</html>