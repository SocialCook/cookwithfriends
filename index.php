<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"><!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Cook With Friends</title><!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"><!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet" type="text/css"><!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <script src="js/ie-emulation-modes-warning.js" type="text/javascript">
</script><!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="fb-root"></div><script type="text/javascript">
(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=348043128727600";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">
                <div class="masthead clearfix">
                    <div class="inner">
                        <h3 class="masthead-brand">Cook With Friends</h3>

                    </div>
                </div>

                <div class="inner cover">
                    <h1 class="cover-heading">Welcome to Cook With Friends</h1>

                    <p class="lead">The foremost way to make plans to cook with your friends. Share the cost, time and work, all while enjoying the experience of cooking</p>

                    <p class="lead"></p>

                    <div class="fb-login-button" data-scope="public_profile,user_friends" onlogin = "window.location.replace('dashboard/index.php');" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="false"></div>
                    
                    
                    <a class="btn btn-primary" href="https://www.facebook.com/dialog/oauth?client_id=348043128727600&redirect_uri=success.php&response_type=token&scope=public_profile,user_friends" role="button">Login</a>
                </div>

                <div class="mastfoot">
                    <div class="inner">
                        <p>Cook With Friends is a service brought to you by College Cook</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript">
</script><script src="js/bootstrap.min.js" type="text/javascript">
</script><!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js" type="text/javascript">
</script>
</body>
</html>
