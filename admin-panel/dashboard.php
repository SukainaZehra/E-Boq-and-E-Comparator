<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
</head>
<body>
<?php
include 'db_connection.php';
$conn = OpenCon();
//if($conn){echo "Connected Successfully";}

$res=mysqli_query($conn,"select noOfsub from boq where id='abb1' and pwd='abb1'");
while($res1 = mysqli_fetch_array($res))
{
  $abbsub = $res1['noOfsub']; 
}
$res2=mysqli_query($conn,"select noOfsub from boq where id='siemens1' and pwd='siemens1'");
while($res3 = mysqli_fetch_array($res2))
{
  $siemensub = $res3['noOfsub']; 
}
$res4=mysqli_query($conn,"select noOfsub from boq where id='schneider1' and pwd='schneider1'");
while($res5 = mysqli_fetch_array($res4))
{
  $schneidersub = $res5['noOfsub']; 
}
?>
    <header>
        <div class="logo"></div>
        <div class="admin-logout">
            <div class="button-container">
                <div class="admin-button" onclick="admin()"><i class="fa fa-user fa-fw"></i> Admin</div>
                <div class="logout-button" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout</div>
                <script>
                    function admin(){
                        window.location = "dashboard.php";
                    }
                    function logout(){
                        window.location = "adminlogin.php";
                    }
                </script>
            </div>
        </div>
    </header>
    <main>
        <h2>Project:1248–The Indus Hospital Expansion Project, Hospital Building-2</h2>
        <p>Doc: FND-1248-TDB-02-02-00 | Substation Works | Bill of Quantities | Rev: 00</p>
        <table>
            <tr>
            <th style="width: 8%;">S.No</th>
            <th style="width: 30%;">Supplier</th>
            <th style="width: 30%;">Submission Status</th>
            <th style="width: 25%;"></th>
            </tr>
            <tr>
                <td>1</td>
                <td>ABB</td>
                <td>
                <?php
                if($abbsub == '1'){
                ?>  
                    <i id="tick" class="fas fa-check" style=" color: green; font-size: 25px;"></i>
                <?php
                }
                else if($abbsub == '0')
                {
                ?>
                <i id="cross" class="fas fa-times" style=" color: red; font-size: 25px;"></i>
                <?php
                }
                ?>
                </td>
                <td>
                <?php
                if($abbsub == '1'){
                ?>  
                <a href="submission.php?bidder=abb1" target="_blank"><p style="color: green; font-weight: bold;">View and Download</p></a>
                <?php
                }
                else if($abbsub == '0')
                {
                ?>
                <p>-</p>
                <?php
                }
                ?>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Siemens</td>
                <td>
                <?php
                if($siemensub == '1'){
                ?>  
                    <i id="tick" class="fas fa-check" style=" color: green; font-size: 25px;"></i>
                <?php
                }
                else if($siemensub == '0')
                {
                ?>
                <i id="cross" class="fas fa-times" style=" color: red; font-size: 25px;"></i>
                <?php
                }
                ?>
                </td>
                <td>
                <?php
                if($siemensub == '1'){
                ?>  
                    <a href="submission.php?bidder=siemens1" target="_blank"><p style="color: green; font-weight: bold;">View and Download</p></a>
                <?php
                }
                else if($siemensub == '0')
                {
                ?>
                <p>-</p>
                <?php
                }
                ?>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Schneider</td>
                <td>
                <?php
                if($schneidersub == '1'){
                ?>  
                    <i id="tick" class="fas fa-check" style=" color: green; font-size: 25px;"></i>
                <?php
                }
                else if($schneidersub == '0')
                {
                ?>
                <i id="cross" class="fas fa-times" style=" color: red; font-size: 25px;"></i>
                <?php
                }
                ?>
                </td>
                <td>
                <?php
                if($schneidersub == '1'){
                ?>  
                    <a href="submission.php?bidder=schneider1" target="_blank"><p style="color: green; font-weight: bold;">View and Download</p></a>
                <?php
                }
                else if($schneidersub == '0')
                {
                ?>
                <p>-</p>
                <?php
                }
                ?>
                </td>
            </tr>
        </table>
        <?php
        if($abbsub == '1' && $siemensub == '1'){
        ?>
        <button onclick="showComparator()">View Technical Comparator</button>
        <script>
            function showComparator(){
                window.location="comparator.php";
            }
        </script>
        <?php
        }
        else if($abbsub == '1' && $schneidersub == '1'){
        ?>
        <button onclick="showComparator()">View Technical Comparator</button>
        <script>
            function showComparator(){
                window.location="comparator.php";
            }
        </script>
        <?php
        }
        else if($siemensub == '1' && $schneidersub == '1'){
        ?>
        <button id="showComparator" onclick="showComparator()">View Technical Comparator</button>
            <script>
            //openComp = document.getElementById('showComparator');
            //openComp.addEventListener('click',()=>alert('Button'));
            function showComparator(){
                window.location="comparator.php";
            }
            //showComparator();
            </script>
        <?php }
        CloseCon($conn);?>
        

    </main>
</body>

</html>