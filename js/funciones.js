$(document).ready(function () {
	//se inicia con la carga del sistema
	charger();
	//se esconde los mensajes
	$("#message-success").html("").hide();
	$("#message-info").html("").hide();
	$("#message-warning").html("").hide();
	$("#message-error").html("").hide();
});

//como la utilizamos demasiadas veces, creamos una función para 
//evitar repetición de código
function showMessageSuccess(message) {
    $("#message-success").html("").show();
    $("#message-success").html(message).fadeOut(3000);
}
//mensaje informativo
function showMessageInfo(message) {
    $("#message-info").html("").show();
    $("#message-info").html(message).fadeOut(3000);
}
//mensaje de alerta
function showMessageWarning(message) {
    $("#message-warning").html("").show();
    $("#message-warning").html(message).fadeOut(3000);
}
//mensaje de error
function showMessageError(message) {
    $("#message-error").html("").show();
    $("#message-error").html(message).fadeOut(3000);
}

//carga el arranque para iniciar sesion
function charger(){
	$.post(base_url + 'controller/charger', {}, function(page, data){
		$("#page-body").html(page, data);
		load_menu();
	});}
//envia los datos del formulario al controlador
//para validar al usuario
function load_user(){
	$.post(base_url + 'controller/load_user',{
		user: $("#user").val(),
		pass: $("#password").val()
	}, function(datos){
		if (datos.message_s != "") {
			showMessageSuccess(datos.message_s);
		}else if (datos.message_e != "") {
			showMessageError(datos.message_e);
		}else{
			showMessageWarning(datos.message_w);
		}
		charger();
	},'json');}
//cerrar session de usuario
function close_session(){
	$.post(base_url + 'controller/close_session', {}, 
		function(datos){
		if (datos.messageclose != '') {
			showMessageError(datos.messageclose);
		}else {
			$message_error = 'Not posible close session';
			showMessageError($message_error);
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

//se solicita insercion de profesor
function save_teacher(){
	$.post(base_url + 'controller/save_teacher',{
		rut : $('#rut-teacher').val(),
		first_name : $('#first_name_teacher').val(),
		middle_name: $('#middle_name_teacher').val(),
		first_surname: $('#first_surname_teacher').val(),
		second_surname: $('#second_surname_teacher').val(),
		user_name: $('#user_name_teacher').val(),
		password: $('#password_teacher').val(),
		password_confirm: $('#password_teacher_confirm').val()
	},function(page, date){

	}, 'json');
}
