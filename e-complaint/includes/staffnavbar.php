<?php

   if(isset($_SESSION['sid'])==false) {
?>

<div class="topnav">
  <img src="../assets/css/logo.png" alt="uitm logo.png" class="logo" width="130" height="50">
  <a href="index.php" id="home">HOME</a>
  <!--
  <a href="#" id="admission">ADMISSION</a>
  <a href="programmes.php" id="coperate">PROGRAMMES</a>
  <a href="#" id="academic">ACADEMIC</a>
-->
<a style="float: right" href="stafflogin.php" id="login">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="26" fill="currentColor" style="float: right; margin-left: 10px" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
LOGIN</a>

</div>


 <?php } else{ ?>
   <div class="topnav">
     <img src="../assets/css/logo.png" alt="uitm logo.png" style="float: left; margin:16px;" width="130" height="50">
     <a href="staffindex.php" id="home">HOME</a>
     <a href="createacc.php" id="admission">CREATE ACCOUNT</a>
     <a href="showstudent.php" id="admission">STUDENT LIST</a>
     <a href="showcomplaint.php" id="academic">MANAGE COMPLAINT</a>

     <?php
     $sql="SELECT * FROM `staff`";
     $result=mysqli_query($connection,$sql) or die( mysqli_error($connection));
     $std=mysqli_fetch_assoc($result)
      ?>

     <a href="logout.php" id="logout" style="float: right; margin-left:26px;">LOGOUT, <?php echo mb_strtoupper($std['susername']);?></a>

   </div>
    <?php } ?>
