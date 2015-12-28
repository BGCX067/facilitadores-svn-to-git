<?php

/**
 * principal actions.
 *
 * @package    red_sms
 * @subpackage principal
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class principalActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    
  }
  public function executeNoCredentials(sfWebRequest $request)
  {
    $this->getUser()->setFlash('mensaje', '¡No tienes permiso para acceder a esta página!');
    $this->redirect('principal/index');
  }
}
