<?php

class PromocionesCrud extends Connection{
    public function agregarPromociones($datos){
        try{
            $conexion = parent::connection();
            $coleccion = $conexion->promociones;
            $resultado = $coleccion->insertOne($datos);
            return $resultado;
        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }

    public function promocionesDelCliente($dni){
        try{
            $conexion = parent::connection();
            $coleccion = $conexion->promociones;
            $datos = $coleccion->find(
                array('dni_cli' => $dni),
            );
            return $datos;
        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }
}