<!--
Document / Documento: AreasFormacionFacilitadorForm.class

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
En este archivo se han configurado las siguientes controles:
1- Campo Oculto del id del Facilitador.
2- Obtener los Estatus y enviarlos a un menu de selección.
3- Obtener los Areas de Formacion y enviarlos a un menu de selección.
4- Personalización de las etiquetas de Areas de Formacion.
5- Mensaje personalizado cuando falta por ingresar Areas y Estatus de Formación.
6- Mensaje personalizado cuando ya un Area de Formacion existe para un facilitador.
-->
<?php

/**
 * AreasFormacionFacilitador form.
 *
 * @package    facilitadores
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AreasFormacionFacilitadorForm extends BaseAreasFormacionFacilitadorForm
{
  public function configure()
  {
    $this->widgetSchema['id_identificacion'] = new sfWidgetFormInputHidden();
    
    $this->widgetSchema['estatus'] = new sfWidgetFormChoice(array('choices' => Doctrine_Core::getTable('AreasFormacionFacilitador')->getstatus()));
     
    $this->widgetSchema['id_area_formacion'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AreasFormacion'), 'add_empty' => true));
     
    $this->widgetSchema->setLabels(array(
          'id_area_formacion'    => 'Areas de Formación',
        ));
     
     $this->validatorSchema['id_area_formacion'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AreasFormacion'), 'required' => true), array('required'=> "Seleccione las Áreas de Formación"));
     $this->validatorSchema['estatus'] = new sfValidatorInteger(array('required' => true), array('required'=> "Seleccione un Estatus"));
     
     $this->validatorSchema->setPostValidator(new sfValidatorAnd(array(
     new sfValidatorDoctrineUnique(array('model' => 'AreasFormacionFacilitador', 'column' => array('id_area_formacion', 'id_identificacion')), array('invalid'=> "Área de Formación ya fue asignada al Facilitador")),
    )));   
  }
}
