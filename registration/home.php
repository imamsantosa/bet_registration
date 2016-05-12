<?php
include ('otentikasi.php');

require_once ('payment.php');
require_once ('user.php');

$payment = new payment($_COOKIE['username']);
$user = new user($_COOKIE['username']);

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
              <h3>Welcome <?php echo $_COOKIE['username']; ?></h3>
              <br>
              <blockquote>
                <p><h3>Express Yourself, Steal the Spotlight<h3></p>
              </blockquote>
            </div>
          </div>
          <br>
          <div class="row">
            <?php
              if ($payment->hasRegister() && !$user->konfirmasi) {
                ?>
                <div class="col-md-6">
                  <div class="panel panel-primary">
                    <div class="panel-heading">Payment!</div>
                    <div class="panel-body">
                      <p>Thanks for the registration :) </p>
                      <p>Now Please Pay The Registration Fee To:</p>
                      <table>
                        <tbody>
                          <tr>
                            <td width="55%">Name</td>
                            <td></td>
                            <td>: <strong>Wikha Fitria</strong></td>
                          </tr>
                          <tr>
                            <td>Account Number</td>
                            <td></td>
                            <td>: <strong>0051 01 126727 501</strong></td>
                          </tr>
                          <tr>
                            <td>Bank Provider</td>
                            <td></td>
                            <td>: <strong>BRI</strong></td>
                          </tr>
                        </tbody>
                      </table>
                      <br>
                      <p>and then upload the payment proof to this website. Thank you. :D</p>
                      <table class="table table-condensed" >
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Competition</th>
                            <th>Participants</th>
                            <th>Registration Fee</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Debate</td>
                            <td><?php echo $payment->getDebate(); ?></td>
                            <td>Rp. <?php echo number_format($payment->totalDebate(),0,",","."); ?>,-</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Speech</td>
                            <td><?php echo $payment->getSpeech(); ?></td>
                            <td>Rp. <?php echo number_format($payment->totalSpeech(),0,",","."); ?>,-</td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Story Telling</td>
                            <td><?php echo $payment->getStory_telling(); ?></td>
                            <td>Rp. <?php echo number_format($payment->totalStory_telling(),0,",","."); ?>,-</td>
                          </tr>
                          <tr>
                            <td colspan="3"><center><strong>Total fee</strong></center></td>
                            <td>Rp. <?php echo number_format($payment->totalAll(),0,",","."); ?>,-</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <?php
              }
            ?>
            <div class="col-md-6">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">BET 2016 Merchandise <span style="color:red;">CLOSE ORDER!!!</span></h3>
                </div>
                <div class="panel-body">
                  <img src="assets/images/poster-baju.png" class="img-responsive" alt="Responsive image">
                  <h3>CLOSE ORDER!!!</h3>
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