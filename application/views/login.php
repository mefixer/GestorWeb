    <nav class="nav-extended red darken-4">
    <div class="nav-wrapper red darken-4">
      <a href="<?php echo base_url()?>"><img class="responsive-img" width="130em"  src="img/inacap.png"></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="side-nav" id="mobile-demo">
        <a href="#" class="brand-logo right" disabled><img width="100px" src="img/inacap.png"></a>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
          <li><a href="<?php echo base_url()?>"><strong>SEAeWIT</strong></a></li>
        </ul>
      </ul>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
      </ul>
    </div>
  </nav>
<div class="container">
<br>
  <div class="row">
      <div class="grid-example col s12 m6">
        <!-- I am full-width on mobile (col s12 m6)-->
              <div class="panel panel-default">
        <div class="panel panel-heading">
          <h3 class="panel-title">
            <i class="material-icons">account_box</i>
            <strong>Log In</strong>
          </h3>
        </div>
        <div class="panel panel-body">
          <form>
            <div class="input-group">
              <span class="input-group-addon"><strong>User</strong></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" required maxlength="20" class="form-control" placeholder="User name" id="user">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"><strong>Pass</strong></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
              <input type="password" pattern="[A-Za-z0-9_-]{1,15}" maxlength="30" required class="form-control" id="password" placeholder="password">
            </div>
          </form>
          </div>
          <div class="panel-footer">
          <a type="submit" class="btn waves-effect waves-green white darken-4 btn-large black-text" onclick="load_user()"><i class="material-icons right">lock_open</i> Login</a>
          </div>
          <br>
      </div>
      </div>
      <div class="grid-example col s12">
        <!--I am always full-width (col s12)-->

      </div>
    </div>

</div>

