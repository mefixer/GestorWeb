$(document).ready(function () {
	//se inicia con la carga del sistema
	charger();
});

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
		if (datos.message_s != "") {
			//si no esta vacio lanza mensaje de confirmacion
			$.bootstrapGrowl(datos.message_s, {
				ele: 'body',
				type: 'success',
				width: 'auto',
				delay: 2000,
				offset: {from: 'bottom', amount: 200},
				align: 'center',
				allow_dismiss: false,
				stackup_spacing: 10
			});
		}else if (datos.message_e != "") {
			//si no esta vacio lanza mensaje de error
			$.bootstrapGrowl(datos.message_e, {
				ele: 'body',
				type: 'danger',
				width: 'auto',
				delay: 2000,
				offset: {from: 'bottom', amount: 200},
				align: 'center',
				allow_dismiss: false,
				stackup_spacing: 10
			});
		}else{
			//po ultimo si los campos estan vacios lanza mensaje de alerta
			$.bootstrapGrowl(datos.message_w, {
				ele: 'body',
				type: 'warning',
				width: 'auto',
				delay: 2000,
				offset: {from: 'bottom', amount: 200},
				align: 'center',
				allow_dismiss: false,
				stackup_spacing: 10
			});
		}
		charger();
	},'json');}
//cerrar session de usuario
function close_session(){
	$.post(base_url + 'controller/close_session', {}, 
		function(datos){
		if (datos.messageclose != '') {
			//si se completa con exito lanza mensaje de confirmacion
			$.bootstrapGrowl(datos.messageclose, {
				ele: 'body',
				type: 'danger',
				width: 'auto',
				delay: 2000,
				offset: {from: 'bottom', amount: 200},
				align: 'center',
				allow_dismiss: false,
				stackup_spacing: 10
			});
		}else {
			//de los contrario lanza mensaje de error
			$message_error = 'Not posible close session';
			$.bootstrapGrowl($message_error, {
				ele: 'body',
				type: 'danger',
				width: 'auto',
				delay: 2000,
				offset: {from: 'bottom', amount: 200},
				align: 'center',
				allow_dismiss: false,
				stackup_spacing: 10
			});
		}
		charger();
	},'json');
}
//carga los menu de cada usuario para su pagina de inicio
function teacher_menu(){
	$.post(base_url + 'controller/teacher_menu', {}, function(page){
		$("#body-coordinator").html(page);
	});
}
function new_teacher(){
	$.post(base_url + 'controller/new_teacher', {}, function(page){
		$("#info-activity-coordinator").html(page);
	});
}

// //se solicita insercion de profesor
function save_teacher(){
	$.post(base_url + 'controller/save_teacher',{
		rut : $('#rut_teacher').val(),
		first_name : $('#first_name_teacher').val(),
		middle_name: $('#middle_name_teacher').val(),
		first_surname: $('#first_surname_teacher').val(),
		second_surname: $('#second_surname_teacher').val(),
		user_name: $('#user_name_teacher').val(),
		password: $('#password_teacher').val(),
		password_confirm: $('#password_teacher_confirm').val()
	},function(datos){
		if (datos.message_s != "") {
			//si no esta vacio lanza mensaje de confirmacion
			$.bootstrapGrowl(datos.message_s, {
				ele: 'body',
				type: 'success',
				width: 'auto',
				delay: 2000,
				offset: {from: 'bottom', amount: 200},
				align: 'center',
				allow_dismiss: false,
				stackup_spacing: 10
			});
		}else if (datos.message_e != "") {
			//si no esta vacio lanza mensaje de error
			$.bootstrapGrowl(datos.message_e, {
				ele: 'body',
				type: 'danger',
				width: 'auto',
				delay: 2000,
				offset: {from: 'bottom', amount: 200},
				align: 'center',
				allow_dismiss: false,
				stackup_spacing: 10
			});
		}else{
			//po ultimo si los campos estan vacios lanza mensaje de alerta
			$.bootstrapGrowl(datos.message_f, {
				ele: 'body',
				type: 'warning',
				width: 'auto',
				delay: 2000,
				offset: {from: 'bottom', amount: 200},
				align: 'center',
				allow_dismiss: false,
				stackup_spacing: 10
			});
		}
	});
}
