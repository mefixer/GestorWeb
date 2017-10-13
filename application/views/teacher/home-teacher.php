<br>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">
      <a class="navbar-brand" style="color:#F44336" href="<?php echo base_url()?>"><img src="img/inacap.png" width="30" height="30" class="d-inline-block align-top" alt=""> English for IT</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent"> <!-- Navbar init -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#" onclick="progress_load()"> Progress</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="student_load()" href="#">Students</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="materials_load()" href="#">Materials</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="dictionary_load()" href="#">Dictionary</a>
          </li>
        </ul>
        <form class="form-inline my-1 my-lg-0">
          <a class="nav-link" style="color:#000"><strong>Hi:</strong> </a>
          <a class="nav-link"><?php echo $name?> <?php echo $surname?></a>
        </form>
        <button type="button" onclick="close_session()" class="btn btn-outline-danger btn-sm">Log Out</button>
      </div> 
    </nav><!-- navbar finish -->
    <br>
    <div class="container">
      <div class="row">
        <div class="col-3" id="menu-active-teacher">
        </div>
        <div class="col-9">
          <h5 align="center" style="color: #B71C1C">ACTIVITY</h5>
          <div class="jumbotron">
            <div id="info-activity-teacher">

            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="container" id="contenedor-footer">
      <div class="jumbotron">
        <div id="info-down-activity-teacher">
          
        </div>
      </div>
    </div>
    <div class="container">
      <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.  Desing for: <strong>Mauricio Garcia</strong> <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
    </div>