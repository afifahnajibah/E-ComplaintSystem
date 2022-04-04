<?php

   $id= $_GET['delete_id'];

   include("../includes/config.php");

   $sql = "DELETE FROM `complaintaction` WHERE cid = '$id'";


    if ($connection->query($sql) === TRUE) {
      echo "";

          $sql = "DELETE FROM `complaint` WHERE cid = '$id'";

          if ($connection->query($sql) === TRUE) {
            echo "Record deleted successfully";
            header("Location: studentindex.php");

          } else {
            echo "Error deleting record: " . $connection->error;
          }

    header("Location: studentindex.php");
    } else {
      echo "Error deleting record: " . $connection->error;
    }


?>
