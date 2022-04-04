
<?php
    include('../includes/config.php');
    session_start();

    $id = $_SESSION['sid'];
    $cid= $_GET['id'];

    $msg="";

    if(isset($_POST['submit'])){
        $sid = $_POST['sid'];
        $cid = $_POST['cid'];
        $adescription = $_POST['adescription'];
        $atimestamp = $_POST['atimestamp'];
        $cstatus = $_POST['cstatus'];


        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }


        $sql = "UPDATE complaintaction SET sid = '$sid', adescription = '$adescription', atimestamp = '$atimestamp' WHERE cid='$cid'";

            if($connection->query($sql) === FALSE){

              $msg= '<div class="alert alert-warning" style="margin-top:30px";>
                       <strong>Failed!</strong> Error when creating complaint.
                       </div>';
            } else{

              $sql1= "UPDATE complaint SET cstatus='$cstatus' WHERE cid='$cid'";

              $insert_res= mysqli_query($connection,$sql1);

              $msg= '<div class="alert alert-success" style="margin-top:30px";>
                      <strong>Success!</strong> Complaint Progress Succesfully Update.
                     </div>';

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

  <?php include ('../includes/staffnavbar.php');?>

        <div class="container">
           <?php echo $msg; ?>
            <div class="page-header">
                <h1 class="leaderboard">DETAILS OF COMPLAINT</h1>
            </div>
          <form action="" method="post">

            <!-- time stamp -->
            <?php
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $arrival = new DateTime();
            $arrivalString = $arrival->format("Y-m-d H:i:s");
            ?>
            <input type="hidden" name="atimestamp" value="<?php echo $arrivalString; ?>" />
            <!-- end time stamp -->

            <table>
              <!--  from current logged staff -->
              <?php
              $sql="SELECT *
                    FROM `staff`
                    WHERE sid = $id";
              $result=mysqli_query($connection,$sql) or die (mysqli_error($connection));

              $std = mysqli_fetch_assoc($result)
              ?>
                 <input type="hidden" name="sid" value="<?php echo $std['sid']; ?>">

              <!--  from current logged staff -->

              <?php
              $sql="SELECT *
                    FROM `complaint`
                    JOIN `student`
                    WHERE student.stid = complaint.stid AND cid = $cid";
              $result=mysqli_query($connection,$sql) or die( mysqli_error($connection));

              while($std = mysqli_fetch_array($result))
              {
              ?>
              <tr class="trhead">
                <th colspan="2">
                  <div class="page-header">
                    <input type="hidden" name="cid" value="<?php echo $std['cid']; ?>">
                    <h1>COMPLAINT ID: <?php echo $std['cid']; ?></h1>
                  </div>
                </th>
              </tr>
              <tr>
                <th colspan="2"></th>
              </tr>
              <tr class="trhead">
                  <th> STUDENT ID </th>
                  <td><?php echo $std['stid']; ?></td>
              </td>
              <tr class="trhead">
                  <th> STUDENT NAME </th>
                  <td><?php echo $std['stname']; ?></td>
              </tr class="trhead">
              <tr class="trhead">
                  <th> IDENTIFICATION NO. </th>
                  <td><?php echo $std['stpassword']; ?></td>
              </tr>
              <tr class="trhead">
                  <th> CONTACT NO. </th>
                  <td><?php echo $std['stphonenum']; ?></td>
              </tr>
              <tr class="trhead">
                 <th> COMPLAINT DATE </th>
                 <td><?php echo $std['cdate']; ?></td>
              </tr>
              <tr class="trhead">
                 <th> COMPLAINT TITLE </th>
                 <td><?php echo $std['ctitle']; ?></td>
              </tr>
              <tr class="trhead">
                 <th> BLOCK </th>
                 <td><?php echo $std['cblock']; ?></td>
              </tr>
              <tr class="trhead">
                  <th> DEPARTMENT </th>
                  <td><?php echo $std['cdepartment'];?></td>
              </tr>
              <tr class="trhead">
                 <th> DESCRIPTION</th>
                 <td><?php echo $std['cdescription'];?></td>
              </tr>
              <?php } ?>
              <tr class="trhead">
                 <th>STAFF NOTES (TAKEN ACTION)</th>

                 <?php
                 $sql="SELECT *
                       FROM `complaintaction`
                       JOIN `complaint`
                       ON complaint.cid = complaintaction.cid WHERE complaint.cid = $cid";

                 $result=mysqli_query($connection,$sql) or die( mysqli_error($connection));

                 while($std = mysqli_fetch_array($result))
                 {
                   if($std['adescription'] == NULL){
                 ?>
                   <td>
                     <textarea name="adescription" class="form-control" rows="4" cols="50" placeholder="Add notes here.."required></textarea>
                   </td>
                 <?php }else{ ?>
                     <td>
                       <textarea name="adescription" class="form-control" rows="4" cols="50" style="font-size:18px;" required> <?php echo $std['adescription'];?>
                       </textarea>
                     </td>
                 <?php }?>
              </tr>

              <tr>
                   <td>
                   <th>


                 <?php if ($std['cstatus'] == NULL){ ?>

                   <button class="btn-login" type="submit" name="submit" onclick=onclick="confirmstatus()" >
                     <input type="hidden" name="cstatus" value="InProcess" >
                     UPDATE PROGRESS
                   </button>

                 <?php }elseif ($std['cstatus'] == 'InProcess'){ ?>

                   <button class="btn-login" type="submit" name="submit" onclick=onclick="confirmstatus()" >
                     <input type="hidden" name="cstatus" value="Closed" >
                     CLOSED COMPLAINT
                   </button>

                 <?php }else{ ?>

                   <button class="btn-login" type="submit" name="submit" onclick="confirmstatus()" />
                     <input type="hidden" name="cstatus" value="Closed" >
                     UPDATE PROGRESS
                   </button>

                   <button class="btn-login" type="submit" name="submit" onclick="confirmstatus()" disabled/>
                     <input type="hidden" name="cstatus" value="Closed" >
                     CLOSED COMPLAINT
                   </button>

                 <?php }} ?>

                  </th>
                 </td>
              </tr>

            </table>
        </form>
        </div>

    <script>
    /* button update status complaint*/
    function confirmstatus() {
      var txt;
      var r = confirm("Confirm to Update Progress");
      if (r == true) {
        txt = "You pressed OK!";
      } else {
        txt = "You pressed Cancel!";
      }
      document.getElementById("output").innerHTML = txt;
    }

    /* end button update status complaint*/

</script>

</body>
</html>
