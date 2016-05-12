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
                  <h3 class="panel-title">Daftar Peserta Debate</h3>
                </div>
                <div class="panel-body">
                  <table id="data_pendaftar" class="table table-bordered table-hover text-center">
                    <thead style="font-size:12px;">
                      <tr>
                        <th>Username</th>
                        <th>Nama Peserta 1</th>
                        <th>Nama Peserta 2</th>
                        <th>Nama Peserta 3</th>
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
    <script src="../registration/assets/script.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        var Table = $('#data_pendaftar').DataTable({
          "ajax": "function.php?action=data_debate",
          "Processing": true,
          "ServerSide": true,
          "columns": 
          [
          { 
            "data": "username",
            "width": '10%',
            "render": function(data){
              return '<h6>'+data+'<h6>';
            }
          },
          { 
            "data": "nama_peserta_1",
            "render": function(data){
              return '<h6>'+data+'</h6>';
            }
          },
          { 
            "data": "nama_peserta_2",
            "render": function(data){
              return '<h6>'+data+'</h6>';
            }
          },
          { 
            "data": "nama_peserta_3",
            "render": function(data){
              return '<h6>'+data+'</h6>';
            }
          },
          { 
            "data": "tanggal_daftar",
            "width": '10%',
            "render": function(data){
              return '<h6>'+data+'</h6>';
            }
          },
          { 
            "data": null,
            "width": '10%',
            "render": function(data){
              return '<h6>'+opsi(data)+'</h6>';
            }
          }

          ]
        });
        
        function opsi(data){
          var a = '<button class="btn btn-primary btn-xs detail-btn" data-toggle="tooltip" data-placement="bottom" title="untuk melihat detail akun">Detail</button> ';
          var b = '<button class="btn btn-danger btn-xs hapus-btn" data-toggle="tooltip" data-placement="bottom" title="untuk menghapus peserta lomba">hapus</button>';
          return a+b;
        }

        $('#data_pendaftar tbody').on('click', '.detail-btn', function(){
          var datas  = Table.row( $(this).parents('tr') ).data();

          var x=document.getElementById('rincian-kompetisi').rows;
          var satu=x[1].cells;
          var dua=x[2].cells;
          var tiga=x[3].cells;
          var unme=x[4].cells;
          var tgl=x[5].cells;
          satu[1].innerHTML=datas["nama_peserta_1"];
          satu[2].innerHTML=datas["no_telp_1"];
          satu[3].innerHTML=datas["alergi_1"];

          dua[1].innerHTML=datas["nama_peserta_2"];
          dua[2].innerHTML=datas["no_telp_2"];
          dua[3].innerHTML=datas["alergi_2"];

          tiga[1].innerHTML=datas["nama_peserta_3"];
          tiga[2].innerHTML=datas["no_telp_3"];
          tiga[3].innerHTML=datas["alergi_3"];

          unme[1].innerHTML=datas["username"];

          tgl[1].innerHTML=datas["tanggal_daftar"];

          
          $('#mdl_detail').modal('show');
        });

        $('#data_pendaftar tbody').on('click', '.hapus-btn', function(){
          var datas  = Table.row( $(this).parents('tr') ).data();
          var data = 'id='+datas['id'];

          if (confirm("Apakah yakin akan menghapus peserta debate dengan username "+datas["username"])) {
            $.ajax({
              type: "POST",
              url: "function.php?action=delete_debate",
              data: data,
              success: function(msg){
                var respons = JSON.parse(msg)
                alert(respons.message);
              },
              error: function(msg){
                alert("Gagal menghapus peserta. code: 11011CS");
              }
            }).done(function(data){
              Table.ajax.reload( null, false );
            });
          }
        });

      });
    </script>

    <div class="modal fade" id="mdl_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Detail Pendaftar</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-offset-2 col-md-8">
                <table id="rincian-kompetisi" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>no</th>
                      <th>Nama Peserta</th>
                      <th>No Telepon</th>
                      <th>Alergi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td colspan="2">Username :</td>
                      <td colspan="2"></td>
                    </tr>
                    <tr>
                      <td colspan="2">Tanggal Daftar :</td>
                      <td colspan="2"></td>
                    </tr>
                  </tbody>
                </table>
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