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

var ejm ='<li>'."No hay resultados".'</li>';


if ((a.checked == true)&&(b !=''))
{



return true;


      } 



    
 if ((a.checked == false)&&(b !='')&&(c !='')&&(nombre7 >1)&&(nombre3!=ejm))
{



return true;


      }    


/*
if (nombre3 =='')
{

	return true;
}

*/





return false;

}



