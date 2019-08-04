$(document).ready(function(){
    
    $("#tabla tbody tr").click(function(){
        var placa=$(this).find("td:eq(0)").text();
        var carro=$(this).find("td:eq(1)").text();
        
        //$("#autor").val(carro);
        $("#idkm").val(placa);
    //alert(""+placa);
    });
      //-----------------------
    $("#btnActualizarKMM").click(function(){
        var placa=$("#idkm").val();
        var mes=$("#mes").val();
        var kilom=$("#kilom").val();
       // alert(""+mes);
       if(mes<2 || mes>11){
 var divM = document.getElementById('rowM');
 divM.insertAdjacentHTML('afterend', '<div class="alert alert-danger alert-dismissible fade show" role="alert">el numero de meses tiene que estar entre 2 y 11 meses!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
       }else if(mes>1 || mes<12){
           ingresarKMM(placa, mes, kilom);
       }
        
    });
});

function ingresarKMM(placa,mes,kilom){
    var datos=new FormData();
    datos.append("placa",placa);
    datos.append("meses",mes);
    datos.append("km",kilom);
    
    
    $.ajax({
        
        type: "POST",
        url: "../Controladores/ControladorPeriodico.php",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,
        
        success:function(respuesta){
         

        if(respuesta=="success"){
         
           
           
          alertify.success("Registrado para cambios");
           setTimeout(function () {
               location.reload();
           }, 900);
            
    }
          else{
           // $("#tcuerpo").load("listado_auto.php #tcuerpo >*");
          alertify.error("Error "+respuesta);
              
          }
    
        
        }
    });
    
}