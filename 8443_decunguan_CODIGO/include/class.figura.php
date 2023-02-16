<?php
	abstract class figura{
		private $tipo;
		private $area; 
		private $perimetro; 
		
		public static function get_form(){
			$html = '
			<head> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> </head>
			<center>
			<br>
			<div class="card border border-1 mt-4 col-sm-6">
				<h1>Aplicaciones de Tecnologías WEB</h1>
				<p><h2>Ejercicio Autonomo</h2></p>
				<h3> David Cunguan </h3>
				<h3> NRC 8443 </h3>
			</div>

			<div class="card text-center mt-4 col-sm-6" >
			<div class="card-header  bg-dark text-white ">
				<h4>INGRESO DATOS DE LA FIGURA</h4>
			</div>

			<div class="container-fluid">


				<div class="card-body" col-6 >
				<form name="figuras" id="formulario"  >
				<table  align="center">
					<tr>
						<th colspan="4"></th>
					</tr>
					<tr>
						<td class="form-label h5">Tipo: </td>
						<td>
							<select class="form-select  bg-dark text-white" id="select" name="tipo" OnChange="ingresoDatos()">
								<option value="sel">Seleccione...</option>
								<option value="cuadrado">Cuadrado</option>
								<option value="rectangulo">Rectángulo</option>
								<option value="triangulo">Triángulo</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="form-label p-4 h5">Lado 1:</td>
						<td><input type="number" class="form-control" id="lado_1" name="lado_1" size="4" required disabled min="1"></td>
					</tr>
					<tr>
						<td class="form-label p-4 h5">Lado 2:</td>
						<td><input type="number" class="form-control" id="lado_2" name="lado_2" size="4" required disabled min="1"></td>
					</tr>
					<tr>
						<td class="form-label p-4 h5">Lado 3:</td>
						<td><input type="number" class="form-control" id="lado_3" name="lado_3" size="4" required disabled min="1"></td>
					</tr>

				</table>
				</form>
				</div>
				</div>

				<div class="card-body"class="col-6 ">
				<img class="img-fluid rounded-3 border-dark"  src="./figuras.png" ></img>
				</div>

			</div>
			</center>
			<script src="./script/script.js"> </script>';
			
			return $html;
		}
		
		// METODOS ABSTRACTOS	
		public abstract function GetArea();
	    public abstract function GetPerimetro();
	    public abstract function GetTipo();
	}
?>
