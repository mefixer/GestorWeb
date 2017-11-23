  <nav class="nav-extended red darken-4">
    <div class="nav-wrapper">
      <a href="<?php echo base_url()?>">
        <img class="responsive-img" width="130em"  src="img/inacap.png">
      </a>
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
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
<div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a  onclick="teacher_menu()" href="#">Teacher</a></li>
        <!-- <li class="tab"><a  onclick="student_load_menu()">Students</a></li>
        <li class="tab"><a  onclick="materials_load()" href="#">Materials</a></li>
        <li class="tab disabled"><a  onclick="dictionary_load()" href="#">Dictionary</a></li> -->
      </ul>
    </div>
    </div>
  </nav>
  <br>
  <div id="body-coordinator">

  </div>
  <div class="row">
      <ul id="slide-out" class="side-nav">
        <li>
          <div class="user-view">
            <div class="background"><img src="img/teacher.png"></div>
            <a href="#!user"></a>
            <a href="#!name"><i class="material-icons">account_circle</i><span class="black-text name"><?php echo $name?> <?php echo $surname?></span></a>
          </div>
        <li>
          <a onclick="close_session()" class="white-text waves-effect grey darken-3 btn grey darken-4"><i class="material-icons right white-text">exit_to_app</i> Log Out</a>
        </li>
    </ul>
  </div>

<script type="text/javascript">
  $(".button-collapse").sideNav();
</script>