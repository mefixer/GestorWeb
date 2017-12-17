<div class="container">
    <div class="panel">
        <div class="panel panel-heading">
            <br>
            <h4 class="panel-title" align="center"><img src="img/search.png" style="width: 1em"> <strong>NEW WORD</strong></h4>
        </div>
        <div class="panel panel-body">
            <div class="row">
                <div class="col s12 m4">
                    <div class="input-field">
                        <input type="text" class="validate" data-length="45" maxlength="45" required id="unityname" value="">
                        <label for="unityname">WORD NAME</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <textarea id="descriptionunitycenter" class="materialize-textarea validate" required data-length="200" maxlength="200" ></textarea>
                        <label for="descriptionunitycenter">DESCRIPTION</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <textarea id="descriptionunityleft"  class="materialize-textarea" required data-length="200" maxlength="200" ></textarea>
                        <label for="descriptionunityleft">ADITIONAL DESCRIPTION</label>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn" type="button" id="btnsaveunity" onclick="saveword()"><i class="material-icons right">save</i> SAVE WORD</button>
                <br>
                <div class="progress">
                    <div class="determinate" id="progress_login" style="<?php echo base_url() ?>"></div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
