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
         
           
           
          alertify.success("Auto en alquiler");
           setTimeout(function(){location.reload();},900);
            
    }
          else if(respuesta!=1){
            alertify.success("Auto en alquiler");
           setTimeout(function(){location.reload();},900);
              
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

//----------para calcular precios

  


function calcularDias(){
    

//---------para calcular la fecha
const diff = moment(new Date($("#fechaFin").datepicker('getDate'))).diff(moment(new Date($("#fechaInicio").datepicker('getDate'))), 'days');
    //--se valida para evitar error de mostrado numeros negativos
    if(diff>0){
        $("#dias").text("Dias de alquiler: "+diff);
        //---luego obtenemos la placa del auto para calcular el precio del alquiler por los dias
    var placa=$("#placarent").val();
        //--ahora se aplicara ajax
     var datos=new FormData();
    datos.append("placa",placa); 
        //--ajax------------------------------
        $.ajax({
        
        type: "POST",
        url: "../Controladores/ControladorVerPrecio.php",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function(respuesta){
         
            if(respuesta!="" || respuesta!=" "){
                var precio=respuesta.precio*diff;
                $("#precio").text("Precio de alquiler: $"+precio);
                $("#precioxdia").text("Precio por dia: $"+respuesta.precio);
            }
            else{
                $("#precio").text("Aun no se determina el precio a este auto"); 
            }
    
         
            
        
    }
        
        
    });
        //--------------------------------------
    }
    

}