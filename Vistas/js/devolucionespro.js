$(document).ready(function(){

    $("#tabla tbody tr").click(function(){
        var codigo=$(this).find("td:eq(0)").text();
        var tipo=$(this).find("td:eq(1)").text();
        var fechita=$(this).find("td:eq(3)").text();
        var estados=$(this).find("td:eq(4)").text();

        //se ponen los datos en el modal

        $("#codigo").val(codigo);
        $("#tipobateria").val(tipo);
        $("#fechapro").val(fechita);
         $("#estado").val(estados);

       //verificarGarantia(codigo);

    });
      //----------------------

    //============================
    $("#btnDevolverPro").click(function(){
        var codigo=$("#codigo").val();
        var codigonuevo=$("#codigonuevo").val();
        var precion=$("#precion").val();
        var bateria=$("#tipobateria").val();
       // idpersonalBitalert(""+bateria+" "+precion);
        devolver(codigo,codigonuevo,precion,bateria);
    });
    //---------------------------------------------

});
function devolver(codigo,codigonuevo,precion,bateria){
    var codig=new FormData();

    codig.append("codigo",codigo);
    codig.append("codigon",codigonuevo);
    codig.append("precion",precion);
    codig.append("tipobateria",bateria);

    $.ajax({

        type: "POST",
        url: "../Controladores/Controladordevoprovee.php",
        data: codig,
        cache:false,
        contentType:false,
        processData:false,

        success:function(respuesta){


        if(respuesta==1){



          alertify.success("Bateria devuelta");
          location.href="../Vistas/agregarProducto.php?fp_code=ok";


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

    }


    });
    //fin ajax 1



}
