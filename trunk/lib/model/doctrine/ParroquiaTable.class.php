<!--
Document / Documento: ParroquiaTable.class

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Obtiene Parroquia.
2- Obtiene Parroquia Por Municipio.
-->
<?php

/**
 * ParroquiaTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ParroquiaTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ParroquiaTable
     */
//Función que Obtiene Parroquia.
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Parroquia');
    }
//Función que Obtiene Parroquia Por Municipio.

    public static function obtenerParroquiaPorMunicipio($idMunicipio)
    {
        $querystring = Doctrine_Core::getTable('Parroquia')->createQuery()->where('id_municipio=?',$idMunicipio)->orderBy('nombre_parroquia');

        return $querystring->execute();
    }
}