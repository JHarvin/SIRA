/*******************************************************************************
-----------------------------Hecho por Harvin Ramos-----------------------------
----------------------------=======================-----------------------------
---------------------------========================-------------------------------------
-Javascript para validar campos del modal de alquilar auto asi como tambien para guardar a travez de ajax
========================================================================================
********************************************************************************/
function alquilarVehiculo(placa,dui,fechaAlquiler,fechaDevolución){
    
   
    var datos=new FormData();
    
    datos.append("fechaInicio",fechaAlquiler);
    datos.append("fechaFin",fechaDevolución);
    datos.append("placa",placa);
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
         
           
           $("#tcuerpo").load("listado_auto.php #tcuerpo >*");
          alertify.success("Auto en alquiler");
           
            
    }
          else if(respuesta!=1){
            $("#tcuerpo").load("listado_auto.php #tcuerpo >*");
          alertify.success("Auto en alquiler");
              
          }
            else{
              //  $("#table").load();
                
                alert("Error -> "+respuesta  );}
        
    }
        
        
    });
    
}



function reservar(){
    var fechaInicio=document.querySelector("#fechaInicio").value;
    var fechaFin=document.querySelector("#fechaFin").value;
    var placa = document.querySelector("#placarent").value;
    var dui = document.querySelector("#duiClienteAl").value;
    //Se valida que los campos no esten vacios
    if(fechaInicio==""){
        // <div id="one">one</div>
var divM = document.getElementById('rowM');
divM.insertAdjacentHTML('afterend', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Seleccione las fechas!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

        //_------------------------
// At this point, the new structure is:
// <div id="one">one</div><div id="two">two</div>
        
    }
    if(fechaFin==""){
        //Se obtiene el id del div para mostrar la alerta bootstrap
        var divM = document.getElementById('rowM');
divM.insertAdjacentHTML('afterend', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Seleccione las fechas!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        
    }
    
    else{
         
        //Aqui va ir el ajax para alquilar el auto
        alquilarVehiculo(placa,dui,fechaInicio,fechaFin);
    }
    
    
}