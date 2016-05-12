<?php
include ('otentikasi.php');

$key = "12171996";
require_once ('user.php');

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
                  <h3 class="panel-title">Profile</h3>
                </div>
                <div class="panel-body">
                  <div id="info">
                    <?php
                      if (isset($_GET['status']) && isset($_GET['msg'])) {
                        if ($_GET['status'] == 'success') {
                          ?>
                          <div class="alert alert-success"><?php echo $_GET['msg']; ?></div>
                          <?php
                        }
                      }
                    ?>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-condensed">
                      <tbody>
                        <tr>
                          <td width="12%">Username</td>
                          <td>: <?php echo $_COOKIE['username'];?></td>
                        </tr>
                        <tr>
                          <td>Password</td>
                          <td>: <?php echo "****"; ?></td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td>: <?php echo $user->email; ?></td>
                        </tr>
                        <tr>
                          <td>School Name</td>
                          <td>: <?php echo $user->nama_sekolah; ?></td>
                        </tr>
                        <tr>
                          <td>School Address</td>
                          <td>: <?php echo $user->alamat_sekolah; ?></td>
                        </tr>
                        <tr>
                          <td>Phone Number</td>
                          <td>: <?php echo $user->phone; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <button class="btn btn-primary" data-toggle="modal" data-target="#mdl_changepassword">Change Password</button>
                  <button class="btn btn-primary" data-toggle="modal" data-target="#mdl_changeinfo">Change Information</button>
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

    <!-- modal -->
    <div class="modal fade" id="mdl_changepassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Change Password</h4>
          </div>
          <form class="form-horizontal" id="form-changepassword" method="post" class="text-center">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-offset-2 col-md-8">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Current Password</label>
                    <div class="col-sm-8">
                      <input type="password" name="currentpassword" id="currentpassword" class="form-control" autocomplete="off" placeholder="Current Password" required="required">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-sm-4 control-label">New Password</label>
                    <div class="col-sm-8">
                      <input type="password" id="newpassword1" name="newpassword1" class="form-control" autocomplete="off" placeholder="New Password" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Retype New Password</label>
                    <div class="col-sm-8">
                      <input type="password" name="newpassword2" id="newpassword2" class="form-control" autocomplete="off" placeholder="New Password" required="required">
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" id="changepassword-btn" name="changepassword-btn" class="btn btn-primary changepassword-btn" value="Save New Password" >
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="mdl_changeinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Change Information</h4>
          </div>
          <form class="form-horizontal" name="form-changeinfo" method="post" class="text-center">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-offset-2 col-md-8">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                      <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Email" value="<?php echo $user->email;?>" required="required">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-sm-4 control-label">School Name</label>
                    <div class="col-sm-8">
                      <input type="text" name="schoolname" class="form-control" autocomplete="off" placeholder="School Name" value="<?php echo $user->nama_sekolah;?>" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">School Address</label>
                    <div class="col-sm-8">
                      <textarea name="schooladdress"  class="form-control" rows="3" required="required"><?php echo $user->alamat_sekolah;?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Phone Number</label>
                    <div class="col-sm-8">
                      <input type="text" name="phone" class="form-control" autocomplete="off" placeholder="phone number" value="<?php echo $user->phone;?>" required="required">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" required="required"> I'm sure that my data is valid !
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" id="changenewinformation-btn" name="changenewinformation-btn" class="btn btn-primary changenewinformation-btn" value="Save New Information" >
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- end modal-->
    <script type="text/javascript">
      $(document).ready(function(){



        $('#form-changepassword').on('submit', function(e){
          e.preventDefault();

          var pass1 = document.getElementById('newpassword1').value;
          var pass2 = document.getElementById('newpassword2').value;

          if (pass1 == pass2) {
            document.getElementById("changepassword-btn").value="Saving ... ";
            $("#changepassword-btn").addClass("disabled");

            var data = $(this).serialize();
            $.ajax({
              type: "POST",
              url: 'user.php?action=change_password',
              data: data,
              success: function(msg){
                $('#info').html(msg);
                $('#mdl_changepassword').modal('hide');
              },
              error: function(msg){
                alert("error change password. code 010A");
              }
            }).done(function() {
              document.getElementById("changepassword-btn").value="Save New Password";
              $("#changepassword-btn").removeClass("disabled");
            });

          } else {
            alert("new password dont match");
          }
        });

      });
    </script>
  </body>
</html>

<?php

if (isset($_POST['changenewinformation-btn'])) {
  $user->email = $_POST['email'];
  $user->nama_sekolah = $_POST['schoolname'];
  $user->alamat_sekolah = $_POST['schooladdress'];
  $user->phone = $_POST['phone'];
  $user->save();

  header('location:profil.php?status=success&msg=Success to save new information');
}

?>