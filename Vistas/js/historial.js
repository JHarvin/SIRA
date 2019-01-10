$(document).ready(function(){
    var placa,fechaInicio,fechaFin;
    $('#tblhistorial').DataTable( {


        "lengthMenu": [[4, 10, 50, -1], [4, 10, 50, "Todos"]],


           "language": {
            "lengthMenu": "Mostrar _MENU_",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando _PAGE_ de _PAGES_ paginas",
            "infoEmpty": "Busqueda no encontrada",
            "infoFiltered": "(Total de registrados _MAX_ )",
            "sSearch":"Buscar",
            "paginate": {
            "previous": "Anterior",
                "next": "Siguente"
    }
        }

    } );
    $("#btnVer").click(function(){
         $("#tblhistorial tbody tr").click(function(){
         placa=$(this).find("td:eq(0)").text();
         fechaInicio=$(this).find("td:eq(1)").text();
         fechaFin=$(this).find("td:eq(2)").text();
        
              ver(placa,fechaInicio,fechaFin);
        $("#placaDetalle").val(placa);
             $("#fechaInicio").val(fechaInicio);
             $("#fechaSalida").val(fechaFin);
       
   // alert("placa: "+placa+" f1. "+fechaInicio+" f2: "+fechaFin);
    });
       
    });
    
});
//------Fin ready function------------------
//funcion que usa ajax desde aqui
function ver(placa,fechaInicio,fechaFin){
    var datos=new FormData();
    datos.append("placa",placa);
    datos.append("fechaInicio",fechaInicio);
    datos.append("fechaFin",fechaFin);
    
    //incio ajax
    $.ajax({
        
        type: "POST",
        url: "../Controladores/ControladorVerDatosM.php",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        
        success:function(respuesta){
          
            $("#tiposervicio").val(respuesta.tipo);
            $("#encargado").val(respuesta.encargado);
            $("#servicio").val(respuesta.servicio);
   
        
        }
 
    
    });
    //fin ajax
}
           