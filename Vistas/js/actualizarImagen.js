//js para actualizar la imagen del carro una por una
$(document).ready(function(){
    //se pone un numero para ponerlo en el modal de actualizar imagen para identificar cual img se actualizara
    //--------------------------------------
    $("#btn1").click(function(){
        $("#numeroImg").val(1);
    });
    //--------------------------------------
    $("#btn2").click(function(){
        $("#numeroImg").val(2);
    });
    //--------------------------------------
    $("#btn3").click(function(){
        $("#numeroImg").val(3);
    });
    //--------------------------------------
    $("#btn4").click(function(){
        $("#numeroImg").val(4);
    });
    //--------------------------------------
    $("#tabla tbody tr").click(function(){
        var placa=$(this).find("td:eq(1)").text();
        
        
        
        $("#placaimg").val(placa);
       
        
    //alert(""+placa);
    });
    //--------Fin de botones
    
    //---------accion para guardar la imagen
    $("#btnCambiarImagen").click(function(){
        //de esta manera se obtiene la imagen de un modal usando ajax
        var imagen=$("#file")[0].files[0];
        //y se valida la imagen para ver si es un formato aceptado
        var img=$("#file").val();
        var numero=$("#numeroImg").val();
        var placa=$("#placaimg").val();
        var extensiones = img.substring(img.lastIndexOf("."));
        //--se valida que se una imagen
        //if inicio
        if(extensiones===".jpg" || extensiones===".png" || extensiones===".jpeg")
{
    actualizarImagen(imagen,numero,placa);
    
   
}
        //fin del if
        else{
             var divM = document.getElementById('actualizarImgFile');
divM.insertAdjacentHTML('afterend', '<div class="alert alert-danger alert-dismissible fade show" role="alert">¡¡El archivo seleccionado no es de tipo imagen!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }
        
        
    });
});
//--------fin acciones

//---funcion para actualizar la imagen por ajax
function actualizarImagen(imagen,numero,placa){
    var datos=new FormData();
    
    datos.append("file",imagen);
    datos.append("numero",numero);
    datos.append("placa",placa);
    
    //---------------------------------------ajax
     $.ajax({
        
        type: "POST",
        url: "../Controladores/ControladorCambiarImagenAjax.php",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,
        
        success:function(respuesta){
         

        if(respuesta==1){
         
           
          
          alertify.success("Imagen actualizada");
           setTimeout(function(){location.reload();},500);
            
    }
          else if(respuesta!=1){
           // $("#tcuerpo").load("listado_auto.php #tcuerpo >*");
          alertify.error("Auto en alquiler "+respuesta);
              
          }
            else{
              //  $("#table").load();
                
                alert("Error -> "+respuesta  );}
        
    }
        
        
    });
    
    
}