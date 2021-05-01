<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Technical Comparator</title>
  <link rel="stylesheet" href="comparator.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
</head>

<body>
<?php
include 'db_connection.php';
$conn = OpenCon();
//if($conn){echo "Connected Successfully";}
$abb1 = 0;
$schneider1 = 0;
$siemens1 = 0;
$bidder_arr = array();
//$rate1_arr = array(); //rate1 from all bidders will be placed into this array
//$rate2_arr = array();

$records = mysqli_query($conn,"select * from boq where noOfsub=1"); 
$count=mysqli_num_rows($records);
//echo $count;
while($data = mysqli_fetch_array($records))
  {
    $rate1_arr[] = $data['rate1']; 
    $rate2_arr[] = $data['rate2'];
    $rate3_arr[] = $data['rate3'];
    $rate4_arr[] = $data['rate4'];
    $cur1_arr[] = $data['cur1'];
    $cur2_arr[] = $data['cur2'];
    $amt1_arr[] = $data['amt1']; 
    $amt2_arr[] = $data['amt2']; 
    $amt3_arr[] = $data['amt3'];
    $amt4_arr[] = $data['amt4'];
    $total1_arr[] = $data['total1'];
    $total2_arr[] = $data['total2'];
    $sst2_arr[] = $data['sst2'];
    $total2withsst2_arr[] = $data['total2withsst2'];
    $week1_arr[] = $data['week1'];
    $week2_arr[] = $data['week2'];
    $week3_arr[] = $data['week3'];
    $week4_arr[] = $data['week4'];
    $weekstotal_arr[] = $data['weekstotal'];
    $per1_arr[] = $data['per1'];
    $per2_arr[] = $data['per2'];
    $per3_arr[] = $data['per3'];
    $per4_arr[] = $data['per4'];}
if($count==3){
  $abb1 = 1;
  $siemens1 = 1;
  $schneider1 = 1;
}
else if($count==2){
  //echo $count;
  $records = mysqli_query($conn,"select * from boq where noOfsub=1"); 
  while($allData = mysqli_fetch_array($records))
  {
    $bidder_arr[] = $allData['id']; 
   // echo $allData['id'];
  }
  //echo $bidder_arr[0];
  //echo $bidder_arr[1];
  if($bidder_arr[0] == 'abb1'){
    $abb1 = 1;
    if($bidder_arr[1] =='schneider1'){
      $schneider1 = 1;
      $siemens1 = 0;
    }
    else{
      $siemens1 = 1;
      $schneider1 = 0;
    }
  }
  else if($bidder_arr[0] <> 'abb1'){
    $abb1 = 0;
    $siemens1 = 1;
    $schneider1 = 1;
  }
}
//echo $abb1;
//echo $schneider1;
//echo $siemens1;

?>


<table class="Table" border=0 cellpadding=0 cellspacing=0 width=100%>
 <thead>
   <!--
  <tr style='height:15.0pt'>
    <td class=xl190 style='width:3%; background-color: aqua;'>col1</td>
    <td class=xl190 style='width:25%; background-color: blue;'>col2</td>
    <td class=xl137  style='width:3%; background-color: burlywood;'>col3</td>
    <td class=xl137 style='width:6%;background-color: cornflowerblue;'>col4</td>
    <td class=xl137 style='width:8%;background-color: darkgoldenrod;'>col5</td>
    <td class=xl138 style='width:13%;background-color: darkorchid;'>col6</td>
    <td class=xl137 style='width:8%;background-color: darkgoldenrod;'>col7</td>
    <td class=xl139 style='width:13%;background-color: darkorchid;'>col8</td>
    <td class=xl137 style='width:8%;background-color: darkgoldenrod;'>col9</td>
    <td class=xl139 style='width:13%;background-color: darkorchid;'>col10</td>
   </tr>
   -->
  <tr style='height:15.0pt'>
    <td colspan=2  class=xl190 style='height:15.0pt; white-space: nowrap; vertical-align: bottom;'>Project: 1248 - The Indus Hospital
    Expansion, Hospital Building - 2</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class=xl139 style='width:97pt; vertical-align: bottom;'>Annexure-1</td>
   </tr>
   <tr style='height:15.0pt'>
    <td colspan=10 class=xl191 style='height:30pt; font-family: "ARIAL BLACK";'>FINANCIAL
    COMPARATIVE STATEMENT</td>
   </tr>
 </thead>

 <tbody>
 <tr class="r1">
  <td rowspan=3 class="c1">ITEM NO.</td>
  <td rowspan=3 class="c2">DESCRIPTION</td>
  <td rowspan=3 class="c3">Qty</td>
  <td rowspan=3 class="c4">Unit</td>
  <td colspan=2 class="c5">ABB</td>
  <td colspan=2 class="c6">Schneider</td>
  <td colspan=2 class="c7">Siemens</td>
 </tr>
 <tr class="r2">
  <td rowspan=2 class="c1">Rate<br>( <span><?php if($abb1 == 1){echo $cur1_arr[0]; } else{echo "-";}?></span> )</td>
  <td rowspan=2 class="c2">Amount<br>( <span id="abbcur"><?php if($abb1 == 1){echo $cur2_arr[0]; } else{echo "-";}?></span> )</td>
  <td rowspan=2 class="c3">Rate<br>( <?php if($abb1 == 0 && $schneider1 == 1){echo $cur1_arr[0]; } 
  else if($abb1 == 1 && $schneider1 == 1){echo $cur1_arr[1]; } 
  else if($abb1 == 1 && $schneider1 == 0){echo "-";} ?> )</td>
  <td rowspan=2 class="c4">Amount<br>( <span id="schneidercur"><?php if($abb1 == 0 && $schneider1 == 1){echo $cur2_arr[0]; } 
  else if($abb1 == 1 && $schneider1 == 1){echo $cur2_arr[1]; } 
  else if($abb1 == 1 && $schneider1 == 0){echo "-";} ?></span> )</td>
  <td rowspan=2 class="c5">Rate<br>( <?php 
  if($siemens1 == 1){
    if($abb1 == 1){
      if($schneider1 == 1){
        echo $cur1_arr[2];
      }
      else if($schneider1 == 0){
        echo $cur1_arr[1];
      }
    }
    else if($abb1 == 0){
      echo $cur1_arr[1];
    }
  }
  else if($siemens1 == 0){
    echo "-";
  }
  ?> )</td>
  <td rowspan=2 class="c6">Amount<br>( <span id="siemenscur"><?php 
  if($siemens1 == 1){
    if($abb1 == 1){
      if($schneider1 == 1){
        echo $cur2_arr[2];
      }
      else if($schneider1 == 0){
        echo $cur2_arr[1];
      }
    }
    else if($abb1 == 0){
      echo $cur2_arr[1];
    }
  }
  else if($siemens1 == 0){
    echo "-";
  }
  ?></span> )</td>
 </tr>

 <tr>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
 </tr>

 <tr class="r3">
  <td class="c1" style="text-align: center;"><h4>A</h4></td>
  <td class="c2"> <h4>SUPPLY OF EQUIPMENT</h4></td>
  <td class="c3"></td>
  <td class="c4"></td>
  <td class="c5"></td>
  <td class="c6"></td>
  <td class="c7"></td>
  <td class="c8"></td>
  <td class="c9"></td>
  <td class="c10"></td>
 </tr>

 <tr class="r4">
  <td class="c1">
    <p class="BodyText" align=center>
      <span>
        1
      </span>
    </p>
  </td>
  <td class="c2">
    <p class="BodyText" align=left>
      <span>
      11/0.415kV dry type transformer, with 40% additional kVA with air forced cooling, Co/Bk, 50°C maximum ambient temperature with IP20 enclosure, thermal protection relays, fan controls, forced air cooling fan, 
      all accessories as follows
      </span>
    </p>
  </td>
   <td class="c3"></td>
   <td class="c4"></td>
   <td class="c5"></td>
   <td class="c6"></td>
   <td class="c7"></td>
   <td class="c8"></td>
   <td class="c9"></td>
   <td class="c10"></td>
 </tr>

 <tr class="r5">
  <td class="c1">
    <p class="BodyText" align=center>
      <span>
        a)
      </span>
    </p>
  </td>
  <td class="c2">
    <p class="BodyText" align=left>
      <span>
      1250 kVA (%Z=6%)
      </span>
    </p>
  </td>
  <td class="c3">
    <p class="BodyText" align=center>
        <span>
          1
        </span>
      </p>
  </td>
  <td class="c4">
    <p class="BodyText" align=center>
        <span>
          No.
        </span>
      </p>
  </td>
  <td class="c5">
  <p class="BodyText" align=center>
  <span><?php 
  if($abb1 == 1){echo $rate1_arr[0];} 
  else{echo('Not Submitted');}?></span></p>
  </td>
   <td class="c6">
   <p class="BodyText" align=center>
  <span><?php if($abb1 == 1){echo $amt1_arr[0]; } else{echo('Not Submitted');}?></span></p>
   </td>
   <td class="c7">
   <p class="BodyText" align=center>
  <span><?php if($abb1 == 0 && $schneider1 == 1){echo $rate1_arr[0]; } 
  else if($abb1 == 1 && $schneider1 == 1){echo $rate1_arr[1]; } 
  else if($abb1 == 1 && $schneider1 == 0){echo('Not Submitted');} ?></span></p>
  </td>
   <td class="c8">
   <p class="BodyText" align=center>
  <span><?php if($abb1 == 0 && $schneider1 == 1){echo $amt1_arr[0]; } 
  else if($abb1 == 1 && $schneider1 == 1){echo $amt1_arr[1]; } 
  else if($abb1 == 1 && $schneider1 == 0){echo('Not Submitted');} ?></span></p>
  </td>
   <td class="c9">
   <p class="BodyText" align=center>
  <span><?php 
  if($siemens1 == 1){
    if($abb1 == 1){
      if($schneider1 == 1){
        echo $rate1_arr[2];
      }
      else if($schneider1 == 0){
        echo $rate1_arr[1];
      }
    }
    else if($abb1 == 0){
      echo $rate1_arr[1];
    }
  }
  else if($siemens1 == 0){
    echo('Not Submitted');
  }
  ?></span></p></td>
   <td class="c10">
   <p class="BodyText" align=center>
  <span><?php 
    if($siemens1 == 1){
      if($abb1 == 1){
        if($schneider1 == 1){
          echo $amt1_arr[2];
        }
        else if($schneider1 == 0){
          echo $amt1_arr[1];
        }
      }
      else if($abb1 == 0){
        echo $amt1_arr[1];
      }
    }
    else if($siemens1 == 0){
      echo('Not Submitted');
    } ?></span></p></td>

 </tr>
 <tr class="r6">
  <td class="c1">
    <p class="BodyText" align=center>
      <span>
        a)
      </span>
    </p>
  </td>
  <td class="c2">
    <p class="BodyText" align=left>
      <span>
      1600 kVA (%Z=6%)
      </span>
    </p>
  </td>
  <td class="c3">
    <p class="BodyText" align=center>
        <span>
          1
        </span>
      </p>
  </td>
  <td class="c4">
    <p class="BodyText" align=center>
        <span>
          No.
        </span>
      </p>
  </td>
  <td class="c5">
  <p class="BodyText" align=center>
        <span>
        <?php if($abb1 == 1){echo $rate2_arr[0]; } else{echo('Not Submitted');} ?>
        </span>
      </p></td>
   <td class="c6">
   <p class="BodyText" align=center>
        <span>
        <?php if($abb1 == 1){echo $amt2_arr[0]; } else{echo('Not Submitted');} ?>
        </span>
      </p></td>
   <td class="c7">
   <p class="BodyText" align=center>
        <span>
        <?php 
        if($abb1 == 0 && $schneider1 == 1){echo $rate2_arr[0]; } 
        else if($abb1 == 1 && $schneider1 == 1){echo $rate2_arr[1]; } 
        else if($abb1 == 1 && $schneider1 == 0){echo('Not Submitted');} 
         ?>
        </span>
      </p></td>
   <td class="c8">
   <p class="BodyText" align=center>
        <span>
        <?php 
                if($abb1 == 0 && $schneider1 == 1){echo $amt2_arr[0]; } 
                else if($abb1 == 1 && $schneider1 == 1){echo $amt2_arr[1]; } 
                else if($abb1 == 1 && $schneider1 == 0){echo('Not Submitted');} 
         ?>
        </span>
      </p></td>
   <td class="c9">
   <p class="BodyText" align=center>
        <span>
        <?php 
        if($siemens1 == 1){
          if($abb1 == 1){
            if($schneider1 == 1){
              echo $rate2_arr[2];
            }
            else if($schneider1 == 0){
              echo $rate2_arr[1];
            }
          }
          else if($abb1 == 0){
            echo $rate2_arr[1];
          }
        }
        else if($siemens1 == 0){
          echo('Not Submitted');
        }
         ?>
        </span>
      </p></td>
   <td class="c10">
   <p class="BodyText" align=center>
        <span>
        <?php 
        if($siemens1 == 1){
          if($abb1 == 1){
            if($schneider1 == 1){
              echo $amt2_arr[2];
            }
            else if($schneider1 == 0){
              echo $amt2_arr[1];
            }
          }
          else if($abb1 == 0){
            echo $amt2_arr[1];
          }
        }
        else if($siemens1 == 0){
          echo('Not Submitted');
        }
         ?>
        </span>
      </p></td>
 </tr>

 <tr class="r7">
  <td class="c1"></td>
  <td class="c2" style="text-align: right;"><h4>Quoted Total</h4></td>
  <td class="c3"></td>
  <td class="c4"></td>
  <td class="c5"></td>
  <td class="c6">
  <p class="BodyText" align=center>
        <span id="abbTotal1">
        <?php if($abb1 == 1){echo $total1_arr[0]; } else{echo('Not Submitted');} ?>
        </span>
      </p></td>
  <td class="c7"></td>
  <td class="c8">
  <p class="BodyText" align=center>
        <span id="schneiderTotal1">
        <?php 
        if($abb1 == 0 && $schneider1 == 1){ echo $total1_arr[0];  } 
        else if($abb1 == 1 && $schneider1 == 1){ echo $total1_arr[1];  } 
        else if($abb1 == 1 && $schneider1 == 0){echo('Not Submitted');} 
       ?>
        </span>
      </p></td>
  <td class="c9"></td>
  <td class="c10">
  <p class="BodyText" align=center>
        <span id="siemensTotal1">
        <?php 
        if($siemens1 == 1){
          if($abb1 == 1){
            if($schneider1 == 1){
              echo $total1_arr[2];
            }
            else if($schneider1 == 0){
              echo $total1_arr[1];
            }
          }
          else if($abb1 == 0){
            echo $total1_arr[1];
          }
        }
        else if($siemens1 == 0){
          echo('Not Submitted');
        }
        
         ?>
        </span>
      </p></td>
 </tr>

 <tr class="r8">
  <td class="c1"></td>
  <td class="c2" style="text-align: left;"><h4>Equivalent Total in Pak Rupee for Comparative purpose-A with no Custom Duty Taxes considered<br>(Conversion Rate @ Rs.  <input id="dollarRate" size="5" onchange="dollarToPkr(this)"></input> /$)<br>and<br>(Conversion Rate @ Rs.  <input id="euroRate" size="5" onchange="euroToPkr(this)"></input> /€)</h4></td>
  <td class="c3"></td>
  <td class="c4"></td>
  <td class="c5"></td>
  <td class="c6">
  <p class="BodyText" align=center>
  <span id="abbTotal1Convert">-</span>
  </p>
  </td>
  <td class="c7"></td>
  <td class="c8">
  <p class="BodyText" align=center>
  <span id="schneiderTotal1Convert">-</span>
</p>
</td>
  <td class="c9"></td>
  <td class="c10">
  <p class="BodyText" align=center>
  <span id="siemensTotal1Convert">-</span></p>
  </td>
 </tr>

 <tr class="r9">
  <td rowspan=3 class="c1">ITEM NO.</td>
  <td rowspan=3 class="c2">DESCRIPTION</td>
  <td rowspan=3 class="c3">Qty</td>
  <td rowspan=3 class="c4">Unit</td>
  <td colspan=2 class="c5">ABB</td>
  <td colspan=2 class="c6">Schneider</td>
  <td colspan=2 class="c7">Siemens</td>
 </tr>
 <tr class="r10">
  <td rowspan=2 class="c1">Rate<br>(Pak Rs.)</td>
  <td rowspan=2 class="c2">Amount<br>(Pak Rs.)</td>
  <td rowspan=2 class="c3">Rate<br>(Pak Rs.)</td>
  <td rowspan=2 class="c4">Amount<br>(Pak Rs.)</td>
  <td rowspan=2 class="c5">Rate<br>(Pak Rs.)</td>
  <td rowspan=2 class="c6">Amount<br>(Pak Rs.)</td>
 </tr>

 <tr>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
 </tr>

 <tr class="r11">
  <td class="c1" style="text-align: center;"><h4>B</h4></td>
  <td class="c2"> <h4>DELIVERY & COMMISSIONING</h4></td>
  <td class="c3"></td>
  <td class="c4"></td>
  <td class="c5"></td>
  <td class="c6"></td>
  <td class="c7"></td>
  <td class="c8"></td>
  <td class="c9"></td>
  <td class="c10"></td>
 </tr>

 <tr class="r12">
  <td class="c1">
    <p class="BodyText" align=center>
      <span>
        a)
      </span>
    </p>
  </td>
  <td class="c2">
    <p class="BodyText" align=left>
      <span>
        Delivery at site including un-loading, lifting shifting, cranage upto roof  in LV Panel rooms and installation/coupling 
      </span>
    </p>
  </td>
   <td class="c3"></td>
   <td class="c4"></td>
   <td class="c5">
   <p class="BodyText" align=center>
      <span>
      <?php if($abb1 == 1){echo $rate3_arr[0]; } else{echo('Not Submitted');} ?>
      </span>
    </p>
    </td>
   <td class="c6">
   <p class="BodyText" align=center>
      <span>
      <?php if($abb1 == 1){echo $amt3_arr[0]; } else{echo('Not Submitted');} ?>
      </span>
    </p>
    </td>
   <td class="c7">
   <p class="BodyText" align=center>
      <span>
      <?php 
      if($abb1 == 0 && $schneider1 == 1){ echo $rate3_arr[0];   } 
      else if($abb1 == 1 && $schneider1 == 1){echo $rate3_arr[1];  } 
      else if($abb1 == 1 && $schneider1 == 0){echo('Not Submitted');} 
       ?>
      </span>
    </p></td>
   <td class="c8">
   <p class="BodyText" align=center>
      <span>
      <?php 
            if($abb1 == 0 && $schneider1 == 1){ echo $amt3_arr[0];   } 
            else if($abb1 == 1 && $schneider1 == 1){echo $amt3_arr[1];  } 
            else if($abb1 == 1 && $schneider1 == 0){echo('Not Submitted');} 
       ?>
      </span>
    </p></td>
   <td class="c9">
   <p class="BodyText" align=center>
      <span>
      <?php 
        if($siemens1 == 1){
          if($abb1 == 1){
            if($schneider1 == 1){
              echo $rate3_arr[2];
            }
            else if($schneider1 == 0){
              echo $rate3_arr[1];
            }
          }
          else if($abb1 == 0){
            echo $rate3_arr[1];
          }
        }
        else if($siemens1 == 0){
          echo('Not Submitted');
        }
       ?>
      </span>
    </p></td>
   <td class="c10">
   <p class="BodyText" align=center>
      <span>
      <?php 
        if($siemens1 == 1){
          if($abb1 == 1){
            if($schneider1 == 1){
              echo $amt3_arr[2]; 
            }
            else if($schneider1 == 0){
              echo $amt3_arr[1]; 
            }
          }
          else if($abb1 == 0){
            echo $amt3_arr[1]; 
          }
        }
        else if($siemens1 == 0){
          echo('Not Submitted');
        }
      ?>
      </span>
    </p></td>
 </tr>

 <tr class="r12b">
  <td class="c1">
    <p class="BodyText" align=center>
      <span>
        b)
      </span>
    </p>
  </td>
  <td class="c2">
    <p class="BodyText" align=left>
      <span>
      Testing & Commissioning at site 
      </span>
    </p>
  </td>
   <td class="c3"></td>
   <td class="c4"></td>
   <td class="c5">
   <p class="BodyText" align=center>
      <span>
      <?php if($abb1 == 1){echo $rate4_arr[0]; } else{echo('Not Submitted');} ?>
      </span>
    </p></td>
   <td class="c6">
   <p class="BodyText" align=center>
      <span>
      <?php if($abb1 == 1){echo $amt4_arr[0]; } else{echo('Not Submitted');} ?>
      </span>
    </p></td>
   <td class="c7">
   <p class="BodyText" align=center>
      <span>
      <?php 
      if($abb1 == 0 && $schneider1 == 1){  echo $rate4_arr[0];   } 
      else if($abb1 == 1 && $schneider1 == 1){ echo $rate4_arr[1];  } 
      else if($abb1 == 1 && $schneider1 == 0){echo('Not Submitted');} 
   ?>
      </span>
    </p></td>
   <td class="c8">
   <p class="BodyText" align=center>
      <span>
      <?php 
      if($abb1 == 0 && $schneider1 == 1){  echo $amt4_arr[0];   } 
      else if($abb1 == 1 && $schneider1 == 1){ echo $amt4_arr[1]; } 
      else if($abb1 == 1 && $schneider1 == 0){echo('Not Submitted');}
       ?>
      </span>
    </p></td>
   <td class="c9">
   <p class="BodyText" align=center>
      <span>
      <?php 
              if($siemens1 == 1){
                if($abb1 == 1){
                  if($schneider1 == 1){
                    echo $rate4_arr[2]; 
                  }
                  else if($schneider1 == 0){
                    echo $rate4_arr[1];
                  }
                }
                else if($abb1 == 0){
                  echo $rate4_arr[1];
                }
              }
              else if($siemens1 == 0){
                echo('Not Submitted');
              }
       ?>
      </span>
    </p></td>
   <td class="c10">
   <p class="BodyText" align=center>
      <span>
      <?php 
              if($siemens1 == 1){
                if($abb1 == 1){
                  if($schneider1 == 1){
                    echo $amt4_arr[2]; 
                  }
                  else if($schneider1 == 0){
                    echo $amt4_arr[1]; 
                  }
                }
                else if($abb1 == 0){
                  echo $amt4_arr[1];  
                }
              }
              else if($siemens1 == 0){
                echo('Not Submitted');
              }
      ?>
      </span>
    </p></td>
 </tr>

 <tr class="r13">
  <td class="c1"></td>
  <td class="c2" style="text-align: right;"><h4>Sub-Total-B (Pak Rs.)</h4></td>
  <td class="c3"></td>
  <td class="c4"></td>
  <td class="c5"></td>
  <td class="c6">
  <p class="BodyText" align=center>
      <span>
      <?php if($abb1 == 1){echo $total2_arr[0]; } else{echo('Not Submitted');} ?>
      </span>
    </p></td>
  <td class="c7"></td>
  <td class="c8">
  <p class="BodyText" align=center>
      <span>
      <?php 
      if($abb1 == 0 && $schneider1 == 1){  echo $total2_arr[0];  } 
      else if($abb1 == 1 && $schneider1 == 1){ echo $total2_arr[1]; } 
      else if($abb1 == 1 && $schneider1 == 0){echo('Not Submitted');}
       ?>
      </span>
    </p></td>
  <td class="c9"></td>
  <td class="c10">
  <p class="BodyText" align=center>
      <span>
      <?php 
      if($siemens1 == 1){
        if($abb1 == 1){
          if($schneider1 == 1){
            echo $total2_arr[2]; 
          }
          else if($schneider1 == 0){
            echo $total2_arr[1]; 
          }
        }
        else if($abb1 == 0){
          echo $total2_arr[1];   
        }
      }
      else if($siemens1 == 0){
        echo('Not Submitted');
      }
      ?>
      </span>
    </p></td>
 </tr>
 <tr class="r14">
  <td class="c1"></td>
  <td class="c2" style="text-align: right;"><h4>SST @ 13% on Services</h4></td>
  <td class="c3"></td>
  <td class="c4"></td>
  <td class="c5"></td>
  <td class="c6">
  <p class="BodyText" align=center>
      <span>
      <?php if($abb1 == 1){echo $sst2_arr[0]; } else{echo('Not Submitted');} ?>
      </span>
    </p></td>
  <td class="c7"></td>
  <td class="c8">
  <p class="BodyText" align=center>
      <span>
      <?php 
      if($abb1 == 0 && $schneider1 == 1){  echo $sst2_arr[0];   } 
      else if($abb1 == 1 && $schneider1 == 1){ echo $sst2_arr[1];  } 
      else if($abb1 == 1 && $schneider1 == 0){echo('Not Submitted');}
      ?>
      </span>
    </p></td>
  <td class="c9"></td>
  <td class="c10">
  <p class="BodyText" align=center>
      <span>
      <?php 
            if($siemens1 == 1){
              if($abb1 == 1){
                if($schneider1 == 1){
                  echo $sst2_arr[2]; 
                }
                else if($schneider1 == 0){
                  echo $sst2_arr[1];
                }
              }
              else if($abb1 == 0){
                echo $sst2_arr[1];
              }
            }
            else if($siemens1 == 0){
              echo('Not Submitted');
            }
      ?>
      </span>
    </p></td>
 </tr>
 <tr class="r15">
  <td class="c1"></td>
  <td class="c2" style="text-align: right;"><h4>Sub-Total-B with SST</h4></td>
  <td class="c3"></td>
  <td class="c4"></td>
  <td class="c5"></td>
  <td class="c6">
  <p class="BodyText" align=center>
      <span id="abbTotal2">
      <?php if($abb1 == 1){echo $total2withsst2_arr[0]; } else{echo('Not Submitted');} ?>
      </span>
    </p></td>
  <td class="c7"></td>
  <td class="c8">
  <p class="BodyText" align=center>
      <span id="schneiderTotal2">
      <?php 
      if($abb1 == 0 && $schneider1 == 1){  echo $total2withsst2_arr[0];  } 
      else if($abb1 == 1 && $schneider1 == 1){ echo $total2withsst2_arr[1];  } 
      else if($abb1 == 1 && $schneider1 == 0){echo('Not Submitted');}
       ?>
      </span>
    </p></td>
  <td class="c9"></td>
  <td class="c10">
  <p class="BodyText" align=center>
      <span id="siemensTotal2">
      <?php 
                  if($siemens1 == 1){
                    if($abb1 == 1){
                      if($schneider1 == 1){
                        echo $total2withsst2_arr[2]; 
                      }
                      else if($schneider1 == 0){
                        echo $total2withsst2_arr[1];
                      }
                    }
                    else if($abb1 == 0){
                      echo $total2withsst2_arr[1];
                    }
                  }
                  else if($siemens1 == 0){
                    echo('Not Submitted');
                  }
       ?>
      </span>
    </p></td>
 </tr>
 <tr class="r16">
  <td class="c1"></td>
  <td class="c2" style="text-align: right;"><h4>Equivalent grand total (A + B) for comparision purpose</h4></td>
  <td class="c3"></td>
  <td class="c4"></td>
  <td class="c5"></td>
  <td class="c6">
  <p class="BodyText" align=center>
  <span id="abbGTotal">-</span></p></td>
  <td class="c7"></td>
  <td class="c8">
  <p class="BodyText" align=center>
  <span id="schneiderGTotal">-</span>
  </p></td>
  <td class="c9"></td>
  <td class="c10">
  <p class="BodyText" align=center>
  <span id="siemensGTotal">-</span>
  </p></td>
 </tr>
 <tr class="r17">
  <td class="c1" style="text-align: center;"><h4>C</h4></td>
  <td class="c2"> <h4>DELIVERY SCHEDULE (Supplier must fill in required data)</h4></td>
  <td class="c3"></td>
  <td class="c4"></td>
  <td class="c5"></td>
  <td class="c6"></td>
  <td class="c7"></td>
  <td class="c8"></td>
  <td class="c9"></td>
  <td class="c10"></td>
 </tr>
 <tr class="r18">
  <td class="c1">
    <p class="BodyText" align=center>
      <span>
        1
      </span>
    </p>
  </td>
  <td class="c2">
    <p class="BodyText" align=left>
      <span>
        Shop Drawings
      </span>
    </p>
  </td>
  <td class="c3">
  </td>
  <td class="c4">
    <p class="BodyText" align=center>
        <span>
         Weeks
        </span>
      </p>
  </td>
  <td class="c5">
  <p class="BodyText" align=center>
      <span>
      <?php if($abb1 == 1){echo $week1_arr[0];} else{echo('Not Submitted');} ?>
      </span>
    </p></td>
   <td class="c6">
     <p class="BodyText" align=center>
        <span>
         Weeks
        </span>
      </p>
    </td>
   <td class="c7">
   <p class="BodyText" align=center>
      <span>
      <?php 
      if($abb1 == 0 && $schneider1 == 1){ echo $week1_arr[0];  } 
      else if($abb1 == 1 && $schneider1 == 1){ echo $week1_arr[1];  } 
      else if($abb1 == 1 && $schneider1 == 0){echo('Not Submitted');}
       ?>
      </span>
    </p></td>
   <td class="c8">
   <p class="BodyText" align=center>
        <span>
         Weeks
        </span>
      </p>
    </td>
   </td>
   <td class="c9">
   <p class="BodyText" align=center>
      <span>
      <?php 
      if($siemens1 == 1){
        if($abb1 == 1){
          if($schneider1 == 1){
            echo $week1_arr[2];
          }
          else if($schneider1 == 0){
            echo $week1_arr[1];
          }
        }
        else if($abb1 == 0){
          echo $week1_arr[1];
        }
      }
      else if($siemens1 == 0){
        echo('Not Submitted');
      }
       ?>
      </span>
    </p></td>
   <td class="c10">
   <p class="BodyText" align=center>
        <span>
         Weeks
        </span>
      </p>
    </td>
   </td>

 </tr>
 <tr class="r19">
  <td class="c1">
    <p class="BodyText" align=center>
      <span>
        2
      </span>
    </p>
  </td>
  <td class="c2">
    <p class="BodyText" align=left>
      <span>
      Manufacturing
      </span>
    </p>
  </td>
  <td class="c3">
  </td>
  <td class="c4">
    <p class="BodyText" align=center>
        <span>
          Weeks
        </span>
      </p>
  </td>
  <td class="c5">
  <p class="BodyText" align=center>
        <span>
        <?php if($abb1 == 1){echo $week2_arr[0]; } else{echo('Not Submitted');}?>
        </span>
      </p></td>
   <td class="c6">
     <p class="BodyText" align=center>
        <span>
         Weeks
        </span>
      </p>
    </td>
   <td class="c7">
   <p class="BodyText" align=center>
        <span>
        <?php 
        if($abb1 == 0 && $schneider1 == 1){ echo $week2_arr[0];  } 
        else if($abb1 == 1 && $schneider1 == 1){ echo $week2_arr[1]; } 
        else if($abb1 == 1 && $schneider1 == 0){echo('Not Submitted');}
         ?>
        </span>
      </p></td>
   <td class="c8">
   <p class="BodyText" align=center>
        <span>
         Weeks
        </span>
      </p>
    </td>
   </td>
   <td class="c9">
   <p class="BodyText" align=center>
        <span>
        <?php 
        if($siemens1 == 1){
          if($abb1 == 1){
            if($schneider1 == 1){
              echo $week2_arr[2];
            }
            else if($schneider1 == 0){
              echo $week2_arr[1];
            }
          }
          else if($abb1 == 0){
            echo $week2_arr[1];
          }
        }
        else if($siemens1 == 0){
          echo('Not Submitted');
        }
         ?>
        </span>
      </p></td>
   <td class="c10">
   <p class="BodyText" align=center>
        <span>
         Weeks
        </span>
      </p>
    </td>
   </td>
 </tr>
 <tr class="r20">
  <td class="c1">
    <p class="BodyText" align=center>
      <span>
        3
      </span>
    </p>
  </td>
  <td class="c2">
    <p class="BodyText" align=left>
      <span>
        Factory Testing & dispatch
      </span>
    </p>
  </td>
  <td class="c3">
  </td>
  <td class="c4">
    <p class="BodyText" align=center>
        <span>
          Weeks
        </span>
      </p>
  </td>
  <td class="c5">
  <p class="BodyText" align=center>
        <span>
        <?php if($abb1 == 1){echo $week3_arr[0];} else{echo('Not Submitted');} ?>
        </span>
      </p></td>
   <td class="c6">
     <p class="BodyText" align=center>
        <span>
         Weeks
        </span>
      </p>
    </td>
   <td class="c7">
   <p class="BodyText" align=center>
        <span>
        <?php 
        if($abb1 == 0 && $schneider1 == 1){ echo $week3_arr[0]; } 
        else if($abb1 == 1 && $schneider1 == 1){ echo $week3_arr[1]; } 
        else if($abb1 == 1 && $schneider1 == 0){echo('Not Submitted');}
         ?>
        </span>
      </p></td>
   <td class="c8">
   <p class="BodyText" align=center>
        <span>
         Weeks
        </span>
      </p>
    </td>
   </td>
   <td class="c9">
   <p class="BodyText" align=center>
        <span>
        <?php 
        if($siemens1 == 1){
          if($abb1 == 1){
            if($schneider1 == 1){
              echo $week3_arr[2];
            }
            else if($schneider1 == 0){
              echo $week3_arr[1];
            }
          }
          else if($abb1 == 0){
            echo $week3_arr[1];
          }
        }
        else if($siemens1 == 0){
          echo('Not Submitted');
        }
         ?>
        </span>
      </p></td>
   <td class="c10">
   <p class="BodyText" align=center>
        <span>
         Weeks
        </span>
      </p>
    </td>
   </td>

 </tr>
 <tr class="r21">
  <td class="c1">
    <p class="BodyText" align=center>
      <span>
        4
      </span>
    </p>
  </td>
  <td class="c2">
    <p class="BodyText" align=left>
      <span>
      Delivery at site
      </span>
    </p>
  </td>
  <td class="c3">
  </td>
  <td class="c4">
    <p class="BodyText" align=center>
        <span>
          Weeks
        </span>
      </p>
  </td>
  <td class="c5">
  <p class="BodyText" align=center>
        <span>
        <?php if($abb1 == 1){echo $week4_arr[0];} else{echo('Not Submitted');} ?>
        </span>
      </p></td>
   <td class="c6">
     <p class="BodyText" align=center>
        <span>
         Weeks
        </span>
      </p>
    </td>
   <td class="c7">
   <p class="BodyText" align=center>
        <span>
        <?php 
        if($abb1 == 0 && $schneider1 == 1){ echo $week4_arr[0];} 
        else if($abb1 == 1 && $schneider1 == 1){ echo $week4_arr[1]; } 
        else if($abb1 == 1 && $schneider1 == 0){echo('Not Submitted');}
         ?>
        </span>
      </p></td>
   <td class="c8">
   <p class="BodyText" align=center>
        <span>
         Weeks
        </span>
      </p>
    </td>
   </td>
   <td class="c9">
   <p class="BodyText" align=center>
        <span>
        <?php 
        if($siemens1 == 1){
          if($abb1 == 1){
            if($schneider1 == 1){
              echo $week4_arr[2];
            }
            else if($schneider1 == 0){
              echo $week4_arr[1];
            }
          }
          else if($abb1 == 0){
            echo $week4_arr[1];
          }
        }
        else if($siemens1 == 0){
          echo('Not Submitted');
        }
         ?>
        </span>
      </p></td>
   <td class="c10">
   <p class="BodyText" align=center>
        <span>
         Weeks
        </span>
      </p>
    </td>
   </td>
 </tr>
 <tr class="r22">
  <td class="c1"></td>
  <td class="c2" style="text-align: right;"><h4>Total</h4></td>
  <td class="c3"></td>
  <td class="c4">
    <p class="BodyText" align=center>
      <span>
        Weeks
      </span>
    </p>
  </td>
  <td class="c5">
  <p class="BodyText" align=center>
        <span>
        <?php if($abb1 == 1){echo $weekstotal_arr[0]; } else{echo('Not Submitted');}?>
        </span>
      </p></td>
   <td class="c6">
     <p class="BodyText" align=center>
        <span>
         Weeks
        </span>
      </p>
    </td>
   <td class="c7">
   <p class="BodyText" align=center>
        <span>
        <?php 
        if($abb1 == 0 && $schneider1 == 1){ echo $weekstotal_arr[0]; } 
        else if($abb1 == 1 && $schneider1 == 1){ echo $weekstotal_arr[1];  } 
        else if($abb1 == 1 && $schneider1 == 0){echo('Not Submitted');}
        ?>
        </span>
      </p></td>
   <td class="c8">
   <p class="BodyText" align=center>
        <span>
         Weeks
        </span>
      </p>
    </td>
   </td>
   <td class="c9">
   <p class="BodyText" align=center>
        <span>
        <?php 
        if($siemens1 == 1){
          if($abb1 == 1){
            if($schneider1 == 1){
              echo $weekstotal_arr[2];
            }
            else if($schneider1 == 0){
              echo $weekstotal_arr[1];
            }
          }
          else if($abb1 == 0){
            echo $weekstotal_arr[1];
          }
        }
        else if($siemens1 == 0){
          echo('Not Submitted');
        }
        ?>
        </span>
      </p></td>
   <td class="c10">
   <p class="BodyText" align=center>
        <span>
         Weeks
        </span>
      </p>
    </td>
   </td>
 </tr>
 <tr class="r23">
  <td class="c1" style="text-align: center;"><h4>D</h4></td>
  <td class="c2"> <h4>PAYMENT TERMS</h4></td>
  <td class="c3"></td>
  <td class="c4"></td>
  <td class="c5"></td>
  <td class="c6"></td>
  <td class="c7"></td>
  <td class="c8"></td>
  <td class="c9"></td>
  <td class="c10"></td>
 </tr>
 <tr class="r24">
  <td class="c1">
    <p class="BodyText" align=center>
      <span>
        1
      </span>
    </p>
  </td>
  <td class="c2">
    <p class="BodyText" align=left>
      <span>
        Advance
      </span>
    </p>
  </td>
  <td class="c3">
  </td>
  <td class="c4">
    <p class="BodyText" align=center>
        <span>
         %
        </span>
      </p>
  </td>
  <td class="c5">
  <p class="BodyText" align=center>
        <span>
        <?php if($abb1 == 1){echo $per1_arr[0];} else{echo('Not Submitted');} ?>
        </span>
      </p></td>
   <td class="c6">    
     <p class="BodyText" align=center>
        <span>
         %
        </span>
      </p>
    </td>
   <td class="c7">
   <p class="BodyText" align=center>
        <span>
        <?php 
        if($abb1 == 0 && $schneider1 == 1){ echo $per1_arr[0]; } 
        else if($abb1 == 1 && $schneider1 == 1){ echo $per1_arr[1];  } 
        else if($abb1 == 1 && $schneider1 == 0){echo('Not Submitted');}
         ?>
        </span>
      </p></td>
   <td class="c8">
   <p class="BodyText" align=center>
        <span>
         %
        </span>
      </p>
   </td>
   <td class="c9">
   <p class="BodyText" align=center>
        <span>
        <?php 
        if($siemens1 == 1){
          if($abb1 == 1){
            if($schneider1 == 1){
              echo $weekstotal_arr[2];
            }
            else if($schneider1 == 0){
              echo $weekstotal_arr[1];
            }
          }
          else if($abb1 == 0){
            echo $weekstotal_arr[1];
          }
        }
        else if($siemens1 == 0){
          echo('Not Submitted');
        }
         ?>
        </span>
      </p></td>
   <td class="c10">
   <p class="BodyText" align=center>
        <span>
         %
        </span>
      </p>
   </td>

 </tr>
 <tr class="r25">
  <td class="c1">
    <p class="BodyText" align=center>
      <span>
        2
      </span>
    </p>
  </td>
  <td class="c2">
    <p class="BodyText" align=left>
      <span>
        On delivery at site
      </span>
    </p>
  </td>
  <td class="c3">
  </td>
  <td class="c4">
    <p class="BodyText" align=center>
        <span>
          %
        </span>
      </p>
  </td>
  <td class="c5"><p class="BodyText" align=center>
        <span>
        <?php if($abb1 == 1){echo $per2_arr[0];} else{echo('Not Submitted');} ?>
        </span>
      </p></td>
   <td class="c6">    
     <p class="BodyText" align=center>
        <span>
         %
        </span>
      </p>
    </td>
   <td class="c7"><p class="BodyText" align=center>
        <span>
        <?php 
        if($abb1 == 0 && $schneider1 == 1){ echo $per2_arr[0];} 
        else if($abb1 == 1 && $schneider1 == 1){ echo $per2_arr[1];  } 
        else if($abb1 == 1 && $schneider1 == 0){echo('Not Submitted');}
         ?>
        </span>
      </p></td>
   <td class="c8">
   <p class="BodyText" align=center>
        <span>
         %
        </span>
      </p>
   </td>
   <td class="c9"><p class="BodyText" align=center>
        <span>
        <?php 
        if($siemens1 == 1){
          if($abb1 == 1){
            if($schneider1 == 1){
              echo $per2_arr[2];
            }
            else if($schneider1 == 0){
              echo $per2_arr[1];
            }
          }
          else if($abb1 == 0){
            echo $per2_arr[1];
          }
        }
        else if($siemens1 == 0){
          echo('Not Submitted');
        }
         ?>
        </span>
      </p></td>
   <td class="c10">
   <p class="BodyText" align=center>
        <span>
         %
        </span>
      </p>
   </td>
 </tr>
 <tr class="r26">
  <td class="c1">
    <p class="BodyText" align=center>
      <span>
        3
      </span>
    </p>
  </td>
  <td class="c2">
    <p class="BodyText" align=left>
      <span>
        After testing & commissioning
      </span>
    </p>
  </td>
  <td class="c3">
  </td>
  <td class="c4">
    <p class="BodyText" align=center>
        <span>
          %
        </span>
      </p>
  </td>
  <td class="c5">
  <p class="BodyText" align=center>
        <span>
        <?php if($abb1 == 1){echo $per3_arr[0];} else{echo('Not Submitted');} ?>
        </span>
      </p></td>
   <td class="c6">    
     <p class="BodyText" align=center>
        <span>
         %
        </span>
      </p>
    </td>
   <td class="c7">
   <p class="BodyText" align=center>
        <span>
        <?php 
        if($abb1 == 0 && $schneider1 == 1){ echo $per3_arr[0];} 
        else if($abb1 == 1 && $schneider1 == 1){ echo $per3_arr[1];  } 
        else if($abb1 == 1 && $schneider1 == 0){echo('Not Submitted');}
         ?>
        </span>
      </p></td>
   <td class="c8">
   <p class="BodyText" align=center>
        <span>
         %
        </span>
      </p>
   </td>
   <td class="c9">
   <p class="BodyText" align=center>
        <span>
        <?php 
        if($siemens1 == 1){
          if($abb1 == 1){
            if($schneider1 == 1){
              echo $per3_arr[2];
            }
            else if($schneider1 == 0){
              echo $per3_arr[1];
            }
          }
          else if($abb1 == 0){
            echo $per3_arr[1];
          }
        }
        else if($siemens1 == 0){
          echo('Not Submitted');
        }
         ?>
        </span>
      </p></td>
   <td class="c10">
   <p class="BodyText" align=center>
        <span>
         %
        </span>
      </p>
   </td>

 </tr>
 <tr class="r27">
  <td class="c1">
    <p class="BodyText" align=center>
      <span>
        4
      </span>
    </p>
  </td>
  <td class="c2">
    <p class="BodyText" align=left>
      <span>
        After one year warranty period
      </span>
    </p>
  </td>
  <td class="c3">
  </td>
  <td class="c4">
    <p class="BodyText" align=center>
        <span>
          %
        </span>
      </p>
  </td>
  <td class="c5">
  <p class="BodyText" align=center>
        <span>
        <?php if($abb1 == 1){echo $per4_arr[0];} else{echo('Not Submitted');} ?>
        </span>
      </p></td>
   <td class="c6">    
     <p class="BodyText" align=center>
        <span>
         %
        </span>
      </p>
    </td>
   <td class="c7">
   <p class="BodyText" align=center>
        <span>
        <?php 
        if($abb1 == 0 && $schneider1 == 1){ echo $per4_arr[0];} 
        else if($abb1 == 1 && $schneider1 == 1){ echo $per4_arr[1];  } 
        else if($abb1 == 1 && $schneider1 == 0){echo('Not Submitted');}
         ?>
        </span>
      </p></td>
   <td class="c8">
   <p class="BodyText" align=center>
        <span>
         %
        </span>
      </p>
   </td>
   <td class="c9">
   <p class="BodyText" align=center>
        <span>
        <?php 
        if($siemens1 == 1){
          if($abb1 == 1){
            if($schneider1 == 1){
              echo $per4_arr[2];
            }
            else if($schneider1 == 0){
              echo $per4_arr[1];
            }
          }
          else if($abb1 == 0){
            echo $per4_arr[1];
          }
        }
        else if($siemens1 == 0){
          echo('Not Submitted');
        }
        ; ?>
        </span>
      </p></td>
   <td class="c10">
   <p class="BodyText" align=center>
        <span>
         %
        </span>
      </p>
   </td>
 </tr>
</tbody>
</table>

</body>

<script src="./comparator.js"></script>

</html>
