<?php

/**
 * AreasFormacion filter form base class.
 *
 * @package    facilitadores
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAreasFormacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_area' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'nombre_area' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('areas_formacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AreasFormacion';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'nombre_area' => 'Text',
    );
  }
}
