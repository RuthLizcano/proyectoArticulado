function validarFormulario5(){
    var nombreCurso = document.forms["form5"]["nombreCurso"].value;
    var candidadHora= document.forms["form5"]["candidadHora"].value;
    var nombreOrganizacion= document.forms["form5"]["nombreOrganizacion"].value;
    var nit= document.forms["form5"]["nit"].value;
    var nombreProfesor= document.forms["form5"]["nombreProfesor"].value;
    var cedulaProfesor = document.forms["form5"]["cedulaProfesor"].value;
    var direccion = document.forms["form5"]["direccion"].value;
    var telefonoCelular = document.forms["form5"]["telefonoCelular"].value;
    var diaClase= document.forms["form5"]["diaClase"].value;
    var horaClase= document.forms["form5"]["horaClase"].value;
   
    var costo= document.forms["form5"]["costo"].value;
    var valorClase= document.forms["form5"]["valorClase"].value;
    var ingresoJAC= document.forms["form5"]["ingresoJAC"].value;
    var gastoJAC = document.forms["form5"]["gastoJAC"].value;
    var cedulaRegistrante = document.forms["form5"]["cedulaRegistrante"].value;
  
   

    if (nombreCurso== "" || candidadHora =="" ||  nombreOrganizacion=="" ||  nit=="" ||  nombreProfesor=="" 
        ||  cedulaProfesor=="" ||  direccion=="" ||  telefonoCelular=="" ||  diaClase=="" ||  horaClase==""
         ||  costo=="" ||  valorClase=="" ||  ingresoJAC=="" ||  gastoJAC=="" || cedulaRegistrante=="")  {
    alert("Por favor verifique que todos los campos estén llenos");
    return false;
    }
  
   
}