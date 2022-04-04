
<?php
    include("../includes/config.php");
    session_start();
    $id = $_SESSION['stid'];

    if(isset($_POST['submit']))
    {
        $stusername=$_POST['stusername'];

        if ($connection->connect_error) {
          die("Connection failed: " . $connection->connect_error);
        }

        $sql= "UPDATE student SET stusername = '$stusername'
               WHERE stid ='$id'";

          if($connection->query($sql) == TRUE){
            echo "";
          } else{
            echo "Error updating record:" .$connection->error;
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="../assets/js/main.js"></script>
    <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">

<style>

    p{
      font-size: 15px;
    }

    .btn-login{
      border-radius: 15px 25px;
      box-shadow: 5px 8px 10px #888888;
      color: black;
    }

    .container{
        margin-top: 30px;
      	margin-left: auto;
        margin-right: auto;
        position:relative;
      }

      tr,td,th{
         text-align: center;
         padding:16px;
         font-size: 15px;
         border-radius: 15px;
      }

      table .trhead{
        background-color: rgba(203,193,184, 0.5);
      }

      table{
        box-shadow: 5px 10px 18px #888888;
        background-color: white;
        width:100%;
        height: auto;
        margin-left: auto;
        margin-right: auto;
        animation: shake 0.5s;
        animation-iteration-count: 1;
        animation-delay: 0s;
      }

    @keyframes shake {
      0% { transform: translate(1px, 1px) rotate(0deg); }
      10% { transform: translate(-1px, -2px) rotate(-1deg); }
      20% { transform: translate(-3px, 0px) rotate(1deg); }
      30% { transform: translate(3px, 2px) rotate(0deg); }
      40% { transform: translate(1px, -1px) rotate(1deg); }
      50% { transform: translate(-1px, 2px) rotate(-1deg); }
      60% { transform: translate(-3px, 1px) rotate(0deg); }
      70% { transform: translate(3px, 1px) rotate(-1deg); }
      80% { transform: translate(-1px, -1px) rotate(1deg); }
      90% { transform: translate(1px, 2px) rotate(0deg); }
      100% { transform: translate(1px, -2px) rotate(-1deg); }
    }

    .bg{
      background-color: rgba(0, 0, 0, 0.6);
      color: white;
    }
    .bg2{
      color:white;
    }

</style>

</head>

<script type="text/javascript">
 function delete_id(id)
 {
    if(confirm('Sure To Remove This Complaint ?'))
    {
     window.location.href='deletecomplaint.php?delete_id='+id;
    }
 }
</script>

<body data-spy="scroll" data-target=".navbar" data-offset="50" class="bgindex">

    <?php include("../includes/navbar.php");?>

       <!--section-->
        <div class="container">

          <?php
          $sql="SELECT * FROM `student` WHERE stid = $id";
          $result=mysqli_query($connection,$sql) or die(mysqli_error($connection));
          while ($std=mysqli_fetch_array($result)){
           ?>
           <?php if($std['stusername'] == NULL){ ?>

             <div>
               <h1 class="leaderboard"> <?php echo $std['stname']; ?>, please insert your nickname first </h1>
             </div>

             <form action="" method="post">
               <div class="input-group">
                  <input type="text" name="stusername" class="form-control" style="width:50%">
                  <button type="submit" name="submit" style="margin-left:10px; height:33px">
                  <span style="cursor:pointer;"> CONFIRM </span>
                  </button>
                </div>
             </form>


           <?php }else{ ?>

             <h1 id="afterlog">
               WELCOME,
               <?php echo $std['stusername']; ?>
               <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-gem" viewBox="0 0 16 16">
               <path d="M3.1.7a.5.5 0 0 1 .4-.2h9a.5.5 0 0 1 .4.2l2.976 3.974c.149.185.156.45.01.644L8.4 15.3a.5.5 0 0 1-.8 0L.1 5.3a.5.5 0 0 1 0-.6l3-4zm11.386 3.785-1.806-2.41-.776 2.413 2.582-.003zm-3.633.004.961-2.989H4.186l.963 2.995 5.704-.006zM5.47 5.495 8 13.366l2.532-7.876-5.062.005zm-1.371-.999-.78-2.422-1.818 2.425 2.598-.003zM1.499 5.5l5.113 6.817-2.192-6.82L1.5 5.5zm7.889 6.817 5.123-6.83-2.928.002-2.195 6.828z"/>
               </svg>

             </h1>
          <?php }} ?>


        <!---            table after login----------------------->
             <br/>
             <div class="page-header">
               <h1 class="leaderboard"> MY RECENT COMPLAINT</h1>
             </div>

             <?php
             $count=1;
             $sql="SELECT *
             FROM `student`, `complaintaction`, `complaint`
             WHERE student.stid = complaint.stid AND complaint.cid = complaintaction.cid
             AND student.stid = $id
             AND (complaint.cstatus is null or complaint.cstatus = 'InProcess')
             ORDER BY complaint.cdate DESC";

             $result=mysqli_query($connection,$sql);
             $rows=mysqli_num_rows($result);

             if($rows == 0){?>

              <table>
                     <tr class="trhead">
                         <th>NO RECENT COMPLAINT</th>
                     </tr>
                     <tr>
                         <td>YOU DON'T HAVE ANY RECENT COMPLAINT</td>
                     </tr>
               </table>

               <div><br/>
                 <p style="text-align:center"> Seems like you don't have any complaint made yet. First time here?</p>
                   <p style="text-align:center">
                     If you want to make a complaint you can click this
                     <span onclick="window.location='makecomplaint.php'" style="cursor:pointer; color:green">
                       'Lodge Complaint'
                     </span>
                      and we will guide you step by step on how to make complaint.
                   </p>
              </div>

           <?php }else{ ?>

             <div>
               <p style="text-align:center">
                   <span style="color:green">'Time & Date updated'</span> column in table below shows the time of your complaint being process.
               </p>
             </div>

             <table>
              <tr class="trhead">
                  <th> COMPLAINT ID</th>
                  <th> COMPLAINT DATE</th>
                  <th> COMPLAINT TITLE</th>
                  <th> TIME & DATE UPDATED</th>
                  <th> STATUS</th>
                  <th colspan="2"> ACTION</th>
              </tr>

              <?php while($std=mysqli_fetch_array($result)){?>

              <tr>
                   <td><?php echo $std['cid'];  ?></td>
                   <td><?php echo $std['cdate']; ?></td>
                   <td><?php echo $std['ctitle']; ?></td>
                   <!-- null timestamp -->
                   <td>
                   <?php if( $std['atimestamp'] == NULL){
                           echo "<p>Please Wait</p>";
                         }else
                           echo $std['atimestamp']; ?>
                   </td>
                   <!-- null status -->
                   <td class='bg'>
                   <?php if( $std['cstatus'] == NULL){
                           echo "<p class='bg2'> Not Process Yet</p>";
                         }else
                           echo $std['cstatus']; ?>
                   </td>

                   <td> <button class="btn-login" onclick="window.location='updatecomplaint.php?id=<?php echo $std['cid']; ?>'"> VIEW DETAILS </button> </td>

                   <td>
                         <?php if($std['cstatus'] == 'InProcess'){ ?>
                               <button class="btn-login" onclick="window.location='deletecomplaint.php?id=<?php echo $std['cid']; ?>'" disabled> DELETE </button>
                          <?php }else{ ?>
                               <button class="btn-login btn-danger" onclick="delete_id(id=<?php echo $std['cid'];?>)"> DELETE </button>
                          <?php } ?>
                  </td>
              </tr>
              <?php }?>

              </table>

        <?php }?>
        <br/>
        </div> <!-- container-->
        <br/>
</body>
</html>
