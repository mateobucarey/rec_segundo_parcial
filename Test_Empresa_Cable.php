<?php

include_once('Canal.php');
include_once('Cliente.php');
include_once('Contrato.php');
include_once('ContratoEmpresa.php');
include_once('ContratoWeb.php');
include_once('Plan.php');
include_once('EmpresaCable.php');


$empresaCable = new EmpresaCable([], [], [], []);

//$tipo, $importe, $esHD,$incluyeMG
$canal1 = new Canal('noticia', 100, 'si', 'si');
$canal2 = new Canal('deportivo', 0, 'si', 'si');
$canal3 = new Canal('musical', 50, 'no', 'no');


//($codigo, $colCanales, $importe
$plan1 = new Plan(888, [$canal1, $canal2], 'si');
$plan2 = new Plan(111, [$canal1, $canal2, $canal3], 'si');

//$denominacion, $cuit, $direccion
$cliente = new Cliente('mateo', 2044778760, 'neuquen');

//$fechaInicio, $fechaVencimiento, $objPlan, $estado, $costo, $seRennueva, $objCliente
$contratoEmpresa = new ContratoEmpresa('2022-03-13', '2022-04-12', $plan1, 'al dia', 200, true, $cliente);
$contratoWeb1 = new ContratoWeb('2012-03-13', '2012-04-12', $plan1, 'moroso', 500, true, $cliente);
$contratoWeb2 = new ContratoWeb('2021-03-13', '2021-04-12', $plan2, 'al dia', 1000, true, $cliente);

echo $contratoEmpresa->calcularImporte();
echo $contratoWeb1->calcularImporte();
echo $contratoWeb2->calcularImporte();

echo $empresaCable->incorporarPlan($plan2);

echo $empresaCable->incorporarPlan($plan2);

echo $empresaCable->incorporarContrato($plan1, $cliente, '2024-06-12', '2024-07-12', false);

echo $empresaCable->incorporarContrato($plan2, $cliente, '2024-06-12', '2024-07-12', true);

echo $empresaCable->pagarContrato($contratoEmpresa);

echo $empresaCable->pagarContrato($contratoWeb1);

echo  $empresaCable->retornarImporteContratos (111);

