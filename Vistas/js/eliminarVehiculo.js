/*-----Funcion ajax que se encarga de llamar al archivo php para la eliminacion 
**-----La funcion que llama este ajax esta en listado_auto.php
**-------------------------------------------------------------------------------------
**----------------------Hecho por: Harvin Ramos----------------------------------------
**-------------------------------------------------------------------------------------
**_____________________________________________________________________________________
*/

  //----------funcion ajax

    function eliminar(idE){
        var datos=new FormData();
//---se usa append para agregarle nombre a la variable idE que recibe esta funcion
    datos.append("placa",idE);
        
        
         $.ajax({
        
        type: "POST",
        url: "../Vistas/ajaxEliminarAuto.php",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,
        
        success:function(r){
         

        if(r==1){
         
            $("#tabla").reload();
            alertify.success("Registro Eliminado");
            
    }
          else if(r!=1){
           //para probar
        
            alertify.success("Registro Eliminado");
              
          }
            else{
              //  $("#table").load();
                
                alert("Error -> "+r  );}
        
    }
        
        
    });
        
    }
     
    