<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('BitacoraFormacionFacilitador', 'doctrine');

/**
 * BaseBitacoraFormacionFacilitador
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_area_formacion_facilitador
 * @property date $fecha
 * @property integer $estatus
 * @property AreasFormacionFacilitador $AreasFormacionFacilitador
 * 
 * @method integer                      getIdAreaFormacionFacilitador()    Returns the current record's "id_area_formacion_facilitador" value
 * @method date                         getFecha()                         Returns the current record's "fecha" value
 * @method integer                      getEstatus()                       Returns the current record's "estatus" value
 * @method AreasFormacionFacilitador    getAreasFormacionFacilitador()     Returns the current record's "AreasFormacionFacilitador" value
 * @method BitacoraFormacionFacilitador setIdAreaFormacionFacilitador()    Sets the current record's "id_area_formacion_facilitador" value
 * @method BitacoraFormacionFacilitador setFecha()                         Sets the current record's "fecha" value
 * @method BitacoraFormacionFacilitador setEstatus()                       Sets the current record's "estatus" value
 * @method BitacoraFormacionFacilitador setAreasFormacionFacilitador()     Sets the current record's "AreasFormacionFacilitador" value
 * 
 * @package    facilitadores
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBitacoraFormacionFacilitador extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('bitacora_formacion_facilitador');
        $this->hasColumn('id_area_formacion_facilitador', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('fecha', 'date', 25, array(
             'type' => 'date',
             'notnull' => true,
             'length' => 25,
             ));
        $this->hasColumn('estatus', 'integer', 1, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('AreasFormacionFacilitador', array(
             'local' => 'id_area_formacion_facilitador',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}