<?php
include ('otentikasi.php');

$key = "12171996";
require_once ('user.php');

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
            <?php
              if(isset($_GET['competition']) && !$user->upload){
                ?>
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Registration of Competition <?php if($_GET['competition'] == 1) $t='Speech'; else if($_GET['competition'] == 2) $t='Story Telling'; else if($_GET['competition'] == 3) $t='Debate'; echo $t;?></h3>
                    </div>
                    <div class="panel-body">
                      <?php
                        if ($_GET['competition'] == 1) {
                          ?>
                          <form class="form-horizontal" id="form-speech" method="post">
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Full Speaker</label>
                              <div class="col-sm-10">
                                  <input name="name" placeholder="Full Name ex. Moch Wahyu Imam Santosa" maxlength="255" type="text" class="form-control" required="required"/>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                <a href="?" class="btn btn-success">Back</a>
                                <input type="submit" id="speech-btn" class="btn btn-primary" value="Register">
                              </div>
                            </div>
                          </form>
                          <?php
                        } else if ($_GET['competition'] == 2) {
                          ?>
                          <form class="form-horizontal" id="form-story_telling" method="post">
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Full Name</label>
                              <div class="col-sm-10">
                                <input name="name" placeholder="ex. Moch Wahyu Imam Santosa" maxlength="255" type="text" class="form-control" required="required"/>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                <a href="?" class="btn btn-success">Back</a>
                                <input type="submit" id="story_telling-btn" class="btn btn-primary" value="Register">
                              </div>
                            </div>
                          </form>
                          <?php
                        } else if ($_GET['competition'] == 3) {
                          ?>
                          <form class="form-horizontal" id="form-debate" method="post">
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">First Speaker</label>
                              <div class="col-sm-10">
                                  <input name="name1" placeholder="Full Name ex. Moch Wahyu Imam Santosa" maxlength="255" type="text" class="form-control" required="required"/>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Second Speaker</label>
                              <div class="col-sm-10">
                                  <input name="name2" placeholder="Full Name ex. Billy Bintang" maxlength="255" type="text" class="form-control" required="required"/>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Third Speaker</label>
                              <div class="col-sm-10">
                                  <input name="name3" placeholder="Full Name ex. Siti Humairoh" maxlength="255" type="text" class="form-control" required="required"/>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                <a href="?" class="btn btn-success">Back</a>
                                <input type="submit" id="debate-btn" class="btn btn-primary" value="Register">
                              </div>
                            </div>
                        </form>
                          <?php
                        } else {
                          header('location:?');
                        }
                      ?>
                    </div>
                  </div>
                <?php                
              } else if(!$user->upload){
            ?>
              <h3>Select your competition : </h3>
              <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Competition <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="?competition=1">Speech</a></li>
                  <li><a href="?competition=2">Story Telling</a></li>
                  <li><a href="?competition=3">Debate</a></li>
                </ul>
              </div>
              <?php 
                } else if($user->konfirmasi){
                  ?>
                    <div class="alert alert-success text-center" role="alert"><strong>Thanks for Registering!</strong> Now fill complate your biodata</div>
                  <?php
                } else if($user->upload){
                  ?>
                    <div class="alert alert-danger text-center" role="alert"><strong>Thanks for Registering!</strong> Please wait confirmation from admin to continue next step of registration. You can wait 2 x 24 hours.</div>
                  <?php
                } ?>
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
    <script type="text/javascript">
      $(document).ready(function(){

        $('#form-speech').on('submit', function(e){
          e.preventDefault();
          document.getElementById("speech-btn").value="Registering...";
          $("#speech-btn").addClass("disabled");
          var data = $(this).serialize();
          $.ajax({
            type: "POST",
            url: 'competition.php?competition=speech',
            data: data,
            success: function(msg){
              var respons = JSON.parse(msg)
              alert(respons.message);
              if (respons.status == "success") {
                window.location="home.php";
              }
            },
            error: function(msg){
              alert("error login. code : 005A");
            }
          }).done(function() {
            document.getElementById("speech-btn").value="Register";
            $("#speech-btn").removeClass("disabled");
          });
        });

        $('#form-debate').on('submit', function(e){
          e.preventDefault();
          document.getElementById("debate-btn").value="Registering...";
          $("#debate-btn").addClass("disabled");
          var data = $(this).serialize();
          $.ajax({
            type: "POST",
            url: 'competition.php?competition=debate',
            data: data,
            success: function(msg){
              var respons = JSON.parse(msg)
              alert(respons.message);
              if (respons.status == "success") {
                window.location="home.php";
              }
            },
            error: function(msg){
              alert("error login. code : 003A");
            }
          }).done(function() {
            document.getElementById("debate-btn").value="Register";
            $("#debate-btn").removeClass("disabled");
          });
        });

        $('#form-story_telling').on('submit', function(e){
          e.preventDefault();
          document.getElementById("story_telling-btn").value="Registering...";
          $("#story_telling-btn").addClass("disabled");
          var data = $(this).serialize();
          $.ajax({
            type: "POST",
            url: 'competition.php?competition=story_telling',
            data: data,
            success: function(msg){
              var respons = JSON.parse(msg)
              alert(respons.message);
              if (respons.status == "success") {
                window.location="home.php";
              }
            },
            error: function(msg){
              alert("error login. code : 004A");
            }
          }).done(function() {
            document.getElementById("story_telling-btn").value="Register";
            $("#story_telling-btn").removeClass("disabled");
          });
        });

      });
    </script>

  </body>
</html>