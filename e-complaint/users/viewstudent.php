
<?php
    include('../includes/config.php');

    session_start();
    $id= $_GET['id'];
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
            <div class="page-header">
                <h1 class="leaderboard">DETAILS OF STUDENT</h1>
            </div>

            <table>
              <?php
              $sql="SELECT * FROM `student` WHERE stid = $id";
              $result=mysqli_query($connection,$sql);

              while($std = mysqli_fetch_array($result))
              {
              ?>
              <tr>
                <td><img src="../assets/css/<?php echo $std['stprofilepic']; ?>" style="width:150px; height:150px; border-radius:50%"></td>
                <td><div class="page-header"><h1> STUDENT ID: <?php echo $std['stid']; ?></h1></div></td>
              </tr>
              <tr class="trhead">
                  <th> USERNAME </th>
                  <td><?php echo $std['stusername']; ?></td>
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
                  <th> FACULTY </th>

                    <?php
                    $sql="SELECT student.fid, faculty.fid, faculty.fname
                          FROM `faculty`
                          JOIN `student`
                          WHERE student.fid = faculty.fid AND student.stid = $id";
                    $result=mysqli_query($connection,$sql);
                    while($std=mysqli_fetch_assoc($result)){
                    ?>
                    <td><?php echo $std['fname']; ?></td>

                      <?php
                      /*$sql="SELECT * FROM `faculty`";
                      $result=mysqli_query($connection,$sql);
                      while($std=mysqli_fetch_array($result)){
                      ?>
                        <option value="<?php echo $std['fid']?>"><?php echo $std['fname'];?></option> */
                      } ?>
                </tr>
                <tr class="trhead">
                  <th> COURSE </th>
                    <?php
                    $sql="SELECT student.fid, course.crid, course.crname
                          FROM `course`
                          JOIN `student`
                          WHERE student.crid = course.crid AND student.stid = $id";
                    $result=mysqli_query($connection,$sql);
                    while($std=mysqli_fetch_assoc($result)){
                    ?>
                    <td><?php echo $std['crname']; ?></td>

                      <?php
                      /*$sql="SELECT * FROM `course`";
                      $result=mysqli_query($connection,$sql);
                      while($std=mysqli_fetch_array($result)){
                      ?>
                        <option value="<?php echo $std['crid']?>"><?php echo $std['crname'];?></option> */
                      }  ?>
                </tr>

                 <!--<div class="input-group">
                  <span class="input-group-addon"><b>Profile Picture</b></span>
                  <input id="mpicprofile" accept="image/*" type="file" class="form-control"name="mpicprofile" onchange="loadFile(event)" style="display: none;" placeholder="pic">
                  <p><img id="output" width="200" /></p>
                 </div>
                <br>-->

                <?php
                $sql="SELECT * FROM `student` WHERE stid = $id";
                $result=mysqli_query($connection,$sql);

                while($std = mysqli_fetch_array($result))
                { ?>
                 <tr class="trhead">
                  <th> ADDRESS </th>
                  <td><?php echo $std['staddress'];?></td>
                </tr>
                <tr class="trhead">
                 <th> EMAIL</th>
                 <td><?php echo $std['stemail'];?></td>
               </tr>
              <?php }} ?>
            </table>
        </div>
    <script src="..\assets\js\main.js"></script>
</body>
</html>
