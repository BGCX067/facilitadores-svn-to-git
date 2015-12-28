<?php

/**
 * Identificacion form base class.
 *
 * @method Identificacion getObject() Returns the current form's model object
 *
 * @package    facilitadores
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseIdentificacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'nombre'             => new sfWidgetFormInputText(),
      'apellido'           => new sfWidgetFormInputText(),
      'cedula_pasaporte'   => new sfWidgetFormInputText(),
      'nacionalidad'       => new sfWidgetFormInputText(),
      'direccion'          => new sfWidgetFormInputText(),
      'sector'             => new sfWidgetFormInputText(),
      'situacion_laboral'  => new sfWidgetFormInputText(),
      'formacion_politica' => new sfWidgetFormInputCheckbox(),
      'habilitado'         => new sfWidgetFormInputCheckbox(),
      'id_estado'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'), 'add_empty' => false)),
      'id_municipio'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio'), 'add_empty' => false)),
      'id_parroquia'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parroquia'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'             => new sfValidatorString(array('max_length' => 50)),
      'apellido'           => new sfValidatorString(array('max_length' => 50)),
      'cedula_pasaporte'   => new sfValidatorString(array('max_length' => 8)),
      'nacionalidad'       => new sfValidatorString(array('max_length' => 20)),
      'direccion'          => new sfValidatorString(array('max_length' => 100)),
      'sector'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'situacion_laboral'  => new sfValidatorString(array('max_length' => 50)),
      'formacion_politica' => new sfValidatorBoolean(array('required' => false)),
      'habilitado'         => new sfValidatorBoolean(array('required' => false)),
      'id_estado'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'))),
      'id_municipio'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio'))),
      'id_parroquia'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Parroquia'))),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Identificacion', 'column' => array('cedula_pasaporte')))
    );

    $this->widgetSchema->setNameFormat('identificacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Identificacion';
  }

}
