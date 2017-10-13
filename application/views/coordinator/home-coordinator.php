<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" style="color:#F44336" href="<?php echo base_url()?>"><img src="img/inacap.png" width="30" height="30" class="d-inline-block align-top" alt=""> English for IT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent"> <!-- Navbar init -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" onclick="teacher_menu()" href="#">Teachers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="student_menu()">Students</a>
      </li>
    </ul>
    <form class="form-inline my-1 my-lg-0">
      <a class="nav-link" style="color:#000"><strong>Hi:</strong> </a>
      <a class="nav-link"><?php echo $name?> <?php echo $surname?></a>
    </form>
    <button onclick="close_session()" class="btn btn-outline-danger btn-sm"><span class="oi oi-account-logout"></span> Log Out</button>
  </div> 
</nav><!-- navbar finish --><br>
<div class="container" id="body-coordinator">

</div>

<br>

<div class="footer-body">
  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.  Desing for: <strong>Mauricio Garcia</strong> <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>