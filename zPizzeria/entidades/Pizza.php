<?php

class Pizza{

    public $id ;
    public $sabor ;
    public $precio;
    public $tipo ;
    public $cantidad ;

    public function __construct($id,$sabor,$precio,$tipo,$cantidad)
	{
		if($id !== NULL && $sabor !== NULL&& $precio !== NULL  && $tipo !==NULL && $cantidad !==NULL){
            $this->id = $id;
            $this->sabor = $sabor;
			$this->precio = $precio;
            $this->tipo = $tipo;  
            $this->cantidad = $cantidad;
		}
	}

    public static function ObtenerPizzasJSON(){
        $array = array();
            $nombreArchivo = 'Pizza.json';
            $archivo = fopen($nombreArchivo, 'a+');
            while(!feof($archivo)){
                $linea = fgets($archivo);
                if($linea !== false){
                    $pizzaJson = json_decode($linea, true);
                    $pizzaJson = new Pizza($pizzaJson["id"],$pizzaJson["sabor"], $pizzaJson["precio"], $pizzaJson["tipo"], $pizzaJson["cantidad"]);
                    array_push($array, $pizzaJson);
                }
            }
            fclose($archivo);
        return $array;
    }


    public static function GuardarPizza( $pizza){

        $retorno = "Error.";
           if($pizza->id !== null && $pizza->sabor !== null && $pizza->tipo !== null && $pizza->precio !== null && $pizza->cantidad !== null)
           {
                $existe = Pizza::VerificarExistente($pizza);
                if($existe){
                    //si existe, actualizo el stock
                    Pizza::ActualizarStock($pizza->sabor, $pizza->tipo,$pizza->cantidad,'+');
                    $retorno =  "Stock Actualizado";
                }else{
                    //si no existe, agrego al archivo
                    Pizza::GuardarUnaPizzaJson($pizza);;
                    $retorno = "Ingresado al Json";
            }
            }else{
                $return = "Error Faltan datos del objeto";
            }
            return $retorno;
        }

    public static function VerificarExistente(Pizza $pizza){
        $existe = false;
        $array = Pizza::ObtenerPizzasJSON();
        foreach ($array as $p) {
            if ($pizza->sabor == $p->sabor && $pizza->tipo == $p->tipo)
            {
                $existe = true ;
                break;
            }
        }
        return $existe; 
    }

    public static function VerificarExistenteST($sabor,$tipo){
        $msje = "";
        $existeSabor = false;
        $existeTipo = false;

        $array = Pizza::ObtenerPizzasJSON();
        foreach ($array as $p) {
            if ($p->sabor == $sabor)
            {
                $existeSabor = true ;
            }
            if ($p->tipo == $tipo){
                $existeTipo = true ;
            }
        }
        if($existeSabor == true && $existeTipo == true)
        {
            $msje = "Si Hay.";
        }else if ($existeSabor == true && $existeTipo == false){
            $msje = "No hay de ese TIPO";
        }else if ($existeSabor == false && $existeTipo == true){
            $msje = "No hay de ese SABOR.";
        }else{
            $msje = "No hay.";
        }
        return $msje; 
    }

    public static function HayStock($sabor,$tipo,$cantidad){
        $array = Pizza::ObtenerPizzasJSON();
        $stock = false ;
        foreach ($array as $p) {
            if($p->sabor == $sabor && $p->tipo == $tipo && $p->cantidad >= $cantidad ){
                $stock = true ;
                break;
            }
        }
        return $stock;
    }

    public static function ActualizarStock($sabor,$tipo,$stock,$operacion){
        $array = Pizza::ObtenerPizzasJSON();
        $retorno = false ;
        if ($operacion == '+'){
            foreach ($array as $p) {
                if($p->sabor == $sabor && $p->tipo == $tipo ){
                    $p->cantidad = $p->cantidad + $stock;
                    $retorno = true ;
                    break;
                }
            }
            return Pizza::GuardarPizzasJson($array);
        }else if ($operacion == '-'){
            foreach ($array as $p) {
                if($p->sabor == $sabor && $p->tipo == $tipo ){
                    $p->cantidad = $p->cantidad - $stock;
                    $returno = true ;
                    break;
                }
            }
            return Pizza::GuardarPizzasJson($array);
        }else{
            return $retorno;
        }
        
    }

    public static function GuardarUnaPizzaJson(Pizza $pizza){
        $nombreArchivo = 'Pizza.json';
        $stringProducto = json_encode($pizza);
        $archivo = fopen($nombreArchivo, 'a');
        $exito = fwrite($archivo, $stringProducto.PHP_EOL);
        fclose($archivo);
        return $exito;
    }

    public static function GuardarPizzasJson($array){
        $nombreArchivo = 'Pizza.json';
        $archivo = fopen($nombreArchivo, 'w');
        foreach ($array as $p) {
            $registro = json_encode($p);
            fwrite($archivo, $registro.PHP_EOL);
        }
        $exito = fclose($archivo);
        return $exito;
    }

    /*
    private function GuardarProductosCsv($arrayProductos){
            $nombreArchivo = 'Productos.csv';
            $archivo = fopen($nombreArchivo, 'w');
            foreach ($arrayProductos as $key => $value) {
                $registroNuevo = $value->toString() . '\n';
                fwrite($archivo, $registroNuevo);
            }
            $exito = fclose($archivo);
            return $exito;
        }
        
    private function GuardarProductoCsv(Producto $producto){
            $nombreArchivo = 'Productos.csv';
            $archivo = fopen($nombreArchivo, 'a+');
            $registroNuevo = $producto->toString() . '\n';
            $exito = fwrite($archivo, $registroNuevo);
            fclose($archivo);
            return $exito;
        }

        
    public function ObtenerPizzasCSV(){
        $array = array();
                $nombreArchivo = 'Productos.csv';
                $archivo = fopen($nombreArchivo, 'a+');
                while (!feof($archivo)) {
                    $linea = fgetcsv($archivo,1000 ,',','"','\n');
                    $producto = new Producto($linea[0], $linea[1], $linea[2], $linea[3],$linea[4],$linea[5]);
                    array_push($productosArray,$producto);
                }
                fclose($archivo);
        return $array;
    }*/
        
}
