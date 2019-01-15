$(document).ready(function(){

    $("#tabla tbody tr").click(function(){
        var codigo=$(this).find("td:eq(0)").text();
        var tipo=$(this).find("td:eq(4)").text();
        var nom=$(this).find("td:eq(6)").text();
        //se ponen los datos en el modal

        $("#codigo").val(codigo);
        $("#tipobateria").val(tipo);
        $("#aplicagarantia").val("Aplica");
        $("#nom").val(nom);
       verificarGarantia(codigo);

    });
      //----------------------

    //============================
    $("#btnDevolver").click(function(){
        var codigo=$("#codigo").val();
         var tipo=$("#tipobateria").val();
         var importe=$("#importe").text();
         var fecha=$("#fecha").val();
        var codigo2=$("#intercambio").val();
        var nom=$("#nom").val();
        //alert(""+codigo2);
      devolver(codigo,tipo,importe,fecha,codigo2,nom);
    });
    //---------------------------------------------

});
function devolver(codigo,tipo,importe,fecha,codigo2,nom){
    var codig=new FormData();

    codig.append("codigo",codigo);
    codig.append("tipobateria",tipo);
    codig.append("importe",importe);
    codig.append("fecha",fecha);
    codig.append("codigo2",codigo2);
    codig.append("nom",nom);

    $.ajax({

        type: "POST",
        url: "../Controladores/controladorDevolucion.php",
        data: codig,
        cache:false,
        contentType:false,
        processData:false,

        success:function(respuesta){


        if(respuesta==1){


           //$("#tcuerpo").load("mantenimientos.php #tcuerpo > *");
          alertify.success("Bateria devuelta");


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
}

function verificarGarantia(codigo){
    //var garantia="";
    var codig=new FormData();
    codig.append("codigo",codigo);

     $.ajax({

        type: "POST",
        url: "../Controladores/ControladorVerificarGarantia.php",
        data: codig,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",

        success:function(respuesta){



      $("#aplica").val(respuesta.garantia);
    $("#importe").text(respuesta.precio);
  $("#batp").val("Bateria para: AUTO precio:"+respuesta.precio);
            if(respuesta.garantia=="No aplica garantia "){$("#btnDevolver").hide();}


    }


    });
    //fin ajax 1



}
