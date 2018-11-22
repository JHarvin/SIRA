$(document).ready(function()
{
	$('#btnguardarb').click(function(){
	var codigo=$("#codigo").val();
	var tipo=$("#tipo").val();
	var proveedor=$("#proveedor").val();
	var precio_venta=$("#precio_venta").val();
	alert("Hi");
	// Obtenemos el numero de filas (td) que tiene la primera columna
            // (tr) del id "tabla"
            var tds=$("#tabla tr:first td").length;
            // Obtenemos el total de columnas (tr) del id "tabla"
            var trs=$("#tabla tr").length;
            var nuevaFila="<tr>";
            for(var i=0;i<tds;i++){
                // añadimos las columnas
                nuevaFila+="<td> "+codigo+" "+tipo+" "+proveedor+" "+precio_venta+" Añadida con jquery</td>";
            }
            // Añadimos una columna con el numero total de filas.
            // Añadimos uno al total, ya que cuando cargamos los valores para la
            // columna, todavia no esta añadida
            nuevaFila+="<td>"+(trs+1)+" filas";
            nuevaFila+="</tr>";
            $("#tabla").append(nuevaFila);
	});
});