<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="adminlogin.css" type="text/css">
    <link rel="stylesheet" href="animate.css">
    
</head>
<body>
<?php
include 'db_connection.php';
$conn = OpenCon();
//if($conn){echo "Connected Successfully";}
if(isset($_POST['loginsubmit']))
{
$count=0; /*CHCEKING WHETHER USERNAME IS UNIQUE OR NOT*/
$res=mysqli_query($conn,"select * from admin where id='$_POST[usrname]' and pwd='$_POST[pwd]'");
$count=mysqli_num_rows($res);
if($count>0)
{
 ?>
  <script>window.location="dashboard.php";</script>
  <?php
}
else
{
  ?>
  <script type="text/javascript">
  alert("INCORRECT USERNAME OR PASSWORD! ");
  </script>
  <?php
}  
}
?>
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
    <div class="box flip animated" >
    <h1>
        LOGIN HERE
    </h1>
    <form name="loginform" method="post">
            <p>Username</p>
            <input type="text" id="usrname" name="usrname" placeholder="Enter Username" required pattern="^[A-Za-z0-9]+">
            <p>Password</p>
            <input type="password" id="pwd" name="pwd" placeholder="Enter Password">
            <input type="submit" name="loginsubmit" class="button" value="login" required pattern="^[A-Za-z0-9]+">
    </form>
</div>

</body>
</html>