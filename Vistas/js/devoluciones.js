$(document).ready(function(){
    
    $("#tabla tbody tr").click(function(){
        var codigo=$(this).find("td:eq(3)").text();
        var tipo=$(this).find("td:eq(4)").text();
        
        //se ponen los datos en el modal
        
        $("#codigo").val(codigo);
        $("#tipobateria").val(tipo);
        $("#aplicagarantia").val("Aplica");
        
       verificarGarantia(codigo);
    
    });
      //----------------------
    
    //============================
    $("#btnDevolver").click(function(){
        var codigo=$("#codigo").val();
         var tipo=$("#tipobateria").val();
         var importe=$("#importe").text();
         var fecha=$("#fecha").val();
        
        devolver(codigo,tipo,importe,fecha);
    });
    //---------------------------------------------
   
});
function devolver(codigo,tipo,importe,fecha){
    var codig=new FormData();
     
    codig.append("codigo",codigo);
    codig.append("tipobateria",tipo); 
    codig.append("importe",importe);
    codig.append("fecha",fecha);
    
    $.ajax({
        
        type: "POST",
        url: "../Controladores/ControladorDevolucion.php",
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
       
    }
        
        
    });
    //fin ajax 1
    
   
   
}