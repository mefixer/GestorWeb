<div class="col s3"></div>
<div class="panel panel-default col s6 z-depth-5">

	<div class="panel panel-heading">
		<h4 class="panel-title" align="center"><i class="material-icons left">person_add</i><strong>INGRESS A NEW STUDENT </strong></h4>
	</div>
<?php echo validation_errors(); ?>
	<div class="panel panel-body">
		<div class="row">
			<div class="col s6">
				<?php echo form_open(null, array("class"=>"form", "name"=>"form_new_teacher"));?>
				<form class="well well-sm">
				<div class="input-group">
					<span class="input-group-addon"><strong>Rut</strong></span>
					<input type="text" class="validate" required oninput="checkRut(this)" placeholder="Ingress the rut" id="rut_student">
				</div>
				<div class="input-group">
					<span class="input-group-addon"><strong>First Name</strong></span>
					<input type="text" class="validate" placeholder="Ingress first name" id="first_name_student">
				</div>
				<div class="input-group">
					<span class="input-group-addon"><strong>Middle Name</strong></span>
					<input type="text" class="validate" placeholder="Ingress middle name" id="middle_name_student">
				</div>
				<div class="input-group">
					<span class="input-group-addon"><strong>First Surname</strong></span>
					<input type="text" class="validate" placeholder="Ingress first surname" id="fisrt_surname_student">
				</div>
				</form>
				<?php echo form_close();?>
			</div>
			<div class="col s6">
				<div class="well well-sm">
				<div class="input-group">
					<span class="input-group-addon"><strong>Second Surname</strong></span>
					<input type="text" class="validate" placeholder="Ingress second surname" id="second_surname_student">
				</div>
				<div class="input-group">
					<span class="input-group-addon"><strong>User Name</strong></span>
					<input type="text" class="validate" placeholder="Ingress user name" id="user_name_student">
				</div>
				<div class="input-group">
					<span class="input-group-addon"><strong>Password</strong></span>
					<input type="Password" class="validate" placeholder="Ingress Password" id="password_student">
				</div>
				<div class="input-group">
					<span class="input-group-addon"><strong>Password Confirm</strong></span>
					<input type="Password" class="validate" placeholder="Ingress Password confirm" id="password_teacher_confirm">
				</div>
			</div>
			</div>
		</div>
	</div>

	<div class="panel-footer">
		<button class="waves-effect waves-light btn btn-large grey darken-4" type="button" onclick="save_student()"><i class="material-icons right">save</i> Save Teacher</button>
	</div>
<br>
<div class="progress">
      <div class="determinate" id="progress_login" style="<?php echo base_url()?>"></div>
  </div>
</div>
