<?php
include_once 'includes/config.php';

$config = new Config();
$db = $config->getConnection();

if ($_POST) {
    include_once 'includes/login.inc.php';
    $login = new Login($db);
    $login->userid = $_POST['username'];
    $login->passid = md5($_POST['password']);
    if ($login->login()) {
        echo "<script>location.href='index.php'</script>";
    } else {
        $msg = "Username / Password tidak sesuai!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Metode AHP (Analytic Hierarchy Process) : Sistem Pendukung Keputusan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sweetalert.css">
  </head>
  <body 
  style="background: url(images/krapyak2.jpg) no-repeat fixed;
   -webkit-background-size: 100% 100%;
   background-size: 100% 100%;
   background-size:cover;
	background-position:center;">
  
	<nav class="navbar navbar-default navbar-static-top">
	  <div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="index.php">AHP (Analytic Hierarchy Process)</a>
		</div>
	  </div><!-- /.container-fluid -->
	</nav>
  
    <div class="container">
		<div class="row">
		  <div class="col-xs-12 col-sm-4 col-md-4">&nbsp;</div>
		  <div class="col-xs-12 col-sm-4 col-md-4">
		  	
		  	<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
                    <div class="panel panel-dark login-box">
                        <div class="panel-heading"><h3 class="text-center">LOGIN USER</h3></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username" autofocus="on">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary raised btn-block">Login</button>
                            <br>
                            <p class="text-center">Copyright &copy; 2018 Madrasah Aliyah Ali Maksum</p>
                        </div>
                    </div>
                </form>
		  	
		  </div>
		  <div class="col-xs-12 col-sm-4 col-md-4">&nbsp;</div>
		</div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
        <script src="js/sweetalert.min.js"></script>
    <?php if (isset($msg)): ?>
    <script type="text/javascript">
        swal({
            title: "Maaf!",
            text: "<?=$msg?>",
            type: "error",
            timer: 2000,
            confirmButtonColor: "#DD6B55"
        })
    </script>
    <?php endif; ?>
  </body>
</html>