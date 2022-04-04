<?php
    include("../includes/config.php");
    session_start();
    $id = $_SESSION['stid'];
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
    <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">

    <style>


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
      color:red;
    }


    </style>

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50" class="bgindex">

    <?php include("../includes/navbar.php");?>

       <!--section-->
        <div class="container">
          <h1 class="leaderboard">MY COMPLAINT HISTORY</h1>

          <?php
          $count=1;
          $sql="SELECT *
          FROM `student`, `complaintaction`, `complaint`
          WHERE student.stid = complaint.stid AND complaint.cid = complaintaction.cid
          AND student.stid = $id AND complaint.cstatus = 'Closed'";

          $result=mysqli_query($connection,$sql);
          $rows=mysqli_num_rows($result);

          if($rows == 0){?>

           <table>
                  <tr class="trhead">
                      <th>NO HISTORY LOG</th>
                  </tr>
                  <tr>
                      <td>YOU DON'T HAVE ANY CLOSED COMPLAINT</td>
                  </tr>
            </table>

        <?php }else{ ?>


          <table>
           <tr class="trhead">
               <th> NO.</th>
               <th> COMPLAINT MADE</th>
               <th> CLOSED COMPLAINT</th>
               <th> COMPLAINT TITLE</th>
               <th> COMPLAINT DESCRIPTION</th>
               <th> STATUS</th>
           </tr>

           <?php while($std=mysqli_fetch_array($result)){?>
           <tr>
                <td><?php echo $count++ ?></td>
                <td><?php echo $std['cdate']; ?></td>
                <td><?php echo $std['atimestamp']; ?></td>
                <td><?php echo $std['ctitle']; ?></td>
                <td><?php echo $std['cdescription']; ?></td>
                <!-- null status -->
                <td class='bg'>
                <?php if( $std['cstatus'] == NULL){
                        echo "<p class='bg2'> NotProcessYet</p>";
                      }else
                        echo $std['cstatus']; ?>
                </td>
           </tr>
           <?php }?>
           </table>


      <?php }?>


        </div>

</body>
</html>
