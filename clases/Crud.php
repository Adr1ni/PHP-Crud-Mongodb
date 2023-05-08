<?php

class Crud extends Connection{
    
    public function mostrarDatos(){
        try{
            $conexion = parent::connection();
            $coleccion = $conexion->personas;
            $datos = $coleccion->find();
            return $datos;
        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }

    public function obtenerDocumento($id){
        try{
            $conexion = parent::connection();
            $coleccion = $conexion->personas;
            $datos = $coleccion->findOne(
                array('_id' => new MongoDB\BSON\ObjectId($id))
            );
            return $datos;
        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }

    public function insertarDatos($datos){
        try{
            $conexion = parent::connection();
            $coleccion = $conexion->personas;
            $resultado = $coleccion->insertOne($datos);
            return $resultado;
        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }

    public function actualizar($id,$datos){
        try{
            $conexion = parent::connection();
            $coleccion = $conexion->personas;
            $resultado = $coleccion->updateOne(
                array('_id' => new MongoDB\BSON\ObjectId($id)),
                array('$set'=>$datos)
            );
            return $resultado;
        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }

    public function eliminar($id){
        try{
            $conexion = parent::connection();
            $coleccion = $conexion->personas;
            $resultado = $coleccion->deleteOne(
                array('_id' => new MongoDB\BSON\ObjectId($id))
            );
            return $resultado;
        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }

}