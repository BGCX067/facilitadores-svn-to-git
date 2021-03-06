<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Ente', 'doctrine');

/**
 * BaseEnte
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $nombre_ente
 * @property integer $id_estado
 * @property integer $id_municipio
 * @property integer $id_parroquia
 * @property Estado $Estado
 * @property Municipio $Municipio
 * @property Parroquia $Parroquia
 * @property Doctrine_Collection $Secciones
 * 
 * @method string              getNombreEnte()   Returns the current record's "nombre_ente" value
 * @method integer             getIdEstado()     Returns the current record's "id_estado" value
 * @method integer             getIdMunicipio()  Returns the current record's "id_municipio" value
 * @method integer             getIdParroquia()  Returns the current record's "id_parroquia" value
 * @method Estado              getEstado()       Returns the current record's "Estado" value
 * @method Municipio           getMunicipio()    Returns the current record's "Municipio" value
 * @method Parroquia           getParroquia()    Returns the current record's "Parroquia" value
 * @method Doctrine_Collection getSecciones()    Returns the current record's "Secciones" collection
 * @method Ente                setNombreEnte()   Sets the current record's "nombre_ente" value
 * @method Ente                setIdEstado()     Sets the current record's "id_estado" value
 * @method Ente                setIdMunicipio()  Sets the current record's "id_municipio" value
 * @method Ente                setIdParroquia()  Sets the current record's "id_parroquia" value
 * @method Ente                setEstado()       Sets the current record's "Estado" value
 * @method Ente                setMunicipio()    Sets the current record's "Municipio" value
 * @method Ente                setParroquia()    Sets the current record's "Parroquia" value
 * @method Ente                setSecciones()    Sets the current record's "Secciones" collection
 * 
 * @package    facilitadores
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEnte extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ente');
        $this->hasColumn('nombre_ente', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 50,
             ));
        $this->hasColumn('id_estado', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('id_municipio', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('id_parroquia', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Estado', array(
             'local' => 'id_estado',
             'foreign' => 'id'));

        $this->hasOne('Municipio', array(
             'local' => 'id_municipio',
             'foreign' => 'id'));

        $this->hasOne('Parroquia', array(
             'local' => 'id_parroquia',
             'foreign' => 'id'));

        $this->hasMany('Secciones', array(
             'local' => 'id',
             'foreign' => 'id_ente'));
    }
}