<?php
include "entidades/Venta.php";

if (isset($_POST['numeroPedido'])&&isset($_POST['mail'])&&isset($_POST['sabor'])&&isset($_POST['tipo'])&&isset($_POST['cantidad']))
{
    $auxNroPedido = $_POST['numeroPedido'] ; 
    $auxMail = $_POST['mail'];
    $auxSabor = $_POST['sabor'];
    $auxTipo = $_POST['tipo'];
    $auxCantidad = $_POST['cantidad'];

    if (Venta::UpdateVenta($auxNroPedido,$auxMail,$auxSabor,$auxTipo,$auxCantidad)==TRUE){
         print("Venta Actualizada <br>");
    }else{
        print("Faltan ingresar Datos o no existe ese nro Pedido.<br>");
    }
   
}