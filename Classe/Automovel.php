<?php

interface Veiculo {
	public function acelerar ($vel);
	public function freiar ($vel);
	public function trocarMarcha ($marcha);
}

class Automovel implements Veiculo {
	public function acelerar ($vel) {
		echo "O veículo acelerou até " . $vel . "km/h";
	}
	
	public function freiar ($vel) {
	echo "O veículo freiou até " . $vel . "km/h";
	}

	public function trocarMarcha ($marcha) {
		echo "O veículo engatou a marcha " . $marcha;
	}

	public function poli () {
		return "Óooo o polimorfismo aiii";
	}
} // implements é o mesmo que extends mas para de interface

?>