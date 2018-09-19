<?php
	include_once('db/consultas.php');

	//En caso de que se encuentre el id al llamar esta funcion se disparara el evento de eliminar el registro en la base de datos.
	if(isset($_GET['id'])){
		delDep($_GET['id']);
		header("location: index.php");
	}

?>