//--------------

function validarRegistro(){
     ///------------------------Validando registro de usuarios del lado cliente, Faltan atributos como correo y genero, se modificaran mas adelante
    
    
    var nombre = document.querySelector("#nombre").value;
    var telefono = document.querySelector("#telefono").value;
    var username = document.querySelector("#username").value;
    var password = document.querySelector("#password").value;
    var direccion = document.querySelector("#direccion").value;
    var email= document.querySelector("#email").value;
    
    //---validar correo
    if(email!=" "){
        
        var expresion=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
        
        
        if(!expresion.test(email)){
            
            document.querySelector("label[for='email']").innerHTML += "<br> Escriba correctamente el correo";
            
            
            return false;
            
        }
    }
    
    
    //---validar registro
    
    if(nombre!=" "){
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
        
        
    }
    
    
    toastr.success("Usuario guardado");
    
    return true;
    
}