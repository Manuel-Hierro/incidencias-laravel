var url = 'http://localhost/www/IncidenciasLaravel/public/';

window.addEventListener("load", function(){

    /* Buscador */
    $('#buscador').submit(function(){
        $(this).attr('action', url+'/usuarios/ver/'+$('#buscador #search').val());
    });

});
