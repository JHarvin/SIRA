function validarVehiculo(){
    
    
    var placa=$("#nplaca").text();
    var marca=$("#marca").text();
    var tipo=$("#tipo option:selected").text();
    var color=$("#color").text();
    var numero_motor=$("#numer_motor").text();
    var chasis=$("#chasis").text();
    var tcombustible=$("#tcombustible").text();
    var costo=$("#costo").text();
    var imagen =$("#marca").val();
    
    //-----------------------------------------
    
    //-----------------------------------------
   
    if(placa==""){
        
        document.querySelector("label[for='nplaca']").innerHTML += '<br> <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong> Error!</strong> Usuario o contraseña incorrectos.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        return false;
    }
    
    
    
   return true; 
}