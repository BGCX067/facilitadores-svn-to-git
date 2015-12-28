<?php

/**
 * geografia actions.
 *
 * @package    facilitadores
 * @subpackage geografia
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class geografiaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  }

  /******************************* ESTADOS ***********************************/
  public function executeEstados(sfWebRequest $request)
  {
    $this->estados = Doctrine_Core::getTable('Estado')->getEstados();
  }
  public function executeEstadosInsertar(sfWebRequest $request)
  {
    $this->form = new EstadoForm();
  }

  public function executeEstadosEditar(sfWebRequest $request)
  {
    $this->forward404Unless($estado = Doctrine_Core::getTable('Estado')->find($request->getParameter('id')),
    sprintf('Object estado does not exist (%s).', $request->getParameter('id')));
    $this->form = new EstadoForm($estado);
  }

  public function executeEstadosCrear(sfWebRequest $request)
  {
    $this->form = new EstadoForm();
    $this->processForm($request, $this->form);
    $this->setTemplate('estadosInsertar');
  }

  public function executeEstadosModificar(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($estado = Doctrine_Core::getTable('Estado')->find($request->getParameter('id')),
            sprintf('Object estado does not exist (%s).',
            $request->getParameter('id')));
    $this->form = new EstadoForm($estado);
    $this->processForm($request, $this->form);
    $this->setTemplate('estadosEditar');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind(
     $request->getParameter($form->getName()),
     $request->getFiles($form->getName())
    );

    $id = $form->getObject()->get('id');

    if ($form->isValid())
    {
      $result = $form->save();
      if($form->isNew()){
        $this->getUser()->setFlash('mensaje',sfConfig::get('app_mensaje_insertado'));
        $this->redirect('geografia/estadosInsertar?id='.$id);
      }
      else{
        $this->getUser()->setFlash('mensaje',sfConfig::get('app_mensaje_modificado'));
        $this->redirect('geografia/estadosEditar?id='.$id);
      }

    }
  }

  public function executeEstadosEliminar(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $this->forward404Unless($estado = Doctrine_Core::getTable('Estado')->find($request->getParameter('id')),
    sprintf('Object estado does not exist (%s).',
    $request->getParameter('id')));
    $estado->delete();
    $this->getUser()->setFlash('mensaje', sfConfig::get('app_mensaje_eliminado'));
    $this->redirect('geografia/estados');
  }

  /***************************** END ESTADOS *********************************/
}
