function validarFormulario2(){
    var Nombre = document.forms["form1"]["nombre"].value;
    var Apellido = document.forms["form1"]["apellido"].value;
    var Cedula = document.forms["form1"]["cedula"].value;
    var Nacionalidad = document.forms["form1"]["nacionalidad"].value;
    var CiudadNacimiento = document.forms["form1"]["ciudadNacimiento"].value;
    var FechaNacimiento = document.forms["form1"]["fechaNacimiento"].value;
    var TipoSangre = document.forms["form1"]["tipoSangre"].value;
    var TelefonoFijo = document.forms["form1"]["telefonoFijo"].value;
    var TelefonoCelular = document.forms["form1"]["telefonoCelular"].value;
    var Direccion= document.forms["form1"]["direccion"].value;
    var Barrio = document.forms["form1"]["barrio"].value;
    var Ciudad = document.forms["form1"]["ciudad"].value;
    var Correo = document.forms["form1"]["correo"].value;
    var EstadoCivil = document.forms["form1"]["estadoCivil"].value;
    var Profecion = document.forms["form1"]["profecion"].value;
    var NumeroHijo = document.forms["form1"]["numeroHijo"].value;
    var RangoEdades = document.forms["form1"]["rangoEdades[]"].value;
    var AdultoCuidado = document.forms["form1"]["adultoCuidado"].value;
    var ViveCuantos = document.forms["form1"]["viveCuantos"].value;
    var ViveEn  = document.forms["form1"]["veveEn"].value;
    var TipoVivienda = document.forms["form1"]["tipoVivienda"].value;
    var Genero = document.forms["form1"]["genero"].value;
    var Etnia = document.forms["form1"]["etnia"].value;
    var Intereses= document.forms["form1"]["intereses"].value;
    

   

    if (Nombre == "" || Apellido =="" || Cedula=="" || Nacionalidad==""  || CiudadNacimiento=="" || FechaNacimiento=="" || TipoSangre=="" 
     || TelefonoFijo=="" || TelefonoCelular=="" || Direccion=="" || Barrio=="" || Ciudad=="" || Correo=="" || EstadoCivil==""|| Profecion=="" || NumeroHijo=="" 
     || RangoEdades=="" || AdultoCuidado=="" || ViveCuantos=="" || ViveEn=="" || TipoVivienda=="" || Genero==""  || Etnia==""  || Intereses=="")  {
    alert("Por favor verifique que todos los campos est??n llenos");
    return false;
    }else{
        retur true;
    }
  
   
}