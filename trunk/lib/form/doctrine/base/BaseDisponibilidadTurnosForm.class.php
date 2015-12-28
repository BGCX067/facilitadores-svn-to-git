<?php

/**
 * DisponibilidadTurnos form base class.
 *
 * @method DisponibilidadTurnos getObject() Returns the current form's model object
 *
 * @package    facilitadores
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDisponibilidadTurnosForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'id_disponibilidad_dia' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('DisponibilidadDias'), 'add_empty' => false)),
      'turno'                 => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_disponibilidad_dia' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('DisponibilidadDias'))),
      'turno'                 => new sfValidatorString(array('max_length' => 20)),
    ));

    $this->widgetSchema->setNameFormat('disponibilidad_turnos[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DisponibilidadTurnos';
  }

}
