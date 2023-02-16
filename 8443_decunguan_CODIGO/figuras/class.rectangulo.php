<?php
class rectangulo extends figura implements formulas{
	    private $lado_1;
    private $lado_2;
	
    function __construct($lado_1,$lado_2){
		
		$this->lado_1 = $lado_1;
        $this->lado_2 = $lado_2;
		$this->tipo = 'Rectangulo';
		$this->a = $this->area();
		$this->p = $this->perimetro();
	}
	public function area(){
        $ar= $this->lado_1*$this->lado_2;
        return $ar;
    }
	public function perimetro(){
        $per=$this->lado_1*2+$this->lado_2*2;
        return $per;
    }

    public function GetTipo(){
        return $this->tipo;
    }
    public function GetArea(){
        return $this->area;
    }
	public function GetPerimetro(){
        return $this->perimetro;
    }

}
?>
