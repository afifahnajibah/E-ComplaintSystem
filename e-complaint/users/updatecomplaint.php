
<?php
    include('../includes/config.php');
    session_start();
    $id = $_SESSION['stid'];

    $cid= $_GET['id'];

    $msg="";

    if(isset($_POST['submit']))
    {
        $cdepartment=$_POST['cdepartment'];
        $cblock=$_POST['cblock'];
        $ctitle=$_POST['ctitle'];
        $cdescription=$_POST['cdescription'];

       include('../includes/config.php');

        if ($connection->connect_error) {
          die("Connection failed: " . $connection->connect_error);
        }

        $sql= "UPDATE complaint SET cdepartment='$cdepartment', cblock='$cblock', ctitle='$ctitle', cdescription='$cdescription'
               WHERE cid = '$cid' AND stid = '$id' ";

          if($connection->query($sql) == TRUE){
            $msg= '<div class="alert alert-success" style="margin-top:30px";>
                 <strong>Success!</strong> Update Successful.
                 </div>';
          } else{
            $msg= '<div class="alert alert-warning" style="margin-top:30px";>
                     <strong>Failed!</strong> Error in Updating Details. Please make sure all box are fill in.
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
  <script src="/assets/js/main.js"></script>

    <style>

    </style>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50" onload="myFunction()">

  <?php include ('../includes/navbar.php');?>

        <div class="container">
            <div class="page-header">
                <?php echo $msg; ?>
                <h1 class="leaderboard">DETAILS OF COMPLAINT</h1>
            </div>
            <form action="" method="post">
            <table>
              <?php
              $sql="SELECT *
              FROM `student`, `complaintaction`, `complaint`
              WHERE student.stid = complaint.stid AND complaint.cid = complaintaction.cid
              AND complaint.cid = $cid AND student.stid = $id";

              $result=mysqli_query($connection,$sql);

              while($std = mysqli_fetch_array($result))
              {
              ?>
              <tr><td colspan="2"><div class="page-header"><h1> COMPLAINT ID: <?php echo $std['cid']; ?></h1></div></td></tr>

              <tr class="trhead">
                  <th>COMPLAINT DATE</th>
                  <td><?php echo $std['cdate']; ?></td>
              </tr>

              <tr class="trhead">
                  <th> DEPARTMENT </th>
                  <td>
                    <select class="form-control" name="cdepartment">
                      <option selected readonly style="color:lightgrey"><?php echo $std['cdepartment'];?></option>

                      <option value="GENERAL">GENERAL</option>
                      <option value="FACILITIES">FACILITIES</option>
                      <option value="ICT">ICT</option>
                    </select>
                  </td>
              </tr>

              <tr class="trhead">
                  <th> BLOCK </th>
                  <td>
                    <select class="form-control" name="cblock">
                          <option selected readonly style="color:lightgrey"><?php echo $std['cblock'];?></option>
                          <?php } ?>
                          <?php
                          $sql="SELECT * FROM `block`";
                          $result=mysqli_query($connection,$sql);
                          while($std=mysqli_fetch_array($result)){
                          ?>
                            <option value="<?php echo $std['blockname']?>"><?php echo $std['blockname'];?></option>
                         <?php } ?>
                    </select>
                </td>
             </tr>

             <?php
             $sql="SELECT *
             FROM `student`, `complaintaction`, `complaint`
             WHERE student.stid = complaint.stid AND complaint.cid = complaintaction.cid
             AND complaint.cid = $cid AND student.stid = $id";

             $result=mysqli_query($connection,$sql);

             while($std = mysqli_fetch_array($result))
             {
             ?>
            <tr class="trhead">
                  <th> TITLE </th>
                  <td><input type="text" name="ctitle" class="form-control" value="<?php echo $std['ctitle']; ?>" required></td>
            </tr>
            <tr class="trhead">
                  <th> DESCRIPTION </th>
                  <td><textarea name="cdescription" class="form-control" rows="4" cols="50" required><?php echo $std['cdescription']; ?></textarea></td>
            </tr>

              <tr class="trhead">
              <th> TIME & DATE UPDATED</th>
              <!-- null timestamp -->
              <td>
              <?php if( $std['atimestamp'] == NULL){
                      echo "<p>Please Wait</p>";
                    }else{
                      echo $std['atimestamp'];
                    }?>
              </td>
              </tr>

              <tr class="trhead">
              <th> STATUS</th>
              <!-- null status -->
              <td class='bg'>
              <?php if( $std['cstatus'] == NULL){
                      echo "<p class='bg2'> Not Process Yet</p>";
                    }else
                      echo $std['cstatus']; ?>
              </td>
              </tr>
              <tr><td colspan="2"><input type="submit" name="submit" class="btn-login" style="font-size:18px; float: right;" value="UPDATE DETAILS" /></td></tr>
              <?php } ?>
            </table>
          </form>
        </div>
    <script src="..\assets\js\main.js"></script>
</body>
</html>
