var options = {
    "backdrop" : "static",
    "show": false,
    "height":700
}

$('.modalEdit').modal(options);

//$(".jormulario").on('submit', jormulario);
$('.editar').on('click', openModalEditar);

/*function jormulario(e){
    e.preventDefault();
    e.stopPropagation();

    var formulario = $(this);			
    var datos = formulario.serialize();				
    var url = 'http://localhost/iseploreto.edu.pe/intra/funciones/funciones.php';
    var archivos = new FormData();	


    var buscar = $(".jormulario").find(":file");

    if(buscar.length){
        for (var i = 0; i < (formulario.find('input[type=file]').length); i++) { 				
            archivos.append((formulario.find('input[type="file"]:eq('+i+')').attr("name")),((formulario.find('input[type="file"]:eq('+i+')')[0]).files[0]));				 
        }

        $.ajax({
            url: url+'?'+datos,				
            type: 'POST',				
            contentType: false,				
            data: archivos,				
            processData:false,				
            beforeSend : function (){					
                //$('#cargando').show(300);					
            },
            success: function(data){					
                //if(data == "subirNoticia"){
                $('.modalEdit').modal('hide');
                $('.modalAdd').modal('hide');
                //}
            }				
        })
    }else{
        $.ajax({
            url: url,				
            type: 'POST',				
            data: datos,				
            beforeSend : function (){					
                //$('#cargando').show(300);					
            },
            success: function(data){					
                //if(data == "editarCarrera"){
                    $('.modalEdit').modal('hide');
                //}else if(data == "addCarrera"){
                    $('.modalAdd').modal('hide');
                //}
            }				
        })
    }
}

/*$('#noticiaForm').submit(function(e){
    e.preventDefault();
    e.stopPropagation();

    var formulario = $('#noticiaForm');			
    var datos = formulario.serialize();	
    var archivos = new FormData();				
    var url = 'http://localhost/iseploreto.edu.pe/intra/funciones/subirNoticia.php';

    var buscar = $("#noticiaForm").find(":file");

    if(buscar.length){
        //alert('sape');
        for (var i = 0; i < (formulario.find('input[type=file]').length); i++) { 				
            archivos.append((formulario.find('input[type="file"]:eq('+i+')').attr("name")),((formulario.find('input[type="file"]:eq('+i+')')[0]).files[0]));				 
        }

        $.ajax({
            url: url+'?'+datos,				
            type: 'POST',				
            contentType: false,				
            data: archivos,				
            processData:false,				
            beforeSend : function (){					
                $('#cargando').show(300);					
            },
            success: function(data){					
                $('#cargando').hide(300);	
                alert(data)
            }				
        })
    }else{
        //alert('cagada');
        $.ajax({
            url: url,				
            type: 'POST',				
            contentType: false,	
            data: datos,				
            processData:false,				
            beforeSend : function (){					
                $('#cargando').show(300);					
            },
            success: function(data){					
                $('#cargando').hide(300);	
                alert(data)
            }				
        })
    }
})*/

/*$('.carreraEdit').on('click', function openEditPerfil(e){
    var dato = $(this).attr('datos');

    $.ajax({
        url: 'funciones/traerPerfil.php',
        type: 'POST',
        dataType: 'json',
        data: "carrera=" + dato,
        success: function(data){
            if(data.length > 0){
                $.each(data, function(i,item){
                    //$('#contenidoPerfil_ifr').html(item.perfil);
                    $('#idPerfil').val(item.idperfil);
                    $(tinymce.get('contenidoPerfil').getBody()).html(item.perfil);
                })                  
            }
        }
    })
})*/


function openModalEditar(e){
    var dato = $(this).attr('datos');
    var orden = $(this).attr('orden');

    $.ajax({
        url: 'funciones/funciones.php',
        type: 'POST',
        dataType: 'json',
        data: "id=" + dato + "&orden=" + orden,
        success: function(data){
            //var titulo = $()
            if(data.length > 0){
                $.each(data, function(i,item){
                    if(item.res == 'traerP'){
                        $('.titulo').val(item.titulo);
                        $('#idPerfil').val(item.idperfil);
                        $(tinymce.get('contenidoPerfil').getBody()).html(item.perfil);
                    }else if(item.res == 'traerN'){
                        $('.titulo').val(item.titulo);
                        $('.ide').val(item.id);
                        $(tinymce.get('detalleN').getBody()).html(item.contenido);
                    } 

                })                  
            }
        }
    })
}