<?php
    session_start();
    $id = $_SESSION['sid'];

    include("../includes/config.php");

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADMIN</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
  </style>
</head>

<body>

<?php include("../includes/staffnavbar.php");?>

<?php
include("../includes/config.php");
$sql="SELECT * FROM `staff` WHERE `sid`='$id'";
$result=mysqli_query($connection,$sql);
$std=mysqli_fetch_assoc($result);
?>

<br/><br/>
<div class="container">
    <p id="afterlog"> Hi, <?php echo $std['susername']; ?>! </p>

  <div>
    <h1 class="leaderboard">Your can control website from here </h2>
  </div>

</div>
</body>
