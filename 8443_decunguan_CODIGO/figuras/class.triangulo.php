<?php
class triangulo extends figura implements formulas{

	private $lado_1;
    private $lado_2;
    private $lado_3;

    function __construct($lado_1,$lado_2,$lado_3){
		
		$this->lado_1 = $lado_1;
        $this->lado_2 = $lado_2;
        $this->lado_3 = $lado_3;
		$this->tipo = 'triangulo';
		$this->area = $this->area();
		$this->perimetro = $this->perimetro();
	}
	public function area(){
        $s=$this->perimetro()/2;

        $ar=sqrt($s*($s-$this->lado_1)*($s-$this->lado_2)*($s-$this->lado_3));
        return $ar;
    }
	public function perimetro(){
        $per= $this->lado_1+$this->lado_2+$this->lado_3;
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

