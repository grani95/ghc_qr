<?php
session_start();
require 'connection.php';
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
    <div class="alert alert-success">مرحيا بك كيف حالك اليوم <?php echo $_SESSION['username'];?></div>
<?php
if(isset($_SESSION['usr_id'])){
    $conn=Connection();
    $stm= "select * from doctors where usr_id=:usr_id";
    $query =$conn->prepare($stm);
    $query->bindParam(':usr_id', $_SESSION['usr_id']);
    $query->execute();
    // fetch row 
    $row = $query->fetch();
  
if($row){
    
    ?>
    <div class="container">
    <div class="row">


    <div class="col-3 ">
        <?php
    echo $row[0];
    ?></div>

    <div class="col-3 ">
        <?php
    echo $row[1];
    ?></div>
    

    <div class="col-3">
        <?php
    echo $row[2];
    ?></div>



<div class="col-3">
        <?php
    echo $row[3];
    ?></div>


<div class="col-3">
        <?php
    echo $row[4];
    ?></div>


<div class="col-3">
        <?php
    echo $row[5];
    ?></div>

<div class="col-6">
<a href="doc_certificate.php?doc_id=<?php echo $row[0];?>" >الأطلاء علي الوثيقة</a>


</div>


</div>
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