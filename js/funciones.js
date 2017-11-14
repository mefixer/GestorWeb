/* global base_url, Materialize */

$(document).ready(function () {
	//se inicia con la carga del sistema
	$('#collapsible').collapsible();
	$('.modal').modal();
	charger();});
//carga el arranque para iniciar sesion
function charger(){
	$.post(base_url + 'controller/charger', {}, function(page, data){
		$("#page-body").html(page, data);
	});}
//envia los datos del formulario al controlador
//para validar al usuario
function load_user(){
	$.post(base_url + 'controller/load_user',{
		user: $("#user").val(),
		pass: $("#password").val()
	}, function(datos){
		if (datos.message_load_user_s !== "") {
			//si no esta vacio lanza mensaje de confirmacion
			Materialize.toast(datos.message_load_user_s, 4000, 'light-green lighten-4');
		}else if (datos.message_load_user_e !== "") {
			//si no esta vacio lanza mensaje de error
			Materialize.toast(datos.message_load_user_e, 4000, 'red lighten-3');
		}else{
			//po ultimo si los campos estan vacios lanza mensaje de alerta
			Materialize.toast(datos.message_load_user_w, 4000, 'yellow lighten-3');
		}
		charger();
	},'json');}
//cerrar session de usuario
function close_session(){
	$.post(base_url + 'controller/close_session', {}, 
		function(datos){
		if (datos.message_close !== '') {
			//si se completa con exito lanza mensaje de confirmacion
			Materialize.toast(datos.message_close, 4000, 'red lighten-3');
		}else {
			//de los contrario lanza mensaje de error
			$message_error = 'Not posible close session';
			Materialize.toast($message_error, 4000, 'red lighten-3');
		}
		charger();
	},'json');}
//carga los menu de cada usuario para su pagina de inicio
function teacher_menu(){
	$.post(base_url + 'controller/teacher_menu', {}, function(page){
		$("#body-coordinator").html(page);
	});}
function student_menu(){
	$.post(base_url + 'controller/student_menu', {}, function(page){
		$("#body-teacher").html(page);
	});}
function new_teacher(){
	$.post(base_url + 'controller/new_teacher', {}, function(page){
		$("#info-activity-coordinator").html(page);
	});}
function new_student(){
	$.post(base_url + 'controller/new_student', {}, function(page){
		$("#info-activity-teacher").html(page);
	});}
// //se solicita insercion de profesor
function save_teacher(){
	$.post(base_url + 'controller/save_teacher',{
		rut : $('#rut_teacher').val(),
		first_name : $('#first_name_teacher').val(),
		middle_name: $('#middle_name_teacher').val(),
		first_surname: $('#fisrt_surname_teacher').val(),
		second_surname: $('#second_surname_teacher').val(),
		name_user: $('#user_name_teacher').val(),
		password: $('#password_teacher').val(),
		password_confirm: $('#password_teacher_confirm').val()
	},function(datos){
		var msj_load_teacher = datos;
			$.each(msj_load_teacher, function(i, o){
				if (o.msjw != ""){Materialize.toast(o.msjw, 4000, 'yellow lighten-3');}
				if (o.msjs != ""){Materialize.toast(o.msjs, 4000, 'light-green lighten-4');}
				if (o.msje != ""){Materialize.toast(o.msje, 4000, 'red lighten-3');}
			});
	}, 'json');}
function save_student(){
	$.post(base_url + 'controller/save_student',{
		rut : $('#rut_student').val(),
		first_name : $('#first_name_student').val(),
		middle_name: $('#middle_name_student').val(),
		first_surname: $('#fisrt_surname_student').val(),
		second_surname: $('#second_surname_student').val(),
		name_user: $('#user_name_student').val(),
		password: $('#password_student').val(),
		password_confirm: $('#password_student_confirm').val()
	},function(datos){
		var msj_load_student = datos;
			$.each(msj_load_student, function(i, o){
				if (o.msjw != ""){Materialize.toast(o.msjw, 4000, 'yellow lighten-3');}
				if (o.msjs != ""){Materialize.toast(o.msjs, 4000, 'light-green lighten-4');}
				if (o.msje != ""){Materialize.toast(o.msje, 4000, 'red lighten-3');}
			});
	}, 'json');}
function teacher_list(){
	$.post(base_url + 'controller/teacher_list', {},function(page){
			$("#info-activity-coordinator").html(page);
			load_teacher();
	});}
function student_list(){
	$.post(base_url + 'controller/student_list', {},function(page){
			$("#info-activity-teacher").html(page);
			load_student();
	});}
function load_teacher(){
	$.post(base_url + 'controller/load_teacher', {},function(date){
			var teacher = date;
			$.each(teacher, function(i, o){
				var fil = "<tr>";
					fil += "<td>"+o.rut+"</td>";
					fil += "<td>"+o.first_name+"</td>";
					fil += "<td>"+o.middle_name+"</td>";
					fil += "<td>"+o.first_surname+"</td>";
					fil += "<td>"+o.second_surname+"</td>";
					fil += "<td>"+o.name_user+"</td>";
					fil += "<td>"+o.type+"</td>";
					fil += "<td><button class='waves-effect waves-light btn modal-trigger' href='#modal_list' onclick='edit_teacher("+o.rut+")'>"+"<i class='material-icons right'>edit</i>"+"Edit"+"</button></td>";
					fil += "<td><button class='btn white-text black' id='delete' onclick='delete_teacher("+o.rut+")'>"+"<i class='material-icons right'>delete</i>"+"Delete"+"</button></td>";
					fil += "</tr>";
					fil += "<div id='modal_list"+i+"' class='modal'>";
    				fil += "<div class='modal-content'>";
        			fil += "<h2>EDIT MODAL</h2>";
            		fil += "<div class='panel panel-body'>";
        			fil	+= "<div class='row'>";
            		fil += "<div class='col s6'>";
                	fil += "<?php echo form_open(null, array('class'=>'form', 'name'=>'form_new_teacher'));?>";
                	fil += "<form class='well well-sm'>";
                	fil += "<div class='input-group'>";
                    fil += "<span class=-input-group-addon'><strong>Rut</strong></span>";
                    fil += "<input type='text' class='validate' placeholder='Ingress the rut' id='rut_teacher_edit'>";
                	fil += "</div>";
                	fil += "<div class='input-group'>";
                    fil += "<span class='input-group-addon'><strong>First Name</strong></span>";
                    fil += "<input type='text' class='validate' placeholder='Ingress first name' id='first_name_teacher_edit'>";
                	fil += "</div>";
                	fil += "<div class='input-group'>";
                    fil += "<span class='input-group-addon'><strong>Middle Name</strong></span>";
                    fil += "<input type='text' class='validate' placeholder='Ingress middle name' id='middle_name_teacher_edit'>";
                	fil += "</div>";
                	fil += "<div class='input-group'>";
                   	fil += " <span class='input-group-addon'><strong>First Surname</strong></span>";
                   	fil += " <input type='text' class='validate' placeholder='Ingress first surname' id='fisrt_surname_teacher_edit'>";
                	fil += "</div>";
                	fil += "</form>";
                	fil += "<?php echo form_close();?>";
            		fil += "</div>";
            		fil += "<div class='col s6'>";
                	fil += "<div class='well well-sm'>";
                	fil += "<div class='input-group'>";
                    fil += "<span class='input-group-addon'><strong>Second Surname</strong></span>";
                    fil += "<input type='text' class='validate' placeholder='Ingress second surname' id='second_surname_teacher_edit'>";
                	fil += "</div>";
                	fil += "<div class='input-group'>";
                    fil += "<span class='input-group-addon'><strong>User Name</strong></span>";
                    fil += "<input type='text' class='validate' placeholder='Ingress user name' id='user_name_teacher_edit'>";
                	fil += "</div>";
               	 	fil += "<div class='input-group'>";
                    fil += "<span class='input-group-addon'><strong>Password</strong></span>";
                    fil += "<input type='Password' class='validate' placeholder='Ingress Password' id='password_teacher_edit'>";
                	fil += "</div>";
                	fil += "<div class='input-group'>";
                    fil += "<span class='input-group-addon'><strong>Password Confirm</strong></span>";
                    fil += "<input type='Password' class='validate' placeholder='Ingress Password confirm' id='password_teacher_confirm_edit'>";
                	fil += "</div>";
            		fil += "</div>";
            		fil += "</div>";
        			fil += "</div>";
    				fil += "</div>";
    				fil += "</div>";
    				fil += "<div class='modal-footer'>";
     				fil += "<a class='modal-action modal-close waves-effect waves-green btn-flat'>Save Change</a>";
    				fil += "</div>";
  					fil += "</div>";
				$("#tb_teacher").append(fil);
			});
	}, 'json');}
function load_student(){
	$.post(base_url + 'controller/load_student', {},function(date){
			var student = date;
			$.each(student, function(i, o){
				var fil = "<tr>";
					fil += "<td>"+o.rut+"</td>";
					fil += "<td>"+o.first_name+"</td>";
					fil += "<td>"+o.middle_name+"</td>";
					fil += "<td>"+o.first_surname+"</td>";
					fil += "<td>"+o.second_surname+"</td>";
					fil += "<td>"+o.name_user+"</td>";
					fil += "<td>"+o.type+"</td>";
					fil += "<td><button class='waves-effect waves-light btn modal-trigger' href='#modal_list' onclick='edit_student("+o.rut+")'>"+"<i class='material-icons right'>edit</i>"+"Edit"+"</button></td>";
					fil += "<td><button class='btn white-text black' id='delete_student' onclick='delete_student("+o.rut+")'>"+"<i class='material-icons right'>delete</i>"+"Delete"+"</button></td>";
					fil += "</tr>";
					fil += "<div id='modal_list"+i+"' class='modal'>";
    				fil += "<div class='modal-content'>";
        			fil += "<h2>EDIT MODAL</h2>";
            		fil += "<div class='panel panel-body'>";
        			fil	+= "<div class='row'>";
            		fil += "<div class='col s6'>";
                	fil += "<?php echo form_open(null, array('class'=>'form', 'name'=>'form_new_student'));?>";
                	fil += "<form class='well well-sm'>";
                	fil += "<div class='input-group'>";
                    fil += "<span class=-input-group-addon'><strong>Rut</strong></span>";
                    fil += "<input type='text' class='validate' placeholder='Ingress the rut' id='rut_student_edit'>";
                	fil += "</div>";
                	fil += "<div class='input-group'>";
                    fil += "<span class='input-group-addon'><strong>First Name</strong></span>";
                    fil += "<input type='text' class='validate' placeholder='Ingress first name' id='first_name_student_edit'>";
                	fil += "</div>";
                	fil += "<div class='input-group'>";
                    fil += "<span class='input-group-addon'><strong>Middle Name</strong></span>";
                    fil += "<input type='text' class='validate' placeholder='Ingress middle name' id='middle_name_student_edit'>";
                	fil += "</div>";
                	fil += "<div class='input-group'>";
                   	fil += " <span class='input-group-addon'><strong>First Surname</strong></span>";
                   	fil += " <input type='text' class='validate' placeholder='Ingress first surname' id='fisrt_surname_student_edit'>";
                	fil += "</div>";
                	fil += "</form>";
                	fil += "<?php echo form_close();?>";
            		fil += "</div>";
            		fil += "<div class='col s6'>";
                	fil += "<div class='well well-sm'>";
                	fil += "<div class='input-group'>";
                    fil += "<span class='input-group-addon'><strong>Second Surname</strong></span>";
                    fil += "<input type='text' class='validate' placeholder='Ingress second surname' id='second_surname_student_edit'>";
                	fil += "</div>";
                	fil += "<div class='input-group'>";
                    fil += "<span class='input-group-addon'><strong>User Name</strong></span>";
                    fil += "<input type='text' class='validate' placeholder='Ingress user name' id='user_name_student_edit'>";
                	fil += "</div>";
               	 	fil += "<div class='input-group'>";
                    fil += "<span class='input-group-addon'><strong>Password</strong></span>";
                    fil += "<input type='Password' class='validate' placeholder='Ingress Password' id='password_student_edit'>";
                	fil += "</div>";
                	fil += "<div class='input-group'>";
                    fil += "<span class='input-group-addon'><strong>Password Confirm</strong></span>";
                    fil += "<input type='Password' class='validate' placeholder='Ingress Password confirm' id='password_student_confirm_edit'>";
                	fil += "</div>";
            		fil += "</div>";
            		fil += "</div>";
        			fil += "</div>";
    				fil += "</div>";
    				fil += "</div>";
    				fil += "<div class='modal-footer'>";
     				fil += "<a class='modal-action modal-close waves-effect waves-green btn-flat'>Save Change</a>";
    				fil += "</div>";
  					fil += "</div>";
				$("#tb_student").append(fil);
			});
	}, 'json');}
function edit_teacher(rut){
	$("#modal_list").modal('open');
	$.post(base_url+'controller/edit_teacher',{},function(data){
		var teacher = data;
	});}
function delete_teacher(fil,rut){
	$post(base_url+'controller/delete_teacher',{},function(data){
		var teacher = data;
	});	}

function student_load_menu(){
	$.post(base_url + 'controller/student_load_menu',{},function(page){
		$("#menu-active-teacher").html(page);
	});}
function learning_load(){
	$.post(base_url + 'controller/learning_load',{},function(page){
		$("#menu-active-teacher").html(page);
	});}
function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.','');
    // Despejar Guión
    valor = valor.replace('-','');
    
    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    
    // Formatear RUN
    rut.value = cuerpo + '-'+ dv
    
    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}
    
    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;
    
    // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {
    
        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);
        
        // Sumar al Contador General
        suma = suma + index;
        
        // Consolidar Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
  
    }
    
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);
    
    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;
    
    // Validar que el Cuerpo coincide con su Dígito Verificador
    if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }
    
    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');}
