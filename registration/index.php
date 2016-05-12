<?php
  require_once ("config.php");
  $config = new config();

  if (!empty($_COOKIE['username']) || !empty($_COOKIE['id'])) {
            //redirect ke halaman login
        header('location:home.php');
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brawijaya English Tournament 2016 Registration</title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap-3.3.5-dist/css/santosa.css" rel="stylesheet">
    <link href="assets/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

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
    		<div class="col-md-12 col-sm-12">
          <div class="jumbotron">
            <h3 class="text-center">BRAWIJAYA ENGLISH TOURNAMENT 2016</h3>
            <h4 class="text-center">Batch 1 : 07 December 2015 until 03 January 2016</h4>
            <h4 class="text-center">Batch 2 : 04 January 2016 until 07 February 2016</h4>
            <p class="text-center">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdl_signup">Sign Up</button>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#mdl_login">Login</button>
            </p>
          </div>
    		</div>
	    </section>
	    <section class="row" id="content">
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">How To Register</h3>
            </div>
            <div class="panel-body">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-primary">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <b>1. Sign Up</b>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                      Sign up for new account to register your school. (If you already had account to register, you don't need to sign up)
                    </div>
                  </div>
                </div>
                <div class="panel panel-primary">
                  <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <b>2. Login</b>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      If you have successfully signed up, then log in with your new user name and password. (One account can be used to register for more than one competition).
                    </div>
                  </div>
                </div>
                <div class="panel panel-primary">
                  <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <b>3. Registration</b>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                      <ol>
                        <li>Click menu registration to select competition you want to join.</li>
                        <li>If you want to send more than one team / one person to be delegation of your school, back to menu registration and select competition you want to join.</li>
                        <li>Note: <br>
                        - for Debate competition, each school can send maximal 3 teams. <br>
                        - for Speech competition, each school can send maximal 5 teams. <br>
                        - for Story Telling competition, each school can send maximal 5 teams.<br></li>
                      </ol>
                    </div>
                  </div>
                </div>
                <div class="panel panel-primary">
                  <div class="panel-heading" role="tab" id="headingFour">
                    <h4 class="panel-title">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <b>4. Payment</b>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                    <div class="panel-body">
                      Do payment base on total registration fee that appear in home registration page.
                    </div>
                  </div>
                </div>
                <div class="panel panel-primary">
                  <div class="panel-heading" role="tab" id="headingFive">
                    <h4 class="panel-title">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <b>5. Upload payment proof</b>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                    <div class="panel-body">
                      <ol>
                        <li>Upload the payment proof in menu "Upload". (type file : jpg or jpeg, size : max.300kb).</li>
                        <li>After uploading success, wait the confirmation from admin to continue next step of registration. You can check 2 x 24 hours to the registration website.</li>
                      </ol>
                    </div>
                  </div>
                </div>
                <div class="panel panel-primary">
                  <div class="panel-heading" role="tab" id="headingSix">
                    <h4 class="panel-title">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        <b>6. Complete detail biodata</b>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                    <div class="panel-body">
                      If you already received approvement from admin, next step is filling complete data of participants.
                    </div>
                  </div>
                </div>
                <div class="panel panel-primary">
                  <div class="panel-heading" role="tab" id="headingSeven">
                    <h4 class="panel-title">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        <b>7. Send the photo of the participants student card</b>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                    <div class="panel-body">
                      Send the photo of the participants student card by email to <b>the2016bet@gmail.com</b>
                    </div>
                  </div>
                </div>
                <div class="panel panel-primary">
                  <div class="panel-heading" role="tab" id="headingeight">
                    <h4 class="panel-title">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                        <b>8. Finish</b>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseeight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingeight">
                    <div class="panel-body">
                     You successfully register as participants of BET 2015.
                   </div>
                 </div>
                </div>
                <div class="panel panel-primary">
                  <div class="panel-heading" role="tab" id="headingnine">
                    <h4 class="panel-title">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
                        <b>More Information</b>
                      </a>
                    </h4>
                  </div>
                  <div id="collapsenine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingnine">
                    <div class="panel-body">
                      If you have any question regarding registration process, don't hesitant to contact us on <b>0856-4394-7830 (Tiara)</b>
                    </div>
                  </div>
                </div>
                <div class="panel panel-primary">
                  <div class="panel-heading" role="tab" id="headingten">
                    <h4 class="panel-title">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseten" aria-expanded="false" aria-controls="collapseten">
                        <b>Forgot Password ? </b>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseten" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingten">
                    <div class="panel-body">
                      You can contact <strong>0856-4394-7830 (Tiara) </strong>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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

    <!-- modal -->
    <div class="modal fade" id="mdl_signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Sign Up Brawijaya English Tournament 2015</h4>
          </div>
          <form class="form-horizontal" name="form-signup" id="form-signup" role="form" method="post">
            <div class="modal-body">
            <?php if ($config->status_registrasi()) {
              ?>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">User Name</label>
                      <div class="col-sm-10">
                        <input name="username" placeholder="max.8 Character (a-z) and (0-1) ex. mwis12" maxlength="8" type="text" class="form-control" required="required"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-10">
                        <input name="password1" id="password1" maxlength="8" placeholder="max.8 Character (a-z) and (0-1)" type="password" class="form-control" required="required"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Confirmation Password</label>
                      <div class="col-sm-10">
                        <input name="password2" id="password2" maxlength="8" placeholder="max.8 Character (a-z) and (0-1)" type="password" class="form-control" required="required"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                        <input name="email" maxlength="255" placeholder="ex.bet@ub.ac.id" type="email" class="form-control" required="required"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">School Name</label>
                      <div class="col-sm-10">
                        <input name="namasekolah" maxlength="255" placeholder="ex.Universitas Brawijaya" type="text" class="form-control" required="required"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">School Address</label>
                      <div class="col-sm-10">
                        <textarea name="alamatsekolah" cols="40" maxlength="255" placeholder="ex.Jalan Veteran 1 Malang" rows="5" class="form-control" required="required"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Phone Number</label>
                      <div class="col-sm-10">
                        <input name="phone" type="text" maxlength="12" class="form-control" placeholder="ex.081234567890 or 0341-551611 (make sure that your phone number is active)" required="required" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" required="required"> I'm sure that my data is valid !
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
            } else {
              echo "Registration has been closed";
            } ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <?php if($config->status_registrasi()){?>
              <input type="submit" id="signup-btn" class="btn btn-primary signup-btn" value="Sign Up" >
              <?php } ?>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="mdl_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Login Registration Brawijaya English Tournament 2015</h4>
          </div>
          <form class="form-horizontal" name="form-login" id="form-login" method="post" class="text-center">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-offset-2 col-md-8">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">User Name</label>
                    <div class="col-sm-8">
                      <input type="text" name="username" class="form-control" autocomplete="off" placeholder="Username" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">
                      <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Password" >
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                      <a href="" style="color:black;">Forgot Password?</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" id="login-btn" class="btn btn-primary login-btn" value="Log In" >
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- end modal -->

    <script type="text/javascript">
      $(document).ready(function(){
        $('#form-signup').on('submit', function(e){
          e.preventDefault();
          var pass1 = document.getElementById('password1').value;
          var pass2 = document.getElementById('password2').value;
          if (pass1 == pass2) {
            document.getElementById("signup-btn").value="Registering...";
            $("#signup-btn").addClass("disabled");
            var data = $(this).serialize();
            $.ajax({
              type: "POST",
              url: 'auth.php?action=sign_up',
              data: data,
              success: function(msg){
                alert(msg);
                document.getElementById("signup-btn").value="Sign Up";
                $("#signup-btn").removeClass("disabled");
              },
              error: function(msg){
                alert("error Registration. code 001A");
                document.getElementById("signup-btn").value="Sign Up";
                $("#signup-btn").removeClass("disabled");
              }
            });
          } else {
            alert("Confirmation password dont match");
          }
        });

        $('#form-login').on('submit', function(e){
          e.preventDefault();
          document.getElementById("login-btn").value="Log In ....";
          $("#login-btn").addClass("disabled");
          var data = $(this).serialize();
          $.ajax({
            type: "POST",
            url: 'auth.php?action=login',
            data: data,
            success: function(msg){
              var respons = JSON.parse(msg)
              if (respons.status == "success") {
                window.location="home.php";
              } else {
                alert(respons.message);
                document.getElementById("login-btn").value="Log In";
                $("#login-btn").removeClass("disabled");
              }
            },
            error: function(msg){
              alert("error login. code : 002A");
              document.getElementById("login-btn").value="Log In";
              $("#login-btn").removeClass("disabled");

            }
          });
        });

      });
    </script>

  </body>
</html>