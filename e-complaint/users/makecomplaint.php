
<?php
    include('../includes/config.php');
    session_start();
    $id = $_SESSION['stid'];

    $msg="";

    if(isset($_POST['submit'])){
        $cdate= $_POST['cdate'];
        $cdepartment= $_POST['cdepartment'];
        $ctitle= $_POST['ctitle'];
        $cdescription= $_POST['cdescription'];
        $cblock= $_POST['cblock'];


        $sql_insert1 = "INSERT INTO `complaint`(`cid`,`sid`, `stid`, `cdate`, `ctitle`,
                                `cdescription`,`cdepartment`,`cblock`, `cstatus`)

                        VALUES ('', null, '$id', '$cdate', '$ctitle', '$cdescription', '$cdepartment'
                                , '$cblock', null)";


        if($connection->query($sql_insert1) === FALSE){

          $msg= '<div class="alert alert-warning" style="margin-top:30px";>
                   <strong>Failed!</strong>Please make sure you fill in every question before submiting!
                   </div>' .$connection->error;

        } else{

            $cid = $connection -> insert_id;
            $sql_insert2="INSERT INTO `complaintaction`(`aid`, `sid`,`cid`, `adescription`,`atimestamp`)

                         VALUES('', null ,'$cid', null, null)";

            $insert_res= mysqli_query($connection,$sql_insert2);

            $msg='<div class="alert alert-success" style="margin-top:30px";>
                 <strong>Success!</strong> Complaint Successfully Create.<br/>     
                 </div>';

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
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <link rel="stylesheet" href="../assets/css/main.css">
  <script src="../assets/js/main.js" defer></script>

<style>

  /* start progress bar*/
    :root {
      --primary-color: rgb(165, 121, 64);
    }

    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }

    .width-50 {
      width: 40%;
    }

    .ml-auto {
      margin-left: auto;
    }


    /* Progressbar */
    .progressbar {
      position: relative;
      display: flex;
      justify-content: space-between;
      counter-reset: step;
      margin: 2rem  4rem;
    }

    .progressbar::before,
    .progress {
      content: "";
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      height: 4px;
      width: 100%;
      background-color: #dcdcdc;
      z-index: -1;
    }

    .progress {
      background-color: var(--primary-color);
      width: 0%;
      transition: 0.3s;
    }

    .progress-step {
      width: 2.1875rem;
      height: 2.1875rem;
      background-color: #dcdcdc;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .progress-step::before {
      counter-increment: step;
      content: counter(step);
    }

    .progress-step::after {
      content: attr(data-title);
      position: absolute;
      top: calc(100% + 0.5rem);
      font-size: 0.85rem;
      color:white;
    }

    .progress-step-active {
      background-color: var(--primary-color);
      color: #f3f3f3;
    }

    /* Form */
    .form {
      width: 80%;
      margin: 30px auto;
      border: 1px solid #ccc;
      border-radius: 0.35rem;
      padding: 1.5rem;
      box-shadow:
      4px 4px 4px 0px #d1d9e6 inset,
      -4px -4px 4px 0px #ffffff inset;
      background-color: rgba(203,193,184, 1);
    }

    .form-step {
      display: none;
      transform-origin: top;
      animation: animate 0.5s;
    }

    .form-step-active {
      display: block;
    }

    .input-group {
      margin: 2rem 0;
    }

    @keyframes animate {
      from {
        transform: scale(1, 0);
        opacity: 0;
      }
      to {
        transform: scale(1, 1);
        opacity: 1;
      }
    }
    .row{
      height:100%;
      width: 50px;
    }
    /* Button */
    .btns-group {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 1.5rem;
    }

    .btn {
      padding: 16px;
      display: block;
      text-decoration: none;
      background-color: rgba(0, 0, 0, 0.2);
      text-align: center;
      border-radius: 0.25rem;
      cursor: pointer;
      transition: 0.3s;
      border-radius: 15px 25px;
      box-shadow: 5px 8px 10px #888888;
    }
    .btn:hover {
      box-shadow: 0 0 0 2px #fff, 0 0 0 3px ;
      color: #f3f3f3;
    }
    /* end progress bar*/

    .radio-toolbar {
      margin-left: 10px;
      text-align: center;
    }

    .radio-toolbar input[type="radio"] {
      opacity: 0;
      position: fixed;
      width: 0;
    }

    .radio-toolbar label {
        display: inline-block;
        background-color: #f0efef;
        padding: 8px;
        font-size: 15px;
        border: 3px solid #444;
        border-radius: 4px;
        width: 200px;
        height:auto;
    }

    .radio-toolbar label:hover {
      background-color: #c2d4dd;
      cursor: pointer;
    }

    .radio-toolbar input[type="radio"]:focus + label {
        border: 2px solid #f0efef;
    }

    .radio-toolbar input[type="radio"]:checked + label {
        background-color:#c2d4dd;
        border-color: #c2d4dd;
    }

    /* end radio button*/

    .hint, label .hintclick {
      display: none;
      opacity: 0;
      margin-left: 16px;
      margin-right: 16px;
    }

    .hint:checked+ label .hintclick {
      display: block;
      opacity: 1;
      font-size: 15px;
    }

    .grid-container {
      display: grid;
      grid-gap: 5px;
      grid-template-columns: auto auto auto auto auto auto auto auto auto auto auto auto ;
    }

    .grid-container > label {
      width: auto;
    }

</style>
</head>

<body>

    <?php include("../includes/navbar.php");?>
    <form class="form" id="compalintform" action="" method="post">

      <!-- Progress bar -->
      <div class="progressbar">
        <div class="progress" id="progress"></div>

        <div class="progress-step progress-step-active" data-title="INSTRUCTION"></div>
        <div class="progress-step" data-title="DEPARTMENT"></div>
        <div class="progress-step" data-title="BLOCK"></div>
        <div class="progress-step" data-title="TITLE"></div>
        <div class="progress-step" data-title="DESCRIPTION"></div>
      </div>


      <div class="form-step form-step-active"></br>
        <?php echo $msg; ?>
        <div class="container page-header">
            <div class="leaderboard">
            <h1> Please read the instructions! <br/>
            </div>
              <span style="font-size:16px; text-align:left;"><br/>
              <p> 1. Do not use any offensive word. </p>
              <p> 2. After make complaint, you can see your own complaint status on your homepage.</p>
              <p> 3. Please wait for 2-3 business days to see any updates.</p>
              <p> 4. <span style="color:red;">REMINDER!</span> Once you refresh the page all data will not be save until you click submit.</p>
              </span>
            </h1>

        <br/>
      </div>

        <div class="width-50 ml-auto" >
          <a href="#" class="btn btn-next">NEXT</a>
        </div>
      </div>

      <!-- start Steps 1-->
      <div class="form-step">

        <!-- today date -->
        <input type="hidden" name="cdate" id="currentDate" >
        <script>
          var today = new Date();
          var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
          document.getElementById("currentDate").value = date;
        </script>
        <!-- end today date -->

        <br/>
        <div class="page-header">
            <div class="leaderboard">
            <h1>First, choose one department that is related to the complaint you are about to make.</h1>
            </div>
              <span style="font-size:15px; text-align:center"><br/>
              <p>Click any department for hint</p>
              </span>
        <br/>

        <div class="radio-toolbar required">
            <input type="radio" id="radio1" name="cdepartment" class="hint" value="GENERAL" required/>
            <label for="radio1">GENERAL
              <span class="hintclick" style="color:#000038"> "e-Aduan UiTM used for general complaints about UiTM"</span>
            </label>

            <input type="radio" id="radio2" name="cdepartment" class="hint" value="FACILITIES"/>
            <label for="radio2">FACILITIES
              <span class="hintclick" style="color:#000038">"For electrical, mechanical, telecommunications, event management"</span>
            </label>

            <input type="radio" id="radio3" name="cdepartment" class="hint" value="ICT"/>
            <label for="radio3">ICT
              <span class="hintclick" style="color:#000038">"e-Aduan ICT used for ICT complaints"</span>
            </label>
        </div>

        <br/>
        </div><!-- page header-->

        <div class="btns-group width-50 ml-auto">
          <a href="#" class="btn btn-prev">PREVIOUS</a>
          <a href="#" class="btn btn-next">NEXT</a>
        </div>

      </div>

      <!-- end Steps 1 -->

      <!-- start Steps 2 -->
      <div class="form-step">
        <br/>
        <div class="page-header">
          <div class="leaderboard">
          <h1>Second, which block do you wish to complaint about?</h1>
          </div>
          <span style="font-size:15px; text-align:center"><br/>
          </span>
        <br/>

        <div class="radio-toolbar required" id="display">
        <div class="grid-container">
        <?php
         $sql="SELECT * FROM `block` ORDER BY blockname ASC";
         $result=mysqli_query($connection,$sql);

         while($std=mysqli_fetch_array($result))
          {
          ?>
            <input type="radio" id="<?php echo $std['bid'];?>" name="cblock" value="<?php echo $std['blockname'];?>" required/>
            <label for="<?php echo $std['bid'];?>"><?php echo $std['blockname'];?></label>
            <br/>
        <?php }?>
        </div>
        </div>

        <br/>
        </div> <!-- page header-->

        <div class="btns-group width-50 ml-auto">
          <a href="#" class="btn btn-prev">PREVIOUS</a>
          <a href="#" class="btn btn-next">NEXT</a>
        </div>
      </div>
      <!-- end Steps 2 -->

      <!-- start Steps 3 -->
      <div class="form-step">

        <div class="page-header">
          <div class="leaderboard">
          <h1>Third, pick a title or topic</h1>
          </div>
          <span style="font-size:15px; text-align:center"><br/>
          <p>You may refer on the topic provided, as an <b>example</b> for you to pick a topic</p>
          <p>Then, write your topic in below text box</p>
          </span>
        <br/>

        <div class="radio-toolbar">


            <label>
            <label>FAN</label>
            <label>DESK</label>
            <label>CHAIR</label>
            <label>LCD</label>
            </label>

            <label>
            <label>FIELD</label>
            <label>SPOTLIGHT</label>
            <label>GOL POST</label>
            <label>SPORT EQUIPMENTS</label>
            </label>

            <label>
            <label>CAR PARK</label>
            <label>ANIMAL FARM</label>
            <label>FRUIT</label>
            <label>TREE</label>
            </label>


            <!--
            <input type="radio" id="title1" name="ctitle" value="FAN" required/>
            <label for="title1">FAN</label>

            <input type="radio" id="title2" name="ctitle" value="LAMP" />
            <label for="title2">LAMP</label>

            <input type="radio" id="title3" name="ctitle" value="LCD" />
            <label for="title3">LCD</label>

            <input type="radio" id="title4" name="ctitle" value="AIR CONDITIONER" />
            <label for="title4">AIR CONDITIONER</label>

            <input type="radio" id="title5" name="ctitle" value="KERUSI" />
            <label for="title5">KERUSI</label>

            <input type="radio" id="title6" name="ctitle" value="MEJA" />
            <label for="title6">MEJA</label>-->

        </div>

        <div class="input-group required">
            <textarea type="text" class="form-control" row="6"  name="ctitle" placeholder="Write here.." required/></textarea>
        </div>

        <br/>
        </div>

        <div class="btns-group width-50 ml-auto">
          <a href="#" class="btn btn-prev">PREVIOUS</a>
          <a href="#" class="btn btn-next">NEXT</a>
        </div>
      </div>
      <!-- end Steps 3 -->

      <!-- start Steps 4 -->
      <div class="form-step">
        <div class="page-header">
        <div class="leaderboard">
        <h1>Lastly, state your description regarding the complaint made</h1>
        </div>
          <span style="font-size:15px; text-align:center"><br/>
          <p> Below box you can write any notes about the complaint so the staff can help to understand</p>
        </span>
        <br/>

        <div class="input-group required">
            <textarea type="text" class="form-control" row="5" name="cdescription" placeholder="Write here.." required/></textarea>
        </div>

        </div>

        <div class="btns-group width-50 ml-auto">
          <a href="#" class="btn btn-prev">PREVIOUS</a>
          <input type="submit" name="submit" class="btn-login" value="SUBMIT">
        </div>
      </div>
      <!-- end Steps 4 -->

      <!-- start Steps 5 --
      <div class="form-step">

        <div class="page-header">
        <h1>THANK YOU <br/>
        YOU CAN SEE RECENT COMPLAINT ON YOUR HOMEPAGE
        </h1><br/>
        </div>

        <div class="btns-group width-50">
        <input class="btn" type="submit" name="submit" value="SUBMIT">
        </div><br/>

    </div>
    !-- end Steps 5 -->
    </form>


  </body>
</html>
