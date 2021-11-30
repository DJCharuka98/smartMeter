<?php
session_start();
function query()
{
  $pass=false;
  if(isset($_POST["password"]))
  {
  if($_POST["password"]==$_POST["cfpassword"])
  {
    $pass=true;
  }
  else {
    echo "password confirmation doesn't match password";
  }
   }
if(isset($_POST['submit']) && $pass)
{
$connection=mysqli_connect('localhost','root','','userinfo');
$password=$_POST["password"];
$query="INSERT INTO userinfo (username,password,NIC,email,address,city,district,contact) VALUES
('{$_POST["username"]}','{$password}','{$_POST["NIC"]}','{$_POST["email"]}','{$_POST["address"]}',
  '{$_POST["city"]}','{$_POST["state"]}','{$_POST["contact"]}')";
  $result=mysqli_query($connection,$query);
  $pass=false;
  if($result)
  {

  }
  else {
    // code...
  echo "username already exists.";
  }

}
}?><html>
<head>
    <title>signup</title>
    <link rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
  <style media="screen">
  .loginbox{
      width: 520px;
      height: 520px;
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
</head>

    <body>
    <div class="loginbox">
    <img src="logo.png" class="avatar">
        <h1>Sign Up</h1>
            <form class="" action="" method="post">


            <input type="text" name="username" placeholder="Enter Username" required>

            <div class="row">
              <div class="col-6">
                  <input type="password" name="password" placeholder="Enter Password" required>
              </div>
              <div class="col-6">
                <input type="password" name="cfpassword" placeholder="confirm Password" required>
              </div>

            </div>


            <div class="row">
              <div class="col-6">
                <input type="text" name="NIC" placeholder="NIC" required>
              </div>
              <div class="col-6">
                <input type="text" name="email" placeholder="email" required>
              </div>

            </div>
            <div class="row">
              <div class="col-6">
                <input type="text" name="address" placeholder="address" required>
              </div>
              <div class="col-6">
                <input type="text" name="city" placeholder="city" required>
              </div>

            </div>
            <div class="row">
              <div class="col-6">
                <select id="inputState" class="form-control" name="state" required>
                  <option selected>Choose...</option>
                  <option>Colombo</option>
                  <option>Gampaha</option>
                  <option>Kaluthara</option>
                  <option>Galle</option>
                  <option>Mathara</option>
                  <option>Hambanthota</option>
                  <option>Ratnapura</option>
                  <option>kegalle</option>
                  <option>Nuwara Eliya</option>
                  <option>Kandy</option>
                  <option>Matale</option>
                  <option>Badulla</option>
                  <option>Ampara</option>
                  <option>Monaragala</option>
                  <option>Jaffna</option>
                  <option>Anuradhapura</option>
                    <option>Polonnaruwa</option>
                </select>
              </div>
              <div class="col-6">
                <input type="text" name="contact" placeholder="contact" required>
              </div>

            </div>
            <div class="row" style="color:red;margin-left:10px">
              <?php  query();?>
            </div>
            <div class="row lead" style="margin-left:10px">
              <h5>Do You Have an account?</h5> <a class="nav-item lead" style="font-size:15px" href="./login.php"> Log In</a>
            </div>

            <input type="submit" name="submit" value="SignUp">


            </form>


        </div>

    </body>
</html>
