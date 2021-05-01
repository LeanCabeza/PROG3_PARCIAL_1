<?php

include "entidades/Venta.php";
include "entidades/Pizza.php";

$Punto = $_GET['punto'];

if (isset($Punto)){

    switch ($Punto) {
        case 'a': case 'A':
            echo Venta::CantidadVendidas();
            break;
        case 'b': case 'B':
            $arrayVentas = Venta::ObtenerVentasEntreFechas('2020-01-01','2021-09-09');
            Venta ::ImprimirVentas($arrayVentas);
            break;
        case 'c': case 'C':
            $arrayAux= Venta::ObtenerVentasPorUsuario("VendedorRandom@gmail.com");
            Venta::ImprimirVentas($arrayAux);
            break;
        case 'd': case 'D':
            $aux= Venta::ObtenerVentasPorSabor("Napolitana");
            Venta::ImprimirVentas($aux);
            break;
        default:
            echo "ERROR, solo opciones de la 'A-D'.";
            break;
    }

}else{
    echo "Error,datos incompletos.";
}