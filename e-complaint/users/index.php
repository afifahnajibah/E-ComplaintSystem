
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
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="/assets/js/main.js"></script>

    <style>

    tr,td,th{
       text-align: center;
       padding:16px;
       font-size: 15px;
       border-radius: 20px 0px;
    }

    table .trhead{
      background-color: rgba(203,193,184, 0.5);
    }

    table{
      box-shadow: 5px 10px 18px #888888;
      width:90%;
      height: auto;
      background-color: rgba(255, 255, 255, 0.8);
      border-radius:20px 20px;
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
      background-color: rgba(0, 0, 0, 0.7);
      color: white;
    }
    .bg2{
      color:white;
    }


    /* tajuk besar "UITM PERLIS" */
    .box {
      background-color: rgba(203,193,184, 0.7);
      width:45%;
      border-radius: 20px;
      position: relative;
      left: 890px;
      padding-left:10px;
      padding:16px;
      top:230px;
    }

    .title{
      font-size: 70px;
      font-family: Arial, san-serif;
    }
    /* end tajuk besar "UITM PERLIS" */

    .box1 {
      background-color: rgba(203,193,184, 0.8);
      width:100%;
      position: relative;
      padding-left:10px;
      padding:16px;
      top:570px;
    }

    .box2 {
      background-color: rgba(203,193,184, 0.8);
      position:relative;
      top:800px;
      width:100%;
      height:auto;
      padding-left:16px;
      padding-right: 16px;
      padding-bottom: 16px;
      padding-top: 5px;

    }

    .transbox {
      margin-left:auto;
      margin-right:auto;
      width:50%;
      background-color: rgba(0, 0, 0, 0.2);
      border: 1px solid black;
      border-radius: 20px;
      opacity: 0.9;
      padding:16px;
    }

    p{
      font-size: 20px; 
    }

    </style>

</head>

<body>

    <?php include("../includes/navbar.php");?>

       <!--section-->
            <div class="box">
            <h1 class="leaderboard" style="font-size:50px;"> UiTM PERLIS <br/>E-COMPLAINT<br/> SYSTEM</h1>
            </div>
        <!--- start display username/nickname avatar -
          <?php// if(isset($_SESSION['stid'])==true) { ?>

           <h1 id="afterlog">
             WELCOME,
             <?php
             //$id = $_SESSION['stid'];
             //$sql="SELECT * FROM student WHERE stid = $id";
             //$result=mysqli_query($connection,$sql) or die( mysqli_error($connection));
             //while($std=mysqli_fetch_array($result));

             //echo $std['stusername']; ?>

             <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-gem" viewBox="0 0 16 16">
             <path d="M3.1.7a.5.5 0 0 1 .4-.2h9a.5.5 0 0 1 .4.2l2.976 3.974c.149.185.156.45.01.644L8.4 15.3a.5.5 0 0 1-.8 0L.1 5.3a.5.5 0 0 1 0-.6l3-4zm11.386 3.785-1.806-2.41-.776 2.413 2.582-.003zm-3.633.004.961-2.989H4.186l.963 2.995 5.704-.006zM5.47 5.495 8 13.366l2.532-7.876-5.062.005zm-1.371-.999-.78-2.422-1.818 2.425 2.598-.003zM1.499 5.5l5.113 6.817-2.192-6.82L1.5 5.5zm7.889 6.817 5.123-6.83-2.928.002-2.195 6.828z"/>
             </svg>

           </h1>
        <!--- end display username/nickname avatar ------------------>
        <div class="box1">
          <div class="page-header">
             <h1> UiTM PERLIS E-COMPLAINT</h1>
           </div><br/>

           <div class="container">
             <p>E-Complaint is a Customer Feedback System.</p>
             <p>It was developed to provide customers with an avenue to voice out their complaints about matters pertaining to UiTM.</p>
             <p>First time here? Want to make complaint?
              <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-emoji-laughing" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M12.331 9.5a1 1 0 0 1 0 1A4.998 4.998 0 0 1 8 13a4.998 4.998 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5zM7 6.5c0 .828-.448 0-1 0s-1 .828-1 0S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 0-1 0s-1 .828-1 0S9.448 5 10 5s1 .672 1 1.5z"/>
              </svg>
              <br/><br/>
              Click <span onclick="window.location='studentlogin.php'" style="cursor:pointer; color:green">'Lodge Complaint' </span> and we will guide you.
             </p>
          </div>
           <br/>
        </div>

        <!---               start after login ----------------------->

          <br/>
          <div class="box2">
          <div class="page-header">
              <p style="text-align:center">Below is the <span style="color:green">'Top 5 Recent Complaint'</span> made by the student</p>
          </div>
          <div class="transbox"><h1 class="leaderboard">LEADERBOARD</h1></div><br/>

           <table>
              <tr class="trhead">
                  <th> NO.</th>
                  <th> USERNAME</th>
                  <th> COMPLAINT DATE</th>
                  <th> BLOCK</th>
                  <th> COMPLAINT TITLE</th>
                  <th> COMPLAINT DESCRIPTION</th>
                  <th> STATUS</th>
              </tr>

               <?php
               $count=1;
               $sql="SELECT *
               FROM `student`
               JOIN `complaint`
               ON student.stid = complaint.stid
               ORDER BY cdate DESC limit 5";
               $result=mysqli_query($connection,$sql) or die( mysqli_error($connection));
               while($std=mysqli_fetch_array($result)){
                ?>
              <tr>
                   <td><?php echo $count++ ?></td>

                   <td>
                     <!--
                     <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-gem" viewBox="0 0 16 16">
                     <path d="M3.1.7a.5.5 0 0 1 .4-.2h9a.5.5 0 0 1 .4.2l2.976 3.974c.149.185.156.45.01.644L8.4 15.3a.5.5 0 0 1-.8 0L.1 5.3a.5.5 0 0 1 0-.6l3-4zm11.386 3.785-1.806-2.41-.776 2.413 2.582-.003zm-3.633.004.961-2.989H4.186l.963 2.995 5.704-.006zM5.47 5.495 8 13.366l2.532-7.876-5.062.005zm-1.371-.999-.78-2.422-1.818 2.425 2.598-.003zM1.499 5.5l5.113 6.817-2.192-6.82L1.5 5.5zm7.889 6.817 5.123-6.83-2.928.002-2.195 6.828z"/>
                     </svg>
                     -->

                     <img src="../assets/css/<?php echo $std['stprofilepic']; ?>" alt="" style="width:60px; height:60px; border-radius: 50%">&nbsp;
                     <?php if( $std['stusername'] == NULL){
                             echo $std['stid'];
                           }else
                             echo $std['stusername']; ?>
                   </td>
                   <td><?php echo $std['cdate']; ?></td>
                   <td><?php echo $std['cblock']; ?></td>
                   <td><?php echo $std['ctitle']; ?></td>
                   <td><?php echo $std['cdescription']; ?></td>
                   <!-- null status -->
                   <td class='bg'>
                   <?php if( $std['cstatus'] == NULL){
                           echo "<p class='bg2'> Not Process Yet</p>";
                         }else
                           echo $std['cstatus']; ?>
                   </td>
                   <!------>

              </tr>
            <?php }?>
         </table>
         </div>
         <br/>


</body>
</html>
