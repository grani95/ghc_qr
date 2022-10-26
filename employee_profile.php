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
    $stm= "select * from employee where usr_id=:usr_id";
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


<div class="col-10">
<!-- <a href="doc_certificate.php?doc_id=<?php echo $row[0];?>" >الأطلاء علي الوثيقة</a> -->
<?php
    $conn=Connection();
    $stm= "select * from doctors where status=1";
    $query =$conn->prepare($stm);
    $query->execute();
    // fetch row 
    $docs = $query->fetchAll();

?>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">رقم التسجيل</th>
      <th scope="col">إسم الطبيب</th>
      <th scope="col">الدرجة</th>
      <th scope="col">تاريخ الحصول علي الشهادة</th>
      <th scope="col">التخصص</th>
      <th scope="col">الكلية</th>
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
    <?php
    
    foreach($docs as $doc){
?>
          <th scope="row"><?php echo $doc[0];?></th>
      <td><?php echo $doc[1];?></td>
      <td><?php echo $doc[2];?></td>
      <td><?php echo $doc[3];?></td>
      <td><?php echo $doc[4];?></td>
      <td><?php echo $doc[5];?></td>
      <td><a class="btn btn-info" href="doc_certificate.php?doc_id=<?php echo $doc[0];?>">إصدار وثيقة</a></td>

    </tr>
  <?php  }
    ?>
    <tr>
    
  </tbody>
</table>

</div>


</div>
</div>
    <?php
}else{
    die("لقد حدث خطأ");
}

}else{
//header("Location:login.php");

}

?>
</body>
</html>