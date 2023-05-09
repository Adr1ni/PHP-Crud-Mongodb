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

    public function promocionesDelClienteConJoin($id){
        try{
            $conexion = parent::connection();
            $coleccion = $conexion->promociones;
    
            $datos = $coleccion->aggregate(array(
                array(
                    '$lookup' => array(
                        'from' => 'personas',
                        'localField' => '_id_cli',
                        'foreignField' => '_id',
                        'as' => 'per'
                    )
                ),
                array(
                    '$unwind' => '$per'
                ),
                array(
                    '$project' => array(
                        '_id' => 1,
                        'per.nombre' => 1,
                        'per.paterno' => 1,
                        'promocion' => 1,
                        'vencimiento' => 1,
                        'per.numero' => 1
                    )
                ),
                array(
                    '$match' => array(
                        '_id' => new MongoDB\BSON\ObjectId($id),
                    )
                )
            ));
            return $datos;
    
        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }
    
}