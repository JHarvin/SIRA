$(document).ready(function(){
    
    $("#tabla tbody tr").click(function(){
        var placa=$(this).find("td:eq(0)").text();
        var carro=$(this).find("td:eq(1)").text();
        
        $("#autor").val(carro);
        $("#placar").val(placa);
    //alert(""+placa);
    });
      //-----------------------
    $("#btnGuardarRevision").click(function(){
        var placa=$("#placar").val();
        var fechaFin=$("#fechaFin").val();
        var encargado=$("#encargado").val();
        var servicio=$("#servicio").val();
        ingresarRevision(placa,fechaFin,encargado,servicio);
    });
});

function ingresarRevision(placa,fechaFin,encargado,servicio){
    var datos=new FormData();
    datos.append("placa",placa);
    datos.append("fechaFin",fechaFin);
    datos.append("encargado",encargado);
    datos.append("servicio",servicio);
    
    $.ajax({
        
        type: "POST",
        url: "../Controladores/ControladorRevision.php",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,
        
        success:function(respuesta){
         

        if(respuesta==1){
         
           
           $("#tcuerpo").load("mantenimientos.php #tcuerpo > *");
          alertify.success("Registrad en mantenimiento");
           
            
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