  <nav class="nav-extended red darken-4">
    <div class="nav-wrapper">
      <a href="<?php echo base_url()?>">
          <img class="responsive-img" width="90em"  src="img/inacap.png">
          </a>
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li>
        </li>
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
        <li class="tab"><a  onclick="learning_load()" href="#">Learning</a></li>
        <li class="tab"><a  onclick="student_load_menu()">Students</a></li>
        <li class="tab"><a  onclick="materials_load()" href="#">Materials</a></li>
        <li class="tab disabled"><a  onclick="dictionary_load()" href="#">Dictionary</a></li>
      </ul>
    </div>
  </nav>
      <div id="body-teacher">
        
      </div>

  <div class="fixed-action-btn">
    <a class="btn-floating btn-large red">
      <i class="large material-icons">mode_edit</i>
    </a>
    <ul>
      <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
      <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
      <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
      <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
    </ul>
  </div>

    <div>
    	<br>
    <ul id="slide-out" class="side-nav">
        <li><div class="user-view">
          <div class="background">
          <img src="img/teacher.png">
        </div>
        <a href="#!user"></a>
        <a href="#!name"><i class="material-icons">account_circle</i><span class="black-text name"><?php echo $name?> <?php echo $surname?></span></a>
      </div>
        <li>
          <a onclick="close_session()" class="white-text waves-effect red darken-3 btn grey darken-4"><i class="material-icons right white-text">exit_to_app</i> Log Out</a>
        </li>
    </ul>
  <script type="text/javascript">
    $(".button-collapse").sideNav();
  </script>
      
    </div>


