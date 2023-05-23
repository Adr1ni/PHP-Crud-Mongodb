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

    public function promocionesDelCliente($id){
        try{
            $conexion = parent::connection();
            $coleccion = $conexion->promociones;
            $datos = $coleccion->find(
                array('_id_cli' => new MongoDB\BSON\ObjectId($id)),
            );
            return $datos;
        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }

    public function obtenerPromocion($id){
        try{
            $conexion = parent::connection();
            $coleccion = $conexion->promociones;
            $datos = $coleccion->findOne(
                array('_id' => new MongoDB\BSON\ObjectId($id))
            );
            return $datos;
        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }
    
}