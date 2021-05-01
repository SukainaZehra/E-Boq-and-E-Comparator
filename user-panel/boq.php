<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BOQ</title>
  <link rel="stylesheet" href="boq.css">
</head>
<body>

<?php
$noOfsub = "";
$usrid = $_SESSION['id'];
$rate1 = '0';
$rate2 ='0';
$rate3 = '0';
$rate4 = '0';
$cur1 = '0';
$cur2 = '0';
$amt1 = '0';
$amt2 = '0';
$amt3 = '0';
$amt4 = '0';
$total1 = '0';
$total2 = '0';
$sst2 = '0';
$total2withsst2 = '0';
$week1 = '0';
$week2 = '0';
$week3 = '0';
$week4 = '0';
$weekstotal = '0';
$per1 = '0';
$per2 = '0';
$per3 = '0';
$per4 = '0';
$status = "";
//echo $usrid;
include 'db_connection.php';
$conn = OpenCon();
//if($conn){echo "Connected Successfully";}
if(isset($_SESSION['status']) && $_SESSION['status'] == 'draft'){
  unset($_SESSION['status']);
  //echo $_SESSION['status'];
  $record = mysqli_query($conn,"select * from boq where id='$usrid' "); 
  while($data = mysqli_fetch_array($record))
{
  if($data['rate1'] <> 0){
    $_SESSION['rate1'] = $data['rate1']; 
  }
  else{
    unset($_SESSION['rate1']);
  }
  if($data['rate2'] <> 0){
    $_SESSION['rate2'] = $data['rate2']; 
  }
  else{
    unset($_SESSION['rate2']);
  }

  if($data['rate3'] <> 0){
    $_SESSION['rate3'] = $data['rate3']; 
  }
  else{
    unset($_SESSION['rate3']);
  }

  if($data['rate4'] <> 0){
    $_SESSION['rate4'] = $data['rate4']; 
  }
  else{
    unset($_SESSION['rate4']);
  }

  if($data['cur1'] <> '0'){
    $_SESSION['cur1'] = $data['cur1']; 
  }
  else{
    unset($_SESSION['cur1']);
  }

  if($data['cur2'] <> '0'){
    $_SESSION['cur2'] = $data['cur2']; 
  }
  else{
    unset($_SESSION['cur2']);
  }

  if($data['amt1'] <> 0){
    $_SESSION['amt1'] = $data['amt1']; 
  }
  else{
    unset($_SESSION['amt1']);
  }

  if($data['amt2'] <> 0){
    $_SESSION['amt2'] = $data['amt2']; 
  }
  else{
    unset($_SESSION['amt2']);
  }

  if($data['amt3'] <> 0){
    $_SESSION['amt3'] = $data['amt3']; 
  }
  else{
    unset($_SESSION['amt3']);
  }

  if($data['amt4'] <> 0){
    $_SESSION['amt4'] = $data['amt4']; 
  }
  else{
    unset($_SESSION['amt4']);
  }
  if($data['total1'] <> 0){
    $_SESSION['total1'] = $data['total1']; 
  }
  else{
    unset($_SESSION['total1']);
  }
  if($data['total2'] <> 0){
    $_SESSION['total2'] = $data['total2']; 
  }
  else{
    unset($_SESSION['total2']);
  }
  if($data['sst2'] <> 0){
    $_SESSION['sst2'] = $data['sst2']; 
  }
  else{
    unset($_SESSION['sst2']);
  }
  if($data['total2withsst2'] <> 0){
    $_SESSION['total2withsst2'] = $data['total2withsst2']; 
  }
  else{
    unset($_SESSION['total2withsst2']);
  }
  if($data['week1'] <> 0){
    $_SESSION['week1'] = $data['week1']; 
  }
  else{
    unset($_SESSION['week1']);
  }
  if($data['week2'] <> 0){
    $_SESSION['week2'] = $data['week2']; 
  }
  else{
    unset($_SESSION['week2']);
  }
  if($data['week3'] <> 0){
    $_SESSION['week3'] = $data['week3']; 
  }
  else{
    unset($_SESSION['week3']);
  }
  if($data['week4'] <> 0){
    $_SESSION['week4'] = $data['week4']; 
  }
  else{
    unset($_SESSION['week4']);
  }
  if($data['weekstotal'] <> 0){
    $_SESSION['weekstotal'] = $data['weekstotal']; 
  }
  else{
    unset($_SESSION['weekstotal']);
  }
  if($data['per1'] <> 0){
    $_SESSION['per1'] = $data['per1']; 
  }
  else{
    unset($_SESSION['per1']);
  }
  if($data['per2'] <> 0){
    $_SESSION['per2'] = $data['per2']; 
  }
  else{
    unset($_SESSION['per2']);
  }
  
  if($data['per3'] <> 0){
    $_SESSION['per3'] = $data['per3']; 
  }
  else{
    unset($_SESSION['per3']);
  }
  
  if($data['per4'] <> 0){
    $_SESSION['per4'] = $data['per4']; 
  }
  else{
    unset($_SESSION['per4']);
  }
}
}
else{
  unset($_SESSION['status']);
  unset($_SESSION['rate1']);
  unset($_SESSION['rate2']);
  unset($_SESSION['rate3']);
  unset($_SESSION['rate4']);
  unset($_SESSION['cur1']);
  unset($_SESSION['cur2']);
  unset($_SESSION['amt1']);
  unset($_SESSION['amt2']);
  unset($_SESSION['amt3']);
  unset($_SESSION['amt4']);
  unset($_SESSION['total1']);
  unset($_SESSION['total2']);
  unset($_SESSION['sst2']);
  unset($_SESSION['total2withsst2']);
  unset($_SESSION['week1']);
  unset($_SESSION['week2']);
  unset($_SESSION['week3']);
  unset($_SESSION['week4']);
  unset($_SESSION['weekstotal']);
  unset($_SESSION['per1']);
  unset($_SESSION['per2']);
  unset($_SESSION['per3']);
  unset($_SESSION['per4']);
}


//when user presses submit btn
if(isset($_POST['submit']))
{
 $wholerow = mysqli_query($conn, "SELECT * FROM `boq` WHERE `id`= '$usrid' ");
 while($res = mysqli_fetch_array($wholerow))
 {
   $noOfsub = $res['noOfsub']; 
 }
 if($noOfsub == '0'){
  $sql = " UPDATE  `boq` 
  SET   `status` = 'finalSub',
        `noOfsub` = '1',
        `rate1` = '".$_POST["rate1"]."', 
        `rate2` = '".$_POST["rate2"]."',  
        `rate3` = '".$_POST["rate3"]."', 
        `rate4` = '".$_POST["rate4"]."', 
        `cur1` = '".$_POST["cur1"]."', 
        `cur2` = '".$_POST["cur2"]."', 
        `amt1` = '".$_POST["amt1"]."', 
        `amt2` = '".$_POST["amt2"]."', 
        `amt3` = '".$_POST["amt3"]."', 
        `amt4` = '".$_POST["amt4"]."',
        `total1` = '".$_POST["total1"]."',  
        `total2` = '".$_POST["total2"]."',  
        `sst2` = '".$_POST["sst2"]."',  
        `total2withsst2` = '".$_POST["total2withsst2"]."',
        `week1` = '".$_POST["week1"]."', 
        `week2` = '".$_POST["week2"]."', 
        `week3` = '".$_POST["week3"]."', 
        `week4` = '".$_POST["week4"]."',
        `weekstotal` = '".$_POST["weekstotal"]."',
        `per1` = '".$_POST["per1"]."', 
        `per2` = '".$_POST["per2"]."', 
        `per3` = '".$_POST["per3"]."', 
        `per4` = '".$_POST["per4"]."'
  WHERE  `id`= '$usrid' ";
  //INSERT INTO `boq` (`id`, `pwd`, `rate1`, `rate2`, `rate3`, `rate4`, `cur1`, `cur2`, `amt1`, `amt2`, `amt3`, `amt4`, `total1`, `total2`, `sst2`, `total2withsst2`, `week1`, `week2`, `week3`, `week4`, `per1`, `per2`, `per3`, `per4`) VALUES ('schneider1', 'schneider1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
   /* $sql = "INSERT INTO boq (rate1, amt1)
    VALUES ('".$_POST["rate1"]."','".$_POST["amt1"]."')";*/

  $result = mysqli_query($conn,$sql);
  if(!mysqli_query($conn,$sql)){ ?>
  <script type="text/javascript">
    alert("RECORD CANNOT BE INSERTED, SUBMIT AGAIN ");
    document.getElementById("form1").reset();
    //window.location.replace('./thankyouPage.php');
  </script>
<?php
  }
  else{ ?>
    <script type="text/javascript">
    alert("YOUR RESPONSE HAS BEEN RECORDED SUCCESSFULLY! ");
    alert("PLEASE DOWNLOAD THE COPY OF YOUR RESPONSE AS A REFERENCE");
    window.location.replace('./index2.php');
    //document.getElementById("form1").reset();
    //window.location.replace('./thankyouPage.php');
    </script>
<?php } 
 }
 else{ ?>
     <script type="text/javascript">
    alert("YOU HAVE ALREADY RECORDED YOUR RESPONSE!! ");
    document.getElementById("form1").reset();
    //window.location.replace('./thankyouPage.php');
    </script>
<?php
 }
}

//when user presses draft button
if(isset($_POST['draft'])){

  $wholerow = mysqli_query($conn, "SELECT * FROM `boq` WHERE `id`= '$usrid' ");
  while($res = mysqli_fetch_array($wholerow))
  {
    $noOfsub = $res['noOfsub']; 
  }
  if($noOfsub == '1'){
    ?>
    <script>
    alert("Draft cannot be saved as you have already recorded your response!!");
    document.getElementById("form1").reset();
    </script>
    <?php
    
  }
  else if($noOfsub == '0'){
  if(empty($_POST['rate1']) && empty($_POST['rate2']) && empty($_POST['rate3']) && empty($_POST['rate4']) && empty($_POST['cur1'])
  && empty($_POST['cur2']) && empty($_POST['amt1']) && empty($_POST['amt2']) && empty($_POST['amt3']) && empty($_POST['amt4']) 
  && empty($_POST['total1']) && empty($_POST['total2']) && empty($_POST['sst2']) && empty($_POST['total2withsst2']) 
  && empty($_POST['week1']) && empty($_POST['week2']) && empty($_POST['week3']) && empty($_POST['week4']) 
  && empty($_POST['weekstotal']) && empty($_POST['per1']) && empty($_POST['per2']) && empty($_POST['per3']) && empty($_POST['per4'])
  ){
    ?>
    <script type="text/javascript">
    alert("PLEASE FILL ATLEAST ONE FIELD FOR SAVING THE DRAFT!!");
    </script>
  <?php
  }
  else{
    if($_POST['rate1'] <> ''){
      $rate1 = $_POST['rate1'];
    }
    if($_POST['rate2'] <> ''){
      $rate2 = $_POST['rate2'];
    }
    if($_POST['rate3'] <> ''){
      $rate3 = $_POST['rate3'];
    }
    if($_POST['rate4'] <> ''){
      $rate4 = $_POST['rate4'];
    }
    if($_POST['cur1'] <> ''){
      $cur1 = $_POST['cur1'];
    }
    if($_POST['cur2'] <> ''){
      $cur2 = $_POST['cur2'];
    }
    if($_POST['amt1'] <> ''){
      $amt1 = $_POST['amt1'];
    }
    if($_POST['amt2'] <> ''){
      $amt2 = $_POST['amt2'];
    }
    if($_POST['amt3'] <> ''){
      $amt3 = $_POST['amt3'];
    }
    if($_POST['amt4'] <> ''){
      $amt4 = $_POST['amt4'];
    }
    if($_POST['total1'] <> ''){
      $total1 = $_POST['total1'];
    }
    if($_POST['total2'] <> ''){
      $total2 = $_POST['total2'];
    }
    if($_POST['sst2'] <> ''){
      $sst2 = $_POST['sst2'];
    }
    if($_POST['total2withsst2'] <> ''){
      $total2withsst2 = $_POST['total2withsst2'];
    }
    if($_POST['week1'] <> ''){
      $week1 = $_POST['week1'];
    }
    if($_POST['week2'] <> ''){
      $week2 = $_POST['week2'];
    }
    if($_POST['week3'] <> ''){
      $week3 = $_POST['week3'];
    }
    if($_POST['week4'] <> ''){
      $week4 = $_POST['week4'];
    }
    if($_POST['weekstotal'] <> ''){
      $weekstotal = $_POST['weekstotal'];
    }
    if($_POST['per1'] <> ''){
      $per1 = $_POST['per1'];
    }
    if($_POST['per2'] <> ''){
      $per2 = $_POST['per2'];
    }
    if($_POST['per3'] <> ''){
      $per3 = $_POST['per3'];
    }
    if($_POST['per4'] <> ''){
      $per4 = $_POST['per4'];
    }


  $sql = " UPDATE  `boq` 
  SET   `status` = 'draft',
        `noOfsub` = '0',
        `rate1` = '$rate1', 
        `rate2` = '$rate2',  
        `rate3` = '$rate3', 
        `rate4` = '$rate4',
        `cur1` = '$cur1', 
        `cur2` = '$cur2',
        `amt1` = '$amt1',
        `amt2` = '$amt2',
        `amt3` = '$amt3',
        `amt4` = '$amt4',
        `total1` = '$total1', 
        `total2` = '$total2', 
        `sst2` = '$sst2', 
        `total2withsst2` = '$total2withsst2',
        `week1` = '$week1',
        `week2` = '$week2',
        `week3` = '$week3', 
        `week4` = '$week4',
        `weekstotal` = '$weekstotal',
        `per1` = '$per1',
        `per2` = '$per2',
        `per3` = '$per3',
        `per4` = '$per4'
  WHERE  `id`= '$usrid' ";

  $result = mysqli_query($conn,$sql);
  if (!mysqli_query($conn,$sql)) {
    //echo("Error description: " . mysqli_error($con));
  ?>
  <script type="text/javascript">
  alert("DRAFT CANNOT BE SAVED, TRY AGAIN ");
  //document.getElementById("form1").reset();
  //window.location.replace('./thankyouPage.php');
</script>
<?php
}
else{ ?>
  <script type="text/javascript">
  alert("DRAFT HAS BEEN SAVED SUCCESSFULLY! ");
  $rate1 = "";
  $rate2 = "";
  //document.getElementById("form1").reset();
  //window.location.replace('./thankyouPage.php');
  </script>
<?php } 
}
}
}

?>

 <!-- Loader -->
 <div class="loader" id="loader"></div>
  <form name="form1" id="form1" action="" method="post" onkeydown="return event.key != 'Enter';">
      <!--Table starts-->
      <table class="Table" border=1 cellspacing=0 cellpadding=0 0% >
          <thead>
            <tr class="thead-r1" height=20 style='height:15.0pt'>
             <td class="thead-r1-c1" colspan=7 height=20 style='height:15.0pt;'>Project: 1248 – The Indus Hospital Expansion Project, Hospital Building - 2</td>
            </tr>
            <tr class="thead-r2" height=17 style='height:12.75pt'>
             <td  class="thead-r2-c1" colspan=7 height=17 style='height:12.75pt'>Doc: FND-1248-TDB-02-02-00 | Substation Works | <font class="font22">Bill
             of Quantities </font><font class="font21">| Rev: 00</font></td>
            </tr>
            <tr class="thead-r3" height=32 class="MainHeading" style='height:24.0pt'>
                <td class="thead-r3-c1" colspan=7 height=32 style='height:24.0pt'>DRY TYPE TRANSFORMER
            </td>
            </tr>
            </thead>
          <tbody>
        
        <!--ROW 01 ENDS-->
        <tr class="r1" > 
          <!--ROW 02 STARTS-->
          <td class="c1" height=32 >
            <h2>ITEM NO.</h2>
          </td>
          <td class="c2" height=32 >
            <h2>DESCRIPTION</h2>
          </td>
          <td class="c3" height=32 >
            <h2>QTY</h2>
          </td>
          <td class="c4"  height=32 >
            <h2>UNIT</h2>
          </td>
          <td class="c5" height=32 >
            <h2>RATE(C&F)</h2>
          </td>
          <td class="c6" height=32 >
            <h2>INDICATE FOREIGN CURRENCY</h2>
          </td>
          <td class="c7" height=32 >
            <h2>AMOUNT(C&F)</h2>
          </td>
        </tr>
        <!--ROW 01 ENDS-->
        <tr class="r2">
          <!--ROW 03 STARTS-->
          <td class="c1">
            <h2>A</h2>
          </td>
          <td class="c2" colspan=6>
            <h2>SUPPLY OF EQUIPMENT</h2>
          </td>
        </tr>
        <!--ROW 02 ENDS-->
        <tr class="r3a">
          <!--ROW 03a STARTS-->
          <td class="c1">
            <p class="BodyText" align=center>
              <span lang=EN-GB>
                1
              </span>
            </p>
          </td>
          <td class="c2" valign=top>
            <p class="BodyText" align=left>
              <span lang=EN-GB>
              11/0.415kV dry type transformer, with 40% additional kVA with air forced cooling, Co/Bk, 50°C maximum ambient temperature with IP20 enclosure, thermal protection relays, fan controls, forced air cooling fan, and all accessories as follows
              </span>
            </p>
          </td>
          <td class="c3">
          </td>
          <td class="c4">
          </td>
          <td class="c5">
          </td>
          <td class="c6">
          </td>
          <td class="c7">
          </td> 
        </tr>
        <!--ROW 03a ENDS-->
        
        <tr class="r3">
          <!--ROW 3(b) STARTS-->
          <td class="c1">
            <p class="BodyText" align=center>
              <span lang=EN-GB>
                a)
              </span>
            </p>
          </td>
          <td class="c2" valign=top>
            <p class="BodyText" align=left>
              <span lang=EN-GB>
              1250 kVA (%Z=6%)
              </span>
            </p>
          </td>
          <td class="c3">
            <p class="BodyText" align=center>
                <span id="qty1" lang=EN-GB>
                  1
                </span>
              </p>
          </td>
          <td class="c4">
            <p class="BodyText" align=center>
                <span lang=EN-GB>
                  No.
                </span>
              </p>
          </td>
          <td class="c5">
            <input type="number"  id="rate1" name="rate1" onchange="calAmt1(this)" required value="<?php if(isset($_POST['draft'])){ 
              if($_POST['rate1'] <> ''){
                echo $_POST['rate1'];
                //echo('10');
              } 
            }
            else if (isset($_SESSION['rate1'])) {
              echo $_SESSION['rate1'];
              //echo('20');
              }
            else if (!isset($_SESSION['rate1'])) { 
             // echo("not session");
             echo "";
            // echo('30');
              }
            ?>"></input>
          </td>
          <td class="c6">
            <select name="cur1" required>
            <option value="">
            <p class="BodyText" align=left>
              <span lang=EN-GB>--Select Currency--</span>
            </p>
            </option>
            <option value="USD" <?php if(isset($_POST['draft'])){ 
              if($_POST['cur1'] == "USD"){
                echo 'selected="selected"';
              } }
              else if (isset($_SESSION['cur1'])) {
                if($_SESSION['cur1'] == "USD"){
                  echo 'selected="selected"';
                }
              }
              ?> ><p class="BodyText" align=center><span lang=EN-GB>USD</span></p>
            </option>
            <option value="Euro" <?php if(isset($_POST['draft'])){ 
              if($_POST['cur1'] == "Euro"){
                echo 'selected="selected"';
              } }
              else if (isset($_SESSION['cur1'])) {
                if($_SESSION['cur1'] == "Euro"){
                  echo 'selected="selected"';
                }
              }
              ?> >
            <p class="BodyText" align=center>
              <span lang=EN-GB>Euro</span>
            </p>
            </option>
            </select>
          </td>
          <td class="c7">
            <input type="number" id="amt1" name="amt1" readonly value="<?php if(isset($_POST['draft'])){ 
              if($_POST['amt1'] <> ''){
                echo $_POST['amt1'];
              } 
            }
            else if (isset($_SESSION['amt1'])) {
              echo $_SESSION['amt1'];
              }
            ?>"></input>
          </td> 
        </tr>
        <!--ROW 03(b) ENDS-->
        
        <tr class="r3c">
          <!--ROW 03c STARTS-->
          <td class="c1">
            <p class="BodyText" align=center>
              <span lang=EN-GB>
                b)
              </span>
            </p>
          </td>
          <td class="c2" valign=top>
            <p class="BodyText" align=left>
              <span lang=EN-GB>
              1600 kVA (%Z=6%)
              </span>
            </p>
          </td>
          <td class="c3">
            <p class="BodyText" align=center>
                <span id="qty2" lang=EN-GB>
                  1
                </span>
              </p>
          </td>
          <td class="c4">
            <p class="BodyText" align=center>
                <span lang=EN-GB>
                  No.
                </span>
              </p>
          </td>
          <td class="c5">
            <input type="number"  id="rate2" name="rate2" onchange="calAmt2(this)" required value="<?php if(isset($_POST['draft'])){ 
              if($_POST['rate2'] <> ''){
                echo $_POST['rate2'];
              } 
            }
            else if (isset($_SESSION['rate2'])) {
              echo $_SESSION['rate2'];
              }
            ?>"></input>
          </td>
          <td class="c6">
            <select name="cur2" required>
            <option value="">
            <p class="BodyText" align=left>
              <span lang=EN-GB>--Select Currency--</span>
            </p>
            </option>
            <option value="USD" <?php if(isset($_POST['draft'])){ 
              if($_POST['cur2'] == "USD"){
                echo 'selected="selected"';
              } }
              else if (isset($_SESSION['cur2'])) {
                if($_SESSION['cur2'] == "USD"){
                  echo 'selected="selected"';
                }
              }
              ?> ><p class="BodyText" align=center><span lang=EN-GB>USD</span></p>
            </option>
            <option value="Euro" <?php if(isset($_POST['draft'])){ 
              if($_POST['cur2'] == "Euro"){
                echo 'selected="selected"';
              } }
              else if (isset($_SESSION['cur2'])) {
                if($_SESSION['cur2'] == "Euro"){
                  echo 'selected="selected"';
                }
              }
              ?> >
            <p class="BodyText" align=center>
              <span lang=EN-GB>Euro</span>
            </p>
            </option>
            </select>
          </td>
          <td class="c7">
            <input type="number" id="amt2" name="amt2" readonly value="<?php if(isset($_POST['draft'])){ 
              if($_POST['amt2'] <> ''){
                echo $_POST['amt2'];
              } 
            }
            else if (isset($_SESSION['amt2'])) {
              echo $_SESSION['amt2'];
              }
            ?>"></input>
          </td> 
        </tr>
        <!--ROW 03c ENDS-->
        <tr class="r4">
          <!--ROW 04 STARTS-->
          <td class="c1"></td>
          <td class="c2" colspan=5>
            <h3>C&F Total</h3>
          </td>
          <td class="c3" >
            <input type="number" id="total1" name="total1" readonly value="<?php if(isset($_POST['draft'])){ 
              if($_POST['total1'] <> ''){
                echo $_POST['total1'];
              } 
            }
            else if (isset($_SESSION['total1'])) {
              echo $_SESSION['total1'];
              }
              else if (!isset($_SESSION['total1'])) {
                echo "";
                }
            ?>"></input>
          </td>
        </tr>
        <!--ROW 04 ENDS-->
          <!--ROW 05 STARTS-->
        <tr class="r5" > 
          <td class="c1" height=32 >
            <h2>ITEM NO.</h2>
          </td>
          <td class="c2" height=32 >
            <h2>DESCRIPTION</h2>
          </td>
          <td class="c3" height=32 >
            <h2>QTY</h2>
          </td>
          <td class="c4"  height=32 >
            <h2>UNIT</h2>
          </td>
          <td class="c5" height=32 >
            <h2>RATE(Pak Rupee)</h2>
          </td>
          <td class="c6" height=32 colspan=2>
            <h2>AMOUNT(Pak Rupee)</h2>
          </td>
        </tr>
        <tr class="r5b">
          <!--ROW 05b STARTS-->
          <td class="c1">
            <h2>B</h2>
          </td>
          <td class="c2" colspan=6>
            <h2>DELIVERY & COMMISSIONING</h2>
          </td>
        </tr>
        <!--ROW 05b ENDS-->
        <tr class="r6">
          <!--ROW 06 STARTS-->
          <td class="c1"><p class="BodyText" align=center>
            <span lang=EN-GB>
              1
            </span>
          </p>
          </td>
          <td class="c2" valign=top>
            <p class="BodyText" align=left>
              <span lang=EN-GB>
                Delivery at site including un-loading, lifting shifting, cranage upto roof  in LV Panel rooms and installation/coupling .
              </span>
            </p>
          </td>
          <td class="c3">
            <p class="BodyText" align=center>
                <span lang=EN-GB id="qty3">
                  1
                </span>
              </p>
          </td>
          <td class="c4">
            <p class="BodyText" align=center>
                <span lang=EN-GB>
                 Job
                </span>
              </p>
          </td>
          <td class="c5">
            <input type="number" id="rate3" name="rate3" onchange="calAmt3(this)" required value="<?php if(isset($_POST['draft'])){ 
              if($_POST['rate3'] <> ''){
                echo $_POST['rate3'];
              } 
            }
            else if (isset($_SESSION['rate3'])) {
              echo $_SESSION['rate3'];
              }
            ?>"></input>
          </td>
          <td class="c6" colspan=2 align="center">
            <input type="number" id="amt3" name="amt3" readonly value="<?php if(isset($_POST['draft'])){ 
              if($_POST['amt3'] <> ''){
                echo $_POST['amt3'];
              } 
            }
            else if (isset($_SESSION['amt3'])) {
              echo $_SESSION['amt3'];
              }
            ?>"></input>
          </td>
 
        </tr>
        <!--ROW 06 ENDS-->
        <tr class="r7">
          <!--ROW 07 STARTS-->
          <td class="c1"><p class="BodyText" align=center>
            <span lang=EN-GB>
              2
            </span>
          </p>
          </td>
          <td class="c2" valign=top>
            <p class="BodyText" align=left>
              <span lang=EN-GB>
                Testing & Commissioning at site
              </span>
            </p>
          </td>
          <td class="c3">
            <p class="BodyText" align=center>
                <span lang=EN-GB id="qty4">
                  1
                </span>
              </p>
          </td>
          <td class="c4">
            <p class="BodyText" align=center>
                <span lang=EN-GB>
                 Job
                </span>
              </p>
          </td>
          <td class="c5">
            <input type="number" id="rate4" name="rate4" onchange="calAmt4(this)" required value="<?php if(isset($_POST['draft'])){ 
              if($_POST['rate4'] <> ''){
                echo $_POST['rate4'];
              } 
            }
            else if (isset($_SESSION['rate4'])) {
              echo $_SESSION['rate4'];
              }
            ?>"></input>
          </td>
          <td class="c6" colspan=2 align="center">
            <input type="number" id="amt4" name="amt4" readonly value="<?php if(isset($_POST['draft'])){ 
              if($_POST['amt4'] <> ''){
                echo $_POST['amt4'];
              } 
            }
            else if (isset($_SESSION['amt4'])) {
              echo $_SESSION['amt4'];
              }
            ?>"></input>
          </td>
 
        </tr>
        <!--ROW 07 ENDS-->
        <tr class="r8">
          <!--ROW 08 STARTS-->
          <td class=c1></td>
          <td class="c2" colspan=4>
            <h3>Sub-Total-B</h3>
          </td>
          <td class="c3" colspan=2 >
            <input type="number" id="total2" name="total2" readonly value="<?php if(isset($_POST['draft'])){ 
              if($_POST['total2'] <> ''){
                echo $_POST['total2'];
              } 
            }
            else if (isset($_SESSION['total2'])) {
              echo $_SESSION['total2'];
              }
            ?>"></input>
          </td>
        </tr>
        <!--ROW 08 ENDS-->
        <tr class="r9">
          <!--ROW 09 STARTS-->
          <td class=c1></td>
          <td class="c2" colspan=4>
            <h3>SST @ 13% on Services</h3>
          </td>
          <td class="c3" colspan=2 >
            <input type="number" id="sst" name="sst2" readonly value="<?php if(isset($_POST['draft'])){ 
              if($_POST['sst2'] <> ''){
                echo $_POST['sst2'];
              } 
            }
            else if (isset($_SESSION['sst2'])) {
              echo $_SESSION['sst2'];
              }
            ?>"></input>
          </td>
        </tr>
        <!--ROW 09 ENDS-->
        <tr class="r10">
          <!--ROW 10 STARTS-->
          <td class=c1></td>
          <td class="c2" colspan=4>
            <h3>Sub-Total-B with SST</h3>
          </td>
          <td class="c3" colspan=2 >
            <input type="number" id="total2WithSst" name="total2withsst2" readonly value="<?php if(isset($_POST['draft'])){ 
              if($_POST['total2withsst2'] <> ''){
                echo $_POST['total2withsst2'];
              } 
            }
            else if (isset($_SESSION['total2withsst2'])) {
              echo $_SESSION['total2withsst2'];
              }
            ?>"></input>
          </td>
        </tr>
        <!--ROW 10 ENDS-->
  
       <tr class="r11">
        <!--ROW 11 STARTS-->
        <td class="c1">
          <h2>C</h2>
        </td>
        <td class="c2" colspan=6>
          <h2>DELIVERY SCHEDULE</h2>
        </td>
      </tr>
      <!--ROW 11 ENDS-->
      <tr class="r12">
        <!--ROW 12 STARTS-->
        <td class="c1">
          <p class="BodyText" align=center>
            <span lang=EN-GB>
              1
            </span>
          </p>
        </td>
        <td class="c2" valign=top>
          <p class="BodyText" align=left>
            <span lang=EN-GB>
              Shop drawings
            </span>
          </p>
        </td>
        <td class="c3">
          <input type="number" id="week1" name="week1" onchange="calWeeks(this)" required value="<?php if(isset($_POST['draft'])){ 
              if($_POST['week1'] <> ''){
                echo $_POST['week1'];
              } 
            }
            else if (isset($_SESSION['week1'])) {
              echo $_SESSION['week1'];
              }
            ?>"></input>
        </td>
        <td class="c4">
          <p class="BodyText" align=center>
              <span lang=EN-GB>
                weeks
              </span>
            </p>
        </td>
        <td class="c5" colspan=2>
        </td>
        <td class="c6">
        </td>
        
      </tr>
      <!--ROW 12 ENDS-->
      <tr class="r13">
        <!--ROW 13 STARTS-->
        <td class="c1">
          <p class="BodyText" align=center>
            <span lang=EN-GB>
              2
            </span>
          </p>
        </td>
        <td class="c2" valign=top>
          <p class="BodyText" align=left>
            <span lang=EN-GB>
              Manufacturing
            </span>
          </p>
        </td>
        <td class="c3">
          <input type="number" id="week2" name="week2" onchange="calWeeks(this)" required value="<?php if(isset($_POST['draft'])){ 
              if($_POST['week2'] <> ''){
                echo $_POST['week2'];
              } 
            }
            else if (isset($_SESSION['week2'])) {
              echo $_SESSION['week2'];
              }
            ?>"></input>
        </td>
        <td class="c4">
          <p class="BodyText" align=center>
              <span lang=EN-GB>
                weeks
              </span>
            </p>
        </td>
        <td class="c5" colspan=2>
        </td>
        <td class="c6">
        </td>
        
      </tr>
      <!--ROW 13 ENDS-->
      <tr class="r14">
        <!--ROW 14 STARTS-->
        <td class="c1">
          <p class="BodyText" align=center>
            <span lang=EN-GB>
              3
            </span>
          </p>
        </td>
        <td class="c2" valign=top>
          <p class="BodyText" align=left>
            <span lang=EN-GB>
              Factory Testing & dispatch
            </span>
          </p>
        </td>
        <td class="c3">
          <input type="number" id="week3" name="week3" onchange="calWeeks(this)" required value="<?php if(isset($_POST['draft'])){ 
              if($_POST['week3'] <> ''){
                echo $_POST['week3'];
              } 
            }
            else if (isset($_SESSION['week3'])) {
              echo $_SESSION['week3'];
              }
            ?>"></input>
        </td>
        <td class="c4">
          <p class="BodyText" align=center>
              <span lang=EN-GB>
                weeks
              </span>
            </p>
        </td>
        <td class="c5" colspan=2>
        </td>
        <td class="c6">
        </td>
        
      </tr>
      <!--ROW 14 ENDS-->
      <tr class="r15">
        <!--ROW 15 STARTS-->
        <td class="c1">
          <p class="BodyText" align=center>
            <span lang=EN-GB>
              4
            </span>
          </p>
        </td>
        <td class="c2" valign=top>
          <p class="BodyText" align=left>
            <span lang=EN-GB>
              Delivery at site
            </span>
          </p>
        </td>
        <td class="c3">
          <input type="number" id="week4" name="week4" onchange="calWeeks(this)" required value="<?php if(isset($_POST['draft'])){ 
              if($_POST['week4'] <> ''){
                echo $_POST['week4'];
              } 
            }
            else if (isset($_SESSION['week4'])) {
              echo $_SESSION['week4'];
              }
            ?>"></input>
        </td>
        <td class="c4">
          <p class="BodyText" align=center>
              <span lang=EN-GB>
                weeks
              </span>
            </p>
        </td>
        <td class="c5" colspan=2>
        </td>
        <td class="c6">
        </td>
        
      </tr>
      <!--ROW 15 ENDS-->
      <tr class="r15b">
        <!--ROW 15 STARTS-->
        <td class="c1">
        </td>
        <td class="c2" align=right>
          <h4>Total</h4>
        </td>
        <td class="c3">
          <input type="number" id="weeksTotal" name="weekstotal" readonly value="<?php if(isset($_POST['draft'])){ 
              if($_POST['weekstotal'] <> ''){
                echo $_POST['weekstotal'];
              } 
            }
            else if (isset($_SESSION['weekstotal'])) {
              echo $_SESSION['weekstotal'];
              }
            ?>"></input>
        </td>
        <td class="c4">
          <p class="BodyText" align=center>
              <span lang=EN-GB>
                weeks
              </span>
            </p>
        </td>
        <td class="c5" colspan=2>
        </td>
        <td class="c6">
        </td>
        
      </tr>
      <!--ROW 15 ENDS-->
      <tr class="r16">
        <!--ROW 16 STARTS-->
        <td class="c1">
          <h2>D</h2>
        </td>
        <td class="c2" colspan=6>
          <h2>PAYMENT TERMS</h2>
        </td>
      </tr>
      <!--ROW 16 ENDS-->
      <tr class="r17">
        <!--ROW 17 STARTS-->
        <td class="c1">
          <p class="BodyText" align=center>
            <span lang=EN-GB>
              1
            </span>
          </p>
        </td>
        <td class="c2" valign=top>
          <p class="BodyText" align=left>
            <span lang=EN-GB>
              Advance
            </span>
          </p>
        </td>
        <td class="c3">
          <input type="number" name="per1" required step="any" value="<?php if(isset($_POST['draft'])){ 
              if($_POST['per1'] <> ''){
                echo $_POST['per1'];
              } 
            }
            else if (isset($_SESSION['per1'])) {
              echo $_SESSION['per1'];
              }
            ?>"></input>
        </td>
        <td class="c4">
          <p class="BodyText" align=center>
              <span lang=EN-GB>
                %
              </span>
            </p>
        </td>
        <td class="c5" colspan=2>
        </td>
        <td class="c6">
        </td>
        
      </tr>
      <!--ROW 17 ENDS-->
      <tr class="r18">
        <!--ROW 18 STARTS-->
        <td class="c1">
          <p class="BodyText" align=center>
            <span lang=EN-GB>
              2
            </span>
          </p>
        </td>
        <td class="c2" valign=top>
          <p class="BodyText" align=left>
            <span lang=EN-GB>
              On delivery at site
            </span>
          </p>
        </td>
        <td class="c3">
          <input type="number" name="per2" required step="any" value="<?php if(isset($_POST['draft'])){ 
              if($_POST['per2'] <> ''){
                echo $_POST['per2'];
              } 
            }
            else if (isset($_SESSION['per2'])) {
              echo $_SESSION['per2'];
              }
            ?>"></input>
        </td>
        <td class="c4">
          <p class="BodyText" align=center>
              <span lang=EN-GB>
               %
              </span>
            </p>
        </td>
        <td class="c5" colspan=2>
        </td>
        <td class="c6">
        </td>
        
      </tr>
      <!--ROW 18 ENDS-->
      <tr class="r19">
        <!--ROW 19 STARTS-->
        <td class="c1">
          <p class="BodyText" align=center>
            <span lang=EN-GB>
              3
            </span>
          </p>
        </td>
        <td class="c2" valign=top>
          <p class="BodyText" align=left>
            <span lang=EN-GB>
              After testing & commissioning
            </span>
          </p>
        </td>
        <td class="c3">
          <input type="number" name="per3" required step="any" value="<?php if(isset($_POST['draft'])){ 
              if($_POST['per3'] <> ''){
                echo $_POST['per3'];
              } 
            }
            else if (isset($_SESSION['per3'])) {
              echo $_SESSION['per3'];
              }
            ?>"></input>
        </td>
        <td class="c4">
          <p class="BodyText" align=center>
              <span lang=EN-GB>
                %
              </span>
            </p>
        </td>
        <td class="c5" colspan=2>
        </td>
        <td class="c6">
        </td>
        
      </tr>
      <!--ROW 19 ENDS-->
      <tr class="r20">
        <!--ROW 20 STARTS-->
        <td class="c1">
          <p class="BodyText" align=center>
            <span lang=EN-GB>
              4
            </span>
          </p>
        </td>
        <td class="c2" valign=top>
          <p class="BodyText" align=left>
            <span lang=EN-GB>
              After one year warranty period
            </span>
          </p>
        </td>
        <td class="c3">
          <input type="number" name="per4" required step="any" value="<?php if(isset($_POST['draft'])){ 
              if($_POST['per4'] <> ''){
                echo $_POST['per4'];
              } 
            }
            else if (isset($_SESSION['per4'])) {
              echo $_SESSION['per4'];
              }
            ?>"></input>
        </td>
        <td class="c4">
          <p class="BodyText" align=center>
              <span lang=EN-GB>
                %
              </span>
            </p>
        </td>
        <td class="c5" colspan=2>
        </td>
        <td class="c6">
        </td>
        
      </tr>
          <!--ROW 20 ENDS-->
          <!--Extra Row-->
      <tr height=19>

      </tr>
  
    </tbody>
    <tfoot>
      <tr> 
      <td colspan=2 align=left><button name="draft" formnovalidate value="draft" id="draft" class="draft-btn">Save as Draft</button></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align=center><button type="submit" name="submit" value="submit" id="submit" class="submit-btn"> Submit</button></td>
      </tr>
<tr height=19 style='height:14.25pt'></tr>
      <tr height=19 style='height:14.25pt'>
        <td class=xl90 colspan=2><img width=38 height=25 src=image004.png><font class="font19">Fahim, Nanji &amp; deSouza (Pvt.) Ltd</font><font
          class="font18"> | Consulting Engineers<span></span></font></td>
        <td class=xl90></td>
        <td class=xl90>&nbsp;</td>
        <td class=xl90>&nbsp;</td>
        <td class=xl90>&nbsp;</td>
        <td class=xl91>Page. 1/1</td>
       </tr>
    </tfoot>
        
      </table>
      
</form>
</body>
<script src="boq.js"></script>
<script>
  $(document).ready(function() {
    $(window).keydown(function(event){
      if(event.keyCode == 13) {
        event.preventDefault();
        return false;
      }
    });
  });
  </script>
</html>