//-------------------------------------------------------------
//Para añadir por primera vez un precio
//-------------------------------------------------------------
function addprecio(precio,placa){
        var datos=new FormData();
    datos.append("precio",precio);
        datos.append("placa",placa);

    
         $.ajax({
        
        type: "POST",
        url: "ajaxPrecios.php",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,
        
        success:function(r){
         

        if(r==1){
    
           // setTimeout(alertify.success("Usuario inhabilitado"),5000);
    location.reload();
          // $("#tabla").load("usuarios.php #tabla > *");
            alertify.success("Precio agregado")
            
    }
          else if(r!=1){
           
              alertify.error("Algo salio mal"+r);
              
          }
            else{
              //  $("#table").load();
                
                alert("Error -> "+r  );}
        
    }
        
        
    });
        
    }
//-------------------------------------------------------------
//Para modificar un precio ya ingresado
//-------------------------------------------------------------
function updateprecio(precio,placa){
        var datos=new FormData();
       datos.append("precio",precio);
        datos.append("placa",placa);

    
         $.ajax({
        
        type: "POST",
        url: "ajaxActualizarPrecio.php",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,
        
        success:function(r){
         

        if(r==1){
    
           // setTimeout(alertify.success("Usuario inhabilitado"),5000);
    location.reload();
          // $("#tabla").load("usuarios.php #tabla > *");
            alertify.success("Usuario inhabilitado")
            
    }
          else if(r!=1){
           
              alertify.error("Algo salio mal"+r);
              
          }
            else{
              //  $("#table").load();
                
                alert("Error -> "+r  );}
        
    }
        
        
    });
        
    }