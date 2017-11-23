/* global base_url, Materialize */
$(document).ready(function () {
	//se inicia con la carga del sistema
	$('#collapsible').collapsible();
	
	charger();});

//carga el arranque para iniciar sesion
	function charger(){
	$.post(base_url + 'controller/charger', {}, function(page, data){
		$("#page-body").html(page, data);
	});}
	//envia los datos de la vista login al controlador
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

//menus de vistas
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

//se solicita insercion de profesor
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
//listas
	function teacher_list(){
	$.post(base_url + 'controller/teacher_list', {},function(page,datos){
			$("#info-activity-coordinator").html(page, datos);
	}),'json';}
	function student_list(){
	$.post(base_url + 'controller/student_list', {},function(page,datos){
			$("#info-activity-teacher").html(page, datos);
	});}
//editar y eliminar
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
		$("#body-teacher").html(page);
	});}
function learning_load(){
	$.post(base_url + 'controller/learning_load',{},function(page){
		$("#body-teacher").html(page);
	});}

/*Valida Campos*/
	function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.','');
    // Despejar Guión
    valor = valor.replace('-','');
    
    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    
    // Formatear RUN
    rut.value = cuerpo +'-'+ dv
    
    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) { 
    	rut.setCustomValidity("RUT Incompleto"); return false;
    }
    
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
	function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";
       tecla_especial = false;
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
	function soloNumeros(e) {
    	var key = window.Event ? e.which : e.keyCode
    	if (key == 8) {
        	return key;
    	}else{
			return (key >= 48 && key <= 57)
		}
	}
