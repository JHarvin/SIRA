 <!DOCTYPE html>
<html lang="es">
 <head>
 <title>Inicio</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/buscarInput.css">
  </head>
  <body class="app sidebar-mini rtl">
  <?php
      include"menuVentas.php";
      ?>
 <main class="app-content">
 <div class="app-title">
        <div>
          <h1><i class="fa fa-inbox"></i> Cajero : Administrador</h1>
          <p>Rent a car chacon</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          
          
        </ul>
      </div>
<div class="row">
       <div  class="col-md-12">
           <div class="card">
          
         <form>
  <div class="form-row">
    
    <div class="col">
      <input type="text" class="form-control" placeholder="Código">
    </div>
    <div class="col-7">
      <input type="text" class="form-control" placeholder="Descripcion del producto o nombre del producto">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Precio de Venta">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Cantidad">
    </div>
    
    
  </div>
  
   <div class="card-footer">
       <button class="btn btn-primary">Agregar Producto</button>
       <button class="btn btn-success">Nuevo Cliente</button>
   </div> 
  
</form>
               
           </div>
           
           <div class="card table table-responsive">
               
               <table class="table table-striped">
                   <thead>
                <tr>
                  <th>Código</th>
                  <th>Descripción</th>
                   <th>Precio Unitario</th>
                  <th>Cantidad</th>
                  <th>Importe</th>
                  <th></th>
                 
                </tr>
              </thead>
                   <tbody>
                <tr>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td>
                     <button class="btn btn-warning"><i class="fa fa-trash-o"></i></button>
                     
                 </td>
                </tr>
                   </tbody> 
               </table>
               
              <h3> <label>Total:</label></h3>
               <div class="card-footer">
                    <button class="btn btn-danger"><i class="fa fa-ban"></i>Cancelar</button>
                     <button class="btn btn-success"><i class="fa fa-check-circle"></i>Registrar Venta</button>
               </div>
           </div>
           
           
           
           
           
           
           
           <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
						<h3>DATOS DE FACTURA</h3>
                                        
                      <!-- First Action -->
                                      <div class="form-group"> 
                                                     <label for="field-12" class="control-label">Código de Venta:</label> 
          <input type="hidden" name="codcaja" id="codcaja" value="1">
		  <div id="nroventa"><input class="form-control" type="text" name="codventa" id="codventa" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese N° de Venta" value="2018-001-V00293" readonly="readonly"></div> 
                    </div>  
                                        
                      <!-- First Action -->
                                      <div class="form-group"> 
                                                     <label for="field-12" class="control-label">N° de Serie:</label> 
          <div id="nroserieve"><input class="form-control" type="text" name="codserieve" id="codserieve" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese N° de Serie" value="22072018-001-V00021" readonly="readonly"></div> 
                    </div> 
                                        
                      <!-- First Action -->
                                      <div class="form-group"> 
                                                     <label for="field-12" class="control-label">N° de Autorización:</label> 
          <div id="nroautorizacionve"><input class="form-control" type="text" name="codautorizacionve" id="codautorizacionve" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese N° de Autorización" value="VAHXF-2018-001-V00293" readonly="readonly"></div> 
                    </div> 
					
                      <!-- Second Action --> 
                                      <div class="form-group"> 
                                                     <label for="field-12" class="control-label">Búsqueda de Clientes:</label> 
         <input class="form-control" type="hidden" name="codcliente" id="codcliente"><input class="form-control ui-autocomplete-input" type="text" name="busqueda" id="busqueda" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Búsqueda de Cliente" required="required"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><small><span class="symbol required"></span> Búsqueda de Cliente: Cédula o Nombre</small>
                                     </div>
									 
					 <!-- Second Action -->
					 <div class="form-group">
					 
					 <div class="radio">Tipo de Pago: 
						  <label>
						    <input name="tipopagove" id="tipopagove" value="CONTADO" onclick="BuscaFormaVenta()" checked="checked" type="radio">
						    Contado
						  </label>&nbsp;&nbsp;
						  <label>
						    <input name="tipopagove" id="tipopagove" value="CREDITO" onclick="BuscaFormaVenta(); MuestraCambioPagos();" type="radio">
						    Crédito
						  </label>
						</div>
						
                      </div>
															 
									  <!-- Second Action --> 
      <div id="muestraformapagoventas"><div class="form-group"> 
                                                     <label for="field-12" class="control-label">Forma de Pago:</label> 
       <select name="formapagove" id="formapagove" class="form-control" onchange="MuestraCambioPagos()" required="required">
	       <option value="">SELECCIONE</option>
		   <option value="EFECTIVO">EFECTIVO</option>
		   <option value="CHEQUE">CHEQUE</option>
		   <option value="CHEQUE POSFECHADO">CHEQUE POSFECHADO</option>
		   <option value="TARJETA DE CREDITO">TARJETA DE CRÉDITO</option>
		   <option value="TRANSFERENCIA">TRANSFERENCIA</option>
      </select>
                                     </div></div>
									 
			<div id="muestracambiospagos"></div>
				
				<!-- Second Action -->
			<div class="form-group">
					 
					 <div class="radio">
						  <label>
						    <input name="tiporeporte" id="tiporeporte" value="TICKET" checked="checked" type="radio">
						    Imprimir Ticket
						  </label>&nbsp;&nbsp;&nbsp;&nbsp;
						  <label>
						    <input name="tiporeporte" id="tiporeporte" value="FACTURA" type="radio">
						    Imprimir Factura
						  </label>
						</div>
						
                      </div>
							
                      <!-- Third Action -->
					   <div class="form-group">  
                                <label for="field-12" class="control-label">Descuento de Venta %:</label> 
<input class="form-control number calculodescuentove" type="text" name="descuento" id="descuento" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Descuento de Venta" value="0" required="required"> 
                    </div>
					  
					  	 <!-- four Action -->
                                      <div class="form-group">  
                                                     <label for="field-12" class="control-label">Fecha de Venta:</label> 
<input class="form-control" type="text" name="fecharegistro" id="fecharegistro" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Fecha Venta" readonly="readonly"> 
                    </div>
							
                     <hr>		 
                      <br>
                      
                  </div>
       </div>
       
       
       
        
        
        
      </div>
      
      
      
      
</main>

<!--para modal de repaciones-->
 


<!--para modal de autos disponibles lista-->
 


<!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../js/plugins/pace.min.js"></script>
    <script src="../js/jquery.quicksearch2.2.1.js" ></script>
    <!--escript para buscar en la tabla-->
    <script>
      $(function () {

  $('#search').quicksearch('table tbody tr');								
});
    </script>
</body>
</html>
