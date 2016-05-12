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
            <li><a href="home.php"  data-toggle="tooltip" data-placement="bottom" title="Home"><b>Home</b></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-left">
            <li><a href="config.php" data-toggle="tooltip" data-placement="bottom" title="to setting registration"><b>Config</b></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b>Data</b> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="data.pendaftar.php">Pendaftar</a></li>
                <li><a href="data.debate.php">Debate</a></li>
                <li><a href="data.speech.php">Speech</a></li>
                <li><a href="data.story_telling.php">Story Telling</a></li>
              </ul>
            </li>
          </ul>
          
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php" style="color : white;" data-toggle="tooltip" data-placement="bottom" title="to logout"><b>Logout</b></a></li>
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