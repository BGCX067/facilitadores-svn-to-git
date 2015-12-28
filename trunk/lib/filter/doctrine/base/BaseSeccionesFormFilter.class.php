<?php

/**
 * Secciones filter form base class.
 *
 * @package    facilitadores
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSeccionesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_identificacion' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Identificacion'), 'add_empty' => true)),
      'id_area_formacion' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AreasFormacion'), 'add_empty' => true)),
      'nombre_seccion'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_ente'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ente'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_identificacion' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Identificacion'), 'column' => 'id')),
      'id_area_formacion' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AreasFormacion'), 'column' => 'id')),
      'nombre_seccion'    => new sfValidatorPass(array('required' => false)),
      'id_ente'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Ente'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('secciones_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Secciones';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'id_identificacion' => 'ForeignKey',
      'id_area_formacion' => 'ForeignKey',
      'nombre_seccion'    => 'Text',
      'id_ente'           => 'ForeignKey',
    );
  }
}
