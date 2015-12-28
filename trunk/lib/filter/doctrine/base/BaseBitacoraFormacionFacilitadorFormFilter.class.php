<?php

/**
 * BitacoraFormacionFacilitador filter form base class.
 *
 * @package    facilitadores
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBitacoraFormacionFacilitadorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_area_formacion_facilitador' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AreasFormacionFacilitador'), 'add_empty' => true)),
      'fecha'                         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'estatus'                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_area_formacion_facilitador' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AreasFormacionFacilitador'), 'column' => 'id')),
      'fecha'                         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'estatus'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('bitacora_formacion_facilitador_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BitacoraFormacionFacilitador';
  }

  public function getFields()
  {
    return array(
      'id'                            => 'Number',
      'id_area_formacion_facilitador' => 'ForeignKey',
      'fecha'                         => 'Date',
      'estatus'                       => 'Number',
    );
  }
}
