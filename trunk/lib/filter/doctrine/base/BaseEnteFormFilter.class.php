<?php

/**
 * Ente filter form base class.
 *
 * @package    facilitadores
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEnteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_ente'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_estado'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'), 'add_empty' => true)),
      'id_municipio' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio'), 'add_empty' => true)),
      'id_parroquia' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parroquia'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre_ente'  => new sfValidatorPass(array('required' => false)),
      'id_estado'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Estado'), 'column' => 'id')),
      'id_municipio' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Municipio'), 'column' => 'id')),
      'id_parroquia' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Parroquia'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('ente_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ente';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'nombre_ente'  => 'Text',
      'id_estado'    => 'ForeignKey',
      'id_municipio' => 'ForeignKey',
      'id_parroquia' => 'ForeignKey',
    );
  }
}
