/*-----Funcion ajax que se encarga de llamar al archivo php para la eliminacion
**-----La funcion que llama este ajax esta en listado_auto.php
**-------------------------------------------------------------------------------------
**----------------------Hecho por: Harvin Ramos----------------------------------------
**-------------------------------------------------------------------------------------
**_____________________________________________________________________________________
*/

  //----------funcion ajax

    function eliminar(placa){

        var datos=new FormData();
//---se usa append para agregarle nombre a la variable idE que recibe esta funcion
    datos.append("placa",placa);


         $.ajax({

        type: "POST",
        url: "../Vistas/ajaxEliminarAuto.php",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,

        success:function(r){


        if(r=="success"){



alertify.success("Registro Eliminado ");
            
            setTimeout(function () {
              location.reload();
            }, 900);
           //$("#tabla").load("listado_auto.php");
            //$("#modalDetalle").load("listado_auto.php");
           

    }
          else if(r!="success"){
           //para probar

          
             
            alertify.success("Registro Eliminado");
            setTimeout(function () {
              location.reload();
            }, 900);

          }
            else{
              //  $("#table").load();

                alert("Error -> "+r  );}

    }


    });

    }
