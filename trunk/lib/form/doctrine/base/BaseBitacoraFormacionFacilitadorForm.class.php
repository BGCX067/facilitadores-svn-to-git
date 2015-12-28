<?php

/**
 * BitacoraFormacionFacilitador form base class.
 *
 * @method BitacoraFormacionFacilitador getObject() Returns the current form's model object
 *
 * @package    facilitadores
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBitacoraFormacionFacilitadorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                            => new sfWidgetFormInputHidden(),
      'id_area_formacion_facilitador' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AreasFormacionFacilitador'), 'add_empty' => false)),
      'fecha'                         => new sfWidgetFormDate(),
      'estatus'                       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_area_formacion_facilitador' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AreasFormacionFacilitador'))),
      'fecha'                         => new sfValidatorDate(),
      'estatus'                       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bitacora_formacion_facilitador[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BitacoraFormacionFacilitador';
  }

}
