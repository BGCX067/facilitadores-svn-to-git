<?php

/**
 * BitacoraSecciones form base class.
 *
 * @method BitacoraSecciones getObject() Returns the current form's model object
 *
 * @package    facilitadores
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBitacoraSeccionesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'id_secciones'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Secciones'), 'add_empty' => false)),
      'id_identificacion' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Identificacion'), 'add_empty' => false)),
      'fecha'             => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_secciones'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Secciones'))),
      'id_identificacion' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Identificacion'))),
      'fecha'             => new sfValidatorDate(),
    ));

    $this->widgetSchema->setNameFormat('bitacora_secciones[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BitacoraSecciones';
  }

}
