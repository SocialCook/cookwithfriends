<?php
session_start();
include '../connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">
    <?php
      if(!isset($_SESSION['id'])){
        echo "<script>window.location.replace('../index.php')</script>";
      }
    ?>
    <title>FoodGroups – Event Details</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../dashboard/index.php">FoodGroups</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="../dashboard/index.php">Home</a></li>
            <li class="active"><a href="index.php">Events</a></li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="../logout.php">Logout <span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <h2>Event Details</h2>
      <?php
        $stmt = $mysqli->prepare('SELECT e_name, date_time, address from event where e_id = ?');
        $stmt->bind_param('i', $_GET['id']);
        $stmt->execute();
        $stmt->bind_result($ename, $edt, $address);
        $store = array();
        if($stmt->fetch()){
          echo "Event: ".$ename."<br>Date and time: ".$edt."<br>";
          $store[] = $address;
        }
        $stmt->close();

        $stmt = $mysqli->prepare('SELECT e_id from attending where e_id=? and user_id=?');
        $stmt->bind_param('ii', $_GET['id'], $_SESSION['id']);
        $stmt->execute();
        if($stmt->fetch()){
          echo "Address: ".$store[0];
          echo '<br><a class="btn btn-danger" href="remove.php?id='.$_GET['id'].'" role="button">Leave Event</a><br>';
        }
        $stmt->close();

        $stmt = $mysqli->prepare('SELECT user_id from host where e_id = ?');
        $stmt->bind_param('i', $_GET['id']);
        $stmt->execute();
        $stmt->bind_result($host);
        if($stmt->fetch()){
          echo '<br><a class="btn btn-success" href="friends.php?id='.$_GET['id'].'" role="button">Invite</a><br>';
        }
        $stmt->close();
        
      ?>
      
      <h3>Be sure to make the most of your FoodGroup! There are 5 people attending this event, suggested workload split:</h3>
      <h4>2 people on stove/oven duty<br>2 people prepare ingredients<br>1 runner – everybody's helper. Help with cooking implements and on the go cleanup</h4>
      
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
