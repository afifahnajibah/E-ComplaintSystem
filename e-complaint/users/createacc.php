
<?php
    include('../includes/config.php');

    session_start();
    $msg="";

    if(isset($_POST['submit'])){
        $sid= mysqli_real_escape_string($connection,strtolower($_POST['sid']));
        $stname= mysqli_real_escape_string($connection,strtolower($_POST['stname']));
        $stphonenum= mysqli_real_escape_string($connection,strtolower($_POST['stphonenum']));
        $fid= mysqli_real_escape_string($connection,strtolower($_POST['fid']));
        $crid= mysqli_real_escape_string($connection,strtolower($_POST['crid']));
        $staddress= mysqli_real_escape_string($connection,strtolower($_POST['staddress']));
        $stemail= mysqli_real_escape_string($connection,strtolower($_POST['stemail']));
        $stusername= mysqli_real_escape_string($connection,strtolower($_POST['stusername']));
        $stpassword= mysqli_real_escape_string($connection,strtolower($_POST['stpassword']));


        $signup_query= "INSERT INTO `student`(`stid`,`sid`, `stname`, `stphonenum`, `fid`,`crid`
                                             ,`staddress`, `stemail`,`stusername`, `stpassword`)

		                    VALUES ('', '$sid', '$stname', '$stphonenum', '$fid', '$crid'
                                , '$staddress', '$stemail', '$stusername', '$stpassword')";

        $check_query= "SELECT * FROM `student` WHERE stemail='$stemail'";

        $check_res=mysqli_query($connection,$check_query);

        if(mysqli_num_rows($check_res)>0){
             $msg= '<div class="alert alert-warning" style="margin-top:30px";>
                      <strong>Failed!</strong> Username or Email already exists.
                      </div>';
        }

        else{

          $signup_res= mysqli_query($connection,$signup_query);

                 $msg= '<div class="alert alert-success" style="margin-top:30px";>
                      <strong>Success!</strong> Registration Successful.
                      </div>';
                 header('Location:showstudent.php');
        }

        /*
        <?php
        $membershipid= mysqli_real_escape_string($connection,strtolower($_POST['membershipid']));
        $memberid= mysqli_real_escape_string($connection,strtolower($_POST['memberid']));
        $adminid= mysqli_real_escape_string($connection,strtolower($_POST['adminid']));
        $musername= mysqli_real_escape_string($connection,strtolower($_POST['musername']));
        $paymenttotal= mysqli_real_escape_string($connection,strtolower($_POST['paymenttotal']));
        $paymentstatus= mysqli_real_escape_string($connection,strtolower($_POST['paymentstatus']));

        $sql_insert="INSERT INTO `payment`(`paymentid`, `membershipid`,`memberid`, `adminid`,`musername`,`paymentdate`,`paymenttype`,
                                   `paymenttotal`,`paymentstatus`)

              VALUES('', '$membershipid','', '$adminid', '$musername', '', '', '$paymenttotal', '$paymentstatus')";

        if($connection->query($sql_insert) === TRUE){
          echo "";
        } else{
          echo "Error updating record:" .$connection->error;
        }
        */
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
  <script src="/assets/js/main.js"></script>

<style>

.box {
  background-color: rgba(203,193,184);
  width:100%;
  height:auto;
  padding: 16px;
  margin-top: 10px;

}

</style>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50" onload="myFunction()">

  <?php include ('../includes/staffnavbar.php');?>

        <div class="container">
        <div class="box">
           <?php echo $msg; ?>
            <div class="page-header">
                <h1 class="leaderboard">NEW STUDENT FORM</h1>
            </div>
            <form class="form-horizontal animated bounce" action="" method="post">

              <?php include("../includes/config.php");

              $sql="SELECT * FROM `staff`";
              $result=mysqli_query($connection,$sql);
              $std=mysqli_fetch_assoc($result)
              ?>
                  <input type="hidden" name="sid" value="<?php echo $std['sid']?>">

                <!-- profile picture -->
                <!--<p><input type="file"  accept="mpicprofile/*" name="mpicprofile" id="file"  onchange="loadFile(event)" style="display: none;" required></p>
                <span for="file" style="cursor: pointer;" class="input-group-addon"><b>Profile Picture</b></span>
                <p><label for="file" style="cursor: pointer;">Click here to upload profile photo</label></p>
                <p><img id="output" width="200" /></p>

                <script>
                  var loadFile = function(event) {
                  var mpicprofile = document.getElementById('output');
                  mpicprofile.src = URL.createObjectURL(event.target.files[0]);
                  };
                </script>-->
                <!------>

                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="stname" type="text" class="form-control" name="stname" placeholder="Student Full Name" required>
                </div>
                <br>

                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input id="stpassword" type="text" class="form-control" name="stpassword" placeholder="Identification Number (e.g: 990830071234)" required>
                </div>
                <br>

                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                  <input id="stphonenum" type="text" class="form-control" name="stphonenum" placeholder="Contact Number (e.g 011-72553375)" required>
                </div>
                <br>

                <div class="input-group">
                  <span class="input-group-addon"><b>Faculty & Course code</b></span>
                  <select class="form-control" name="fid" id="stfaculty">
                  <option>Select</option readonly>

                      <?php
                      $sql="SELECT * FROM `faculty`";
                      $result=mysqli_query($connection,$sql);
                      while($std=mysqli_fetch_array($result)){
                      ?>
                        <option value="<?php echo $std['fid']?>"><?php echo $std['fname'];?></option>
                     <?php } ?>
                  </select>
                </div>
                <br/>

                <div class="input-group">
                  <span class="input-group-addon"><b>Course</b></span>
                  <select class="form-control" name="crid" id="stfaculty">
                  <option>Select</option readonly>

                      <?php

                      $sql="SELECT * FROM `course`";
                      $result=mysqli_query($connection,$sql);
                      while($std=mysqli_fetch_array($result)){
                      ?>
                        <option value="<?php echo $std['crid'];?>"><?php echo $std['crname'];?></option>
                     <?php } ?>
                  </select>
                </div>
                <br/>

                 <!--<div class="input-group">
                  <span class="input-group-addon"><b>Profile Picture</b></span>
                  <input id="mpicprofile" accept="image/*" type="file" class="form-control"name="mpicprofile" onchange="loadFile(event)" style="display: none;" placeholder="pic">
                  <p><img id="output" width="200" /></p>
                 </div>
                <br>-->

                 <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                  <input id="staddress" type="text" class="form-control" name="staddress" placeholder="Full Address" required>
                 </div>
                <br>

                <div class="input-group">
                 <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                 <input id="stemail" type="email" class="form-control" name="stemail" placeholder="Email" required>
                </div>
                <br>

                <input id="stusername" type="hidden" class="form-control" name="stusername" value="">



                <div class="input-group">
                  <button type="submit" name="submit" class="btn-login" style="float:right"> CREATE ACCOUNT </button>
                </div>
                <br/>
              </form>
          </div>
        </div>

    <script src="..\assets\js\main.js"></script>
</body>
</html>
