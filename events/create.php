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

    <title>FoodGroups – Create Event</title>

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

      <form action="create.php" method="post">
        <div class="form-group">
          <label for="eventName">Event Name</label>
          <input type="text" class="form-control" id="eventName" name = "event_name" placeholder="Enter Event Name" required>
        </div>
       <div class="form-group">
          <label for="dateTime">Event Date & Time</label>
          <input type="datetime-local" class="form-control" id="eventDate" name="edt" required>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
      
	    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){

          $stmt = $mysqli->prepare('SELECT address from user where user_id = ?');
          $stmt->bind_param('i', $_SESSION['id']);
          $stmt->execute();
          $stmt->bind_result($temp1);
          $address = array();
          if($stmt->fetch()){
            $address[] = $temp1;
          }
          $stmt->close();

          $stmt = $mysqli->prepare('INSERT INTO event values(NULL, ?, ?, ?)');
          $stmt->bind_param('sss', $_POST['event_name'], $_POST['edt'], $address[0]);
          $stmt->execute();
          $stmt->close();

          $stmt = $mysqli->prepare('SELECT e_id from event group by e_id DESC');
          $stmt->execute();
          $stmt->bind_result($newevent);
          $store = array();
          if($stmt->fetch()){
            $store[] = $newevent;
          }
          $stmt->close();

          $stmt = $mysqli->prepare('INSERT INTO attending values(?, ?)');
          $stmt->bind_param('ii', $_SESSION['id'], $store[0]);
          $stmt->execute();
          $stmt->close();

          $stmt = $mysqli->prepare('INSERT INTO host values(?, ?)');
          $stmt->bind_param('ii', $_SESSION['id'], $store[0]);
          $stmt->execute();
          $stmt->close();

          echo '<script>window.location.replace("index.php")</script>';
        }
      ?>      
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

