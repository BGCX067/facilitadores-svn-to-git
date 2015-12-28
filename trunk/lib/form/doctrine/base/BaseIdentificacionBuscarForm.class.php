<?php

/**
 * Identificacion form base class.
 *
 * @method Identificacion getObject() Returns the current form's model object
 *
 * @package    facilitadores
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseIdentificacionBuscarForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'             => new sfWidgetFormInputText(),
      'apellido'           => new sfWidgetFormInputText(),
      'cedula_pasaporte'   => new sfWidgetFormInputText(),
      'id_estado'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'), 'add_empty' => true)),
      'id_municipio'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio'), 'add_empty' => true)),
      'id_parroquia'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parroquia'), 'add_empty' => true)),
      'estatus'            => new sfWidgetFormChoice(array('choices' => Doctrine_Core::getTable('AreasFormacionFacilitador')->getstatus(), 'expanded' => false)),
    ));


    $this->widgetSchema->setNameFormat('identificacion[%s]');

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Identificacion';
  }

}
