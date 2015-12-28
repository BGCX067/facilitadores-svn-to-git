<?php

/**
 * Parroquia filter form base class.
 *
 * @package    facilitadores
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseParroquiaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_parroquia' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_municipio'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre_parroquia' => new sfValidatorPass(array('required' => false)),
      'id_municipio'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Municipio'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('parroquia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Parroquia';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'nombre_parroquia' => 'Text',
      'id_municipio'     => 'ForeignKey',
    );
  }
}
