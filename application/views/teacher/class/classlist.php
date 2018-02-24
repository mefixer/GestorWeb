<br>
<div class="card-panel">
    
<a class="btn modal-trigger black" href="#NewClass">New Class</a>

<table class="responsive-table">
        <thead>
          <tr>
              <th>CLASS NAME</th>
              <th>DESCRIPTION CENTER</th>
              <th>DESCRIPTION LEFT</th>
              <th>DESCRIPTION RIGHT</th>
              <th>TEACHER</th>
          </tr>
        </thead>
              <tbody>
          <?php if ($class == 0): ?><p>Don't Class!</p><?php else: ?>

      <?php $i = 0; foreach ($class as $fila):?>
            <tr class="tablesorter-ignoreRow">
                <td>
                  <p><?php echo $fila->classname ?></p>
                </td>
                <td>
                  <p><?php echo $fila->descriptioncenter ?></p>
                </td>
                <td>
                  <p><?php echo $fila->descriptionleft ?></p>
                </td>
                <td>
                  <p><?php echo $fila->descriptionright ?></p>
                </td>
                <td>
                  <p><?php echo $name ?> <?php echo $lastname ?></p>
                </td>
                <td>
                
                    <a class="btn-floating white black-text" onclick="updateclass(<?php echo $i ?>)" data-tooltip="Edit Class" id="btneditclass<?php echo $i ?>"><i class="material-icons right">edit</i></a>
                
                </td>
                <td>
                
                    <a id="btnclassdeletemodal<?php echo $i ?>" href="#Modal_delete_class<?php echo $i ?>" data-tooltip="Delete Class" class="btn-floating red darken-4 modal-trigger"><i class="material-icons right">delete</i></a>
                
                </td>

                <div class="modal" tabindex="-1" role="dialog" id="Modal_delete_class<?php echo $i ?>">
                    <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <p class="passTl">Are you shure!, pleace insert your password</p>
                                    <div class="input-field">
                                        <input type="password" class="form-control" id="validatepassteacherdeleteclass<?php echo $i ?>">
                                        <label for="validatepassteacherdeleteclass<?php echo $i ?>" >PASSWORD</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn modal-trigger modal-close" >Cancelar</button>
                                    <button type="button" class="btn modal-trigger modal-close" id="btndeleteclass<?php echo $i ?>" onclick="deleteclass(<?php echo $i ?>)">DELETE</button>
                                </div>
                            </div>
                </div>
            </tr>
            <?php $i++; endforeach; ?>
      <?php endif; ?> 
        </tbody>
      
</table>

</div>
<!-- Llamados a Js Visuales -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#collapsible').collapsible();
    $('ul.tabs').tabs();
    $('select').material_select();
    $(".button-collapse").sideNav();
    $('input#classname, textarea#descriptionclasscenter, textarea#descriptionclassleft,textarea#descriptionclassright').characterCounter();
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

