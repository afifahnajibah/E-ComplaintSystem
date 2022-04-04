
<?php
    include("../includes/config.php");
    session_start();
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="/assets/js/main.js"></script>

    <style>

    </style>

</head>

<body>


    <?php include("../includes/staffnavbar.php");?>
       <br/>
       <!--section-->
          <div class="container">
          <div class="page-header ">
            <h1 class="leaderboard">LIST OF STUDENTS</h1>
          </div>

           <div class="row col-md-12">
           <table width="100%" height="auto" style="float: center;">
              <tr class="trhead">
                  <th> STUDENT ID</th>
                  <th> NAME</th>
                  <th> CONTACT</th>
                  <th> EMAIL</th>
                  <th> USERNAME </th>
                  <th colspan="2"> Action </th>
              </tr>

               <?php
               $sql="SELECT * FROM student ORDER BY stid";
               $result=mysqli_query($connection,$sql) or die( mysqli_error($connection));
               while($std=mysqli_fetch_array($result)){
                ?>
              <tr>
                   <td><?php echo $std['stid']; ?></td>
                   <td><?php echo $std['stname']; ?></td>
                   <td><?php echo $std['stphonenum']; ?></td>

                   <!-- null address
                   <td>
                   <?php /*if($std['staddress'] == NULL){
                           echo "No address inserted";
                         }else
                           echo $std['staddress']; */?>
                   </td>
                   <!------>
                   <td><?php echo $std['stemail']; ?></td>
                   <td><?php echo $std['stusername']; ?></td>
                   <td><button class="btn-login" onClick="location.href ='viewstudent.php?id=<?php echo $std['stid']; ?>'">VIEW DETAILS</button></td>
              </tr>
            <?php }?>
         </table>
       </div>
     </div>

</body>
</html>
