<?php
	// Variables constantes
	define('nmax', 3);
	define('nmin', 2);
	// Variables inicializadas
	$x = 0;
	$y = 0;
	$Fxmax = 0;
	$Fxmin = 0;
	$VR = 0;
	$a = 0;
	$r = 0;
	$AR = 0; 
	$ER = 0;
	$p = 0;
	$VE = 0;
	// Variable obtenida del form
	$S = $_POST['simulaciones']; // Número de simulaciones
	// Validaciones
	$number_check = preg_match("/^[0-9]+$/", $S);
	if(!$number_check || $S == 0){
		echo '<script>alertify.alert("Error :(", "El campo debe ser un número positivo y mayor a 0");</script>';	
	}else{
		// Cálculos
		$Fxmax = CalcularDanF(nmax);
		for($i=0;$i<$S;$i++){
			$p = CalcularNumeroAleatorio(0,$Fxmax);
			$x = CalcularNumeroAleatorio(nmin, nmax);
			$y = CalcularDanF($x);
			if ($p < $y) {
                $a++;
            }
		}
        $r = $a/$S; // Resultado
        $VR = CalcularFdx(nmax) - CalcularFdx(nmin); // Valor real
        $AR = CalcularAreaRectangulo($Fxmax, (nmax - nmin)); // Área del rectángulo
        $VE = $r * $AR; // Valor estimado
        $ER = CalcularErrorRelativo($VE, $VR); // Error relativo
		// Se muestra el resultado
		echo '
			<br><hr><br>
			<div style="text-align: center;"><span style="font-size: 20px;"><strong>Resultados de la simulación</strong></span>
			</div>
			<div style="margin-top:10px;background-color: #ffffff;padding: 23px;border-radius: 15px; border: 0.3px solid #c7c7ca80;">
				<div class="row">
					<!-- <div class="col-md-12 imagen" style="text-align:center;">
						<img src="resources/img/4.svg" style="height:120px;width:120px;">
					</div> -->
					<div class="col-md-12 texto">
						<div style="margin:5px;">
							<span style="font-size:18px;">Resultado Matemático de la integral: <strong>'.$VR.' Unidades Cuadradas</strong></span><br>
							<span style="font-size:18px;">Resultado aproximado de la integral por el Método de Monte Carlo: <strong>'.$VE.' Unidades Cuadradas</strong></span><br>
							<span style="font-size:18px;">% Error entre valor real y el valor aproximado: <strong>'.$ER.'%</strong></span><br>
							<span style="font-size:18px;">% Puntos debajo de la curva: <strong>'.($r * 100).'%</strong></span><br>
						</div>
					</div>
				</div>
			</div>
		';
	}
	
// Funciones necesarias
    function CalcularNumeroAleatorio($min, $max) {
		$n = mt_rand($min, $max);
        return $n;
    }
	
    function CalcularFdx($n) {
        return ($n * $n * $n) + ($n * $n);

    }
	
    function CalcularAreaRectangulo($h, $l) {
        return $h * $l;
    }
	
    function CalcularDanF($n) {
        return ((3 * ($n * $n)) + (2 * $n));
    }
	
    function CalcularErrorRelativo($valorEstimado, $valorReal) {
        return abs((($valorEstimado - $valorReal) / $valorReal) * 100);
    }
?>