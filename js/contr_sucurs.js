

function mostrar_alta() {

    div1=document.getElementById('agreg_suc');
    div1.style.display = '';


  


    div2=document.getElementById('baj_suc');
    div2.style.display = 'none';
    div3=document.getElementById('mod_suc');
    div3.style.display = 'none';



	// body...
}


function mostrar_mod() {

     div1=document.getElementById('mod_suc');
     div1.style.display = '';


    div2=document.getElementById('agreg_suc');
    div2.style.display = 'none';
    div3=document.getElementById('baj_suc');
    div3.style.display = 'none';

	// body...
}


function mostrar_baja() {

  div1=document.getElementById('baj_suc');
  div1.style.display = '';

  div2=document.getElementById('agreg_suc');
  div2.style.display = 'none';
  div3=document.getElementById('mod_suc');
  div3.style.display = 'none';

/*  var cont1=getElementsById('baj_suc');
  var cont2=getElementsById('agreg_suc');
  var cont3=getElementsById('mod_suc');
*/ 


  
	// body...
}




function validar2(){


 porId=document.getElementById("sucurs_princ").value;


if ((porId ==0) || (porId =='0'))
{

  return false;
}

else{

  return true;
}


}




