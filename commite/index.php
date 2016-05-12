<?php
    if (!empty($_COOKIE['username_1']) || !empty($_COOKIE['id_1'])) {
            //redirect ke halaman login
        header('location:home.php');
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Login Petugas</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <!-- Bootstrap Core CSS -->
    <link href="../registration/assets/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../registration/assets/bootstrap-3.3.5-dist/css/santosa.css" rel="stylesheet">
    <!-- Custom CSS -->
    <!-- Custom Fonts -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body style="background:rgb(35, 133, 161);">

        <div class="container">
            <div class="col-md-4 col-md-offset-4"><?php
                if (isset($_GET['error'])) {
                    echo '<div class="alert alert-danger" role="alert" style="margin-top:55px; margin-bottom:-70px;"><strong>Gagal Login!</strong><br/><h5>username atau password yang anda masukan salah</h5></div>';
                    //header( "Refresh:2; url=../", true, 303);
                }?>
            </div>
            <div class="login-screen">
                <form class="form-horizontal" action="" method="POST">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" class="form-control" placeholder="Username" name="username" id="username" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                <input type="password" class="form-control" placeholder="Password" name="password" id="password" >
                            </div>
                        </div>
                    </div>

                    <input type="submit" id="Login" name="Login" value="Masuk" class="btn btn-lg btn-primary btn-block">
                </form>
            </div>
        </div>


        <!-- jQuery -->

        <!-- Bootstrap Core JavaScript -->
        <script src="../registration/assets/Jquery 2.1.4/jquery-2.1.4.js"></script>
        <script src="../registration/assets/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
    </body>
    </html>

    <?php

    require_once('../registration/assets/dbase.php');
    if (isset($_POST['Login'])){
    //tangkap data dari form login
        $db = dbase::koneksi();
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $input = array(
            ':username' => $username,
            ':password' => $password
            );
        $query = $db->prepare("select * from staff where username=:username and password=:password");
        $query->execute($input);
        $data = $query->fetchAll();
        $ada = count($data);

        if ($ada == 1) {
            $id=$data[0]["id"];
            $username=$data[0]['username'];

            setcookie("id_1", $id, time()+3600);
            setcookie("username_1", $username, time()+3600);
            setcookie("token_1", date("Y-m-d").'imam', time()+3600);

            header('location:home.php');
        } else {
            header('location:index.php?error=1');

        }

    } 

?>
