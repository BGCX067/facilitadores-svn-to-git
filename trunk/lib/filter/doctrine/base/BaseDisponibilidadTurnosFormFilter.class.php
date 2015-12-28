<?php

/**
 * DisponibilidadTurnos filter form base class.
 *
 * @package    facilitadores
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDisponibilidadTurnosFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_disponibilidad_dia' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('DisponibilidadDias'), 'add_empty' => true)),
      'turno'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_disponibilidad_dia' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('DisponibilidadDias'), 'column' => 'id')),
      'turno'                 => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('disponibilidad_turnos_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DisponibilidadTurnos';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'id_disponibilidad_dia' => 'ForeignKey',
      'turno'                 => 'Text',
    );
  }
}
