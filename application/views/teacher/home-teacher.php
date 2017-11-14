  <nav class="nav-extended red darken-4">
    <div class="nav-wrapper">
      <a href="<?php echo base_url()?>">
          <img class="responsive-img" width="90em"  src="img/inacap.png">
          </a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
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
  <script type="text/javascript">
    $(".button-collapse").sideNav();
  </script>




    <div>
    	<br>
      <ul id="slide-out" class="side-nav">
        <li><div class="user-view">
          <div class="background">
            <img src="img/teacher.png">
          </div>
          <a href="#!user"><img class="circle" src="img/teacher.png"></a>
          <a href="#!name"><span class="white-text name"><?php echo $name?> <?php echo $surname?></span></a>
          <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
        </div></li>
        <li><a href="#!"><i class="material-icons">home</i>Option</a></li>
        <li><a href="#!">Second Link</a></li>
        <li><div class="divider"></div></li>
        <li><a class="subheader">Subheader</a></li>
        <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
      </ul>

      <div class="row">
        <div class="col-3" id="menu-active-teacher">
        </div>
        <div class="col-9">
            <div id="info-activity-teacher">

            </div>
        </div>
      </div>
      <a data-activates="slide-out" class="button-collapse btn-floating btn-large waves-effect grey darken-4"><i class="material-icons left">build</i> Menu</a>
    </div>


