//funcion para obtener los datos de los campos
//tambien valida que los campos vayan llenos
function obtener(){
    
//----------------------------------------------------------------------
   
    var fechaInicio = document.querySelector("#fechaInicio").value;
    var fechaFin = document.querySelector("#fechaDevolucion").value;
//----------------------------------------------------------------------    
    if(fechaInicio==""){}
    if(fechaFin==""){}
    
    
//------------------------------    
}

//funcion para alquilar el auto
function alquilarVehiculo(placa,dui,fechaAlquiler,fechaDevolución){
    
    var datos=new FormData();
    
    datos.append("fechaAlquiler",fechaAlquiler);
    datos.append("fechaDevolucion",fechaDevolución);
    datos.append("numero_de_placa",placa);
    datos.append("dui",dui);
    
     $.ajax({
        
        type: "POST",
        url: "../Vistas/ajaxAlquiler.php",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,
        
        success:function(respuesta){
         

        if(respuesta==1){
         
           
            
          
            // se recarga la tabla
            location.reload();
           //$("#tabla").load("listado_auto.php");
            //$("#modalDetalle").load("listado_auto.php");
           alertify.success("Registro Eliminado");
            
    }
          else if(respuesta!=1){
           //para probar
              
          $("#tabla").load("listado_auto.php");
             // $("#modalDetalle").load("listado_auto.php #modalDetalle");
            alertify.success("Registro Eliminado");
              
          }
            else{
              //  $("#table").load();
                
                alert("Error -> "+r  );}
        
    }
        
        
    });
    
}