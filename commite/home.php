<?php
include ('otentikasi.php');
$key = '12171996';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brawijaya English Tournament 2016 Registration</title>

    <!-- Bootstrap -->   
    <link href="../registration/assets/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../registration/assets/bootstrap-3.3.5-dist/css/santosa.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="container-fluid">
  		<section class="row" id="header">
        <?php
          include 'navheader.php';
        ?>
      </section>
      <section class="row" id="content">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h3>Welcome <?php echo $_COOKIE['username_1']; ?></h3>
              <br>
              <blockquote>
                <p><h3>Express Yourself, Steal the Spotlight<h3></p>
              </blockquote>
              <a href="export.php" class="btn btn-primary btn-lg"> Unduh Rekap Data</a>
            </div>
          </div>
	    </section>
	    <section class="row text-center" id="footer">
        <?php
          include 'footer.php';
        ?>
      </section>  	
  	</div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <script src="../registration/assets/Jquery 2.1.4/jquery-2.1.4.js"></script>
    <script src="../registration/assets/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <script src="../registration/assets/script.js"></script>

  </body>
</html>