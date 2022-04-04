
<?php
    include('../includes/config.php');
    session_start();
    $id = $_SESSION['stid'];
    $msg="";

    if(isset($_POST['submit']))
    {
        $stid=$_POST['stid'];
        $stname=$_POST['stname'];
        $stphonenum=$_POST['stphonenum'];
        $stprofilepic=$_POST['stprofilepic'];
        $stemail=$_POST['stemail'];
        $stusername=$_POST['stusername'];

        include('../includes/config.php');

        if ($connection->connect_error) {
          die("Connection failed: " . $connection->connect_error);
        }

        $sql= "UPDATE student SET stid='$stid', stname='$stname',stphonenum='$stphonenum', stprofilepic='$stprofilepic',
               stemail='$stemail', stusername='$stusername'
               WHERE stid='$id'";

          if($connection->query($sql) == TRUE){
            $msg= '<div class="alert alert-success" style="margin-top:30px";>
                 <strong>Success!</strong> Update Successful.
                 </div>';
          } else{
            $msg= '<div class="alert alert-warning" style="margin-top:30px";>
                     <strong>Failed!</strong> Error in Updating Details.
                     </div>' .$connection->error;
          }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>E-COMPLAINT</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link  type="text/css" rel="stylesheet" href="../assets/css/main.css">
  <script src="../assets/js/main.js" defer></script>

    <style>

    .container.row{
      height:100%;
      width: 50px;
    }

    .coloum{
      margin-left: 16px;
      margin-right: 16px;
      margin-top: 16px;
      margin-bottom: 16px;
    }

    .radio-toolbar {
      margin-left: 10px;
      text-align: center;
    }

    .radio-toolbar input[type="radio"] {
      opacity: 0;
      position: fixed;
      width: 0;
    }

    .radio-toolbar label {
        display: inline-block;
        background-color: #f0efef;
        padding: 5px;
        font-size: 18px;
        border: 3px solid #444;
    }

    .radio-toolbar label:hover {
      background-color: #c2d4dd;
      cursor: pointer;
    }

    .radio-toolbar input[type="radio"]:focus + label {
        border: 2px dashed #f0efef;
    }

    .radio-toolbar input[type="radio"]:checked + label {
        background-color:#6d98ab;
        border-color: #c2d4dd;
    }

    .grid-container {
      display: grid;
      grid-template-columns: auto auto auto auto auto auto auto auto ;
    }

    .grid-container > label {

    }

    /* end radio button*/

    </style>

</head>

<body>

  <?php include ('../includes/navbar.php');?>

    <div>
        <?php echo $msg; ?>
        <h1 class="leaderboard">MY ACCOUNT</h1>
    </div>

    <div class="row">
    <div class="col-md-6">
    <div class="transbox">

            <form action="" method="post">

                <?php include("../includes/config.php");

                $sql="SELECT * FROM `student` WHERE stid=$id";
                $result=mysqli_query($connection,$sql);
                while($std=mysqli_fetch_assoc($result)){

                ?>
                <br/>
                <input type="hidden" name="sid" value="<?php echo $std['sid']?>">

                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"> STUDENT ID </i></span>
                  <input type="text" class="form-control" name="stid" placeholder="Student ID"
                         value="<?php echo $id?>" readonly>
                </div>
                <br/>

                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"> FULL NAME </i></span>
                  <input type="text" class="form-control" name="stname" placeholder="Full Name"
                         value="<?php echo $std['stname']?>" readonly>
                </div>
                <br>

                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"> IDENTIFICATION NO. </i></span>
                  <input type="text" class="form-control" name="stpassword" placeholder="Password"
                         value="<?php echo $std['stpassword']?>" readonly>
                </div>
                <br>

                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-phone"> CONTACT NO. </i></span>
                  <input type="text" class="form-control" name="stphonenum" placeholder="Contact Number e.g 011-72553375"
                         value="<?php echo $std['stphonenum']?>" required>
                </div>
                <br>

                <div class="input-group">
                 <span class="input-group-addon"><i class="glyphicon glyphicon-user"> EMAIL </i></span>
                 <input type="email" class="form-control" name="stemail" placeholder="Email"
                        value="<?php echo $std['stemail']?>" required>
                </div>
                <br>

                <div class="input-group">
                  <input  type="submit" name="submit" class="btn-login" style="font-size:18px; float: right;"
                    value="UPDATE DETAILS" />

                </div>
                <br/>

 </div> <!-- transbox -->
 </div> <!-- coloum 1>-->

   <div class="col-md-6">

   <div class="row">
   <div class="transbox col-md-9">
           <br/>
           <p><label style="color:white;">MY NICKNAME</label></p>
           <input type="text" class="form-control" id="afterlog" name="stusername" style="padding:18px;" value="<?php echo $std['stusername']?>"/>
           <input type="hidden" name="stprofilepic" value="<?php echo $std['stprofilepic']?>"/>
           <?php }?>
           <br>
   </div><!-- transbox-->
   </div> <!-- row 2-->

   <div class="row">
   <div class="transbox col-md-9">
   <br/>
                <!-- profile pic -->
                <p><label style="color:white;">MY AVATAR</label></p>

                  <div class="input-group">
                    <p style="color:white;">Click any to change your avatar</p>
                    <div class="radio-toolbar">
                    <div class="grid-container">
                        <?php
                        $sql="SELECT * FROM `avatar`";
                        $result=mysqli_query($connection,$sql);

                        while($std=mysqli_fetch_array($result))
                        {
                        ?>
                        <input type="radio" id="<?php echo $std['avatarid'];?>" name="stprofilepic" value="<?php echo $std['avatarname'];?>" />
                        <label for="<?php echo $std['avatarid'];?>">
                        <img src="../assets/css/<?php echo $std['avatarname'];?>" style="width:50px; height:50px; border-radius:50%"/>
                        </label>
                        <br/>
                      <?php }?>
                    </div>
                    </div>
                  </div>


    </div><!--transbox-->
    </div> <!-- row 3--->
    <br/>
  </div> <!-- coloum 2-->
  <br/>
  </form>
  </div> <!-- class row -->


</body>
</html>
