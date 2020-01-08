function init(){
  
    $("#form-acceso").on('submit',function(e){
        validate(e);
    })
    
 
   
    
}
function limpiar()
{
    $("#logina").val("");
    $("#clavea").val("");
	
}

function validate(e){
    e.preventDefault();
    logina=$("#logina").val();
    clavea=$("#clavea").val();
    
    $.post("../../api/login.php?op=verificar",
        {"logina":logina,"clavea":clavea},function(data) {
            //console.log(data);
            if (data!="null")
            {   
                $(location).attr("href","home.php");
            }
            else
            {
                alert("Usuario y/o Password incorrectos");
                $("#clavea").val('');
            }
    });
}
init();