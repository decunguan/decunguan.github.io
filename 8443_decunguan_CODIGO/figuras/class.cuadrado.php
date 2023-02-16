<?php
class cuadrado extends figura implements formulas {
    private $lado_1;
    function __construct($lado_1){
		
		$this->lado_1 = $lado_1;
		$this->tipo = 'Cuadrado';
		$this->area = $this->area();
		$this->perimetro= $this->perimetro();
	}
	public function area(){

        $ar=$this->lado_1*$this->lado_1;
        return $ar;
    }
	public function perimetro(){
        $per=$this->lado_1*4;
        return $per;
    }
    public function GetArea(){
        return $this->area;
    }
	public function GetPerimetro(){
        return $this->perimetro;
    }
    public function GetTipo(){
        return $this->tipo;
    }

    

}
?>
