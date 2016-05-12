<?php
$key = "12171996";
include ('otentikasi.php');
require_once ('user.php');
require_once ('competition.php');

$competition = new competition($_COOKIE['username']);
$user = new user($_COOKIE["username"]);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brawijaya English Tournament 2016 Registration</title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bootstrap-3.3.5-dist/css/santosa.css" rel="stylesheet">

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
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Complete Biodata</h3>
                </div>
                <div class="panel-body">
                <?php
                if ($user->konfirmasi && $user->upload) {
                ?>
                  <?php
                    if (isset($_GET['status']) && isset($_GET['message'])) {
                      if ($_GET['status'] == 'success') {
                        ?>
                        <div class="alert alert-success"><strong><?php echo $_GET['message'];?></strong></div>
                        <?php
                      }
                      if ($_GET['status'] == 'error') {
                        ?>
                        <div class="alert alert-danger"><strong><?php echo $_GET['message'];?></strong></div>
                        <?php
                      }
                    }
                  ?>
                  <div class="alert alert-success" role="alert"><strong>Fill Complete Biodata!</strong></div>
                  <ul class="nav nav-tabs">
                    <li role="presentation"><a href="#General" aria-controls="General" role="tab" data-toggle="tab">Advisor</a></li>
                    <li role="presentation"><a href="#Speech" aria-controls="Speech" role="tab" data-toggle="tab">Speech</a></li>
                    <li role="presentation"><a href="#StoryTelling" aria-controls="StoryTelling" role="tab" data-toggle="tab">Story Telling</a></li>
                    <li role="presentation"><a href="#Debate" aria-controls="Debate" role="tab" data-toggle="tab">Debate</a></li>
                  </ul>

                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane" id="General"><?php include 'biodata.general.php'; ?></div>
                    <div role="tabpanel" class="tab-pane" id="Speech"><?php include 'biodata.speech.php'; ?></div>
                    <div role="tabpanel" class="tab-pane" id="StoryTelling"><?php include 'biodata.storytelling.php'; ?></div>
                    <div role="tabpanel" class="tab-pane" id="Debate"><?php include 'biodata.debate.php'; ?></div>
                  </div>

                <?php } else { ?>
                  <div class="alert alert-warning" role="alert">you just can fill the biodata after you upload the payment evidence and get admin confirmation!</div>
                <?php  } ?>
                <br>
                </div>
              </div>

            </div>
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
    <script src="assets/Jquery 2.1.4/jquery-2.1.4.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <script src="assets/script.js"></script>

  </body>
</html>