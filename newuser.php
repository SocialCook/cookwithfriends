<?php
session_start();
include 'connect.php';
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
    <link rel="icon" href="favicon.ico">

    <title>New User Details</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/control.js"></script>
  
  
  </head>

  <body>

    
    <div class="container">
      <?php
        $curl = curl_init("https://graph.facebook.com/me?access_token=".$_SESSION['token']);
        curl_setopt_array($curl, array(
          CURLOPT_RETURNTRANSFER => 1,
          ));
        $result = curl_exec($curl);
        $json = json_decode($result, true);
        curl_close($curl);
        $_SESSION['id'] = $json["id"];


        if($_SERVER['REQUEST_METHOD'] == "POST"){
          if($_POST['kitchen'] == 1){
            $stmt = $mysqli->prepare('INSERT INTO user values (?, "1", ?)');
            $stmt->bind_param('is', $_SESSION['id'], $_POST['address']);
            $stmt->execute();
            $stmt->close();
            echo '<script>window.location.replace("dashboard/index.php")</script>';
          }
          else{
            $stmt = $mysqli->prepare('INSERT INTO user values (?, "0", NULL)');
            $stmt->bind_param('i', $_SESSION['id']);
            $stmt->execute();
            $stmt->close();
            echo '<script>window.location.replace("dashboard/index.php")</script>';
          }
        }
        else{
          $stmt = $mysqli->prepare('SELECT user_id from user where user_id = ?');
          $stmt->bind_param('i', $_SESSION['id']);
          $stmt->execute();
          $stmt->bind_result($testuser);

          if($stmt->fetch()){
            echo '<script>window.location.replace("dashboard/index.php")</script>';
            $stmt->close();
          }
          else{
            echo'
              <h1>Quick question for you:</h1>
              <form name="haskitchen" id="haskitchen" method="post" action="newuser.php">
                <h3>Do you have a kitchen?</h3>
                <div class="radio">
                  <li><input type="radio" name="kitchen" value="1" class="kitchenq" /> Yes</li>
                  <li><input type="radio" name="kitchen" value="0" class="kitchenq" /> No</li>
                </div>
                <div class="form-group" name="hidden" id="hidden">
                  <label for="address">What is your address?</label>
                  <input type="text" name="address" class="form-control" id="address" placeholder="Enter Your Address">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
          ';
          }
        }
      ?>

    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

