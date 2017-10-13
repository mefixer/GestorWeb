<br>
<nav class="navbar navbar-expand-lg navbar-light bg-light border-danger" style="background-color: #e3f2fd;">
  <a class="navbar-brand" style="color:#F44336" href="<?php echo base_url()?>"><img src="img/inacap.png" width="30" height="30" class="d-inline-block align-top" alt=""> English for IT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav><!-- navbar finish -->
<div class="container">
<br>
  <div class="row">
    <div class="col-4">
      
    </div>
    <div class="col-4">

      <div class="card bg-light mb-3" style="max-width: 20rem;">
        <div class="card-header"><strong>Ingress</strong></div>
        <div class="card-body text-dark">

          <form>
            <div class="input-group">
              <span class="input-group-addon"><strong>User</strong></span>
              <span class="input-group-addon"><span class="oi oi-person"></span></span>
              <input type="text" pattern="[A-Za-z0-9_-]{1,15}" required class="form-control" placeholder="User name" id="user">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"><strong>Pass</strong></span>
              <span class="input-group-addon"><span class="oi oi-key"></span></span>
              <input type="password" pattern="[A-Za-z0-9_-]{1,15}" required class="form-control" id="password" placeholder="password">
            </div>
          </form>

        </div>

        <div class="card-footer bg-transparent bg-light">
          <button type="submit" class="btn btn-block btn-outline-success" onclick="load_user()"><span class="oi oi-account-login"></span> Login</button>
        </div>

      </div>

    </div>
    <div class="col-4">
      
    </div>
  </div>

</div>