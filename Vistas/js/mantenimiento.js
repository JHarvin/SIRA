$(document).ready(function(){
    
    $("#tabla tbody tr").click(function(){
        var placa=$(this).find("td:eq(0)").text();
        var carro=$(this).find("td:eq(1)").text();
        
        $("#auto").val(carro);
        $("#placa").val(placa);
        $("#sacarplaca").text(placa);
        $("#sacarcarro").text(carro);
    //alert(""+placa);
    });
      //-----------------------
    $("#btnMantenimiento").click(function(){
        var placa=$("#placa").val();
        var fechaIn=$("#fechaIn").val();
        var tipo=$("#tipomantenimiento").val();
         var fechaFin=$("#fechasalida").val();
        var encargado=$("#encargado").val();
        var servicio=$("#servicio").val();
        ingresar(placa,tipo,fechaIn,fechaFin,encargado,servicio);
      // ingresarRevision(placa,fechaFin,encargado,servicio);
        
        //ingresarRevision(placa,fechaFin,encargado,servicio);
    });
    //---------------------------------------------
    $("#btnHistorial").click(function(){
           $("#tabla tbody tr").click(function(){
        var placa=$(this).find("td:eq(0)").text();
       
       
        verDatos(placa);
        
    //alert(""+placa);
    });
        
        
       
    });
    //----------------------------------------------
    $("#btnSiH").click(function(){
        var placa=$("#sacarplaca").text();
        sacarMantenimiento(placa);
        
    });
});

function ingresar(placa,tipo,fecha,fechaFin,encargado,servicio){
    var datos=new FormData();
    datos.append("placa",placa);
    datos.append("tipo",tipo);
    datos.append("fecha",fecha);
    datos.append("fechaFin",fechaFin);
    datos.append("encargado",encargado);
    datos.append("servicio",servicio);
    $.ajax({
        
        type: "POST",
        url: "../Controladores/ControladorKilometraje.php",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,
        
        success:function(respuesta){
         

        if(respuesta==1){
         
           
          
          alertify.success("Registrad en mantenimiento");
           setTimeout(function(){location.reload();},500);
            
    }
          else if(respuesta!=1){
           // $("#tcuerpo").load("listado_auto.php #tcuerpo >*");
          alertify.error("Auto en alquiler "+respuesta);
              
          }
            else{
              //  $("#table").load();
                
                alert("Error -> "+respuesta  );}
        
    }
        
        
    });
    
}

//Para ver los datos del historial del carro
function verDatos(placa){
    
    var datos=new FormData();
    datos.append("placa",placa);
    $.ajax({
        
        type: "POST",
        url: "../Controladores/ControladorDatosMantemiento.php",
        data: datos,
        
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function(respuesta){
         //aqui se cargaran los datos del modal
     var fila,i=0;
            
          //agregar contador
                
        $.each(respuesta, function(indice,valor){
            i++;
            
            
        });
            var x=i-3;
            for(var j=0;j<i ;j++){
                 fila="<tr>"+
                 "<td>"+respuesta.entrada+"</td>"+
                  "<td>"+respuesta.salida+"</td>"+
                 "</tr>"
                $("#tablah").append(fila);
            }
    
          
            
        
    }
        
        
    }); 
}
function sacarMantenimiento(placa){
    var datos=new FormData();
    datos.append("placa",placa);
    $.ajax({
        
        type: "POST",
        url: "../Controladores/ControladorSacarMantenimiento.php",
        data: datos,
        
        cache:false,
        contentType:false,
        processData:false,
        success:function(respuesta){
         //aqui se cargaran los datos del modal
     
            
          if(respuesta==1){
              alertify.success("Auto disponible");
              $("#tabla").load("../Vistas/mantenimiento.php #tabla > *");
          }
            else{
                 alertify.success("Auto disponible");
              $("#tabla").load("../Vistas/mantenimiento.php #tabla > *");
            }
                
      
            
            
    
          
            
        
    }
        
        
    }); 
    
}

