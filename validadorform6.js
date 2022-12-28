function validarFormulario6(){
    var nombreResponsable = document.forms["form6"]["nombreResponsable"].value;
    var apellidoResponsable= document.forms["form6"]["apellidoResponsable"].value;
    var cedulaResponsable= document.forms["form6"]["cedulaResponsable"].value;
    var direccion = document.forms["form6"]["direccion"].value;
    var telefonoCelular= document.forms["form6"]["telefonoCelular"].value;
    var fechaEventor= document.forms["form6"]["fechaEventor"].value;
     var horaInicioEvento = document.forms["form6"]["horaInicioEvento"].value;
    var horaFinalEvento = document.forms["form6"]["horaFinalEvento"].value;
    var  dineroGastado= document.forms["form6"]["dineroGastado"].value;
    var dineroRecaudado= document.forms["form6"]["dineroRecaudado"].value;
    var grupoInvolucrados = document.forms["form6"]["grupoInvolucrados"].value;
    var cedulaRegistrante = document.forms["form6"]["cedulaRegistrante"].value;
     
  
   

    if (nombreResponsable== "" || apellidoResponsable =="" || cedulaResponsable=="" ||  direccion=="" ||  telefonoCelular=="" || fechaEventor==""||
        horaInicioEvento== "" || horaFinalEvento=="" || dineroGastado=="" || dineroRecaudado=="" || grupoInvolucrados==""  ||cedulaRegistrante==""  )  {
    alert("Por favor verifique que todos los campos estén llenos");
    return false;
    }
  
   
}   