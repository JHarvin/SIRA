$(document).ready(function(){
    $("#recuperar").click(function(){
        var pas=$("#password1").val();
        var pas2=$("#password2").val();
        var id=$("#id").val();
        var inicio=$("#inic").val();
        recuperar(pas,pas2,id,inicio);

    });
});
function recuperar(contrasena1,contrasena2,id,inicio){

   if(contrasena1!=" "){
        var caracteresPassword=contrasena1.length;
        var expresion=/^[a-zA-Z0-9]*$/;
        if(caracteresPassword<4){
            var divM = document.getElementById('regisFrm');
divM.insertAdjacentHTML('afterend', '<div class="alert alert-danger alert-dismissible fade show" role="alert">La contraseña debe estar en el rango de 4 a 16 caracteres<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');


            return false;

        }

        if(contrasena2!=contrasena1){

          var divM = document.getElementById('regisFrm');
divM.insertAdjacentHTML('afterend', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Las contraseñas no coinciden<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            return false;
        }

       ///--------------ajax
         else {

        var datos=new FormData();
        datos.append("id",id);
        datos.append("contrasena",contrasena1);

        //--------ajax---------------------
        $.ajax({

        type: "POST",
        url: "../recuparar/Controlador.php",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,

        success:function(respuesta){


        if(respuesta==1){

          if(inicio=="re"){
            location.href="../Vistas/inicio.php";
          }
          else{
            location.href="../index.php";
          }




    }
          else if(respuesta!=1){
           // $("#tcuerpo").load("listado_auto.php #tcuerpo >*");
          alertify.success("Auto en alquiler "+respuesta);

          }
            else{
              //  $("#table").load();

                alert("Error -> "+respuesta  );}

    }


    });

        //---------------------------------

    }

    }



}
