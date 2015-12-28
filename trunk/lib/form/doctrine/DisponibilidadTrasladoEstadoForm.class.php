<!--
Document / Documento: DisponibilidadTrasladoEstadoForm.class

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
En este archivo se han configurado las siguientes controles:
1- Campo Oculto del id del Facilitador.
2- Mensaje personalizado cuando falta por ingresar el Estado, Municipio y Parroquia.
3- Mensaje personalizado cuando ya una Ruta de Traslado existe para un facilitador.
4- Personalización de las etiquetas de Estado, Municipio.
-->
<?php

/**
 * DisponibilidadTrasladoEstado form.
 *
 * @package    facilitadores
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DisponibilidadTrasladoEstadoForm extends BaseDisponibilidadTrasladoEstadoForm
{
  public function configure()
  {
    $this->widgetSchema['id_identificacion'] = new sfWidgetFormInputHidden();
    
    $this->widgetSchema['id_estado'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'), 'add_empty' => true));
    
     $this->widgetSchema->setLabels(array(
          'id_estado'    => 'Estado',
          'id_municipio'   => 'Municipio',
        ));
        
      $this->validatorSchema['id_estado'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'), 'required' => true), array('required'=> "Seleccione el Estado"));
      $this->validatorSchema['id_municipio'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio'), 'required' => true), array('required'=> "Seleccione el Municipio"));
      
      $this->validatorSchema->setPostValidator(new sfValidatorAnd(array(
            new sfValidatorDoctrineUnique(array('model' => 'DisponibilidadTrasladoEstado', 'column' => array('id_identificacion','id_estado','id_municipio','requiere_traslado')), array('invalid'=> "Ruta de traslado ya fue asignada al Facilitador")),
)));
  }
}
