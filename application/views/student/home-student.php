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
        <li>
          <a href="<?php echo base_url()?>"><span class="glyphicon glyphicon-home"></span></a>
        </li>
     <li class="nav-item">
        <a class="nav-link" href="#"> Learning</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"> Activity</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"> Teacher</a>
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
<br>
<div class="container" id="progress-bar">
  <h4>My Progress</h4>
  <div class="progress">
    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><strong>25%</strong></div>
  </div>
</div>


<br>


<div class="container">
  <div class="row">
    <div class="col-3" id="menu-active-student">

    </div>
      <div class="col-9">
        <h5>Activity</h5>
        <div class="jumbotron">
          <div id="info-activity-student">
            
          </div>
      </div>
    </div>
  </div>
</div>
<br>
<div class="container" id="contenedor-footer">
  <div class="jumbotron">
    <div id="info-back-activity-student">
      
    </div>
  </div>
</div>