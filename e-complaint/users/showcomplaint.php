<?php
    session_start();

    $id = $_SESSION['sid'];

    include ('../includes/config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>E-COMPLAINT</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="../assets/css/main.css">
<style>

	.bs-example{
      margin-top: 16px;
      margin-left: 6px;
      position:absolute;
      left:100px;
      right:10px;
    }

  .row{
    margin: 20px;
  }
  .hidden{
    display: none;
  }
</style>
</head>

<script type="text/javascript">
 function delete_id(id)
 {
    if(confirm('Sure To Remove This Complaint ?'))
    {
     window.location.href='deletemanagecomplaint.php?delete_id='+id;
    }
 }
</script>

<body>
  <?php include ('../includes/staffnavbar.php'); ?>

 <!--                      top tab menu------------------------------>
  <div class="bs-example">
      <ul class="nav nav-tabs">

          <li class="nav-item">
              <a href="#general" class="nav-link" data-toggle="tab">
                <i class="icon-tasks"></i>
                GENERAL
                <?php
               $result = mysqli_query($connection, "SELECT * FROM complaint where cdepartment = 'GENERAL' ");
               ?>
              </a>
          </li>

          <li class="nav-item">
              <a href="#facilities" class="nav-link" data-toggle="tab">
                <i class="icon-tasks"></i>
                FACILITIES
                <?php
                $result = mysqli_query($connection, "SELECT * FROM complaint where cdepartment = 'FACILITIES' ");
                ?>
              </a>
          </li>

          <li class="nav-item">
              <a href="#ict" class="nav-link" data-toggle="tab">
                <i class="icon-inbox"></i>
                ICT
                <?php
                $result = mysqli_query($connection, "SELECT * FROM complaint where cdepartment = 'ICT' ");
                ?>
              </a>
          </li>

      </ul>
      <!--                    end tab menu------------------------->

      <!--                      tab general department----------------------------------------------------------------------------------->
      <div class="container">
      <div class="tab-content">
          <div class="tab-pane fade show active" id="general">
          <h1 class="leaderboard">GENERAL COMPLAINT</h1>
            <!--     general & Null --------------------->

            <br/>
            <div class="row">
            <h4>
                  <i class="icon-tasks"></i>
                  Not Process Yet Complaint
                  <?php
                 $result = mysqli_query($connection, "SELECT * FROM complaint WHERE cstatus is null AND cdepartment = 'GENERAL' ");
                 $num1 = mysqli_num_rows($result);
                 {
                    echo htmlentities($num1);
                 } ?>
            </h4>

            <table>
                  <tr style="text-align: center;" class="trhead">
                     <th> Complaint ID </th>
                     <th> Student ID</th>
                     <th> Complaint Date</th>
                     <th> Block</th>
                     <th> Complaint title</th>
                     <th colspan="2"> Action </th>
                 </tr>

         <?php
          $sql="SELECT *
          FROM `student`
          JOIN `complaint`
          ON student.stid = complaint.stid
          WHERE complaint.cstatus is null AND complaint.cdepartment = 'general'
          ORDER BY complaint.cdate";
           $result=mysqli_query($connection,$sql);
           while($std=mysqli_fetch_array($result)){
           ?>
             <tr style="text-align: center;">
                  <td><?php echo $std['cid']; ?></td>
                  <td><?php echo $std['stid']; ?></td>
                  <td><?php echo $std['cdate']; ?></td>
                  <td><?php echo $std['cblock']; ?></td>
                  <td><?php echo $std['ctitle']; ?></td>
                  <!-- null status
                  <td>
                  <?php //if( $std['cstatus'] == NULL){
                  //        echo "NotProcessYet";
                  //      }else
                  //        echo $std['cstatus']; ?>
                  </td>
                  <!------>
                  <td> <button class="btn-login" onclick="window.location='viewcomplaint.php?id=<?php echo $std['cid']; ?>'"> VIEW DETAILS </button> </td>
                  <td> <button class="btn-login btn-danger" onclick="delete_id(id=<?php echo $std['cid'];?>)"> DELETE </button> </td>
             </tr>
           <?php }?>
        </table>
      </div> <!-- row 1 -->

      <!--     general & InProcess -------------------->
      <div class="row">
      <h4>
             Pending Complaint
             <?php
            $cstatus="InProcess";
            $result = mysqli_query($connection, "SELECT * FROM complaint WHERE cstatus = '$cstatus' AND cdepartment = 'GENERAL' ");
            $num1 = mysqli_num_rows($result);
            {
            echo htmlentities($num1);
            } ?>
      </h4>

        <table width="100%" height="auto">
            <tr style="text-align: center;" class="trhead">
               <th> Complaint ID </th>
               <th> Student ID</th>
               <th> Complaint Date</th>
               <th> Block</th>
               <th> Complaint title</th>
               <th colspan="2"> Action </th>
           </tr>

      <?php
      $sql="SELECT *
      FROM `student`
      JOIN `complaint`
      ON student.stid = complaint.stid
      WHERE complaint.cstatus = 'InProcess' AND complaint.cdepartment = 'general'
      ORDER BY complaint.cdate";
      $result=mysqli_query($connection,$sql);
      while($std=mysqli_fetch_array($result)){
      ?>
       <tr style="text-align: center;">
            <td><?php echo $std['cid']; ?></td>
            <td><?php echo $std['stid']; ?></td>
            <td><?php echo $std['cdate']; ?></td>
            <td><?php echo $std['cblock']; ?></td>
            <td><?php echo $std['ctitle']; ?></td>
            <!-- null status
            <td>
            <?php //if( $std['cstatus'] == NULL){
            //        echo "NotProcessYet";
            //      }else
            //        echo $std['cstatus']; ?>
            </td>
            <!------>
            <td> <button class="btn-login" onclick="window.location='viewcomplaint.php?id=<?php echo $std['cid']; ?>'"> VIEW DETAILS </button> </td>
            <td> <button class="btn-login btn-danger" onclick="delete_id(id=<?php echo $std['cid'];?>)"> DELETE </button> </td>
       </tr>
      <?php }?>
      </table>
      </div> <!-- row 2-->

       <!--     general & Closed -------------------->
       <div class="row">
       <h4>
             Closed Complaints
             <?php
            $cstatus="Closed";
            $result = mysqli_query($connection, "SELECT * FROM complaint   WHERE cstatus = '$cstatus' AND cdepartment = 'GENERAL' ");
            $num1 = mysqli_num_rows($result);
           {
              echo htmlentities($num1);
           } ?>
       </h4>

         <table width="100%" height="auto">
             <tr style="text-align: center;" class="trhead">
                <th> Complaint ID </th>
                <th> Student ID</th>
                <th> Complaint Date</th>
                <th> Block</th>
                <th> Complaint title</th>
                <th colspan="2"> Action </th>
            </tr>
      <?php
      $sql="SELECT *
      FROM `student`
      JOIN `complaint`
      ON student.stid = complaint.stid
      WHERE complaint.cstatus = 'Closed' AND complaint.cdepartment = 'general'
      ORDER BY complaint.cdate";
      $result=mysqli_query($connection,$sql);
      while($std=mysqli_fetch_array($result)){
      ?>
        <tr style="text-align: center;">
             <td><?php echo $std['cid']; ?></td>
             <td><?php echo $std['stid']; ?></td>
             <td><?php echo $std['cdate']; ?></td>
             <td><?php echo $std['cblock']; ?></td>
             <td><?php echo $std['ctitle']; ?></td>
             <!-- null status
             <td>
             <?php //if( $std['cstatus'] == NULL){
             //        echo "NotProcessYet";
             //      }else
             //        echo $std['cstatus']; ?>
             </td>
             <!------>
             <td> <button class="btn-login" onclick="window.location='viewcomplaint.php?id=<?php echo $std['cid']; ?>'"> VIEW DETAILS </button> </td>
             <td> <button class="btn-login btn-danger" onclick="delete_id(id=<?php echo $std['cid'];?>)"> DELETE </button> </td>
        </tr>
      <?php }?>
      </table>
      </div> <!-- row 3-->
    </div><!-- tab pane-->
      <!--                  end tab general department------------------------------------------------------------------->

      <!--                 start tab facilities department---------------------------------------------------------------->
       <div class="tab-pane fade" id="facilities">
       <h1 class="leaderboard">FACILITIES DEPARTMENT</h1>
            <!--     facilities & Null -------------------->

            <br/>
            <div class="row">
            <h4>
                  <i class="icon-tasks"></i>
                  Not Process Yet Complaint
                  <?php
                 $result = mysqli_query($connection, "SELECT * FROM complaint WHERE cstatus is null AND cdepartment = 'FACILITIES' ");
                 $num1 = mysqli_num_rows($result);
                 {
                    echo htmlentities($num1);
                 } ?>

            </h4>


              <table width="90%" height="auto">
                  <tr style="text-align: center;" class="trhead">
                     <th> Complaint ID </th>
                     <th> Student ID</th>
                     <th> Complaint Date</th>
                     <th> Block</th>
                     <th> Complaint title</th>
                     <th colspan="2"> Action </th>
                 </tr>
          <?php
          $sql="SELECT *
          FROM `student`
          JOIN `complaint`
          ON student.stid = complaint.stid
          WHERE complaint.cstatus is null AND complaint.cdepartment = 'facilities'
          ORDER BY complaint.cdate";
           $result=mysqli_query($connection,$sql);
           while($std=mysqli_fetch_array($result)){
           ?>
             <tr style="text-align: center;">
                  <td><?php echo $std['cid']; ?></td>
                  <td><?php echo $std['stid']; ?></td>
                  <td><?php echo $std['cdate']; ?></td>
                  <td><?php echo $std['cblock']; ?></td>
                  <td><?php echo $std['ctitle']; ?></td>
                  <!-- null status
                  <td>
                  <?php //if( $std['cstatus'] == NULL){
                  //        echo "NotProcessYet";
                  //      }else
                  //        echo $std['cstatus']; ?>
                  </td>
                  <!------>
                  <td> <button class="btn-login" onclick="window.location='viewcomplaint.php?id=<?php echo $std['cid']; ?>'"> VIEW DETAILS </button> </td>
                  <td> <button class="btn-login btn-danger" onclick="delete_id(id=<?php echo $std['cid'];?>)"> DELETE </button> </td>
             </tr>
           <?php }?>
        </table>
      </div> <!-- row 1 -->

      <!--     facilities & InProcess -------------------->
      <div class="row">
      <h4>
             Pending Complaint
             <?php
            $cstatus="InProcess";
            $result = mysqli_query($connection, "SELECT * FROM complaint WHERE cstatus = '$cstatus' AND cdepartment = 'FACILITIES' ");
            $num1 = mysqli_num_rows($result);
            {
            echo htmlentities($num1);
            } ?>
      </h4>


        <table width="100%" height="auto">
            <tr style="text-align: center;" class="trhead">
               <th> Complaint ID </th>
               <th> Student ID</th>
               <th> Complaint Date</th>
               <th> Block</th>
               <th> Complaint title</th>
               <th colspan="2"> Action </th>
           </tr>
      <?php
      $sql="SELECT *
      FROM `student`
      JOIN `complaint`
      ON student.stid = complaint.stid
      WHERE complaint.cstatus = 'InProcess' AND complaint.cdepartment = 'facilities'
      ORDER BY complaint.cdate";
      $result=mysqli_query($connection,$sql);
      while($std=mysqli_fetch_array($result)){
      ?>
       <tr style="text-align: center;">
            <td><?php echo $std['cid']; ?></td>
            <td><?php echo $std['stid']; ?></td>
            <td><?php echo $std['cdate']; ?></td>
            <td><?php echo $std['cblock']; ?></td>
            <td><?php echo $std['ctitle']; ?></td>
            <!-- null status
            <td>
            <?php //if( $std['cstatus'] == NULL){
            //        echo "NotProcessYet";
            //      }else
            //        echo $std['cstatus']; ?>
            </td>
            <!------>
            <td> <button class="btn-login" onclick="window.location='viewcomplaint.php?id=<?php echo $std['cid']; ?>'"> VIEW DETAILS </button> </td>
            <td> <button class="btn-login btn-danger" onclick="delete_id(id=<?php echo $std['cid'];?>)"> DELETE </button> </td>
       </tr>
      <?php }?>
      </table>
      </div> <!-- row 2-->

       <!--     facilities & Closed -------------------->
       <div class="row">
       <h4>
             Closed Complaints
             <?php
            $cstatus="Closed";
            $result = mysqli_query($connection, "SELECT * FROM complaint   WHERE cstatus = '$cstatus' AND cdepartment = 'FACILITIES' ");
            $num1 = mysqli_num_rows($result);
           {
              echo htmlentities($num1);
           } ?>
       </h4>

         <table width="100%" height="auto">
             <tr style="text-align: center;" class="trhead">
                <th> Complaint ID </th>
                <th> Student ID</th>
                <th> Complaint Date</th>
                <th> Block</th>
                <th> Complaint title</th>
                <th colspan="2"> Action </th>
            </tr>
      <?php
      $sql="SELECT *
      FROM `student`
      JOIN `complaint`
      ON student.stid = complaint.stid
      WHERE complaint.cstatus = 'Closed' AND complaint.cdepartment = 'facilities'
      ORDER BY complaint.cdate";
      $result=mysqli_query($connection,$sql);
      while($std=mysqli_fetch_array($result)){
      ?>
        <tr style="text-align: center;">
             <td><?php echo $std['cid']; ?></td>
             <td><?php echo $std['stid']; ?></td>
             <td><?php echo $std['cdate']; ?></td>
             <td><?php echo $std['cblock']; ?></td>
             <td><?php echo $std['ctitle']; ?></td>
             <!-- null status
             <td>
             <?php //if( $std['cstatus'] == NULL){
             //        echo "NotProcessYet";
             //      }else
             //        echo $std['cstatus']; ?>
             </td>
             <!------>
             <td> <button class="btn-login" onclick="window.location='viewcomplaint.php?id=<?php echo $std['cid']; ?>'"> VIEW DETAILS </button> </td>
             <td> <button class="btn-login btn-danger" onclick="delete_id(id=<?php echo $std['cid'];?>)"> DELETE </button> </td>
        </tr>
      <?php }?>
      </table>
      </div> <!-- row 3-->
   </div><!-- tab pane-->
   <!--                   end tab facilities department-------------------------------------------------------------------->

   <!--                  start tab ict department--------------------------------------------------------------------------->
    <div class="tab-pane fade" id="ict">
    <h1 class="leaderboard">ICT DEPARTMENT</h1>
         <!--     facilities & Null -------------------->

         <br/>
         <div class="row">
         <h4>
               <i class="icon-tasks"></i>
               Not Process Yet Complaint
               <?php
              $result = mysqli_query($connection, "SELECT * FROM complaint WHERE cstatus is null AND cdepartment = 'ICT' ");
              $num1 = mysqli_num_rows($result);
              {
                 echo htmlentities($num1);
              } ?>

         </h4>


           <table width="90%" height="auto">
               <tr style="text-align: center;" class="trhead">
                  <th> Complaint ID </th>
                  <th> Student ID</th>
                  <th> Complaint Date</th>
                  <th> Block</th>
                  <th> Complaint title</th>
                  <th colspan="2"> Action </th>
              </tr>
       <?php
       $sql="SELECT *
       FROM `student`
       JOIN `complaint`
       ON student.stid = complaint.stid
       WHERE complaint.cstatus is null AND complaint.cdepartment = 'ict'
       ORDER BY complaint.cdate";
        $result=mysqli_query($connection,$sql);
        while($std=mysqli_fetch_array($result)){
        ?>
          <tr style="text-align: center;">
               <td><?php echo $std['cid']; ?></td>
               <td><?php echo $std['stid']; ?></td>
               <td><?php echo $std['cdate']; ?></td>
               <td><?php echo $std['cblock']; ?></td>
               <td><?php echo $std['ctitle']; ?></td>
               <!-- null status
               <td>
               <?php //if( $std['cstatus'] == NULL){
               //        echo "NotProcessYet";
               //      }else
               //        echo $std['cstatus']; ?>
               </td>
               <!------>
               <td> <button class="btn-login" onclick="window.location='viewcomplaint.php?id=<?php echo $std['cid']; ?>'"> VIEW DETAILS </button> </td>
               <td> <button class="btn-login btn-danger" onclick="delete_id(id=<?php echo $std['cid'];?>)"> DELETE </button> </td>
          </tr>
        <?php }?>
     </table>
   </div> <!-- row 1 -->

   <!--     facilities & InProcess -------------------->
   <div class="row">
   <h4>
          Pending Complaint
          <?php
         $cstatus="InProcess";
         $result = mysqli_query($connection, "SELECT * FROM complaint WHERE cstatus = '$cstatus' AND cdepartment = 'ICT' ");
         $num1 = mysqli_num_rows($result);
         {
         echo htmlentities($num1);
         } ?>
   </h4>


     <table width="100%" height="auto">
         <tr style="text-align: center;" class="trhead">
            <th> Complaint ID </th>
            <th> Student ID</th>
            <th> Complaint Date</th>
            <th> Block</th>
            <th> Complaint title</th>
            <th colspan="2"> Action </th>
        </tr>
   <?php
   $sql="SELECT *
   FROM `student`
   JOIN `complaint`
   ON student.stid = complaint.stid
   WHERE complaint.cstatus = 'InProcess' AND complaint.cdepartment = 'ict'
   ORDER BY complaint.cdate";
   $result=mysqli_query($connection,$sql);
   while($std=mysqli_fetch_array($result)){
   ?>
    <tr style="text-align: center;">
         <td><?php echo $std['cid']; ?></td>
         <td><?php echo $std['stid']; ?></td>
         <td><?php echo $std['cdate']; ?></td>
         <td><?php echo $std['cblock']; ?></td>
         <td><?php echo $std['ctitle']; ?></td>
         <!-- null status
         <td>
         <?php //if( $std['cstatus'] == NULL){
         //        echo "NotProcessYet";
         //      }else
         //        echo $std['cstatus']; ?>
         </td>
         <!------>
         <td> <button class="btn-login" onclick="window.location='viewcomplaint.php?id=<?php echo $std['cid']; ?>'"> VIEW DETAILS </button> </td>
         <td> <button class="btn-login btn-danger" onclick="delete_id(id=<?php echo $std['cid'];?>)"> DELETE </button> </td>
    </tr>
   <?php }?>
   </table>
   </div> <!-- row 2-->

    <!--     facilities & Closed -------------------->
    <div class="row">
    <h4>
          Closed Complaints
          <?php
         $cstatus="Closed";
         $result = mysqli_query($connection, "SELECT * FROM complaint   WHERE cstatus = '$cstatus' AND cdepartment = 'ICT' ");
         $num1 = mysqli_num_rows($result);
        {
           echo htmlentities($num1);
        } ?>
    </h4>

      <table width="100%" height="auto">
          <tr style="text-align: center;" class="trhead">
             <th> Complaint ID </th>
             <th> Student ID</th>
             <th> Complaint Date</th>
             <th> Block</th>
             <th> Complaint title</th>
             <th colspan="2"> Action </th>
         </tr>
   <?php
   $sql="SELECT *
   FROM `student`
   JOIN `complaint`
   ON student.stid = complaint.stid
   WHERE complaint.cstatus = 'Closed' AND complaint.cdepartment = 'ict'
   ORDER BY complaint.cdate";
   $result=mysqli_query($connection,$sql);
   while($std=mysqli_fetch_array($result)){
   ?>
     <tr style="text-align: center;">
          <td><?php echo $std['cid']; ?></td>
          <td><?php echo $std['stid']; ?></td>
          <td><?php echo $std['cdate']; ?></td>
          <td><?php echo $std['cblock']; ?></td>
          <td><?php echo $std['ctitle']; ?></td>
          <!-- null status
          <td>
          <?php //if( $std['cstatus'] == NULL){
          //        echo "NotProcessYet";
          //      }else
          //        echo $std['cstatus']; ?>
          </td>
          <!------>
          <td> <button class="btn-login" onclick="window.location='viewcomplaint.php?id=<?php echo $std['cid']; ?>'"> VIEW DETAILS </button> </td>
          <td> <button class="btn-login btn-danger" onclick="delete_id(id=<?php echo $std['cid'];?>)"> DELETE </button> </td>
     </tr>
   <?php }?>
   </table>
   </div> <!-- row 3-->
</div><!-- tab pane-->
<!--                   end tab ict department--------->
 </div>
 </div><!-- tab content-->
 </div><!-- bs-example-->

</body>
</html>
