function disab(obj){


    if (obj.checked){
       
        document.getElementById('calle_alt').disabled = true;}
    else{
        
        document.getElementById('calle_alt').disabled =false;
      }

}



function validar1(){


var a=document.getElementById('calle_sin_nom');

var b=document.getElementById('nombre').value;

var c=document.getElementById('calle_alt').value;

var nombre3 = document.getElementById('lista').value;

var nombre2 =$('#lista').val();

var nombre7 = document.getElementById('id').value;


var n = document.getElementById('e_nombre').value;






var nombre = $('#nombre').val();//obtener el nombre y/o termino de busqeuda



var es_nombre = document.getElementById("e2_nombre");



var ok = 0;

var ckbox = document.getElementsByName('actividad_1[]');


    for (var i=0; i < ckbox.length; i++){
        if(ckbox[i].checked == true){
        ok = ok+1;
        }
    }
    
    if(ok == 0){
    return false;
    }



//var esnombre = $('#e2_nombre').val();

	$.ajax({
		url: "proc_bus_val_2.php",
		type: "POST",
		data: {nombre:nombre},
		success:function(data){
		    
		    	$("#mensaje").html(data);
		    	
    		}

									
			});


//window.setInterval("validar1()",240);

var es_nombre = document.getElementById("e2_nombre");






if ((a.checked == false)&&(c ==''))
{


document.getElementById('e_nombre4').innerHTML='Tilde el checkbox o ingrese altura de la Calle.';

//document.getElementById('e_nombre9').innerHTML='error.';

return false;


      } 



if ((a.checked == false)&&(c !=''))
{


document.getElementById('e_nombre4').innerHTML='';




 } 


if ((a.checked == true)&&(c ==''))
{


document.getElementById('e_nombre4').innerHTML='';




 } 





if ((a.checked == true)&&(es_nombre.value == ''))
{



return true;


      } 



    
 if ((a.checked == false)&&(b !='')&&(c !='')&&(nombre7 >0)&&(es_nombre.value == '')&&(nombre3.value == '')&&(n==''))
 {



return true;


      }    



return false;

}



