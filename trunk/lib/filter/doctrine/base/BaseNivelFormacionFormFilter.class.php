<?php

/**
 * NivelFormacion filter form base class.
 *
 * @package    facilitadores
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseNivelFormacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_identificacion' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Identificacion'), 'add_empty' => true)),
      'id_estudios'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estudios'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_identificacion' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Identificacion'), 'column' => 'id')),
      'id_estudios'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Estudios'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('nivel_formacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NivelFormacion';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'id_identificacion' => 'ForeignKey',
      'id_estudios'       => 'ForeignKey',
    );
  }
}
