$(document).ready(function () {
	cargador();
});

// $('.collapse').on('click', function(){

// 	var parentdiv = $(this).parent().parent();
// 	var icone = $(this).find('i');
// 	var body = $('.collapse');

// 	if (icone.hasClass('oi oi-caret-bottom')){
// 		icone.removeClass('oi oi-caret-bottom').addClass('oi oi-caret-top');
// 		parentdiv.find(body).hide();
// 	}else{
// 		icone.removeClass('oi oi-caret-bottom').addClass('oi oi-caret-top');
// 		parentdiv.find(body).fadeIn();
// 	}

// });

$('#collapseOne').collapse({
  toggle: false
})


function cargador(){
	$.post(base_url + 'controlador/cargador', {}, function(pagina){
		$("#page-cuerpo").html(pagina);
	});
}
function carga_Alumno(){
	$.post(base_url + 'controlador/carga_Alumno', {}, function(pagina){
		$("#page-cuerpo").html(pagina);
	});
}
function carga_Coordinador(){
	$.post(base_url + 'controlador/carga_Coordinador', {}, function(pagina){
		$("#page-cuerpo").html(pagina);
	});
}
function carga_Docente(){
	$.post(base_url + 'controlador/carga_Docente', {}, function(pagina){
		$("#page-cuerpo").html(pagina);
		progress_load();
	});
}
function progress_load(){
	$.post(base_url + 'controlador/progress_load', {}, function(pagina){
		$("#info-menu-teacher").html(pagina);
	});
}
function student_load(){
	$.post(base_url + 'controlador/student_load', {}, function(pagina){
		$("#info-menu-teacher").html(pagina);
	});
}
function materials_load(){
	$.post(base_url + 'controlador/materials_load', {}, function(pagina){
		$("#info-menu-teacher").html(pagina);
	});
}
function dictionary_load(){
	$.post(base_url + 'controlador/dictionary_load', {}, function(pagina){
		$("#info-menu-teacher").html(pagina);
	});
}
