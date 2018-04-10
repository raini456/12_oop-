<?php
function fx($a){
    if($a<10){
      throw new Exception("Zahl ist kleiner als 10!!!!");
    }
  }  
  try{  
    fx(9);
    }catch(Exception $ex){
      echo $ex->getMessage()."<br>".$ex->getLine()."<br>".$ex->getFile()."<br>";
    }
?>

