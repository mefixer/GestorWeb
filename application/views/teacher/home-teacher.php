<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">
        <img alt="English for IT" width="20em" height="20em" src="img/Inacap.png">
      </a>
    </div><!-- /.navbar-header-->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url()?>"><span class="glyphicon glyphicon-home"></span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#" onclick="progress_load()"> Progress</a>
          </li>
          <li class="nav-item">
            <a class="btn" onclick="student_load()">Students</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="materials_load()" href="#">Materials</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="dictionary_load()" href="#">Dictionary</a>
          </li>
      </ul>
          <form class="navbar-form navbar-right" role="search">
      <div class="form-group">
        <span class="form-control"><span class="oi oi-person"></span> <span><?php echo $name?> <?php echo $surname?></span></span>
      </div>
      <button onclick="close_session()" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-log-out"></span> Log Out</button>
    </form>
    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->
</nav>
    <div class="container">
      <div class="row">
        <div class="col-3" id="menu-active-teacher">
        </div>
        <div class="col-9">
          <div class="jumbotron">
            <div id="info-activity-teacher">

            </div>
          </div>
        </div>
      </div>
    </div>