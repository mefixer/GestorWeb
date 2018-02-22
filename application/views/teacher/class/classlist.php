<br>
<div class="card-panel">
    

<a class="btn modal-trigger black" href="#NewClass">New Class</a>

<table class="responsive-table">
        <thead>
          <tr>
              <th>ID_CLASS</th>
              <th>CLASS NAME</th>
              <th>DESCRIPTION CENTER</th>
              <th>DESCRIPTION LEFT</th>
              <th>DESCRIPTION RIGHT</th>
              <th>TEACHER</th>
          </tr>
        </thead>
<?php if ($class == 0): ?><p>Don't Class!</p><?php else: ?>

      <?php $i = 0; foreach ($class as $fila):?>
        <tbody>
            <tr>
                <td>
                    <input type="text" disabled class="validate active" id="idclassedit<?php echo $i ?>" value="<?php echo $fila->idclass ?>">
                </td>
                <td>
                
                    <input type="text" class="active validate" data-length="45" maxlength="45" id="classnameedit<?php echo $i ?>" value="<?php echo $fila->classname ?>">
                
                </td>
                <td>
                
                    <input type="text" class="validate active" data-length="45" maxlength="45" id="classdescriptioncenteredit<?php echo $i ?>" value="<?php echo $fila->descriptioncenter ?>">
                
                </td>
                <td>
                
                    <input type="text" class="validate active" data-length="45" maxlength="45" id="classdescriptionleftedit<?php echo $i ?>" value="<?php echo $fila->descriptionleft ?>">
                
                </td>
                <td>
                
                    <input type="text" class="validate active" data-length="45" maxlength="45" id="classdescriptionrightedit<?php echo $i ?>" value="<?php echo $fila->descriptionright ?>">
                
                </td>
                <td>
                
                    <select disabled="true" id="idselecteacher">
                        <option value="<?php echo $idteacher ?>" disabled selected><?php echo $name ?> <?php echo $lastname ?></option>
                    </select>
                
                </td>
                <td>
                
                    <button class="btn white black-text" onclick="updateclass(<?php echo $i ?>)" id="btneditclass<?php echo $i ?>"><i class="material-icons right">edit</i> Edit</button>
                
                </td>
                <td>
                
                    <button id="btnclassdeletemodal<?php echo $i ?>" href="#Modal_delete_class<?php echo $i ?>"  class="btn red darken-4 modal-trigger"><i class="material-icons right">delete</i> Delete</button>
                
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
        </tbody>
      <?php $i++; endforeach; ?>

<?php endif; ?> 
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

