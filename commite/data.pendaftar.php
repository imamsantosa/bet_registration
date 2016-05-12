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
                  <h3 class="panel-title">Daftar Peserta</h3>
                </div>
                <div class="panel-body">
                  <table id="data_pendaftar" class="table table-bordered table-hover text-center">
                    <thead style="font-size:12px;">
                      <tr>
                        <th>Username</th>
                        <th>Nama Sekolah</th>
                        <th>Phone</th>
                        <th>Upload</th>
                        <th>Konfirmasi</th>
                        <th>Tgl Daftar</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody style="font-size:12px;"></tbody>
                  </table>
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
    <script src="pendaftar.js"></script>
    <script src="../registration/assets/script.js"></script>


    <div class="modal fade" id="mdl_konfirmasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
          </div>
          <form class="form-horizontal" name="form-konfirmasi" id="form-konfirmasi" method="post">
            <input type="hidden" id="id" name="id" value="">
            <input type="hidden" id="username" name="username" value="">
            <input type="hidden" id="status_konfirmasi" name="status_konfirmasi" value="">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-offset-2 col-md-8">
                  <table id="rincian-kompetisi" class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Speech</th>
                        <th>Debate</th>
                        <th>Story Telling</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                  <img src="" width="400" id="image-upload" height="300" class="img-responsive">
                  <br>
                  <button type="button" id="hapus-image-btn" name="hapus-image-btn" class="btn btn-success">Hapus Payment Proof</button>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" id="konfirmasi-btn" class="btn btn-primary konfirmasi-btn" value="Konfirmasi" >
            </div>
          </form>
        </div>
      </div>
    </div>

  </body>
</html>