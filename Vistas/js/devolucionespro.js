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
        
        
        devolver(codigo);
    });
    //---------------------------------------------
   
});
function devolver(codigo){
    var codig=new FormData();
     
    codig.append("codigo",codigo);
   alert(""+codigo)
    
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