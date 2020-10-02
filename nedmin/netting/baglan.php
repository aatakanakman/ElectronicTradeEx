<?php 


date_default_timezone_set('Europe/Istanbul'); 
try {

	$db = new PDO("mysql:host=localhost;dbname=ticaret;charset=utf8",'root','');
	
	
	


}catch (PDOExpception $e){

	echo $e -> getMessage();

}


?>