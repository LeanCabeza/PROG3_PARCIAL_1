<?php
include_once "AccesoDatos.php";

class Venta
{
    public function __construct() {

	}

    public function AltaVentaParametros()
	 {
		//iNSERT INTO ventas(idProducto,idUsuario,cantidad,fechaDeVenta) values(1001,101,2,"2020-07-19");
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 

				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO ventas(mailUsuario,numeroPedido,fecha,sabor,tipo,cantidad,foto)
																			   values(:mailUsuario,:numeroPedido,:fecha,:sabor,:tipo,:cantidad,:foto)");
				$consulta->bindValue(':mailUsuario',$this->mailUsuario, PDO::PARAM_STR);
				$consulta->bindValue(':numeroPedido', $this->numeroPedido, PDO::PARAM_INT);
				$consulta->bindValue(':fecha', $this->fecha, PDO::PARAM_STR);
				$consulta->bindValue(':sabor', $this->sabor, PDO::PARAM_STR);
				$consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
				$consulta->bindValue(':cantidad', $this->cantidad, PDO::PARAM_INT);
				$consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				
	}

    public static function TraerTodasVentas()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from ventas");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS,"Venta");		
	}

	public static function ImprimirVentas($array){
		foreach($array as $v)
		{
			echo "<ul>";
			foreach($v as $item){
				echo "<li>$item</li>";}
			echo "</ul>";
		}
	}

	public static function ExisteVentaId($numeroPedido){
		$array = Venta::TraerTodasVentas();
		$existe = false;
        foreach ($array as $p) {
            if ($p->numeroPedido == $numeroPedido)
            {
                $existe = true ;
                break;
            }
        }
        return $existe; 
	}

	/*
		a- la cantidad de pizzas vendidas
		b- el listado de ventas entre dos fechas ordenadopor sabor.
		c- el listado de ventas de un usuario ingresado
		d- el listado de ventas de un  sabor ingresado
	*/


	public static function CantidadVendidas(){
		$ArrayVentas = Venta::TraerTodasVentas();
			$cantidadVentas = 0 ; 
			 foreach ($ArrayVentas as $v){
				 $cantidadVentas = $cantidadVentas +  $v->cantidad; 
			 }
			return $cantidadVentas;
	}

	public static function ObtenerVentasEntreFechas($fechaInicial,$fechaFinal){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM ventas
		WHERE ventas.fecha >= '$fechaInicial' AND ventas.fecha <= '$fechaFinal'
		ORDER BY sabor ASC");
		$consulta->execute();			
		return $consulta->fetchAll(PDO::FETCH_CLASS,"venta");	
	}

	public static function ObtenerVentasPorUsuario ($mail){

		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM VENTAS
		WHERE mailUsuario = :mail");
        $consulta->bindValue(':mail',$mail, PDO::PARAM_STR);		
		$consulta->execute();			
		return $consulta->fetchAll(PDO::FETCH_OBJ);	
	}

	public static function ObtenerVentasPorSabor ($sabor){

		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM VENTAS
		WHERE sabor = :sabor");
        $consulta->bindValue(':sabor',$sabor, PDO::PARAM_STR);		
		$consulta->execute();			
		return $consulta->fetchAll(PDO::FETCH_OBJ);	
	}

	// número de pedido, el email del usuario, el sabor,tipo y cantidad, si existe se modifica
	public static function UpdateVenta ($numeroPedido,$mail,$sabor,$tipo,$cantidad){
	
		if ($numeroPedido != NULL && $mail != NULL && $sabor != NULL && $tipo !=NULL && $cantidad !=NULL)
		{
			if (Venta::ExisteVentaId($numeroPedido))
			{
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE ventas
				set mailUsuario = '$mail',
					sabor = '$sabor',
					tipo = '$tipo',
					cantidad = '$cantidad'
				WHERE numeroPedido = '$numeroPedido'");	
				$consulta->execute();			
				return true ;
			}else{
				return false;
			}
		}else{
			return false;
		}
		
	}
	
}