<?php
include ('otentikasi.php');
$key = '12171996';

require_once('../registration/config.php');
$config = new config();

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
    <link href="assets/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="assets/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

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
                  <h3 class="panel-title">Pengaturan Registrasi</h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12"> 
                    <?php
                      if (isset($_GET['status']) && isset($_GET['message'])) {
                        if ($_GET['status'] == 'success') {
                          echo "<div class='alert alert-success'><strong>".$_GET['message']."</strong></div>";
                        }
                      }
                    ?> 
                      <form class="form-horizontal" action="" method="POST">

                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Gelombang</label>
                          <div class="col-sm-10">
                            <div class="radio">
                              <label>
                                <input type="radio" name="gelombang" id="gelombang" value="1" <?php if($config->gelombang == 1){ ?> checked <?php } ?> >
                                1 (satu)
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="gelombang" id="gelombang" value="2" <?php if($config->gelombang == 2){ ?> checked <?php } ?> >
                                2 (dua)
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Sign Up</label>
                          <div class="col-sm-10">
                            <div class="radio">
                              <label>
                                <input type="radio" name="status_registrasi" id="status_registrasi" value="0" <?php if($config->status_registrasi == 0){ ?> checked <?php } ?> >
                                Closed
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="status_registrasi" id="status_registrasi" value="1" <?php if($config->status_registrasi == 1){ ?> checked <?php } ?> >
                                Open
                              </label>
                            </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" required="required"> saya yakin untuk merubah pengaturan
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan Config">
                          </div>
                        </div>
                      </form>
                    </div>
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
    
    <script src="../registration/assets/Jquery 2.1.4/jquery-2.1.4.min.js"></script>
    <script src="../registration/assets/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>

    <script src="assets/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="assets/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="../registration/assets/script.js"></script>

  </body>
</html>

<?php

  if (isset($_POST["simpan"])) {
    $config->gelombang = $_POST["gelombang"];
    $config->status_registrasi = $_POST["status_registrasi"];
    $config->save();
    header('location:config.php?status=success&message=berhasil merupah pengaturan');
  }
  
?>