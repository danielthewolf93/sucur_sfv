$(document).ready(function(){
                                
        var consulta;
                                                                          
         //hacemos focus al campo de búsqueda
        $("#busqueda").focus();
                                                                                                    
        //comprobamos si se pulsa una tecla
        $("#busqueda").keyup(function(e){
                                     
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#busqueda").val();
                                                                           
              //hace la búsqueda
                                                                                  
              $.ajax({
                    type: "POST",
                    url: "buscar_calles.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                          //imagen de carga
                          $("#resultado").html("<p align='center'><img src='ajax_loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petición ajax");
                    },
                    success: function(data){ 
                        //Probar  
                        //Para no borrar una vez que encuentra
                        //---------------------------------
                       // $("#filtro").html(data);
                       // $("#busqueda").val(consulta);
                        //---------------------------------            

                          
                          $("#resultado").empty();

                          $("#resultado").append(data);

                          
                         


                    }
              });
                                                                                  
                                                                           
        });
                                                                   
});

