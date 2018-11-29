$(document).ready(function(){
    $("#tabla tbody tr").click(function(){
        var placa=$(this).find("td:eq(0)").text();
        var carro=$(this).find("td:eq(1)").text();
        
        
        //se ponen los datos en el modal
        
        $("#dplaca").text(placa);
        $("#carro").text(carro);
        //$("#aplicagarantia").val("Aplica");
        
       
    
    });
    //-----------------------------------------------
    $("#btnDevolverAlquilado").click(function(){
       var placa=$("#dplaca").text();
        alert("placa-> ");
        devolverAlquilado(placa);
    });
});

//---funcion con ajax para devolver
function devolverAlquilado(placa){
    var datos=new FormData();
    datos.append("placa",placa);
    //-----Me quede aqui poner ajax para hacer la devolucion del carro
    //--------ajax
    $.ajax({
        
        type: "POST",
        url: "../Controladores/ControladorDevolverCarro.php",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,
        
        
        success:function(respuesta){
          
if(respuesta==1){
    alertify.success("Auto devuelto");
    $("#tablabody").load("alquilados.php #tabla > *");
}
            else{
                alertify.error("Auto error en el servidor");
            }
     
      
    }
        
        
    });
    //---fin ajax
}