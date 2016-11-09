$(document).on('ready', intranet)

function intranet() {

    var options = {
        "backdrop" : "static",
        "show": false,
        "height":700
    }

    //ventanaSilabo()
    $('.modalAdd').modal(options)
    $('.modalEdit').modal(options)
    $("#users").hide()
    $(".vagina").on('click', traerVagina)
    $(".mostrarUser").on('click', mostrarUser)
    $(".salir").on('click', logout)
    $('#silaboForm').on('submit', enviarSilabo)
    $('#validarlogin').on('click', login)
    
}
function login(e) {
    e.preventDefault()
    e.stopPropagation()

    var username = $("#user").val();
    var password = $("#pass").val();
    var login = $("#in").val();

    if((username == "") || (password == "")) {
        $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Por favor ingrese un Nombre de usuario y contraseña</div>");
    }else {
        $.ajax({
            type: "POST",
            url: "funciones/funciones.php",
            data: "user="+username+"&pass="+password+"&orden="+login,
            success: function(html){    
                if(html=='true') {
                    window.location="inicio";
                }else{
                    $("#message").html(html);
                }
            },
            beforeSend:function(){
                $("#message").html("<p class='text-center'><img src='img/loading.gif'></p>")
            }
        })
    }
}
/*function ventanaSilabo() {
    $(".ventanaSilabo").dialog({
        autoOpen: false,
        modal: true,
        width:750,
        height: 'auto',
        resizable: false
    })
}*/
function traerVagina (e) {
    e.preventDefault();
    e.stopPropagation();

    var dato = $(this).attr('href')
    var orden = $(this).attr('vagina')
    $.ajax({
        type: "POST",
        url: "funciones/funciones.php",
        data: "d=" + dato+"&orden="+orden,
        dataType: "html",
        beforeSend: function(){
            $("#main").html("<p align='center'><img src='img/loading.gif' /></p>")
        },
        error: function(){
            alert("Hubo un error durante la conexion")
        },
        success: function(data){ 
            $("#main").empty()
            $("#main").append(data)
            ajaxVagina();
            $(".jormulario").attr('orden', dato)
        }
    })
}

/*function openEditCarrera(e){
    e.preventDefault();
    e.stopPropagation();

    var dato = $(this).attr('vagina');

    $.ajax({
        type: "POST",
        url: "inc/datos.php",
        data: "d=" + dato,
        dataType: "html",
        beforeSend: function(){
            $("#main").html("<p align='center'><img src='img/loading.gif' /></p>");
        },
        error: function(){
            alert("Hubo un error durante la conexion");
        },
        success: function(data){ 
            $("#main").empty();
            $("#main").append(data);

            tinymce.execCommand('mceRemoveEditor', true, 'contenidoPerfil');
            tinymce.execCommand('mceRemoveEditor', true, 'perfilC');
            tinymce.execCommand('mceRemoveEditor', true, 'contenidoN');
            tinymce.execCommand('mceRemoveEditor', true, 'detalleN');
            tinymce.execCommand('mceAddEditor', true, 'detalleN');
            tinymce.execCommand('mceAddEditor', true, 'contenidoN');
            tinymce.execCommand('mceAddEditor', true, 'contenidoPerfil');
            tinymce.execCommand('mceAddEditor', true, 'perfilC');
            $.getScript("js/otro-archivo.js");
        }
    })
}*/
function ajaxVagina() {
    //$(".editar").on('click', editarUser)
    $(".jormulario").on('submit', jormularioAdd)
    $(".openPopa").on('click', popaAdd)
    $('.editar').on('click', openModalEditar)
    $('.eliminar').on('click', eliminarsh)

    $("#results").load("funciones/funciones.php?orden=pag")  //initial page number to load
    $(".paging_link").bootpag({
        total: 4
    }).on("page", function(e, num){
      e.preventDefault();
      $("#results").prepend('<div class="loading-indication"><img src="ajax-loader.gif" /> Loading...</div>');
      $("#results").load("funciones/funciones.php", {'page':num});
  })

    $('.paginate').on('click', function(){
        
        $('#content').html('<div class="loading"><img src="images/loading.gif" width="70px" height="70px"/></div>');

        var page = $(this).attr('data');        
        var dataString = 'page='+page;
        
        $.ajax({
            type: "GET",
            url: "inc/pagination.php",
            data: dataString,
            success: function(data) {
                $('#content').fadeIn(1000).html(data);
            }
        });
    })
}
function editarUser (e) {
    e.preventDefault()
    e.stopPropagation()

    var sape = $(this).attr('orden')

    //console.log(sape)
}
function mostrarUser(e) {
    e.preventDefault()
    e.stopPropagation()
    $("#users").toggle()
}
function logout (e) {
    e.preventDefault()
    e.stopPropagation()

    var dato = $(this).attr('href')

    $.ajax({
        type: "POST",
        url: "funciones/funciones.php",
        data: "orden="+dato,
        dataType: "html",
        beforeSend: function(){
            $("#main").html("<p align='center'><img src='img/loading.gif' /></p>");
        },
        error: function(){
            alert("Hubo un error durante la operacion");
        },
        success: function(data){ 
            window.location="login.php";
        }
    })
}
function jormularioAdd(e){
    e.preventDefault()
    e.stopPropagation()
    tinymce.triggerSave()

    var formulario = $(this)        
    var datos = formulario.serialize()             
    var url = 'funciones/funciones.php'
    var archivos = new FormData()

    var buscar = $(".jormulario").find(":file")
    var orden = $(".jormulario").attr('orden')
    var ide = $(".jormulario").attr('ide')
    if(buscar.length){
        for (var i = 0; i < (formulario.find('input[type=file]').length); i++) {                
            archivos.append((formulario.find('input[type="file"]:eq('+i+')').attr("name")),((formulario.find('input[type="file"]:eq('+i+')')[0]).files[0]));                 
        }

        $.ajax({
            url: url+'?orden='+orden+"&"+datos+"&id="+ide,             
            type: 'POST',               
            contentType: false,             
            data: archivos,             
            processData:false,              
            beforeSend : function (){                   
                //$("#main").html("<p align='center'><img src='img/loading.gif' /></p>")               
            },
            success: function(data){                    
                //if(data == "subirNoticia"){
                    //$('.modalEdit').modal('hide')
                    $('.modalAdd').modal('hide')
                    setTimeout(function carga() {
                        $("#main").empty()
                        $("#main").append(data)
                        ajaxVagina()
                    }, 1000);  
                    

                //}
            }               
        })
    }else{
        $.ajax({
            url: url,               
            type: 'POST',               
            data: datos+"&orden="+orden,                
            beforeSend : function (){                   
                //$('#cargando').show(300);                 
            },
            success: function(data){                    
                if(data == true){
                    $('.modalEdit').modal('hide')
                    $('.modalAdd').modal('hide')
                    console.log(data)
                }
            }               
        })
    }
}
function enviarSilabo(e){
    e.preventDefault()
    e.stopPropagation()
    var comprobar = $('#foto').val().length * $('#curso').val().length

    if(comprobar>0){

        var formulario = $('#silaboForm')       
        var datos = formulario.serialize()         
        var archivos = new FormData()          
        var url = 'funciones/subirSilabo.php'

        for (var i = 0; i < (formulario.find('input[type=file]').length); i++) {                
            archivos.append((formulario.find('input[type="file"]:eq('+i+')').attr("name")),((formulario.find('input[type="file"]:eq('+i+')')[0]).files[0]))               
        }

        $.ajax({
            url: url+'?'+datos,             
            type: 'POST',               
            contentType: false,                 
            data: archivos,             
            processData:false,              
            beforeSend : function (){                   
                $('#cargando').show(300)                  
            },
            success: function(data){                    
                $('#cargando').hide(300)   
                alert(data)           
            }               
        })
    }else{          
        alert('Selecciona una foto para subir e ingrese su descripcion')  
    }
}
function popaAdd () {
    var orden = $(this).attr('orden')
    $('.modalAdd').modal('show')
    $(".jormulario").attr('orden', orden)

    //tinymce.execCommand('mceRemoveEditor', true, 'contenido')
    //tinymce.execCommand('mceAddEditor', true, 'contenido')  
    if(orden == 'subirNoticia'){   
        tinymce.execCommand('mceRemoveEditor', true, 'contenido')
        tinymce.execCommand('mceAddEditor', true, 'contenido') 
        $("p").has("input[name='nombre'], input[name='user'], input[name='pass']").hide()
        $("input:text, input:file").val("")
        //$(tinymce.get('contenido').getBody()).empty()
        $("input[name='nombre'], input[name='user'], input[name='pass']").prop('disabled', true)
        $(".modal-title").html('Agregar noticia')
        $("input:submit").val('Agregar noticia')
    }else if(orden == 'traerN'){   
        tinymce.execCommand('mceRemoveEditor', true, 'contenido')
        tinymce.execCommand('mceAddEditor', true, 'contenido') 
        $("p").has("input[name='nombre'], input[name='user'], input[name='pass']").hide()
        $("input:text, input:file").val("")
        //$(tinymce.get('contenido').getBody()).empty()
        $("input[name='nombre'], input[name='user'], input[name='pass']").prop('disabled', true)
        $(".modal-title").html('Editar noticia')
        $("input:submit").val('Editar noticia')
    }
}
function openModalEditar(e){
    e.preventDefault()
    e.stopPropagation()
    var dato = $(this).attr('href')
    //var orden = $(this).attr('orden')
    //$(this).attr('orden', 'traerN')

    var orden = $(this).attr('orden')
    $(".jormulario").attr('orden', orden)
    //alert(dato+orden)
    $('.modalAdd').modal('show')
    $.ajax({
        url: 'funciones/funciones.php',
        type: 'POST',
        dataType: 'json',
        data: "id=" + dato + "&orden=" + orden,
        success: function(data){
            if(data.length > 0){
                $.each(data, function(i,item){
                    if(item.res == 'traerP'){
                        $('.titulo').val(item.titulo)
                        //$('#idPerfil').val(item.idperfil);
                        $(".jormulario").attr('ide', item.idperfil)
                        $(tinymce.get('contenido').getBody()).html(item.perfil)
                    }else if(item.res == 'traerN'){
                        $('input:text').attr('name', 'titulo').val(item.titulo)
                        //$('.ide').val(item.id)
                        $(".jormulario").attr('ide', item.ide)
                        $(".jormulario").attr('orden', 'editarN')
                        //$(tinymce.get('contenido').getBody()).html(item.contenido)
                        setTimeout(function carga() {
                            $(tinymce.get('contenido').getBody()).html(item.contenido)
                        }, 1000);
                        //$(tinymce.get('contenido').setContent(item.contenido))
                    } 

                })                  
            }
        }
    })
}
function eliminarsh (e) {
    e.preventDefault()
    e.stopPropagation()

    var action = confirm("Esta seguro de eliminar el registro?")
    var ide = $(this).attr('href')
    //var tabla = $(this).attr('vagina')
    var orden = $(this).attr('orden')
    if(action == true){
        //alert("se elimino esta mierda")
        $.ajax({
            url: 'funciones/funciones.php',               
            type: 'POST',               
            data: "id="+ide+"&orden="+orden,                
            beforeSend : function (){                   
                //$('#cargando').show(300);                 
            },
            success: function(data){                    
                $("#main").empty()
                $("#main").append(data)
                ajaxVagina()
            }               
        })
    }
}