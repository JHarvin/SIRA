$(document).ready(function(){
    var campo,codigo,tipo,proveedor,precio,cliente,direccion,garantia,fecha;
    //Accion para guardar la venta
    $("#btnguardar").click(function(){
             cliente=$("#cliente").val();
             direccion=$("#direccion").val();
             garantia=$("#garantia").val();
             fecha=$("#fecha").val();
        //Se obtienen los valores de la tabla
        
         $("#tabla tbody tr").each(function () {
             
               codigo=$(this).find("td:eq(0)").text();
             if(codigo!=""){
              tipo=$(this).find("td:eq(1)").text();
              proveedor=$(this).find("td:eq(2)").text();
              precio=$(this).find("td:eq(3)").text();
                 //--se llama a la funcion para que guarde la venta por ajax
                 guardarVenta(cliente,direccion,fecha,codigo,tipo,proveedor,precio,garantia);
                }
            
           
             
         });
        //------fin obtener valores tabla
         //$("#tcuerpo").load("mantenimientos.php #tcuerpo > *");
          alertify.success("Venta realizada");
    });
    //---fin btnguardar
    
    
});
//fin document ready

//Funcion que utiliza ajax para guardar la venta
function guardarVenta(cliente,direccion,fecha,codigo,tipo,proveedor,precio,garantia){
    var datas=new FormData();
    var confirmar=0;
    datas.append("cliente",cliente);
    datas.append("direccion",direccion);
    datas.append("fecha",fecha);
    datas.append("codigo",codigo);
    datas.append("tipo",tipo);
    datas.append("proveedor",proveedor);
    datas.append("precio",precio);
    datas.append("garantia",garantia);
    
    //----------------------------------------
     $.ajax({
        
        type: "POST",
        url: "../Controladores/ControladorVentasV.php",
        data: datas,
        cache:false,
        contentType:false,
        processData:false,
        
        success:function(respuesta){
         

        if(respuesta==1){
         confirmar=1;
           
          
           
            
    }
          else if(respuesta!=1){
           // $("#tcuerpo").load("listado_auto.php #tcuerpo >*");
          alertify.success("error"+respuesta);
              
          }
            else{
              //  $("#table").load();
                
                //alert("Error -> "+respuesta  );
            }
        
    }
        
        
    });
    
}