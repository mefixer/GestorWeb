  <nav class="nav-extended red darken-4">
    <div class="nav-wrapper">
      <a href="<?php echo base_url()?>">
        <img class="responsive-img" width="130em"  src="img/inacap.png">
      </a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li>
          <a><i class="material-icons">account_circle</i></a>
        </li>
        <li>
          <a><?php echo $name?> <?php echo $surname?></a>
        </li>
        <li>
          <a onclick="close_session()" class="waves-effect waves-light btn grey darken-4"><i class="material-icons right">exit_to_app</i> Log Out</a>
        </li>
      </ul>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a  onclick="teacher_menu()">Teacher's</a></li>
        <li class="tab"><a  onclick="student_menu()" href="#">Students</a></li>
      </ul>
    </div>
  </nav>
  <br>
  <div id="body-coordinator">
  </div>

