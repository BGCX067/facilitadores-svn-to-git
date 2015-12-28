<!--
Document / Documento: ProfesionForm.class

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
En este archivo se han configurado las siguientes controles:
1- Campo Oculto del id del Facilitador.
2- Mensaje personalizado cuando falta por ingresar la Profesión.
5- Mensaje personalizado cuando ya una Profesión existe para un facilitador.
-->
<?php

/**
 * Profesion form.
 *
 * @package    facilitadores
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfesionForm extends BaseProfesionForm
{
  public function configure()
  {
    $this->widgetSchema['id_identificacion'] = new sfWidgetFormInputHidden();

    $this->validatorSchema['nombre_profesion'] = new sfValidatorString(array('max_length' => 50,'required' => true), array('required'=> "Ingrese nombre profesión"));
    
    $this->validatorSchema->setPostValidator(new sfValidatorAnd(array(
            new sfValidatorDoctrineUnique(array('model' => 'Profesion', 'column' => array('nombre_profesion','id_identificacion')), array('invalid'=> "Profesión ya fue asignada al Facilitador")),
)));
  }
}
