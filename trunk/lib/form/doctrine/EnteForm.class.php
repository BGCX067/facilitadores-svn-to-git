<!--
Document / Documento: EnteForm.class

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
En este archivo se han configurado las siguientes controles:
1- Mensaje personalizado cuando falta por ingresar el Estado, Municipio y Parroquia.
2- Personalización de las etiquetas de Estado, Municipio y Parroquia.
-->
<?php

/**
 * Ente form.
 *
 * @package    facilitadores
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EnteForm extends BaseEnteForm
{
  public function configure()
  {
    
    $this->widgetSchema['id_estado'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'), 'add_empty' => true));

    $this->widgetSchema->setLabels(array(
    'id_estado'    => 'Estado',
    'id_municipio'   => 'Municipio',
    'id_parroquia' => 'Parroquia',
    ));

	$this->validatorSchema['id_estado'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'), 'required' => true), array('required'=> "Seleccione el Estado"));
	$this->validatorSchema['id_municipio'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Municipio'), 'required' => true), array('required'=> "Seleccione el Municipio"));
	 $this->validatorSchema['id_parroquia'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Parroquia'), 'required' => true), array('required'=> "Seleccione la Parroquia"));
	 
  }
}
