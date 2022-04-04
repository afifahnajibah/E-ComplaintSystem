<?php
    session_start();
    include ('../includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MEMBERSHIP LIST</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="../assets/css/main.css">
<style>
	.bs-example{
    	margin: 20px;
      position:absolute;
      left:155px;
      right:10px;
    }
  table,tr,td,th{
    margin-top: 16px;
    margin-bottom: 16px;
    margin-left: 16px;
    margin-right: 16px;
    padding-left: 16px;
    padding-right: 16px;
    padding-top: 16px;
    padding-bottom: 16px;
  }

  h4{
    font-family: "Courier", monospace;
    font-size: 27px;
  }
</style>
</head>
<body>
  <?php include ('../includes/navbar.php'); ?>


<div class="bs-example">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="#bachelor" class="nav-link active" data-toggle="tab">BACHELOR</a>
        </li>
        <li class="nav-item">
            <a href="#diploma" class="nav-link" data-toggle="tab">DIPLOMA</a>
        </li>
        <li class="nav-item">
            <a href="#faculty" class="nav-link" data-toggle="tab">FACULTY</a>
        </li>
        <li class="nav-item">
            <a href="#course" class="nav-link" data-toggle="tab">COURSE</a>
        </li>

    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="bachelor">
            <h4 class="mt-2">List bachelor in UiTM Perlis</h4>
            <br/>
            <div class="container" >
              <table border="3" width="100%" height="auto">
                 <tr style="text-align: center;">
                     <th> ID </th>
                     <th> Faculty Code</th>
                     <th> Faculty Name</th>
                     <th> Course Code</th>
                     <th> Course Name</th>
                 </tr>
          <?php
          $count=1;
          $sql="SELECT *
          FROM `faculty`
          JOIN `course`
          ON faculty.fid = course.fid
          WHERE crname LIKE '%bachelor%'
          ORDER BY fcode";
           $result=mysqli_query($connection,$sql);
           while($std=mysqli_fetch_array($result)){
           ?>
             <tr style="text-align: center;">
                  <td><?php echo $count++?></td>
                  <td><?php echo $std['fcode']; ?></td>
                  <td><?php echo $std['fname']; ?></td>
                  <td><?php echo $std['crcode']; ?></td>
                  <td><?php echo $std['crname']; ?></td>
             </tr>
           <?php }?>
        </table>
        </div>
      </div>


      <div class="tab-pane fade" id="diploma">
          <h4 class="mt-2">List Diploma in UiTM Perlis</h4>
          <br/>

          <div class="container" >
            <table border="3" width="100%" height="auto">
               <tr style="text-align: center;">
                   <th> ID </th>
                   <th> Faculty Code</th>
                   <th> Faculty Name</th>
                   <th> Course Code</th>
                   <th> Course Name</th>
               </tr>
        <?php
        $count=1;
        $sql="SELECT *
        FROM `faculty`
        JOIN `course`
        ON faculty.fid = course.fid
        WHERE crname LIKE '%diploma%'
        ORDER BY fcode";
         $result=mysqli_query($connection,$sql);
         while($std=mysqli_fetch_array($result)){
         ?>
           <tr style="text-align: center;">
                <td><?php echo $count++?></td>
                <td><?php echo $std['fcode']; ?></td>
                <td><?php echo $std['fname']; ?></td>
                <td><?php echo $std['crcode']; ?></td>
                <td><?php echo $std['crname']; ?></td>
           </tr>
         <?php }?>
      </table>
      </div>
    </div>


    <div class="tab-pane fade" id="faculty">
        <h4 class="mt-2">List Faculty in UiTM Perlis</h4>
        <br/>

        <div class="container" >
          <table border="3" width="100%" height="auto">
             <tr style="text-align: center;">
                 <th> ID </th>
                 <th> Faculty Code</th>
                 <th> Faculty Name</th>
             </tr>
      <?php
      $count=1;
      $sql="SELECT *
      FROM `faculty`
      ORDER BY fcode";
       $result=mysqli_query($connection,$sql);
       while($std=mysqli_fetch_array($result)){
       ?>
         <tr style="text-align: center;">
              <td><?php echo $count++?></td>
              <td><?php echo $std['fcode']; ?></td>
              <td><?php echo $std['fname']; ?></td>
        </tr>
       <?php }?>
    </table>
    </div>
    </div>

    <div class="tab-pane fade" id="course">
        <h4 class="mt-2">List Course in UiTM Perlis</h4>
        <br/>

        <div class="container" >
          <table border="3" width="100%" height="auto">
             <tr style="text-align: center;">
                 <th> ID </th>
                 <th> Course Code</th>
                 <th> Course Name</th>
             </tr>
      <?php
      $count=1;
      $sql="SELECT *
      FROM `course`
      ORDER BY crcode";
       $result=mysqli_query($connection,$sql);
       while($std=mysqli_fetch_array($result)){
       ?>
         <tr style="text-align: center;">
              <td><?php echo $count++?></td>
              <td><?php echo $std['crcode']; ?></td>
              <td><?php echo $std['crname']; ?></td>
         </tr>
       <?php }?>
    </table>
    </div>
    </div>


    </div>
</div>
</body>
</html>
