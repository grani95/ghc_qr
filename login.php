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
<div class="row">
<div class="col-9">
<?php
if(isset($_GET["login"])){
   $conn=Connection();
$stm= "select usr_id,type,username from users where username=:username and password=:password";
$query =$conn->prepare($stm);
$query->bindParam(':username', $_GET['username']);
$query->bindParam(':password', $_GET['password']);
$query->execute();
// fetch row 
$row = $query->fetch();
if($row){
$_SESSION['usr_id']=$row[0];
$_SESSION['user_type']=$row[1];
$_SESSION['username']=$row[2];

if($row['type']== 1){

header("Location:employee_profile.php");

}else{
  header("Location:doctor_profile.php");


}

}else{
  echo "الرجاء التحقق من بياناتك";
}
}
?>

<form action="#" method="GET">
<div class="col-3">
 <input type="text" class="form-control" name="username" placeholder="إسم المستخدم" />
</div> 
<div class="col-3">
  <input type="password" class="form-control" name="password" placeholder="كلمة المرور" />
</div> 
<div class="col-9">
<input type="submit" class="btn btn-success" name= "login" value="تسجيل الدخول" />
</div> 
</form>

</div>

</div>
</body>
<script src="dist/js/bootstrap.bundle.min.js"></script>
</html>