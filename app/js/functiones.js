$(document).ready(function() {
    //se inicia con la carga del sistema\
    charger();
});
function charger() {
    $.post(base_url + 'Home/charger', {}, function(page, data) {
        $("#page-body").html(page, data);
    }), 'json';
}