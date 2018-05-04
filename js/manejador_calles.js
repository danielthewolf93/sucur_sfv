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

var c=document.getElementById('calle_alt');

d=$(nombre).val();


if ((a.checked == true)&&(b !=''))
{



return true;


      } 
    


return false;

}