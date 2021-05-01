<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="loginform.css" type="text/css">
    <link rel="stylesheet" href="animate.css">
    
</head>
<body>
<?php
include 'db_connection.php';
$conn = OpenCon();
//if($conn){echo "Connected Successfully";}
$status = "";
if(isset($_POST['loginsubmit']))
{

$count=0; /*CHCEKING WHETHER USERNAME IS UNIQUE OR NOT*/
$res=mysqli_query($conn,"select * from boq where id='$_POST[usrname]' and pwd='$_POST[pwd]'");
$count=mysqli_num_rows($res);

while($res1 = mysqli_fetch_array($res))
{
  $status = $res1['status']; 
}
//$t = $_POST['usrname'];

if($count>0)
{
  //$GLOBALS['idname']=  $_POST['usrname'];
 //echo($idname);

 $_SESSION['id'] = $_POST['usrname'];

 //$sql="UPDATE `boq` SET `justlogin`='1' WHERE `id`='$_POST[usrname]' AND `pwd`='$_POST[pwd]'";
 //$result=mysqli_query($con,$sql);
 
 //checking if user has any draft saved in db , if yes, then page will be reloaded with contents from db
  if($status == 'draft'){
  $_SESSION['status'] = $status;
  }
  else{
    unset($_SESSION['status']);
  }
 ?>
  <script>window.location="boq.php";</script>
  <?php
}//IF ENDED OF USERNAME CHCEKING
else
{
  ?>
  <script type="text/javascript">
  alert("INCORRECT USERNAME OR PASSWORD! ");
  </script>
  <?php

}  //ELSE ENDED OF USERNAME CHCEKING


}//IF ENDED OF ISSET() FUNC

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