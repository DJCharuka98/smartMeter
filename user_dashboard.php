<?php
session_start();

//$_SESSION["Elecaccount_no"]="144444";
//$_SESSION["wateraccount_no"]="144444";
 ?>
 <?php
 $query="SELECT account FROM users WHERE NIC=:nic";
 $dceb=new PDO('mysql:host=localhost;dbname=ceb','root','');
 $dceb->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $sth=$dceb->prepare($query);
 $sth->execute(['nic'=>$_SESSION['NIC']]);
 foreach($sth as $record){}
 $elecacc=$record["account"];
 $query="SELECT account FROM users WHERE NIC=:nic";
 $dw=new PDO('mysql:host=localhost;dbname=cwb','root','');
 $dw->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $sth=$dw->prepare($query);
 $sth->execute(['nic'=>$_SESSION['NIC']]);
 foreach($sth as $record){}
 $wateracc=$record["account"];


  ?>
<?php
if(isset($_POST['elec_sub']))
{
  $_SESSION["Elecaccount_no"]=$_POST['Elecaccount_no'];
}
if(isset($_POST['water_submit']))
{
  $_SESSION["wateraccount_no"]=$_POST['wateraccount_no'];
}




 ?>

 <?php
 $connection=mysqli_connect('localhost','root','','userdb');
$f="UPDATE elec_usage SET current_usage=voltage*current";
$result=mysqli_query($connection,$f);

  ?>
  <?php
  $connection=mysqli_connect('localhost','root','','water_userdb');
 $f="UPDATE water_usage SET units=volume/100";
 $result=mysqli_query($connection,$f);

   ?>
 <?php
if(isset($_SESSION['Elecaccount_no']))
{
 $acc=$_SESSION['Elecaccount_no'];
 $query="SELECT * FROM elec_usage WHERE account_no=:name";
 $dbh=new PDO('mysql:host=localhost;dbname=userdb','root','');
 $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $sth=$dbh->prepare($query);
 $sth->execute(['name'=>$acc]);
$current_flow=0;
 $chart_data = '';
 foreach($sth as $record)
 {
  $chart_data .= "{ time:'".$record["time"]."', current_usage:".$record["current_usage"]."}, ";
  $current_flow+=$record["current_usage"];
 }
 $chart_data = substr($chart_data, 0, -2);
$current_units=0.00000028*$current_flow;
}
 ?>
 <?php
if(isset($_SESSION['wateraccount_no']))
{
 $ac=$_SESSION['wateraccount_no'];
 $q="SELECT * FROM water_usage WHERE account_no=:name";

 $db=new PDO('mysql:host=localhost;dbname=water_userdb','root','');
 $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $st=$db->prepare($q);
 $st->execute(['name'=>$ac]);
 $water_unit=0;
 $chart_data_water_flow = '';
 $chart_data_water_volume = '';
 foreach($st as $record)
 {
  $chart_data_water_flow .= "{ time:'".$record["time"]."', flow_rate:".$record["flow_rate"]."}, ";
  $water_unit+=$record["units"];
  $chart_data_water_volume .= "{ time:'".$record["time"]."', units:".$record["units"]."}, ";

 }
 $chart_data_water_flow = substr($chart_data_water_flow, 0, -2);
 $chart_data_water_volume= substr($chart_data_water_volume, 0, -2);
}


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  </head>
  <style media="screen">
  @media only screen and (min-width:992px)
  {
    #mobilenav{
      display:none;
    }
  }
  @media only screen and (max-width:992px)
  {
    #webdash{
      display:none;
    }
  }
  @media only screen and (max-width:992px)
  {
    #webmenu{
      display:none;
    }
  }
  .dashboard{
    color:#0080ff;
  }
  #mobilenav .nav-item{
    font-family:Arial;
    font-weight:bold;

  }
  .item{
   padding:3px;
   color:white;
   text-align: left;

  }
  .item:hover{
    background-color:#0F1626;
  }
  .item.active{
    background-color:#0F1626;
  }

  #mobilenav .nav-item.active{
    background-color:#96858F;
  }
  #mobilenav .nav-link:hover{
background-color:#96858F;
border-radius:3px;
font-weight:bold;

  }
  </style>
  <body>

       <div id="mobilenav">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="col-6">
            <a class="navbar-brand" href="#">SmartMeter<h5 class="dashboard" style="color:#D8C3A5;margin:0"><i class="fas fa-tachometer-alt"></i> Dashboard</h5></a>

        </div>

        <div class="col-6">

                  <button  style="float:right;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
        </div>
        <div class="col-12">
          <p style="color:#D8C3A5; margin:0px"><?php echo $_SESSION['username'] ?></p>
          <p style="color:#D8C3A5"><?php echo $_SESSION['email'] ?></p>
        </div>


        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
          <ul class="navbar-nav ">

                        <li class="nav-item text-center active">
                        <a class="nav-link" href=""><i class="fa fa-home"></i>  Home</a>
                        </li>
                        <li class="nav-item text-center">
                          <a class="nav-link" href=""><i class="fas fa-bolt"></i>  Electricity</a>
                        </li>
                        <li class="nav-item text-center">
                          <a class="nav-link" href="."><i class="fas fa-faucet"></i>  Water</a>
                        </li>
                        <li class="nav-item text-center">
                          <a class="nav-link" href="."><i class="fas fa-sign-out-alt"></i>  Logout</a>
                        </li>

                   </ul>
                  </div>
                  </nav>

                 </div>
    <!-------------->
    <div id="webdash">

              <nav class="navbar navbar-dark" style="background-color:#494E68">
                <div class="col-2">
                    <a href="" class="navbar-brand lead">SmartMeter</a>
                    <br>
                </div>
                <a href="" class="navbar-brand lead" style="color:#E9E7DA"><i class="fas fa-tachometer-alt"></i>  Dashboard</a>
                <ul class="navbar-nav">
                  <li class="nav-item lead" style="color:white;">

                     <button type="button" class="btn bg-transparent" style="width:50px;color:white">
                      <i class="far fa-calendar-alt"></i>
                    </button>
                    <button data-toggle="modal" data-target="#notify" type="button" class="btn bg-transparent" style="width:50px;color:white">
                      <i class="fas fa-bell"></i>
                    </button>
                    <button data-toggle="modal" data-target="#logout" type="button" class="btn bg-transparent" style="width:50px;color:white">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>

                  </li>
                </ul>

              </nav>

 </div>
            <div class="row" class="menu" style="">
              <div class="col-2" style="height:auto; background-color:#192231" id="webmenu">

             <div class="modal" tabindex=-1 role="dialog" id="pp">
               <div class="modal-dialog" role="document">
                 <div class="modal-content bg-dark lead" style="color:white;width:300px;height:500px">
                   <div class="modal-header">
                     <h5>Profile</h5>
                   </div>
                   <div class="modal-body">
                    <img src="charuka.jpg" alt="" style="width:100px; height:100px;border-radius:50%;">
                    <h5><?php echo $_SESSION['username'] ?></h5>
                    <h5><?php echo $_SESSION['email'] ?></h5>
                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                   </div>
                 </div>
               </div>
             </div>

             <div class="modal" tabindex=-1 role="dialog" id="logout">
               <div class="modal-dialog" role="document" style="float:right">
                 <div class="modal-content lead" style="">
                   <div class="modal-header">
                     <h5>Logout</h5>
                   </div>
                   <div class="modal-body text-center">
                     <p class="lead col-12">
                       Are you sure you want to logout?
                     </p>
                     <div class="col-12">

                       <form class="" action="./first_page.html" method="post">
                         <button type="button" class="btn btn-secondary"  data-dismiss="modal">No, Cancel</button>
                          <input type="submit" class="btn btn-danger" value="Yes, Logout"/>
                       </form>

                     </div>

                   </div>

                 </div>
               </div>
             </div>
             <div class="modal" tabindex=-1 role="dialog" id="notify">
               <div class="modal-dialog" role="document" style="float:right">
                 <div class="modal-content lead" style="width:200px;height:400px">
                   <div class="modal-header">
                     <h5>Notifications</h5>
                   </div>
                   <div class="modal-body">
                   </div>
                 </div>
               </div>
             </div>


             <div class="col-12 admindet lead">
               <br>

                <img data-toggle="modal" data-target="#pp" type="button" class="mx-auto d-block" src="charuka.jpg" alt="" style="width:50px; height:50px;border-radius:50%;">
               <br>
              </div>

                <nav>
                  <div class="col-12 item active">
                    <a href="" class="nav-link" style="color:white"><i class="fa fa-home"></i> Home</a>
                  </div>
                  <div class="col-12 item">
                      <a href="" class="nav-link" style="color:white"><i class="fas fa-bolt"></i> Electricity </a>
                  </div>
                  <div class="col-12 item">
                    <a href="" class="nav-link" style="color:white"><i class="fas fa-faucet"></i> Water </a>
                  </div>

                </nav>
                <br>
              </div>
              <div class="col-12 col-md-10">
                <div class="row">

  <div class="card col-11" style="margin:20px">
  <div class="card-header">
  <h5 class="card-title">Realtime Electricity Usage</h5>
  <p class="card-title lead"><?php if(isset($current_units)){echo "Total Usage(kWh) :".$current_units." units"; }
     else{
       '<br>';
       echo '<div  class="alert alert-info alert-dismissible fade show" role="alert">',"Have you not added your CEB Account details yet?",
       '<button type="button" class="close" data-dismiss="alert" area-label="true">',
       '<span area-hidden="true">&times</span>','</button>','<br>',
       '<a href="#"  data-toggle="modal" data-target="#exampleModalMoreContent" class="alert-link">',"Add them Here",'</a>','</div>';
     }
   ?></p>
  </div>
  <div class="card-body">

    <div id="chart">
      <script>
      Morris.Area({
       element : 'chart',
       data:[<?php echo $chart_data; ?>],
       xkey:'time',
       ykeys:['current_usage'],
       labels:['current_usage'],
       hideHover:'auto',
       stacked:true,
       resize:true,
       behaveLikeLine:true
      });
      </script>

    </div>


  </div>
</div>
</div>
<!-------------------------------------------------------------->
<div class="modal fade" tabindex="-1" id="exampleModalMoreContent" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Your CEB Account Number</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Modal Body -->
				<form class="" action="" method="post">
				  <div class="form-group">
				    <label for="NIC">NIC</label>
				    <input readonly class="form-control" id="NIC" value=<?php echo $_SESSION['NIC'] ?>>
				  </div>
				  <div class="form-group">
				    <label for="Acc">Account No</label>
				    <input aria-describedby="Help" class="form-control" id="Acc" placeholder="Account No" name="Elecaccount_no" value=<?php echo $elecacc ?> readonly>
            <small id="Help" class="form-text text-muted">CEB Account number relavent to NIC</small>
				  </div>
				  <div class="form-group form-check">
				    <input type="checkbox" class="form-check-input" id="exampleCheck1">
				    <label class="form-check-label" for="exampleCheck1">Check me out</label>
				  </div>
				  <button type="submit" class="btn btn-primary" name="elec_sub">Submit</button>
				</form>
      </div>
    </div>
  </div>
</div>
<!------------------->
<!-------------------------------------------------------------->
<div class="modal fade" tabindex="-1" id="exampleModalwater" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Your CWB Account Number</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Modal Body -->
				<form class="" action="" method="post">
				  <div class="form-group">
				    <label for="NIC">NIC</label>
				    <input readonly class="form-control" id="NIC" value=<?php echo $_SESSION['NIC'] ?>>
				  </div>
				  <div class="form-group">
				    <label for="Acc">Account No</label>
				    <input aria-describedby="Help" class="form-control" id="Acc" placeholder="Account No" name="wateraccount_no" value=<?php echo $wateracc ?> readonly>
            <small id="Help" class="form-text text-muted"> CWB Account number relavent to NIC</small>
				  </div>
				  <div class="form-group form-check">
				    <input type="checkbox" class="form-check-input" id="exampleCheck1">
				    <label class="form-check-label" for="exampleCheck1">Check me out</label>
				  </div>
				  <button type="submit" class="btn btn-primary" name="water_submit">Submit</button>
				</form>
      </div>
    </div>
  </div>
</div>
<!------------------->
<div class="row">
<div class="card col-11" style="margin:20px">
<div class="card-header">
<h5 class="card-title">Realtime Water Usage(Flow rate)</h5>

</div>
<div class="card-body">

  <div id="chart_water">
    <script>
    Morris.Area({
     element : 'chart_water',
     data:[<?php echo $chart_data_water_flow; ?>],
     xkey:'time',
     ykeys:['flow_rate'],
     labels:['flow_rate'],

     hideHover:'auto',
     stacked:true,
     resize:true
    });
    </script>

  </div>


</div>

</div>
<div class="card col-11" style="margin:20px">
<div class="card-header">
<h5 class="card-title">Realtime Water Usage of units</h5>
<p class="card-title lead"><?php if(isset($water_unit)){echo "Total Usage :".$water_unit." units"; }
else{
  '<br>';
  echo '<div  class="alert alert-info alert-dismissible fade show" role="alert">',"Have you not added your CWB Account details yet?",
  '<button type="button" class="close" data-dismiss="alert" area-label="true">',
  '<span area-hidden="true">&times</span>','</button>','<br>',
  '<a href="#"  data-toggle="modal" data-target="#exampleModalwater" class="alert-link">',"Add them Here",'</a>','</div>';
}


?></p>
</div>
<div class="card-body">

  <div id="chart_water_v">
    <script>
    Morris.Area({
     element : 'chart_water_v',
     data:[<?php echo $chart_data_water_volume; ?>],
     xkey:'time',
     ykeys:['units'],
     labels:['units'],
     hideHover:'auto',
     stacked:true,
     resize:true
    });
    </script>

  </div>


</div>



            </div>
          </div>

          </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    </body>
    </html>
