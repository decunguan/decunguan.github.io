<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Matriculas Vehículos - PARTE II</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
	th, td {
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 30px;
  padding-right: 30px;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg  bg-dark text-white">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand text-white" href="#">VEHICULOS</a>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link text-white" href="../index.html">Home <span class="sr-only"></span></a>
            </li>
          </ul>

        </div>
      </nav>
	<?php
	    include_once("constantes.php");
		require_once("class/class.vehiculo.php");
		
		$cn = conectar();
		$v = new vehiculo($cn);
		//vehiculo::MetodoEstatico();
		
		
//2.1 URL para la petición GET
//$URL = "http://localhost:8088/Vehiculo_CRUD/Vehiculo_PARTE_II/index.php?d=act/0";	
//$URL = "http://localhost:8088/Vehiculo_CRUD/Vehiculo_PARTE_II/index.php?d=act/5";	

//$URL = "http://localhost:8088/Vehiculo_CRUD/Vehiculo_PARTE_II/index.php?d=det/0";	
//$URL = "http://localhost:8088/Vehiculo_CRUD/Vehiculo_PARTE_II/index.php?d=det/5";		
		
    // Codigo necesario para realizar pruebas.
		if(isset($_GET['d'])){
		  
		/*echo "<br>PETICION GET <br>";
			echo "<pre>";
				print_r($_GET);
			echo "</pre>";*/
		
		  
			// 2.1 PETICION GET
			// $dato = $_GET['d'];
			
			// 2.2 DETALLE id
			$dato = base64_decode($_GET['d']);
			$tmp = explode("/", $dato);
			
			/*
			echo "<br>VARIABLE TEMP <br>";
			echo "<pre>";
				print_r($tmp);
			echo "</pre>";
				*/	
			
			$op = $tmp[0];
			$id = $tmp[1];
			
			if($op == "det"){
				echo $v->get_detail_vehiculo($id);
			}elseif($op == "act"){
				echo $v->get_form($id);
			}elseif($op == "new"){
				echo $v->get_form();
			}elseif($op == "del"){
				echo $v->delete_vehiculo($id); 
			}
		
	
		//NUEVO CODIGO - PARTE III
		
		}else{
			  /* 
				echo "<br>PETICION POST F <br>";
				echo "<pre>";
					print_r($_POST);
				echo "</pre>";
		      */
		if(isset($_POST['Guardar']) && $_POST['op']=="new"){
				$v->save_vehiculo($_POST);
			}
			if(isset($_POST['Guardar']) && $_POST['op']=="act"){
				$v->update_vehiculo($_POST);
			}else{
				echo $v->get_list($_POST);
			}	
		}
				

		
//*******************************************************
		function conectar(){
			//echo "<br> CONEXION A LA BASE DE DATOS<br>";
			$c = new mysqli(SERVER,USER,PASS,BD);
			
			if($c->connect_errno) {
				die("Error de conexión: " . $c->mysqli_connect_errno() . ", " . $c->connect_error());
			}
		/*	else{
				echo "La conexión tuvo éxito .......<br><br>";
			}  */
			
			$c->set_charset("utf8");
			return $c;
		}
//**********************************************************
		
		
	?>	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
