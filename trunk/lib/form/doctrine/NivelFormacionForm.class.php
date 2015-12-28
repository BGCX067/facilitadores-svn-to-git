<!--
Document / Documento: NivelFormacionForm.class

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
En este archivo se han configurado las siguientes controles:
1- Campo Oculto del id del Facilitador.
2- Cargar Estudios en menus de selección.
3- Personalización de las etiquetas de Estudios.
4- Mensaje personalizado cuando falta por ingresar el Estudio.
5- Mensaje personalizado cuando ya un Estudio existe para un facilitador.
-->
<?php

/**
 * NivelFormacion form.
 *
 * @package    facilitadores
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NivelFormacionForm extends BaseNivelFormacionForm
{
  public function configure()
  {
    $this->widgetSchema['id_identificacion'] = new sfWidgetFormInputHidden();
	
	  $this->widgetSchema['id_estudios'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estudios'), 'add_empty' => true));
	
	  $this->widgetSchema->setLabels(array(
          'id_estudios'    => 'Estudios',
        ));
	
	  $this->validatorSchema['id_estudios'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Estudios'), 'required' => true), array('required'=> "Seleccione el estudio"));
	
	  $this->validatorSchema->setPostValidator(new sfValidatorAnd(array(
            new sfValidatorDoctrineUnique(array('model' => 'NivelFormacion', 'column' => array('id_estudios','id_identificacion')), array('invalid'=> "Nivel de Formación ya fue asignada al Facilitador")),
)));
  }
}
