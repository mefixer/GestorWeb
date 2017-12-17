

<h3>Material List</h3>
<p><input type="checkbox" class="filled-in" id="studentcheckedall"/>
  <label for="studentcheckedall">Select all</label></p>
  <?php if ($material == 0): ?><p>Don't material!</p><?php else: ?>
    <div class="row">
      <div id="check">
        <form >
          <?php $i = 0; foreach ($material as $filmaterial):?>
          <div class="card">
            <div class="card-content">
              <div class="row">
                <div class="">
                  <p><input type="checkbox" class="filled-in" id="studentchecked<?php echo $i?>" />
                    <label for="studentchecked<?php echo $i?>">Select</label></p>
                  </div>
                </div>
                <div class="row">

                  <div class="col s12 m3">
                    <div class="input-field">
                      <i class="material-icons prefix">perm_identity</i>
                      <input type="text" disabled class="validate active" data-length="45" maxlength="45" id="idnumber<?php echo $i?>" value="<?php echo $filmaterial->idmaterial ?>">
                      <label for="idnumber<?php echo $i?>" class="active">ID Class</label>
                    </div>
                    <div class="input-field">
                      <input type="text" class="active" data-length="45" maxlength="45" id="name<?php echo $i?>" value="<?php echo $filmaterial->materialname ?>">
                      <label for="name<?php echo $i?>" class="active">Material Name</label>
                    </div>
                  </div>

                <div class="col s12 m6">
                  <div class="input-field">
                    <i class="material-icons prefix">assignment_ind</i>
                    <textarea id="descriptionleft<?php echo $i?>" class="materialize-textarea" required maxlength="200"><?php echo $filmaterial->descriptionleft?></textarea>
                    <label for="descriptionleft<?php echo $i?>" class="active" >DESCRIPTION</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input type="text" class="active" id="descriptionright<?php echo $i?>" value="<?php echo $filmaterial->link?>">
                    <label for="descriptionright<?php echo $i?>" class="active">YOUTUBE LINK</label>
                  </div>        
                </div>
              </div>

              <div class="row">
                <div class="col s12">
                  <div class="card">
                  <div class="video-container">
                    <?php
                      $original = $filmaterial->link;
                      $length = strlen($original);
                      $base = substr($original,0,24);
                      $dir = substr($original, strpos($original, "=") + 1, $length);
                      $link = $base . "embed/" . $dir . "?enablejsapi=1";?>
                    <iframe width="360" height="480" src="<?php
                      echo $link;
                    ?>" frameborder="1" allowfullscreen></iframe>
                  </div>
                </div>
                </div>
                <br>
                <div class="col s12">
                    <button class="btn white black-text" onclick="updateclass()" id="editclass<?php echo $i?>"><i class="material-icons right">edit</i> Edit</button>
                    <button id="delete<?php echo $i ?>" href="#Modal_delete_teacher"  class="btn red darken-4 modal-trigger">
                     <i class="material-icons right">delete</i>Delete</button>

                     <div class="modal" tabindex="-1" role="dialog" id="Modal_delete_teacher">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <p class="passTl">Para confirmar Ingrese su contraseña!</p>
                          <div class="form-group" id="passCont">
                            <label class="col-sm-4 control-label">Contraseña</label>
                            <div class="col-sm-8" id="ecErrorP2">
                              <input type="password" class="form-control" id="mepPass2" onblur="passVer2(this.value)">
                              <input type="hidden" id="ecpass2" value="" disabled="true">
                            </div>
                          </div>
                          <input type="hidden" id="wid" value="" disabled="true">
                        </div>
                        <div class="modal-footer">
                          <button type="button" href+"#modal_delete_teacher" class="btn modal-trigger" >Cancelar</button>
                          <button type="button" class="btn " onclick="deleteWorker()">Eliminar</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>

              <br>
            </div>
            <?php $i++; endforeach; ?>
          </form>
        </div>
      </div>
    <?php endif; ?>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#collapsible').collapsible();
      $('ul.tabs').tabs();
      $('select').material_select();
      $(".button-collapse").sideNav();
      $('input#input_text, textarea#textarea1').characterCounter();
      $('.modal').modal();
      $("#studentcheckedall").change(function () {
        if ($(this).is(':checked')) {
              //$("input[type=checkbox]").prop('checked', true); //todos los check
              $('#check input[type = checkbox]').prop('checked', true); //solo los del objeto #diasHabilitados
            } else {
              //$("input[type=checkbox]").prop('checked', false);//todos los check
              $('#check input[type = checkbox]').prop('checked', false);//solo los del objeto #diasHabilitados
            }
          });

    });
    
  </script>

