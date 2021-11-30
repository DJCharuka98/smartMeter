<?php
session_start();
$_SESSION['admin_name']="Charuka Jayamali";
$_SESSION['admin_id']="101";

 ?>
 <?php
 $today=date("Y-m-d");
 $q="SELECT time, SUM(flow_rate) FROM water_usage WHERE date=:today GROUP BY time";

 $dbh=new PDO('mysql:host=localhost;dbname=water_userdb','root','');
 $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $sth=$dbh->prepare($q);
 $sth->execute(['today'=>$today]);
 $water_flow=0;
 $chart_data_water = '';
 foreach($sth as $record)
 {
   $chart_data_water .= "{ time:'".$record["time"]."', flow_rate:".$record["SUM(flow_rate)"]."}, ";
   $water_flow+=$record["SUM(flow_rate)"];
 }

 $water_units=$water_flow;
 $chart_data_water = substr($chart_data_water, 0, -2);
 $db=new PDO('mysql:host=localhost;dbname=userinfo','root','');
 $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $q="SELECT COUNT(username) FROM userinfo WHERE username!=''";
 $sth=$db->query($q);
 $count_water=$sth->fetchColumn();



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
    background-color:gray;
  }
  .item.active{
    background-color:gray;
  }

  #mobilenav .nav-item.active{
    background-color:#5bc0de;
  }
  #mobilenav .nav-link:hover{
background-color:#5bc0de;
border-radius:3px;
font-weight:bold;

  }

  </style>
  <body>
    <div id="mobilenav">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="col-6">
            <a class="navbar-brand" href="#">SmartMeter<h5 class="dashboard" style="color:#5bc0de"><i class="fas fa-tachometer-alt"></i> Dashboard</h5></a>
        </div>

        <div class="col-6">

                  <button  style="float:right;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
        </div>

        <div class="col-12" style="margin:5px">
          <center>
            <div class="btn-group  mx-auto " role="group" style="font-weight:bold;" >
              <button class="btn btn-outline-info" style=" width:100px; height:50px; font-family:arial;" >Electricity</button>
              <button class="btn btn-outline-info active" style=" width:100px; height:50px;font-family:arial">Water</button>
              </div></center>
        </div>


        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
          <ul class="navbar-nav ">

            <li class="nav-item text-center active">
              <a class="nav-link" href="./Water_home.php"><i class="fa fa-home"></i>  Home</a>
            </li>
            <li class="nav-item text-center">
              <a class="nav-link" href="#"><i class="fas fa-dollar-sign"></i>  Unit cost</a>
            </li>
            <li class="nav-item text-center">
              <a class="nav-link" href="./Water_searchuser.php"><i class="fa fa-search"></i>  Search user</a>
            </li>
            <li class="nav-item text-center">
              <a class="nav-link" href="./Water_adduser.php"><i class="fas fa-chalkboard-teacher"></i>  Add user</a>
            </li>
            <li class="nav-item text-center">
              <a class="nav-link" href="./Water_userupdate.php"><i class="fa fa-bars"></i>  Update user</a>
            </li>
            <li class="nav-item text-center">
              <a class="nav-link" href="./Water_userdelete.php"><i class="far fa-trash-alt"></i> Delete user</a>
            </li>
            <li class="nav-item text-center">
              <a class="nav-link" href="#"><i class="fas fa-file-invoice"></i>  Bill information</a>
            </li>
            <li class="nav-item text-center">
              <a class="nav-link" href="#"><i class="fas fa-chart-pie"></i>  Monthly reports</a>
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
                <a href="" class="navbar-brand lead" style="color:#E9E7DA"><i class="fas fa-tachometer-alt"></i>  Admin Dashboard-Water</a>
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
              <div class="col-2" style="height:auto;background-color:#192231" id="webmenu">

             <div class="modal" tabindex=-1 role="dialog" id="pp">
               <div class="modal-dialog" role="document">
                 <div class="modal-content bg-dark lead" style="color:white;width:300px;height:500px">
                   <div class="modal-header">
                     <h5>Profile</h5>
                   </div>
                   <div class="modal-body">
                    <img src="charuka.jpg" alt="" style="width:100px; height:100px;border-radius:50%;">
                    <h5>Name:<?php echo $_SESSION['admin_name'] ?></h5>
                    <h5>Id :<?php echo $_SESSION['admin_id'] ?></h5>
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
               <p style="color:white;" class="mx-auto d-block text-center lead">Admin</p>

                <img data-toggle="modal" data-target="#pp" type="button" class="mx-auto d-block" src="charuka.jpg" alt="" style="width:50px; height:50px;border-radius:50%;">
           <br>
              </div>

                <nav>
                  <div class="col-12 item active">
                    <a href="./Water_home.php" class="nav-link" style="color:white"><i class="fa fa-home"></i> Home</a>
                  </div>
                  <div class="col-12 item">
                      <a href="./Water_searchuser.php" class="nav-link" style="color:white"><i class="fa fa-search"></i> Search user </a>
                  </div>
                  <div class="col-12 item">
                    <a href="./Water_adduser.php" class="nav-link" style="color:white"><i class="fas fa-chalkboard-teacher"></i> Add user </a>
                  </div>
                  <div class="col-12 item">
                <a href="./Water_userdelete.php" class="nav-link" style="color:white"><i class="far fa-trash-alt"></i> Delete user </a>
                  </div>
                  <div class="col-12 item">
                    <a href="./Water_userupdate.php" class="nav-link" style="color:white"><i class="fa fa-bars"></i> Update user</a>
                  </div>
                  <div class="col-12 item">
                  <a href="" class="nav-link" style="color:white"><i class="fas fa-chart-line"></i> Monthly Reports</a>
                  </div>
                  <div class="col-12 item">
                    <a href="" class="nav-link" style="color:white"><i class="fas fa-chart-pie"></i> Daily Reports</a>
                  </div>
                  <div class="col-12 item">
                  <a href="" class="nav-link" style="color:white"><i class="fas fa-dollar-sign"></i> Unit cost</a>
                  </div>
                  <div class="col-12 item">
                    <a href="" class="nav-link" style="color:white"><i class="fas fa-file-invoice"></i> Bill information</a>
                  </div>

                </nav>
                <br>
              </div>
              <div class="col-12 col-md-10">
                <div class="row">

                            <div class="card col-lg-7 col-12" style="margin:20px">
                            <div class="card-header">
                            <h5 class="card-title">Realtime Water Usage <?php echo $today ?></h5>
                            <p class="card-title lead">Total Usage(units) : <?php echo $water_units ?></p>
                            </div>
                            <div class="card-body">

                              <div id="chartt" style="color:gray">
                                <script>
                                Morris.Area({
                                 element : 'chartt',
                                 data:[<?php echo $chart_data_water; ?>],
                                 xkey:'time',
                                 ykeys:['flow_rate'],
                                 labels:['flow_rate'],
                                 fillOpacity:0.8,
                                 hideHover:'auto',
                                 stacked:true,
                                 pointFillColors:['red'],
                                 resize:true
                                });
                                </script>

                              </div>


                            </div>

                            </div>

              <div class="col-lg-3 col-12">


                <div class="row">
                <!--------------------------------------------->
                <div class="card col-12" style="margin:20px;height:150px;background-color:#E9807450;">
                <div class="card-body">
                <p class="card-title lead text-center"><?php echo " CWB SmartMeter" ?></p>
                <p class="card-title lead text-center"><?php echo $count_water." Users" ?></p>
                </div>
                </div>
                <!--------------------------------------------------------->
                <div class="card col-12" style="margin:20px;height:150px">
                <div class="card-body">
                <p class="card-title lead text-center"><?php echo " CWB SmartMeter" ?></p>
                <p class="card-title lead text-center"><?php echo $count_water." Users" ?></p>
                </div>
                </div>
                <!------------------------------------------------->

            </div><!end of row--------------->

        </div>


        </div>



              </div>
            </div>






    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


    </body>
    </html>
