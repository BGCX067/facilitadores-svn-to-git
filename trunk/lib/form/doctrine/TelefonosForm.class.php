<!--
Document / Documento: TelefonosForm.class

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
En este archivo se han configurado las siguientes controles:
1- Campo Oculto del id del Facilitador.
2- Mensaje personalizado cuando falta por ingresar el teléfono.
3- Mensaje personalizado cuando ya un teléfono existe para un facilitador.
-->
<?php

/**
 * Telefonos form.
 *
 * @package    facilitadores
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TelefonosForm extends BaseTelefonosForm
{
  public function configure()
  {
    $this->widgetSchema['id_identificacion'] = new sfWidgetFormInputHidden();
     
    $this->validatorSchema['numero'] = new sfValidatorString(array('max_length' => 12, 'required' => true), array('required'=> "Ingrese el número de teléfono"));
     
    $this->validatorSchema->setPostValidator(new sfValidatorAnd(array(
            new sfValidatorDoctrineUnique(array('model' => 'Telefonos', 'column' => array('numero', 'id_identificacion')), array('invalid'=> "Teléfono ya fue asignado al Facilitador")),
    )));
  }
}
