<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Estado', 'doctrine');

/**
 * BaseEstado
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $nombre_estado
 * @property Doctrine_Collection $Identificacion
 * @property Doctrine_Collection $DisponibilidadTrasladoEstado
 * @property Doctrine_Collection $Ente
 * @property Doctrine_Collection $Municipio
 * 
 * @method string              getNombreEstado()                 Returns the current record's "nombre_estado" value
 * @method Doctrine_Collection getIdentificacion()               Returns the current record's "Identificacion" collection
 * @method Doctrine_Collection getDisponibilidadTrasladoEstado() Returns the current record's "DisponibilidadTrasladoEstado" collection
 * @method Doctrine_Collection getEnte()                         Returns the current record's "Ente" collection
 * @method Doctrine_Collection getMunicipio()                    Returns the current record's "Municipio" collection
 * @method Estado              setNombreEstado()                 Sets the current record's "nombre_estado" value
 * @method Estado              setIdentificacion()               Sets the current record's "Identificacion" collection
 * @method Estado              setDisponibilidadTrasladoEstado() Sets the current record's "DisponibilidadTrasladoEstado" collection
 * @method Estado              setEnte()                         Sets the current record's "Ente" collection
 * @method Estado              setMunicipio()                    Sets the current record's "Municipio" collection
 * 
 * @package    facilitadores
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEstado extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('estado');
        $this->hasColumn('nombre_estado', 'string', 25, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Identificacion', array(
             'local' => 'id',
             'foreign' => 'id_estado'));

        $this->hasMany('DisponibilidadTrasladoEstado', array(
             'local' => 'id',
             'foreign' => 'id_estado'));

        $this->hasMany('Ente', array(
             'local' => 'id',
             'foreign' => 'id_estado'));

        $this->hasMany('Municipio', array(
             'local' => 'id',
             'foreign' => 'id_estado'));
    }
}