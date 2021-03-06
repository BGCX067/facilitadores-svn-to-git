<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Identificacion', 'doctrine');

/**
 * BaseIdentificacion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $nombre
 * @property string $apellido
 * @property string $cedula_pasaporte
 * @property string $nacionalidad
 * @property string $direccion
 * @property string $sector
 * @property string $situacion_laboral
 * @property boolean $formacion_politica
 * @property boolean $habilitado
 * @property integer $id_estado
 * @property integer $id_municipio
 * @property integer $id_parroquia
 * @property Estado $Estado
 * @property Municipio $Municipio
 * @property Parroquia $Parroquia
 * @property Doctrine_Collection $AreasFormacionFacilitador
 * @property Doctrine_Collection $DisponibilidadTrasladoEstado
 * @property Doctrine_Collection $Secciones
 * @property Doctrine_Collection $Ocupacion
 * @property Doctrine_Collection $DisponibilidadDias
 * @property Doctrine_Collection $Profesion
 * @property Doctrine_Collection $Correos
 * @property Doctrine_Collection $NivelFormacion
 * @property Doctrine_Collection $Telefonos
 * @property Doctrine_Collection $BitacoraSecciones
 * 
 * @method string              getNombre()                       Returns the current record's "nombre" value
 * @method string              getApellido()                     Returns the current record's "apellido" value
 * @method string              getCedulaPasaporte()              Returns the current record's "cedula_pasaporte" value
 * @method string              getNacionalidad()                 Returns the current record's "nacionalidad" value
 * @method string              getDireccion()                    Returns the current record's "direccion" value
 * @method string              getSector()                       Returns the current record's "sector" value
 * @method string              getSituacionLaboral()             Returns the current record's "situacion_laboral" value
 * @method boolean             getFormacionPolitica()            Returns the current record's "formacion_politica" value
 * @method boolean             getHabilitado()                   Returns the current record's "habilitado" value
 * @method integer             getIdEstado()                     Returns the current record's "id_estado" value
 * @method integer             getIdMunicipio()                  Returns the current record's "id_municipio" value
 * @method integer             getIdParroquia()                  Returns the current record's "id_parroquia" value
 * @method Estado              getEstado()                       Returns the current record's "Estado" value
 * @method Municipio           getMunicipio()                    Returns the current record's "Municipio" value
 * @method Parroquia           getParroquia()                    Returns the current record's "Parroquia" value
 * @method Doctrine_Collection getAreasFormacionFacilitador()    Returns the current record's "AreasFormacionFacilitador" collection
 * @method Doctrine_Collection getDisponibilidadTrasladoEstado() Returns the current record's "DisponibilidadTrasladoEstado" collection
 * @method Doctrine_Collection getSecciones()                    Returns the current record's "Secciones" collection
 * @method Doctrine_Collection getOcupacion()                    Returns the current record's "Ocupacion" collection
 * @method Doctrine_Collection getDisponibilidadDias()           Returns the current record's "DisponibilidadDias" collection
 * @method Doctrine_Collection getProfesion()                    Returns the current record's "Profesion" collection
 * @method Doctrine_Collection getCorreos()                      Returns the current record's "Correos" collection
 * @method Doctrine_Collection getNivelFormacion()               Returns the current record's "NivelFormacion" collection
 * @method Doctrine_Collection getTelefonos()                    Returns the current record's "Telefonos" collection
 * @method Doctrine_Collection getBitacoraSecciones()            Returns the current record's "BitacoraSecciones" collection
 * @method Identificacion      setNombre()                       Sets the current record's "nombre" value
 * @method Identificacion      setApellido()                     Sets the current record's "apellido" value
 * @method Identificacion      setCedulaPasaporte()              Sets the current record's "cedula_pasaporte" value
 * @method Identificacion      setNacionalidad()                 Sets the current record's "nacionalidad" value
 * @method Identificacion      setDireccion()                    Sets the current record's "direccion" value
 * @method Identificacion      setSector()                       Sets the current record's "sector" value
 * @method Identificacion      setSituacionLaboral()             Sets the current record's "situacion_laboral" value
 * @method Identificacion      setFormacionPolitica()            Sets the current record's "formacion_politica" value
 * @method Identificacion      setHabilitado()                   Sets the current record's "habilitado" value
 * @method Identificacion      setIdEstado()                     Sets the current record's "id_estado" value
 * @method Identificacion      setIdMunicipio()                  Sets the current record's "id_municipio" value
 * @method Identificacion      setIdParroquia()                  Sets the current record's "id_parroquia" value
 * @method Identificacion      setEstado()                       Sets the current record's "Estado" value
 * @method Identificacion      setMunicipio()                    Sets the current record's "Municipio" value
 * @method Identificacion      setParroquia()                    Sets the current record's "Parroquia" value
 * @method Identificacion      setAreasFormacionFacilitador()    Sets the current record's "AreasFormacionFacilitador" collection
 * @method Identificacion      setDisponibilidadTrasladoEstado() Sets the current record's "DisponibilidadTrasladoEstado" collection
 * @method Identificacion      setSecciones()                    Sets the current record's "Secciones" collection
 * @method Identificacion      setOcupacion()                    Sets the current record's "Ocupacion" collection
 * @method Identificacion      setDisponibilidadDias()           Sets the current record's "DisponibilidadDias" collection
 * @method Identificacion      setProfesion()                    Sets the current record's "Profesion" collection
 * @method Identificacion      setCorreos()                      Sets the current record's "Correos" collection
 * @method Identificacion      setNivelFormacion()               Sets the current record's "NivelFormacion" collection
 * @method Identificacion      setTelefonos()                    Sets the current record's "Telefonos" collection
 * @method Identificacion      setBitacoraSecciones()            Sets the current record's "BitacoraSecciones" collection
 * 
 * @package    facilitadores
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseIdentificacion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('identificacion');
        $this->hasColumn('nombre', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 50,
             ));
        $this->hasColumn('apellido', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 50,
             ));
        $this->hasColumn('cedula_pasaporte', 'string', 8, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 8,
             ));
        $this->hasColumn('nacionalidad', 'string', 20, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 20,
             ));
        $this->hasColumn('direccion', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('sector', 'string', 100, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 100,
             ));
        $this->hasColumn('situacion_laboral', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 50,
             ));
        $this->hasColumn('formacion_politica', 'boolean', 1, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             'length' => 1,
             ));
        $this->hasColumn('habilitado', 'boolean', 1, array(
             'type' => 'boolean',
             'default' => true,
             'length' => 1,
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

        $this->hasMany('AreasFormacionFacilitador', array(
             'local' => 'id',
             'foreign' => 'id_identificacion'));

        $this->hasMany('DisponibilidadTrasladoEstado', array(
             'local' => 'id',
             'foreign' => 'id_identificacion'));

        $this->hasMany('Secciones', array(
             'local' => 'id',
             'foreign' => 'id_identificacion'));

        $this->hasMany('Ocupacion', array(
             'local' => 'id',
             'foreign' => 'id_identificacion'));

        $this->hasMany('DisponibilidadDias', array(
             'local' => 'id',
             'foreign' => 'id_identificacion'));

        $this->hasMany('Profesion', array(
             'local' => 'id',
             'foreign' => 'id_identificacion'));

        $this->hasMany('Correos', array(
             'local' => 'id',
             'foreign' => 'id_identificacion'));

        $this->hasMany('NivelFormacion', array(
             'local' => 'id',
             'foreign' => 'id_identificacion'));

        $this->hasMany('Telefonos', array(
             'local' => 'id',
             'foreign' => 'id_identificacion'));

        $this->hasMany('BitacoraSecciones', array(
             'local' => 'id',
             'foreign' => 'id_identificacion'));
    }
}