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
        <li><a href="<?php echo base_url()?>"><span class="glyphicon glyphicon-home"></span></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->
</nav>


<div class="container">
<br>
  <div class="row">
    <div class="col-md-4">
      
    </div>
    <div class="col-md-4">

      <div class="panel panel-default">
        <div class="panel panel-heading">
          <h4 class="panel-title">
            <strong>Ingress</strong>
          </h4>
        </div>
        <div class="panel panel-body">
          <form>
            <div class="input-group">
              <span class="input-group-addon"><strong>User</strong></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" pattern="[A-Za-z0-9_-]{1,15}" required class="form-control" placeholder="User name" id="user">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"><strong>Pass</strong></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
              <input type="password" pattern="[A-Za-z0-9_-]{1,15}" required class="form-control" id="password" placeholder="password">
            </div>
          </form>
          </div>
          <div class="panel-footer">
          <button type="submit" class="btn btn-block btn-success" onclick="load_user()"><span class="glyphicon glyphicon-log-in"></span> Login</button>
          </div>
      </div>

      </div>

    </div>
    <div class="col-md-4">
      
    </div>
  </div>

</div>