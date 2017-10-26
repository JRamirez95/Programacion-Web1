<?php 

$arregloRally3 = array(1, 2, "Second", "Third", true, false);
$arregloLetras = array();



foreach($arregloRally3 as $value){
    if(is_string($value)){
       array_push($arregloLetras, $value);
      
} 
}


echo "Las letras que contiene el arreglo son :";
print_r($arregloLetras);