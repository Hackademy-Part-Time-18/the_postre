$(document).ready(function(){
    // Manejar el click en el botón de búsqueda
    $('#search-toggle').click(function(e){
        e.preventDefault();
        $('#search-bar').slideToggle();
    });
});