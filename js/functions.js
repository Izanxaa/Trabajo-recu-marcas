// Funcion del contador, lo hice para segundos, minutos y horas
var segundos = 0;
var minutos = 0;
var horas = 0;
var segundosMostrados = 0;

setInterval(function() {
    segundos = segundos +1;

    horas = Math.floor(segundos/3600);
    minutos = Math.floor((segundos % 3600)/60);
    segundosMostrados = segundos - (horas * 3600 + minutos * 60);

    // Mi formato en el que se muestran, manejando los 0
    if (horas < 10) {
        horas = "0" + horas;
    }

    if (minutos < 10) {
        minutos = "0" + minutos;
    }

    if (segundosMostrados < 10) {
        segundosMostrados = "0" + segundosMostrados;
    }

    document.getElementById("tiempo").textContent = horas + ":" + minutos + ":" + segundosMostrados;
}, 1000);

// Funcion de conteo de palabras
// Espera a que se cargue por completo la pagina antes de ejecutar
window.onload = function() {
    var descripciones = document.getElementsByClassName("descripcion");
    var contadores = document.getElementsByClassName("palabras");

    for (var i = 0; i < descripciones.length; i++) {
        var texto = descripciones[i].innerText;
        var palabras = texto.split(" ");
        contadores[i].innerText = "Contiene: " + palabras.length + " palabras";
    }
}