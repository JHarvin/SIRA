$(document).ready(function(){
    
    $("#tabla tbody tr").click(function(){
        var placa=$(this).find("td:eq(0)").text();
        var carro=$(this).find("td:eq(1)").text();
        
        //$("#autor").val(carro);
        $("#idkm").val(placa);
    //alert(""+placa);
    });
      //-----------------------
    $("#btnActualizarKMM").click(function(){
        var placa=$("#idkm").val();
        var mes=$("#mes").val();
        var kilom=$("#kilom").val();
        ingresarKMM(placa,mes,kilom);
    });
});

function ingresarKMM(placa,mes,kilom){
    var datos=new FormData();
    datos.append("placa",placa);
    datos.append("meses",mes);
    datos.append("km",kilom);
    
    
    $.ajax({
        
        type: "POST",
        url: "../Controladores/ControladorPeriodico.php",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,
        
        success:function(respuesta){
         

        if(respuesta=="success"){
         
           
           $("#tcuerpo").load("mantenimientos.php #tcuerpo > *");
          alertify.success("Registrado para cambios");
           
            
    }
          else{
           // $("#tcuerpo").load("listado_auto.php #tcuerpo >*");
          alertify.error("Error "+respuesta);
              
          }
    
        
        }
    });
    
}