<?php

/**
 * BitacoraSecciones filter form base class.
 *
 * @package    facilitadores
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBitacoraSeccionesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_secciones'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Secciones'), 'add_empty' => true)),
      'id_identificacion' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Identificacion'), 'add_empty' => true)),
      'fecha'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_secciones'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Secciones'), 'column' => 'id')),
      'id_identificacion' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Identificacion'), 'column' => 'id')),
      'fecha'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('bitacora_secciones_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BitacoraSecciones';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'id_secciones'      => 'ForeignKey',
      'id_identificacion' => 'ForeignKey',
      'fecha'             => 'Date',
    );
  }
}
