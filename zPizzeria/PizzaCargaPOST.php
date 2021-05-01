<?php

require_once "entidades/Pizza.php";


$id = rand(1,1000);
$sabor = $_POST["sabor"];
$precio= $_POST["precio"];
$tipo = $_POST["tipo"];
$cantidad = $_POST["cantidad"];

if (isset($_POST["sabor"]) && isset($_POST["precio"]) && isset($_POST["tipo"]) && isset($_POST["cantidad"])  )
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
