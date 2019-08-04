//--------------Funcion para validar el registro por primera vez

function validarRegistro(){
     ///------------------------Validando registro de usuarios del lado cliente, Faltan atributos como correo y genero, se modificaran mas adelante
    
    
    var nombre = document.querySelector("#nombre").value;
    var telefono = document.querySelector("#telefono").value;
    var username = document.querySelector("#username").value;
    var password = document.querySelector("#password").value;
    var password2 = document.querySelector("#rPassword").value;
    var direccion = document.querySelector("#direccion").value;
    var direccion = document.querySelector("#dui").value;
    var licencia = document.querySelector("#licencia").value;
var seguridad =$("#seguridad").val();

    var email= document.querySelector("#email").value;
   // var rMasculino =document.querySelector("#masculino").checked;
    
    
    
    
    //---validacion si no a seleccionado genero
   if(!document.querySelector("#masculino").checked && !document.querySelector("#femenino").checked){
       alertify.set("notifier","position", "top-center");
      alertify.error("Error seleccione genero");
       return false;
   }
    
    
    //---validar correo
    if(email!=" "){
        
        var expresion=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
        
        
        if(!expresion.test(email)){
            
            document.querySelector("label[for='email']").innerHTML += "<br> Escriba correctamente el correo";
            
            
            return false;
            
        }
    }
    
    
    //---validar registro
    
    if(nombre!=" " || nombre!=""){
        var caracteres=nombre.length;
        var expresion=/^[a-zA-Z]*$/;
        if(caracteres<7){
            document.querySelector("label[for='nombre']").innerHTML += "<br> Escriba un nombre real por favor mayor a 6 caracteres";
            
            
            return false;
        }
        
       
    }
   
    
    //---para validar contraseña tiene que ser mayor a 4
    //---Caracteres
    
    if(password!=" "){
        var caracteresPassword=password.length;
        var expresion=/^[a-zA-Z0-9]*$/;
        if(caracteresPassword<4){
            document.querySelector("label[for='password']").innerHTML += "<br> La contraseña debe contener minimo 4 caracters y maximo 16";
            
            
            return false;
        }
        
        if(password2!=password){
           
           document.querySelector("label[for='rPassword']").innerHTML += "<br> La contraseña no coincide";
            return false;
        }
        
        
    }
    

   if(seguridad=="Seleccione..." || seguridad=="S"){
                 alertify.error("Seleccione el nivel de seguridad o acceso que tendra el usuario");
                  return false;
   }
    
    
    
    
    
    
    return true;
    
}


//Esta funcion no se usa-----------------------------------------
//--------el jquery se agrega en usuarios.php--------------------

function actualizar(id,nombre,telefono,direccion,user,pass,dui){
    //---cadena que recibe los parametros para luego ser mandados al controlador
    var datos=new FormData();
    datos.append("id",id);
    datos.append("nombre",nombre);
    datos.append("telefono",telefono);
    datos.append("direccion",direccion);
    datos.append("user",user);
    datos.append("pass",pass);
    datos.append("dui", dui);
    datos.append("licencia", dui);
     
    
    
    $.ajax({
        
        type: "POST",
        url: "../Controladores/ControladorActualizarDatos.php",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,
        
        success:function(r){
          alert("-> "+r);
        
        if(r==1){
            // $("#table").load();
        alertify.message("Actualizado con exito -> "+r);
            
    }
          else if(r!=1){
            
              alert("warning -> "+r);}
            else{
              //  $("#table").load();
                
                alert("Error -> "+r  );}
        
    }
        
        
    });
}



function validarActualizarDatos(){
    
    var nombre = document.querySelector("#Nombre").value;
    var telefono = document.querySelector("#Telefono").value;
    var username = document.querySelector("#User").value;
    var password = document.querySelector("#Pass").value;
   
    var direccion = document.querySelector("#Direccion").value;
    var email= document.querySelector("#Email").value;
    var dui= document.querySelector("#dui").value;
    
    
    
    if(email!=" "){
        
        var expresion=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
        
        
        if(!expresion.test(email)){
            
            document.querySelector("label[for='email']").innerHTML += "<br> Escriba correctamente el correo";
            
            toastr.error("Llene los campos");
            return false;
            
        }
    }
    
    
    //---validar registro
    
    if(nombre!=" " || nombre!=""){
        var caracteres=nombre.length;
        var expresion=/^[a-zA-Z]*$/;
        if(caracteres<7){
            document.querySelector("label[for='Nombre']").innerHTML += "<br> Escriba un nombre real por favor mayor a 6 caracteres";
            
            
            return false;
        }
        
       
    }
    
    //---para validar contraseña tiene que ser mayor a 4
    //---Caracteres
    
    if(password!=" "){
        var caracteresPassword=password.length;
        var expresion=/^[a-zA-Z0-9]*$/;
        if(caracteresPassword<4){
            document.querySelector("label[for='Pass']").innerHTML += "<br> La contraseña debe contener minimo 4 caracters y maximo 16";
            
            
            return false;
        }
        
        
        
        
    }
    

   
    
    
    
    
    
    
    return true;
    
    
}