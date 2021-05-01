<?php

require_once "entidades/Pizza.php";


$id = rand(1,1000);
$sabor = $_GET["sabor"];
$precio= $_GET["precio"];
$tipo = $_GET["tipo"];
$cantidad = $_GET["cantidad"];

if (isset($_GET["sabor"]) && isset($_GET["precio"]) && isset($_GET["tipo"]) && isset($_GET["cantidad"])  )
{
    if ($tipo == "molde"|| $tipo == "piedra"){
        $pizza = new Pizza($id,$sabor, $precio, $tipo, $cantidad);
        echo Pizza::GuardarPizza($pizza);
    }else{
        echo "El tipo solo puede ser 'molde' o 'piedra'";
    }

}else{
    echo "Faltan datos";
}
