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
      //-----------------------
    $("#btnDevolver").click(function(){
        var codigo=$("#codigo").val();
        
        devolver(codigo);
    });
    //---------------------------------------------
   
});
function devolver(codigo){
    var codig=new FormData();
    codig.append("codigo",codigo);
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

function verificarGarantia(codigo){
    var garantia="";
    var codigo=new FormData();
    codig.append("codigo",codigo);
    codig.append("n",1);
     $.ajax({
        
        type: "POST",
        url: "../Controladores/ControladorVerificarGarantia.php",
        data: codig,
        cache:false,
        contentType:false,
        processData:false,
         dataType:"json",
        
        success:function(respuesta){
         

     $("#aplica").val(respuesta);
        
            
        
    }
        
        
    });
    //fin ajax 1
    //inicio ajax 2
    codig.append("n",0);
     $.ajax({
        
        type: "POST",
        url: "../Controladores/ControladorVerificarGarantia.php",
        data: codig,
        cache:false,
        contentType:false,
        processData:false,
         dataType:"json",
        
        success:function(respuesta){
         var calculo=respu

     $("#aplica").val(respuesta);
        
            
        
    }
        
        
    });
}