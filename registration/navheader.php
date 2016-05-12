<?php
if (isset($key) && $key == '12171996') {
  ?>
  <nav class="navbar navbar-default" role="navigation">
    <div class="bg-primary">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php" style="color : white; "><b>Brawijaya English Tournament Registration</b></a>
          <ul class="nav navbar-nav navbar-left">
            <li><a href="home.php" data-toggle="tooltip" data-placement="bottom" title="to back homepage registration"><b>Home</b></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-left">
            <li><a href="registration.php" data-toggle="tooltip" data-placement="bottom" title="to registration"><b>Registration</b></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-left">
            <li><a href="upload.php" data-toggle="tooltip" data-placement="bottom" title="to upload payment proof"><b>Upload</b></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-left">
            <li><a href="biodata.php" data-toggle="tooltip" data-placement="bottom" title="to complate biodata"><b>Biodata</b></a></li>
          </ul>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php" data-toggle="tooltip" data-placement="bottom" title="to logout"><b>Logout</b></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="profil.php" data-toggle="tooltip" data-placement="bottom" title="to show profile"><b>Profile</b></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </div>
  </nav>
  <?php
} else {
  header('location:index.php');
}
?>