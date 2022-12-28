function validarFormulario2(){
    var Nombre = document.forms["form1"]["nombre"].value;
    var Apellido = document.forms["form1"]["apellido"].value;
    var Cedula = document.forms["form1"]["cedula"].value;
    var Nacionalidad = document.forms["form1"]["nacionalidad"].value;
    var CiudadNacimiento = document.forms["form1"]["ciudadNacimiento"].value;
    var FechaNacimiento = document.forms["form1"]["fechaNacimiento"].value;
    
    var TelefonoFijo = document.forms["form1"]["telefonoFijo"].value;
    var TelefonoCelular = document.forms["form1"]["telefonoCelular"].value;
    var Direccion= document.forms["form1"]["direccion"].value;
    var Barrio = document.forms["form1"]["barrio"].value;
    var Ciudad = document.forms["form1"]["ciudad"].value;
    var Correo = document.forms["form1"]["correo"].value;
   
    var Profecion = document.forms["form1"]["profecion"].value;
    
    var Intereses= document.forms["form1"]["intereses"].value;
    

   

    if (Nombre == "" || Apellido =="" || Cedula=="" || Nacionalidad==""  || CiudadNacimiento=="" || FechaNacimiento=="" 
     || TelefonoFijo=="" || TelefonoCelular=="" || Direccion=="" || Barrio=="" || Ciudad=="" || Correo=="" || Profecion==""|| Intereses=="")  {
    alert("Por favor verifique que todos los campos estén llenos");
    return false;
    }
  
   
}