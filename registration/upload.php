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

              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Upload Payment proff</h3>
                </div>
                <div class="panel-body">
                  <?php
                    if ($user->konfirmasi) {
                    ?>
                      <div class="alert alert-success" role="alert"><strong>Confirmation Success!</strong> Now fill complate your biodata.</div>
                      <div class="row">
                        <div class="col-sm-offset-4 col-sm-8">
                          <img src="<?php echo $user->fileUpload(); ?>" width="200" height="300" class="img-responsive">
                        </div>
                      </div>
                    <?php
                    } else if ($user->upload) {
                    ?>
                      <div class="alert alert-success" role="alert"><strong>Thank you for uploading payment proof!</strong> Wait confirmation from admin to continue next step of registration. You can check 2 x 24 hours. </div>
                      <div class="row">
                        <div class="col-sm-offset-4 col-sm-8">
                          <img src="<?php echo $user->fileUpload(); ?>" width="200" height="300" class="img-responsive">
                        </div>
                      </div>
                    <?php
                    } else {
                      if (isset($_GET['status']) && isset($_GET['message']) && $_GET['status']=='danger') {
                        ?>
                          <div class="alert alert-danger" role="alert"><strong><?php echo $_GET['message']; ?></strong></div>
                        <?php
                      }
                    ?>
                      <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                          <label class="col-sm-4 control-label"></label>
                          <div class="col-sm-8">
                            <input type="file" name="file" id="file" required="required"/>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-4 control-label"></label>
                          <div class="col-sm-8">
                            <p class="help-block">* Tipe = jpg, size max = 300kb</p>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-offset-4 col-sm-8">
                            <input type="submit" name="upload" class="btn btn-primary" value="Upload" />
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlresize">How To Resize?</button>
                          </div>
                        </div>
                      </form>
                    <?php 
                    }
                  ?>
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

    <!-- Modal -->

    <div class="modal fade" id="mdlresize" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">How To Resize</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <p>
                  <ol>
                     <li>Open the "Start" menu and expand the "All Programs" list.
                     <li>Go into the "Accessories" folder and click on "Paint."
                     <li>Open the main Paint menu in the far upper-left corner of the window and choose the "Open" option.
                     <li>Navigate to the location of the picture you want to edit and then double-click on it.
                     <li>Go to the "Home" tab in the toolbar and click on the "Resize" button in the "Image" section.
                     <li>Select the "Pixels" radio button and make sure the "Maintain aspect ratio" box is checked.
                     <li>Replace the horizontal and vertical values with lower numbers. If you make both of the dimensions less than 100 pixels, you can guarantee that your image will be less than 300 kilobytes.
                     <li>Hit "OK" to resize the picture and reduce the file size.
                  </ol>
                </p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

  </body>
  </html>

  <?php
    if (isset($_POST['upload'])) {
        //$nama_folder = "/hosting/bet2014/html/staff/files/";
        $nama_folder = "files/";
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $info = pathinfo($name);
        $ext = $info['extension'];
        $max = 300 * 1024;

        $filename=$_COOKIE["username"].".jpg";

        if (!empty($_FILES['file']['tmp_name'])) { 
          if ($size<$max){
            if ($ext=="jpg" OR $ext=="jpeg" OR $ext=="JPG" OR $ext=="JPEG") {
                move_uploaded_file($_FILES['file']['tmp_name'], $nama_folder.$filename);
                $user->upload = 1;
                $user->save();
                header('location:upload.php?status=success');
            }
            else {
              header('location:upload.php?status=danger&message=Uploading Error! Wrong Type File!');
            }
          }
          else {
            header('location:upload.php?status=danger&message=Uploading Error! Your File is to Large!');
          }
        }
        else {
          header('location:upload.php?status=danger&message=Uploading Error!');
        }

    }
  ?>
