<?php

/**
 * Secciones filter form.
 *
 * @package    facilitadores
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SeccionesFormFilter extends BaseSeccionesFormFilter
{
  public function configure()
  {
    unset($this['id_identificacion']);
    $this->widgetSchema->setLabels(array(
      'id_area_formacion'    => 'Área formación',
      'id_ente'   => 'Ente',
    ));
  }
}
