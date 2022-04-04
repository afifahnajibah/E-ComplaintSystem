
<?php

   if(isset($_SESSION['stid'])==false) {
?>

      <div class="topnav">
        <img src="../assets/css/logo.png" alt="uitm logo.png" class="logo" width="130" height="50">
        <a href="index.php" id="home">HOME</a>
        <!--<a href="#" id="admission">ADMISSION</a>
        <a href="#" id="coperate">COPERATE</a>
        <a href="programmes.php" id="academic">PROGRAMMES</a>-->


        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" style="float: right; margin:16px;" class="bi bi-person-circle" viewBox="0 0 16 16">
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
        </svg>

        <a style="float: right" href="studentlogin.php" id="login">LOGIN</a>
      </div>

      <!--
      <div  id="mySidenav" class="sidenav">
        <a href="index.php" id="home">HOME</a>
        <a href="#" id="admission">ADMISSION</a>
        <a href="#" id="coperate">COPERATE</a>
        <a href="programmes.php" id="academic">PROGRAMMES</a>
        <a href="studentlogin.php" id="login">LOGIN</a>
      </div>
      -->

 <?php } else{ ?>

   <div class="topnav">
     <img src="../assets/css/logo.png" alt="uitm logo.png" class="logo" width="130" height="50">
     <a href="studentindex.php" id="home">HOME</a>
     <a href="makecomplaint.php" id="admission">LODGE COMPLAINT</a>
     <a href="historylog.php?id=<?php echo $_SESSION['stid']; ?>" id="academic">HISTORY LOG</a>
     <a href="myaccount.php?id=<?php echo $_SESSION['stid']; ?>" id="academic">MY ACCOUNT</a>

     <!-- START if stprofilepic == null display login icons else display profilepic -->
     <?php
     $id = $_SESSION['stid'];
     $sql="SELECT * FROM `student` WHERE stid = $id";
     $result=mysqli_query($connection,$sql) or die(mysqli_error($connection));
     while ($std=mysqli_fetch_array($result)){
      ?>
      <?php if($std['stprofilepic'] == NULL){

            echo '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" style="float: right; margin:16px;"
                  class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                  </svg>';

      }else{ ?>
            <img src=../assets/css/<?php echo $std['stprofilepic'];?>
                 alt="Avatar" style="width:60px; height:60px; float:right; margin:16px; border-radius: 50%">
      <?php  }} ?>
      <!-- END if stprofilepic == null display login icons else display profilepic -->

    <a href="logout.php" id="logout" style="float: right">LOGOUT</a>
  </div>

  <!--
   <div>
     <a href="index.php" id="home">HOME</a>
     <a href="makecomplaint.php" id="admission">LODGE COMPLAINT</a>
     <a href="programmes.php" id="academic">PROGRAMMES</a>
     <a href="logout.php" id="logout">LOGOUT</a>
   </div>
 -->
<?php } ?>
