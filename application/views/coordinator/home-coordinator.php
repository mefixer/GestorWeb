<nav>
    <div class="nav-wrapper grey darken-4">
      <ul class="left hide-on-med-and-down">
        <a href="<?php echo base_url()?>" class="brand-logo"><img width="64em" height="64em" src="img/Inacap.png"></a>
      </ul>
      <ul class="right hide-on-med-and-down">
        <li>
          <a class="btn" onclick="teacher_menu()">Teachers</a>
          <a class="btn" onclick="student_menu()">Students</a>
        </li>
        <li>
          <a><i class="material-icons">account_circle</i></a>
        </li>
        <li>
          <a><?php echo $name?> <?php echo $surname?></a>
        </li>
        <li>
          <a onclick="close_session()" class="waves-effect waves-light btn red darken-1"><i class="material-icons right">lock</i> Log Out</a>
         </li>
      </ul>
    </div>
  </nav>

<br>
<div class="container" id="body-coordinator">

</div>

