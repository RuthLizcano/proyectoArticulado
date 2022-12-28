function validarFormulario3(){
    var Nombre = document.forms["form2"]["nombre"].value;
    var Apellido= document.forms["form2"]["apellido"].value;
    var Cedula= document.forms["form2"]["cedula"].value;
    var Añosbarrio = document.forms["form2"]["anosBarrio"].value;
    var Rol = document.forms["form2"]["rol"].value;
    var Cedularegistrante = document.forms["form2"]["cedulaRegistrante"].value;
   

    if (Nombre == "" || Apellido =="" || Cedula=="" ||  Añosbarrio=="" ||  Rol=="" ||  Cedularegistrante==""  )  {
    alert("Por favor verifique que todos los campos estén llenos");
    return false;
    }
  
   
}