<?php

/**
 * Ente filter form.
 *
 * @package    facilitadores
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EnteFormFilter extends BaseEnteFormFilter
{
  public function configure()
  {
    unset($this['id_municipio']);
    unset($this['id_parroquia']);
    $this->widgetSchema->setLabels(array(
      'id_estado'    => 'Estado',
    ));
  }
}
