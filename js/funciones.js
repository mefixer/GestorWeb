/* global base_url, Materialize */
$(document).ready(function () {
    //se inicia con la carga del sistema\
    charger();
});

//carga el arranque para iniciar sesion
function charger() {
    $.post(base_url + 'controller/charger', {}, function (page, data) {
        $("#page-body").html(page, data);
    });
}
//envia los datos de la vista login al controlador
//para validar al usuario
function load_user() {
    $.post(base_url + 'controller/load_user', {
        username: $("#username").val(),
        password: $("#password").val()
    }, function (datos) {
        if (datos.message_load_user_s !== "") {
            //si no esta vacio lanza mensaje de confirmacion
            Materialize.toast(datos.message_load_user_s, 4000, 'light-green lighten-4');
        } else if (datos.message_load_user_e !== "") {
            //si no esta vacio lanza mensaje de error
            Materialize.toast(datos.message_load_user_e, 4000, 'red');
        } else {
            //po ultimo si los campos estan vacios lanza mensaje de alerta
            Materialize.toast(datos.message_load_user_w, 4000, 'yellow lighten-3');
        }
        charger();
    }, 'json');
}
//cerrar session de usuario
function close_session() {
    $.post(base_url + 'controller/close_session', {},
            function (datos) {
                if (datos.message_close !== '') {
                    //si se completa con exito lanza mensaje de confirmacion
                    Materialize.toast(datos.message_close, 4000, 'red lighten-3');
                } else {
                    //de los contrario lanza mensaje de error
                    $message_error = 'Not posible close session';
                    Materialize.toast($message_error, 4000, 'red lighten-3');
                }
                charger();
            }, 'json');
}

function saveclass() {
    $.post(base_url + 'controller/saveclass', {
        classname: $('#classname').val(),
        descriptionclasscenter: $('#descriptionclasscenter').val(),
        descriptionclassleft: $('#descriptionclassleft').val(),
        descriptionclassright: $('#descriptionclassright').val()
    }, function (datos) {
        var msj_load_class = datos;
        $.each(msj_load_class, function (i, o) {
            if (o.msjw !== "") {
                Materialize.toast(o.msjw, 4000, 'yellow lighten-3');
            }
            if (o.msjs !== "") {
                Materialize.toast(o.msjs, 4000, 'light-green lighten-4');
            }
            if (o.msje !== "") {
                Materialize.toast(o.msje, 4000, 'red lighten-3');
            }
        });
        classlist();
    }, 'json');
}
function savestudent() {
    var idgenders = document.getElementById("idselectgender");
    var idgender = idgenders.options[idgenders.selectedIndex].value;
    $.post(base_url + 'controller/savestudent', {
        idnumber: $('#studentidnumber').val(),
        name: $('#studentname').val(),
        lastname: $('#studentlastname').val(),
        username: $('#studentusername').val(),
        password: $('#studentpassword').val(),
        passwordconfirm: $('#studentpasswordconfirm').val(),
        email: $('#studentemail').val(),
        gender_idgender: idgender
    }, function (datos) {
        var savestudent = datos;
        $.each(savestudent, function (i, o) {
            if (o.msjw !== "") {
                Materialize.toast(o.msjw, 4000, 'yellow lighten-3');
            }
            if (o.msjs !== "") {
                Materialize.toast(o.msjs, 4000, 'light-green lighten-4');
            }
            if (o.msje !== "") {
                Materialize.toast(o.msje, 4000, 'red lighten-3');
            }
        });
    }, 'json');
}
function saveunity() {
    var idclass = document.getElementById("selectclassunity");
    var class_idclass = idclass.options[idclass.selectedIndex].value;
    $.post(base_url + 'controller/saveunity', {
        unityname: $("#unityname").val(),
        descriptioncenter: $("#descriptionunitycenter").val(),
        descriptionleft: $("#descriptionunityleft").val(),
        descriptionright: $("#descriptionunityright").val(),
        class_idclass: class_idclass
    }, function (datos) {
        var msjunity = datos;
        $.each(msjunity, function (i, o) {
            if (o.msjw !== "") {
                Materialize.toast(o.msjw, 4000, 'yellow lighten-3');
            }
            if (o.msjs !== "") {
                Materialize.toast(o.msjs, 4000, 'light-green lighten-4');
            }
            if (o.msje !== "") {
                Materialize.toast(o.msje, 4000, 'red lighten-3');
            }
        });
    }, 'json');
}
function saveactivity() {
    var idunity = document.getElementById("selectunityactivity");
    var unity_idunity = idunity.options[idunity.selectedIndex].value;
    var idmaterial = document.getElementById("selectmaterialactivity");
    var material_idmaterial = idmaterial.options[idmaterial.selectedIndex].value;
    $.post(base_url + 'controller/saveactivity', {
        activityname: $("#activityname").val(),
        descriptionleft: $("#descriptionleftactivity").val(),
        descriptionright: $("#descriptionrightactivity").val(),
        unity_idunity: unity_idunity,
        material_idmaterial: material_idmaterial
    }, function (datos) {
        var msjactivity = datos;
        $.each(msjactivity, function (i, o) {
            if (o.msjw !== "") {
                Materialize.toast(o.msjw, 4000, 'yellow lighten-3');
            }
            if (o.msjs !== "") {
                Materialize.toast(o.msjs, 4000, 'light-green lighten-4');
            }
            if (o.msje !== "") {
                Materialize.toast(o.msje, 4000, 'red lighten-3');
            }
        });
    }, 'json');
}
function savequestion(){
    var idactivity = document.getElementById("selectquestionactivity");
    var activity_idactivity = idactivity.options[idactivity.selectedIndex].value;
    $.post(base_url + 'controller/savequestion', {
        questionname: $("#questionname").val(),
        description: $("#questiondescription").val(),
        activity_idactivity: activity_idactivity
    }, function (datos) {
        var msjquestion = datos;
        $.each(msjquestion, function (i, o) {
            if (o.msjw !== "") {
                Materialize.toast(o.msjw, 4000, 'yellow lighten-3');
            }
            if (o.msjs !== "") {
                Materialize.toast(o.msjs, 4000, 'light-green lighten-4');
            }
            if (o.msje !== "") {
                Materialize.toast(o.msje, 4000, 'red lighten-3');
            }
        });
        questionlist();
    }, 'json');
}
function saveanswere(){
    var idquestion = document.getElementById("selectquestionanswere");
    var question_idquestion = idquestion.options[idquestion.selectedIndex].value;
    var idvalue = document.getElementById("selectvalueanswere");
    var value_idvalue = idvalue.options[idvalue.selectedIndex].value;
    $.post(base_url + 'controller/saveanswere', {
        answerename: $("#answerename").val(),
        description: $("#answeredescription").val(),
        value_idvalue: value_idvalue,
        question_idquestion:question_idquestion
    }, function (datos) {
        var msjanswere = datos;
        $.each(msjanswere, function (i, o) {
            if (o.msjw !== "") {
                Materialize.toast(o.msjw, 4000, 'yellow lighten-3');
            }
            if (o.msjs !== "") {
                Materialize.toast(o.msjs, 4000, 'light-green lighten-4');
            }
            if (o.msje !== "") {
                Materialize.toast(o.msje, 4000, 'red lighten-3');
            }
        });
    }, 'json');
}
function saveyoutubelink() {
    $.post(base_url + 'controller/saveyoutubelink', {
        materialname: $("#materialname").val(),
        descriptionleft: $("#descriptionleft").val(),
        descriptionright: $("#descriptionright").val(),
        link: $("#uploadyoutubelink").val()
    }, function () {

    });
}
function saveword(){
    $.post(base_url + 'controller/saveword',{
        wordname: $("#wordname").val(),
        description: $("#descriptionword").val(),
        aditionaldescription: $("#aditionaldescriptionword").val()
    },function(datos){
        var msjword = datos;
        $.each(msjword, function (i, o) {
            if (o.msjw !== "") {
                Materialize.toast(o.msjw, 4000, 'yellow lighten-3');
            }
            if (o.msjs !== "") {
                Materialize.toast(o.msjs, 4000, 'light-green lighten-4');
            }
            if (o.msje !== "") {
                Materialize.toast(o.msje, 4000, 'red lighten-3');
            }
        });
        glosarylist();
    },'json');
}
function updateclass(id) {
    $.post(base_url + 'controller/updateclass', {
        idclassedit: $('#idclassedit' + id).val(),
        classnameedit: $('#classnameedit' + id).val(),
        classdescriptioncenteredit: $('#classdescriptioncenteredit' + id).val(),
        classdescriptionleftedit: $('#classdescriptionleftedit' + id).val(),
        classdescriptionrightedit: $('#classdescriptionrightedit' + id).val()
    }, function (datos) {
        var msjclassedit = datos;
        $.each(msjclassedit, function (i, o) {
            if (o.msjw !== "") {
                Materialize.toast(o.msjw, 4000, 'yellow lighten-3');
            }
            if (o.msjs !== "") {
                Materialize.toast(o.msjs, 4000, 'light-green lighten-4');
            }
            if (o.msje !== "") {
                Materialize.toast(o.msje, 4000, 'red lighten-3');
            }
        });
        charger();
    },'json');
}
function updatestudent(id) {
    var idgenders = document.getElementById("selectgenderStudentedit" + id);
    var idgender = idgenders.options[idgenders.selectedIndex].value;
    $.post(base_url + 'controller/updatestudent', {
        idstudent: $('#idstudentstudent' + id).val(),
        idnumber: $('#idnumberstudent' + id).val(),
        name: $('#namestudent' + id).val(),
        lastname: $('#lastnamestudent' + id).val(),
        username: $('#usernamestudent' + id).val(),
        email: $('#emailstudent' + id).val(),
        gender_idgender: idgender
    }, function (msjdate) {
        var msjstudentedit = msjdate;
        $.each(msjstudentedit, function (i, o) {
            if (o.msjw !== "") {
                Materialize.toast(o.msjw, 4000, 'yellow lighten-3');
            }
            if (o.msjs !== "") {
                Materialize.toast(o.msjs, 4000, 'light-green lighten-4');
            }
            if (o.msje !== "") {
                Materialize.toast(o.msje, 4000, 'red lighten-3');
            }
        });
    }, 'json');
}
//listas
function teacherlist() {
    $.post(base_url + 'controller/teacherlist', {}, function (page, datos) {
        $("#bodyusermanagement").html(page, datos);
    }), 'json';
}
function studentlist() {
    $.post(base_url + 'controller/studentlist', {}, function (page, datos) {
        $("#bodyclass").html(page, datos);
    });
}
function classlist() {
    $.post(base_url + 'controller/classlist', {}, function (page, datos) {
        $('#bodyclass').html(page, datos);
    });
}
function unitylist() {
    $.post(base_url + 'controller/unitylist', {}, function (page, datos) {
        $("#bodyunity").html(page, datos);
    });
}
function activitylist() {
    $.post(base_url + 'controller/activitylist', {}, function (page, datos) {
        $("#bodyactivity").html(page, datos);
    });
}
function questionlist(){
    $.post(base_url + 'controller/questionlist', {}, function (page, datos) {
        $("#bodyactivity").html(page, datos);
    });
}
function materiallist() {
    $.post(base_url + 'controller/materiallist', {}, function (page, datos) {
        $("#bodymaterial").html(page, datos);
    });
}
function glosarylist(){
    $.post(base_url + 'controller/glosarylist', {}, function (page, datos) {
        $("#bodyglosary").html(page, datos);
    });
}
function progresslist(){
    $.post(base_url + 'controller/progresslist', {}, function (page, datos) {
        $("#bodyprogress").html(page, datos);
    });
}
//editar y eliminar
function deleteteacher(id){
	$.post(base_url + 'controller/deleteteacher',{
		idteacher: $("#idteacher"+id).val(),
		idteacher: $("#idteacher"+id).val(),
		password: $("#teacherpassworddelete"+id).val()
	},function(datos){
		var msjdeleteteacher = datos;
        $.each(msjdeleteteacher, function (i, o) {
            if (o.msjw !== "") {
                Materialize.toast(o.msjw, 4000, 'yellow lighten-3');
            }
            if (o.msjs !== "") {
                Materialize.toast(o.msjs, 4000, 'light-green lighten-4');
            }
            if (o.msje !== "") {
                Materialize.toast(o.msje, 4000, 'red lighten-3');
            }
        });
	},'json');
}

/*Valida Campos*/
function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.', '');
    // Despejar Guión
    valor = valor.replace('-', '');

    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0, -1);
    dv = valor.slice(-1).toUpperCase();

    // Formatear RUN
    rut.value = cuerpo + '-' + dv

    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if (cuerpo.length < 7) {
        rut.setCustomValidity("RUT Incompleto");
        return false;
    }

    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;

    // Para cada dígito del Cuerpo
    for (i = 1; i <= cuerpo.length; i++) {

        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);

        // Sumar al Contador General
        suma = suma + index;

        // Consolidar Múltiplo dentro del rango [2,7]
        if (multiplo < 7) {
            multiplo = multiplo + 1;
        } else {
            multiplo = 2;
        }

    }

    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);

    // Casos Especiales (0 y K)
    dv = (dv == 'K') ? 10 : dv;
    dv = (dv == 0) ? 11 : dv;

    // Validar que el Cuerpo coincide con su Dígito Verificador
    if (dvEsperado != dv) {
        rut.setCustomValidity("RUT Inválido");
        return false;
    }

    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');
}
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";
    tecla_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}
function soloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode
    if (key == 8) {
        return key;
    } else {
        return (key >= 48 && key <= 57)
    }
}
