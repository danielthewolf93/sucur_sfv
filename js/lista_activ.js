$(document).ready(function(){
                                
//var nombre = $('#nombre').val();//obtener el nombre y/o termino de busqeuda

//aca va el nro de inscripcion desde la variable sesion del contribuyente_nro_inscripcion

var nr_inscrip = 000000016402;

var es_nombre = document.getElementById("e2_nombre");

//var esnombre = $('#e2_nombre').val();

  $.ajax({
    url: "controladores/proc_bus_val.php",
    type: "POST",
    data: {nr_inscrip:nr_inscrip},
    success:function(data){
        
          $("#mensaje").html(data);
          
        }

                  
      });
                                                                   
});