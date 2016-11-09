$(document).on('ready', inicio); 

function inicio(){

    $(function pestañas() {
        $("#tabs").tabs();
    });

    $('.semestre').on('click',  mostrarsemestre);

    mapero();
}
function mostrarsemestre(e){
    var dir = 'http://localhost/iseploretopoo/';

    e.preventDefault();
    e.stopPropagation();
    
    var semestre = $(this).attr('href');
    var id = $('#idcarrera').val();
    var url = dir+'funciones/unidadesMostrar.php';

    $.ajax({
        type:'POST',
        url:url,
        data:"idce="+id+"&semestre="+semestre,
        dataType: "html",
        beforeSend: function(){
            $(".semestre-mostrar").html("<p align='center'><img src='"+dir+"img/loading.gif' /></p>");
        },
        error: function(){
            alert("Hubo un error durante la conexion");
        },
        success: function(data){                                                   
            $(".semestre-mostrar").empty();
            $(".semestre-mostrar").append(data);
            $('.semestre-mostrar').find(".descSilabo");

            $(".descSilabo").on('click', function silabo(e) {
                e.preventDefault();
                var idsi = $(this).attr('href');
                var url2 = dir+'funciones/descSilabo.php';

                $.ajax({
                    type:'POST',
                    url:url2,
                    data:"idsi="+idsi,
                    dataType: "html",
                    beforeSend: function(){
                        $(".semestre-mostrar").html("<p align='center'><img src='"+dir+"img/loading.gif' /></p>");
                    },
                    error: function(){
                        alert("Hubo un error durante la conexion");
                    },
                    success: function(data){ 
                        //alert(data);
                        window.location.href = dir+'intra/funciones/silabos/'+data;
                        //window.open('pagina.php?id='+id,'_blank');
                        //$(this).attr('href', 'http://localhost/iseploreto.edu.pe/intra/silabos'+data);
                        //$(".semestre-mostrar").append(data);
                    }
                })
            })
        }
    })
}

function mapero(){
    navigator.geolocation.getCurrentPosition(mostrarmapa);
}

function mostrarmapa(posicion){
    var ubicacion = $(".mapero");
    var datos = "";
    datos+=posicion.coords.latitude+"<br>";
    datos+=posicion.coords.longitude+"<br>";
    //ubicacion.html(datos);
    var mapaurl = "https://maps.google.com/maps/api/staticmap?center="+posicion.coords.latitude+","+posicion.coords.longitude+"&zoom=12&size=700x400&sensor=false&markers="+posicion.coords.latitude+","+posicion.coords.longitude;
    ubicacion.html("<img src='"+mapaurl+"'>");
    
}