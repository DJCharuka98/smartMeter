
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
  </head>

  </html>



<?php
function checkemail($str) {
         return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
   }
   function form1Errors()
{


$errors=array();
  if(isset($_POST["add"]))
  {

    if($_POST['state']=="Choose...")
    {
      $errors[]="state is required";
    }

    if(!empty(trim($_POST['email'])))
    {
    if(!checkemail($_POST['email'])){
      $errors[]="Invalid email address.";
   }
 }
    if(!empty(trim($_POST['NIC'])))
     {
        if(!(strlen($_POST['NIC'])==12 || strlen($_POST['NIC'])==10))
        {
          $errors[]="Invalid NIC number";
        }
      }
    if(!empty(trim($_POST['contact'])))
    {
       if(strlen($_POST['contact'])==10)
       {
         $reg=str_split($_POST['contact']);
        $alpha=array_merge(range('A','Z'),range('a','z'));
        for ($i=0; $i < strlen($_POST['contact']); $i++) {
          // code...
          if(in_array($reg[$i],$alpha))
          {
            $errors[]="Invalid contact number";
            break;
          }
        }


       }
       else {
         $errors[]="Invalid contact number";
       }
    }
    if(!empty(trim($_POST['city'])))
    {
      $na=str_split($_POST['city']);
     $num=array('0','1','2','3','4','5','6','7','8','9');


     for ($j=0; $j < strlen($_POST['city']); $j++) {
       // code...

       if(in_array($na[$j],$num))
       {

         $errors[]=$na[$j]."Invalid city";

         break;
       }

     }
    }


    if(empty($errors))
    {
    /*$_SESSION['title']=$_POST['Title'];
    $_SESSION['name']=$_POST['Name'];
    $_SESSION['reg']=$_POST['Reg_No'];
    $_SESSION['email']=$_POST['Email'];
    $_SESSION['form1']='complete';*/


    }



  }


  if(!empty($errors))
  {
    foreach ($errors as $e) {
      // code...
      echo '<div  class="alert alert-danger alert-dismissible fade show" role="alert">',$e,'<br>',
      '<button type="button" class="close" data-dismiss="alert" area-label="true">',
      '<span area-hidden="true">&times</span>','</button>','</div>';
    //  echo $e.'<br>';
    }

  }
  else {
    if(empty($errors))
        {
          if(isset($_POST['add']))
          {
$connection=mysqli_connect('localhost','root','','userinfo');
          $password=sha1($_POST["password"]);
          $query="INSERT INTO userinfo (username,password,NIC,email,address,city,district,contact,wateraccount_no) VALUES
          ('{$_POST["username"]}','{$password}','{$_POST["NIC"]}','{$_POST["email"]}','{$_POST["address"]}',
            '{$_POST["city"]}','{$_POST["state"]}','{$_POST["contact"]}','{$_POST["wac"]}')";
            $result=mysqli_query($connection,$query);
            if($result)
            {
              echo '<div  class="alert alert-success alert-dismissible fade show" role="alert">',"User details are recorded!",
              '<button type="button" class="close" data-dismiss="alert" area-label="true">',
              '<span area-hidden="true">&times</span>','</button>','</div>';
            }
            else {
              echo '<div  class="alert alert-warning alert-dismissible fade show" role="alert">',"Unexpected error occured!",
              '<button type="button" class="close" data-dismiss="alert" area-label="true">',
              '<span area-hidden="true">&times</span>','</button>','</div>';
            }
          }
        }
  }

}


 ?>
</head>

</html>
