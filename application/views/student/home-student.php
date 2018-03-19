  <nav class="nav-extended red darken-4">
    <div class="nav-wrapper">
      <a href="<?php echo base_url()?>">
          <img class="responsive-img" width="90em"  src="img/inacap.png">
          </a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a><strong>Student</strong> :</a></li>
          <li><div class="chip"><img  alt="Contact Person" src="img/student<?php echo $gender_name?>.png"> <?php echo $name?> <?php echo $lastname?></div></li>
          <li></li>
          <li><a class="btn waves-effect waves-light black" onclick="close_session()"><i class="material-icons right white-text">exit_to_app</i> Log Out</a></li>
      </ul>
    </div>

  </nav>
<br>
<!-- BODY PAGE AND BUTTON LIST-->
      <div class="row">
          <div class="col s12 m3">
            <?php $i = 0; foreach ($unity as $filunity):?>
              <ul class="collapsible popout" data-collapsible="accordion">
                <li>
                  <div class="collapsible-header" id="btnunity<?php $i?>" onclick="unityactivities(<?php echo $filunity->idunity?>)"><i class="material-icons">extension</i>Unit: <?php echo $filunity->unityname?></div>
                </li>
              </ul>
            <?php $i++; endforeach; ?>
          </div>
            <div class="col s12 m9 19">
                <div id="contentstudent">
                    
                </div>
            </div>
      </div>


      <script type="text/javascript">
    $(document).ready(function () {
        $('.modal').modal();
        $('#collapsible').collapsible('active');
        $('ul.tabs').tabs();
        $('select').material_select();
        $(".button-collapse").sideNav();
        //Materialize effects
        $('.tooltipped').tooltip({delay: 50});
    });
     $(document).ready(function(){
    $('.collapsible').collapsible();
  });
</script>