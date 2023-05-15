<?php
class marca{ 
	private $id;
	private $descripcion;
	private $pais;
	private $foto;
	private $direccion;
	private $con;
	
	function __construct($cn){
		$this->con = $cn;
		//echo "EJECUTANDOSE EL CONSTRUCTOR Marcas<br><br>";
	}
		

	public function get_form($id=NULL){
		// Código agregado -- //
	if(($id == NULL) || ($id == 0) ) {
			$this->descripcion = NULL;
			$this->pais = NULL;
			$this->foto = NULL;
			$this->direccion = NULL;
			
			$flag = 'enabled';
			$op = "new";
			$bandera = 1;
	}else{
			$sql = "SELECT * FROM marca WHERE id=$id;";
			$res = $this->con->query($sql);
			$row = $res->fetch_assoc();
            $num = $res->num_rows;
            $bandera = ($num==0) ? 0 : 1;
            
            if(!($bandera)){
                $mensaje = "tratar de actualizar marca con id= ".$id . "<br>";
                echo $this->_message_error($mensaje);
				
            }else{                
                
				
				/*echo "<br>REGISTRO A MODIFICAR: <br>";
					echo "<pre>";
						print_r($row);
					echo "</pre>";
				*/
		
             // ATRIBUTOS DE LA CLASE VEHICULO   
                $this->descripcion = $row['descripcion'];
                $this->pais = $row['pais'];
                $this->foto = $row['foto'];
                $this->direccion = $row['direccion'];

				
                //$flag = "disabled";
				$flag = "enabled";
                $op = "act"; 
            }
	}
        
	if($bandera){

		$html = '
		<section>
		<div class="banner">
        <div class="container p-5">
          <div class="card mx-3 mt-n5 shadow-lg">

		

		<div class="card-body ">

		<form class=" " name="Form_marca" method="POST" action="index.php" enctype="multipart/form-data" >
		<input type="hidden" name="id" value="' . $id  . '">
		<input type="hidden" name="op" value="' . $op  . '">
			<table  align="center"table table-striped gap-3 >
				<tr>
					<th colspan="2" ><center><strong><FONT SIZE=7>DATOS Marca</font></center></th>
				</tr>
				<tr class="mx-auto">
					<td><strong><FONT SIZE=5>Descripcion:</font></strong></td>
					
					<td><input for="floatingTextInput1" class="col-12" type="text" name="descripcion" value="' . $this->descripcion . '"></td>
				</tr>

				<tr class="mx-auto">
					<td><strong><FONT SIZE=5>Pais:</font></strong></td>
					<td><input type="text"  for="floatingTextInput1"  class="col-12" name="pais" value="' . $this->pais . '"></td>
				</tr>	

				<tr class="mx-auto">
					<td><strong><FONT SIZE=5>Foto:</font></strong></td>
					<td><input type="file" name="foto" class="col-12"' . $flag . '></td>
				</tr>
				
				<tr class="mx-auto">
					<td><strong><FONT SIZE=5>Direccion:</font></strong></td>
					
					<td><input for="floatingTextInput1" class="col-12" type="text" name="direccion" value="' . $this->direccion . '"></td>
				</tr>

				<tr class="mx-auto">
					<th colspan="2"><input type="submit" name="Guardar" value="GUARDAR"  class="btn btn-primary col-12 "></th>
				</tr>
				<tr class="mx-auto">
					<th colspan="2"><input type="button" name="Cancelar" value="CANCELAR"  class="btn btn-danger col-12 "  href="index.php?d></th>
				</tr>
			</table>
			</div>

			</div></div></div>

			<section>
			';
		return $html;
		}
	}

	public function get_list(){
		$d_new = "new/0";                           //Línea agregada
        $d_new_final = base64_encode($d_new);       //Línea agregada
		$html = '
		<div class="container-striped container p-5 " >
		<div class="row  justify-content-center">
			<div class=" text-center ">
		<table class="table" align="center" style="text-align:center;" >
			<tr>
				<th colspan="8" class="text-light bg-dark">Lista de Marcas</th>
			</tr>
			<tr>
			<th colspan="8" ><center><a class="btn btn-success col-sm-6 " href="index.php?d=' . $d_new_final . '" >Nuevo</a></center></th>
		</tr>
			<tr  class="table-active thead-dark">
				<th>Descripcion</th>
				<th>Pais</th>
				<th>Foto</th>
				<th>Direccion</th>
				<th colspan="3">Acciones</th>
			</tr>
			</div>
			</div>
			</div>
			';

		$sql = "SELECT m.id, m.descripcion, m.pais, m.foto, m.direccion 
		FROM marca m;";	
		$res = $this->con->query($sql);

		
		// VERIFICA si existe TUPLAS EN EJECUCION DEL Query
		$num = $res->num_rows;
        if($num != 0){
		
		    while($row = $res->fetch_assoc()){
			/*
				echo "<br>VARIALE ROW ...... <br>";
				echo "<pre>";
						print_r($row);
				echo "</pre>";
			*/
		    		
				// URL PARA BORRAR
				$d_del = "del/" . $row['id'];
				$d_del_final = base64_encode($d_del);
				
				// URL PARA ACTUALIZAR
				$d_act = "act/" . $row['id'];
				$d_act_final = base64_encode($d_act);
				
				// URL PARA EL DETALLE
				$d_det = "det/" . $row['id'];
				$d_det_final = base64_encode($d_det);	
				
				$html .= '
				<tbody>

					<tr>
						<td>' . $row['descripcion'] . '</td>
						<td>' . $row['pais'] . '</td>
						<td>' . $row['foto'] . '</td>
						<td>' . $row['direccion'] . '</td>
						<td><a class="btn btn-danger btn-responsive " href="index.php?d=' . $d_del_final . '">Borrar</a></td>
						<td><a  class="btn btn-warning btn-responsive" href="index.php?d=' . $d_act_final . '">Actualizar</a></td>
						<td><a  class="btn btn-info btn-responsive" href="index.php?d=' . $d_det_final . '">Detalle</a></td>
					</tr>
					</tbody>
					';
			 
		    }
		}else{
			$mensaje = "Tabla Marcas" . "<br>";
            echo $this->_message_BD_Vacia($mensaje);
			echo "<br><br><br>";
		}
		$html .= '</table>';
		return $html;
		
	}
	






    public function get_detail_marca($id){

		$sql = "SELECT m.id, m.descripcion, m.pais, m.foto, m.direccion  
			FROM marca m
			WHERE m.id=$id ";	
		$res = $this->con->query($sql);
		$row = $res->fetch_assoc();
   
        // VERIFICA SI EXISTE id
        $num = $res->num_rows;
       
    if($num == 0){
        $mensaje = "desplegar el detalle de marcas con id= ".$id . "<br>";
        echo $this->_message_error($mensaje);
               
    }else{
		/*
        echo "<br>Datos de la Marca<br>";
        echo "<pre>";
                print_r($row);
        echo "</pre>";
   */
        $html = '

		<section>
		<div class="banner">
        <div class="container p-5">
          <div class="card mx-3 mt-n5 shadow-lg">
		  <div class="card-body ">
		  <table align="center"table table-striped gap-3 >
            <tr>
                <th colspan="2"><strong><FONT SIZE=7>DATOS DE MARCA</font></th>
            </tr>
			<tr>
			<td><strong><FONT SIZE=5>Id: </td>
			<td><center>'. $row['id'] .'</center></td>
		</tr>
            <tr>
                <td><strong><FONT SIZE=5>Descripcion: </td>
                <td><center>'. $row['descripcion'] .'</center></td>
            </tr>
            <tr>
                <td><strong><FONT SIZE=5>Pais: </td>
                <td><center>'. $row['pais'] .'</center></td>
            </tr>
            <tr>
                <td><strong><FONT SIZE=5>Foto: </td>
				<th colspan="2"><center><img src="images/' . $row['foto'] . '" width="100px"/></center></th>
            </tr>
			<tr>
			<td><strong><FONT SIZE=5>Direccion: </td>
			<td><center>'. $row['direccion'] .'</center></td>
		</tr>
            <tr>
                <th colspan="2"><a class="btn btn-primary col-12 " href="index.php">Regresar</a></th>
            </tr>                                                                                        
        </table>';
       
        return $html;
    }

    }    
	


	public function delete_marca($id){
		
		/*		$mensaje = "PROXIMAMENTE SE ELIMINARA el vehiculo con id= ".$id . "<br>";
				echo $this->_message_error($mensaje);*/
				
			   
				$sql = "DELETE FROM marca WHERE id=$id;";
				if($this->con->query($sql)){
					echo $this->_message_ok("eliminó");
				}else{
					echo $this->_message_error("eliminar<br>");
				}
				   
			}

			public function update_marca($datos){
				$this->id = $datos['id'];
				$this->descripcion = $datos['descripcion'];
				$this->pais = $datos['pais'];
				$this->direccion = $datos['direccion'];
				/*echo "<br>FILES<br>";
				echo "<pre>";
						print_r($_FILES);
				echo "</pre>";
				*/
				$path = "images/" . $this->foto;
				$this->foto = $_FILES['foto']['name'];


				$sql = "UPDATE marca 
						SET descripcion='$this->descripcion',
								pais='$this->pais',
								foto='$this->foto',
								direccion='$this->direccion'
						WHERE id=$this->id;";
				if($this->con->query($sql)){
					echo $this->_message_ok("actualizó");
				}else{
					echo $this->_message_error("actualizar<br>");
				}
			}

			public function save_marca($datos){
				$this->descripcion = $datos['descripcion'];
				$this->pais = $datos['pais'];
				$this->direccion = $datos['direccion'];
				$path = "images/" . $this->foto;
				$this->foto = $_FILES['foto']['name'];

				//INSERT INTO `marca`(`id`, `descripcion`, `pais`, `foto`, `direccion`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
				$sql = "INSERT INTO marca (descripcion, pais, foto, direccion) 
						VALUES ('$this->descripcion', '$this->pais','$this->foto', '$this->direccion');";




				if($this->con->query($sql)){
					echo $this->_message_ok("grabo");
				}else{
					echo $this->_message_error("grabar<br>");
				}
			}
		


//*****************************  CERRAR LA CONEXION A LA BASE DE DATOS ***************************************************************************	   
 
 
 
//*************************************************************************************************        






	/*
     $this->_get_combo_db("marca","id","descripcion","marcaCMB") 
	 $tabla es la tabla de la base de datos
	 $valor es el nombre del campo que utilizaremos como valor del option
	 $etiqueta es nombre del campo que utilizaremos como etiqueta del option
	 $nombre es el nombre del campo tipo combo box (select)
	 */ 
    /*
	private function _get_combo_db($tabla,$valor,$etiqueta,$nombre){
		$html = '<select name="' . $nombre . '">';
		$sql = "SELECT $valor,$etiqueta FROM $tabla;";
		$res = $this->con->query($sql);
		while($row = $res->fetch_assoc()){
			//ImpResultQuery($row);
			$html .= '<option value="' . $row[$valor] . '">' . $row[$etiqueta] . '</option>' . "\n";
		}
		$html .= '</select>';
		return $html;
	}

	private function _get_combo_anio($nombre,$anio_inicial){
		$html = '<select name="' . $nombre . '">';
		$anio_actual = date('Y');
		for($i=$anio_inicial;$i<=$anio_actual;$i++){
			$html .= '<option value="' . $i . '">' . $i . '</option>' . "\n";
		}
		$html .= '</select>';
		return $html;
	}
	
    // $this->_get_radio($combustibles, "combustibleRBT")
	private function _get_radio($arreglo,$nombre){
		$html = '
		<table border=0 align="left">';
		foreach($arreglo as $i=>$etiqueta){
            $html .= '
			<tr>
				<td>' . $etiqueta . '</td>';
            $html .= ($i==2) ?  '<td><input type="radio" value="' . $etiqueta . '" name="' . $nombre . '" checked/></td>' : '<td><input type="radio" value="' . $etiqueta . '" name="' . $nombre . '"/></td>';
			$html .= '</tr>';
		}
		$html .= '
		</table>';
		return $html;
	}
	*/
	//***********************************************************************************************	

	

//******************************************************************************************
	private function _message_error($tipo){
        $html = '
		<table border="1" align="center">
			<tr>
				<th>Error al ' . $tipo . '. Favor contactar a ..............</th>
			</tr>
			<tr>
				<th><a href="index.php">Regresar</a></th>
			</tr>
		</table>';
		return $html;
	}
	

	private function _message_BD_Vacia($tipo){
		$html = '
		 <table border="0" align="center">
			 <tr>
				 <th> NO existen registros en la ' . $tipo . 'Favor contactar a .................... </th>
			 </tr>
	 
		 </table>';
		 return $html;
	 
	 
	 }
	
	private function _message_ok($tipo){
		$html = '
		<table border="0" align="center">
			<tr>
				<th>El registro se  ' . $tipo . ' correctamente</th>
			</tr>
			<tr>
				<th><a class="btn btn-success col-sm-12 "href="index.php">Regresar</a></th>
			</tr>
		</table>';
		return $html;
	}
//*******************************************************************************************************************


}


 

?>

