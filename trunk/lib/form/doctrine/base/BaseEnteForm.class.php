<?php

/**
 * Ente form base class.
 *
 * @method Ente getObject() Returns the current form's model object
 *
 * @package    facilitadores
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEnteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'nombre_ente'  => new sfWidgetFormInputText(),
      'id_estado'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'), 'add_empty' => false)),
      'id_municipio' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio'), 'add_empty' => false)),
      'id_parroquia' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parroquia'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre_ente'  => new sfValidatorString(array('max_length' => 50)),
      'id_estado'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'))),
      'id_municipio' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio'))),
      'id_parroquia' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Parroquia'))),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Ente', 'column' => array('nombre_ente')))
    );

    $this->widgetSchema->setNameFormat('ente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ente';
  }

}
