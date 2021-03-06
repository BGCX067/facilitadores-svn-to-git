<?php

/**
 * Parroquia form base class.
 *
 * @method Parroquia getObject() Returns the current form's model object
 *
 * @package    facilitadores
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseParroquiaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'nombre_parroquia' => new sfWidgetFormInputText(),
      'id_municipio'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre_parroquia' => new sfValidatorString(array('max_length' => 50)),
      'id_municipio'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio'))),
    ));

    $this->widgetSchema->setNameFormat('parroquia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Parroquia';
  }

}
