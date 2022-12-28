function validarFormulario7(){
    var nombreOrganizacion = document.forms["form7"]["nombreOrganizacion"].value;
    var nit= document.forms["form7"]["nit"].value;
    var nombreResponsable= document.forms["form7"]["nombreResponsable"].value;
    var apellidoResponsable= document.forms["form7"]["apellidoResponsable"].value;
    var cedulaResponsable= document.forms["form7"]["cedulaResponsable"].value;
    var direccion= document.forms["form7"]["direccion"].value;
     var telefonoCelular = document.forms["form7"]["telefonoCelular"].value;
    var tipoBrigada = document.forms["form7"]["tipoBrigada"].value;
    
    var horaInicioBrigada= document.forms["form7"]["horaInicioBrigada"].value;
    var horaFinalBrigada = document.forms["form7"]["horaFinalBrigada"].value;
    var cedulaRegistrante = document.forms["form7"]["cedulaRegistrante"].value;
     
  
   

    if (nombreOrganizacion == "" || nit =="" || nombreResponsable=="" ||  apellidoResponsable=="" ||  cedulaResponsable=="" || direccion==""||
        telefonoCelular== "" || tipoBrigada=="" || horaInicioBrigada=="" || horaFinalBrigada=="" || cedulaRegistrante==""  )  {
    alert("Por favor verifique que todos los campos estén llenos");
    return false;
    }
  
   
}   