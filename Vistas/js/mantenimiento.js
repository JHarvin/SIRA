$(document).ready(function(){
    
    $("#tabla tbody tr").click(function(){
        var placa=$(this).find("td:eq(0)").text();
        var carro=$(this).find("td:eq(1)").text();
        
        $("#auto").val(carro);
        $("#placa").val(placa);
    //alert(""+placa);
    });
      //-----------------------
    $("#btnMantenimiento").click(function(){
        var placa=$("#placa").val();
        var fechaIn=$("#fechaIn").val();
        var tipo=$("#tipomantenimiento").val();
        ingresar(placa,tipo,fechaIn);
    });
    //---------------------------------------------
    $("#btnHistorial").click(function(){
           $("#tabla tbody tr").click(function(){
        var placa=$(this).find("td:eq(0)").text();
       
       
        verDatos(placa);
        
    //alert(""+placa);
    });
        
        
       
    });
});

function ingresar(placa,tipo,fecha){
    var datos=new FormData();
    datos.append("placa",placa);
    datos.append("tipo",tipo);
    datos.append("fecha",fecha);
    
    $.ajax({
        
        type: "POST",
        url: "../Controladores/ControladorKilometraje.php",
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

