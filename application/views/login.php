  <nav>
    <div class="nav-wrapper grey darken-4">
      <a href="#" class="brand-logo right"><img width="64em" height="64em" src="img/Inacap.png"></a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="<?php echo base_url()?>">English for IT</a></li>
      </ul>
    </div>
  </nav>


<div class="container">
<br>
  <div class="row">
    <div class="col s4">
      
    </div>
    <div class="col s4">

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
          <a type="submit" class="btn waves-effect waves-light" onclick="load_user()"><i class="material-icons right">lock_open</i> Login</a>
          </div>
      </div>

      </div>

    </div>
    <div class="col s4">
      
    </div>
  </div>

</div>