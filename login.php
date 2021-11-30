<?php
$db=mysqli_connect('localhost','root','','userinfo');
 session_start();

  ?>
<?php

  function login()
  {

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
      $db=mysqli_connect('localhost','root','','userinfo');
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT NIC,email FROM userinfo WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);


      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {

         $_SESSION['username'] = $myusername;
         $_SESSION['NIC']=$row["NIC"];
          $_SESSION['email']=$row["email"];

         header("location: user_dashboard.php");
      }else {
        $db=mysqli_connect('localhost','root','','water_userdb');
        $myusername = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']);

        $sql = "SELECT Admin_id FROM admin_details WHERE Admin_name = '$myusername' and Admin_password = '$mypassword'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];

        $count = mysqli_num_rows($result);
        if($count == 1) {

           $_SESSION['admin_name'] = $myusername;
           $_SESSION['admin_id']=$row["id"];


           header("location: water_home.php");
        }
        else {
          $db=mysqli_connect('localhost','root','','userdb');
          $myusername = mysqli_real_escape_string($db,$_POST['username']);
          $mypassword = mysqli_real_escape_string($db,$_POST['password']);

          $sql = "SELECT admin_id FROM admin_details WHERE admin_name = '$myusername' and admin_password = '$mypassword'";
          $result = mysqli_query($db,$sql);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
          $active = $row['active'];
  
          $count = mysqli_num_rows($result);
          if($count == 1) {

             $_SESSION['admin_name'] = $myusername;
             $_SESSION['admin_id']=$row["id"];


             header("location: Elec_home.php");
          }
          else {
            // code...
            $error = "Your Login Name or Password is invalid";
            echo $error;
          }

          }

        }

      }
   }

?>

<html>
<head>
    <title> Login</title>
    <link rel="stylesheet" type="text/css">
</head>
<style media="screen">
.loginbox{
    width: 320px;
    height: 420px;
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
}
body{
    margin: 0;
    padding: 0;
    background-size: cover;
    background-color:silver;
    background-position: center;
    font-family: sans-serif;
}

.avatar{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: absolute;
    top: -50px;
    left: calc(50% - 50px);
}
h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px;
}
.loginbox p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}
.loginbox input{
    width: 100%;
    margin-bottom: 20px;
}
.loginbox input[type="text"], input[type="password"]
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}
.loginbox input[type="submit"]
{
    border: none;
    outline: none;
    height: 40px;
    background: #1c8adb;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
}
.loginbox input[type="submit"]:hover
{
    cursor: pointer;
    background: #39dc79;
    color: #000;
}

.loginbox a{
    text-decoration: none;
    font-size: 14px;
    color: #fff;
}
.loginbox a:hover
{
    color: #39dc79;
}
</style>
    <body>
    <div class="loginbox">
    <img src="logo.png" class="avatar">
        <h1>Login</h1>
            <form class="" action="" method="post">


            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">

            <input type="submit" name="submit" value="Login">
              <div class="row" style="color:red;margin-left:10px">
                <?php login(); ?>
              </div>
            <a href="#">Forget Password</a>
            </form>


        </div>

    </body>
</html>
