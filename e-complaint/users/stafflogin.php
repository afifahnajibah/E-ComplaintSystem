<?php
    session_start();
    include("../includes/config.php");

    $msg="";
    if(isset($_POST['submit'])){
        $sid=mysqli_real_escape_string($connection,strtolower($_POST['sid']));

        $spassword=mysqli_real_escape_string($connection,$_POST['spassword']);

        $login_query="SELECT * FROM `staff` WHERE sid='$sid' and spassword='$spassword'";

        $login_res=mysqli_query($connection,$login_query);
        if(mysqli_num_rows($login_res)>0){
            $_SESSION['sid']=$sid;
            header('Location:staffindex.php');
        }
        else{
             $msg= '<div class="alert alert-danger alert-dismissable" style="margin-top:30px";>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Unsuccessful!</strong> Login Unsuccessful.
                  </div>';
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
    div.transbox {
      margin-left: 30px;
      margin-top: 50px;
      background-color: rgba(0, 0, 0, 0.7);
      border: 1px solid black;
      opacity: 0.9;
      padding-left: 16px;
      padding-right: 16px;
    }

    .link-login{
      color: white;
    }

    </style>
</head>
<body class="bglogin">

    <?php include("../includes/staffnavbar.php");?>

    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
         <div class="col-md-6">
          <div class="transbox">
        <?php echo $msg; ?>
         <div class="page-header">
             <h1 style="color:white">ADMIN SIGN IN</h1>
         </div>

         <form class="form-horizontal w3-container w3-center w3-animate-top" action="" method="post">
             <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
               <input id="sid" type="text" class="form-control" name="sid" placeholder="Staff ID">
             </div>
             <br>

             <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
               <input id="spassword" type="password" class="form-control" name="spassword" placeholder="Password">
             </div>
             <br>
                <p class="link-login"> Are you student? Log in here.
                    <span style="color:tan">
                      <a href="studentlogin.php">Click here</a>
                    </span>
                </p>


             <div class="input-group">
               <button type="submit" name="submit" class="btn-login" style="float:right; width:30%"> LOG IN </button>
             </div>
          </form>
           <br>
       </div>
      </div>
    </div>
  </div>

</body>
</html>
