<!--
Document / Documento: action.class del Módulo Formación 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Insertar Datos de Configuración como:
	1.1- Estudios.
	1.2- Areas de Formación.
	1.3- Entes.
	1.4- Secciones.
-->
<?php
class formacionActions extends sfActions
{

//Función que invoca a la vista (indexSuccess) del Módulo Formación
  public function executeIndex(sfWebRequest $request)
  {
  }

    /******************************* ESTUDIOS**********************************/

//Función que invoca a la vista (estudiosSuccess) para ingresar al listado de Estudios
  public function executeEstudios(sfWebRequest $request)
  {
    $this->estudios = Doctrine_Core::getTable('Estudios')->getEstudios();
    $this->filter = new EstudiosFormFilter();
  }

//Esta función es invocada desde la vista (estudiosSuccess) para hacer filtrado de Estudios
  public function executeEstudiosFiltro(sfWebRequest $request) {
    $this->filter = new EstudiosFormFilter();
    $this->query = $this->filter->buildQuery($request->getParameter('estudios_filters'));
    $this->estudios = $this->query->execute();
    $this->setTemplate('estudios');
  }

//Función que invoca a la vista (estudiosInsertarSuccess) para ingresar los Estudios
  public function executeEstudiosInsertar(sfWebRequest $request)
  {
    $this->form = new EstudiosForm();
  }

//Función que invoca a la vista (estudiosEditarSuccess) para modificar los Estudios
  public function executeEstudiosEditar(sfWebRequest $request)
  {
    $this->forward404Unless($estudios = Doctrine_Core::getTable('Estudios')->find($request->getParameter('id')),
    sprintf('Object estudios does not exist (%s).', $request->getParameter('id')));
    $this->form = new EstudiosForm($estudios);
  }

//Función valida de no dejar valor en blanco en el campo Nombre de estudio
  public function executeEstudiosCrear(sfWebRequest $request)
  {
    $this->form = new EstudiosForm();
    $this->processForm($request, $this->form);
    $this->setTemplate('estudiosInsertar');
  }

//Función que invoca a la vista (estudiosEditarSuccess) para modificar los Estudios
  public function executeEstudiosModificar(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($estudios = Doctrine_Core::getTable('Estudios')->find($request->getParameter('id')),
            sprintf('Object estudios does not exist (%s).',
            $request->getParameter('id')));
    $this->form = new EstudiosForm($estudios);
    $this->processForm($request, $this->form);
    $this->setTemplate('estudiosEditar');
  }

//Al recibir los (Datos del Estudio), los pasa a esta función que se encarga de almacenarlos ó actualizarlos en la Base de Datos.
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
        $this->redirect('formacion/estudiosInsertar?id='.$id);
      }
      else{
        $this->getUser()->setFlash('mensaje',sfConfig::get('app_mensaje_modificado'));
        $this->redirect('formacion/estudiosEditar?id='.$id);
      }

    }
  }

//Función que se encarga de eliminar los Estudios
  public function executeEstudiosEliminar(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $this->forward404Unless($estudios = Doctrine_Core::getTable('Estudios')->find($request->getParameter('id')),
    sprintf('Object estudios does not exist (%s).',
    $request->getParameter('id')));
    $estudios->delete();
    $this->getUser()->setFlash('mensaje', sfConfig::get('app_mensaje_eliminado'));
    $this->redirect('formacion/estudios');
  }

  /***************************** END ESTUDIOS *********************************/




    /******************************* AREAS FORMACION **************************/

//Función que invoca a la vista (areasFormacionSuccess) para ingresar al listado de Areas de formación
  public function executeAreasFormacion(sfWebRequest $request)
  {
    $this->areasFormacion = Doctrine_Core::getTable('AreasFormacion')->getAreasFormacion();
    $this->filter = new AreasFormacionFormFilter();
  }

//Esta función es invocada desde la vista (areasFormacionSuccess) para hacer filtrado de Areas de formación
  public function executeAreasFiltro(sfWebRequest $request) {
    $this->filter = new AreasFormacionFormFilter();
    $this->query = $this->filter->buildQuery($request->getParameter('areas_formacion_filters'));
    $this->areasFormacion = $this->query->execute();
    $this->setTemplate('areasFormacion');
  }

//Función que invoca a la vista (areasFormacionInsertarSuccess) para hacer un nuevo registro de Areas de formación
  public function executeAreasFormacionInsertar(sfWebRequest $request)
  {
    $this->form = new AreasFormacionForm();
  }

//Función que invoca a la vista (areasFormacionEditarSuccess) para modificar los registro de Areas de formación
  public function executeAreasFormacionEditar(sfWebRequest $request)
  {
    $this->forward404Unless($areasFormacion = Doctrine_Core::getTable('AreasFormacion')->find($request->getParameter('id')),
    sprintf('Object areasFormacion does not exist (%s).', $request->getParameter('id')));
    $this->form = new AreasFormacionForm($areasFormacion);
  }

//Función valida de no dejar valor en blanco en el campo Nombre area
  public function executeAreasFormacionCrear(sfWebRequest $request)
  {
    $this->form = new AreasFormacionForm();
    $this->processAreasFormacionForm($request, $this->form);
    $this->setTemplate('areasFormacionInsertar');
  }

//Función que invoca a la vista (areasFormacionEditarSuccess) para modificar os registro de Areas de formación
  public function executeAreasFormacionModificar(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($areasFormacion = Doctrine_Core::getTable('AreasFormacion')->find($request->getParameter('id')),
            sprintf('Object areasFormacion does not exist (%s).',
            $request->getParameter('id')));
    $this->form = new AreasFormacionForm($areasFormacion);
    $this->processAreasFormacionForm($request, $this->form);
    $this->setTemplate('areasFormacionEditar');
  }

//Al recibir los (Datos de Área de Formación), los pasa a esta función que se encarga de almacenarlos ó actualizarlos en la Base de Datos.
  protected function processAreasFormacionForm(sfWebRequest $request, sfForm $form)
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
        $this->redirect('formacion/areasFormacionInsertar?id='.$id);
      }
      else{
        $this->getUser()->setFlash('mensaje',sfConfig::get('app_mensaje_modificado'));
        $this->redirect('formacion/areasFormacionEditar?id='.$id);
      }

    }
  }

//Función que se encarga de eliminar las Área de Formación
  public function executeAreasFormacionEliminar(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $this->forward404Unless($areasFormacion = Doctrine_Core::getTable('AreasFormacion')->find($request->getParameter('id')),
    sprintf('Object areasFormacion does not exist (%s).',
    $request->getParameter('id')));
    $areasFormacion->delete();
    $this->getUser()->setFlash('mensaje', sfConfig::get('app_mensaje_eliminado'));
    $this->redirect('formacion/areasFormacion');
  }

  /***************************** END AREAS FORMACION *********************************/



    /******************************* ENTES **************************/

//Función que invoca a la vista (entesSuccess) para ingresar al listado de Entes
  public function executeEntes(sfWebRequest $request)
  {
    $this->entes = Doctrine_Core::getTable('Ente')->getEntes();
    $this->filter = new EnteFormFilter();
  }

//Estad función es invocada desde la vista (entesSuccess) para hacer filtrado de Entes
  public function executeEntesFiltro(sfWebRequest $request) {
    $this->filter = new EnteFormFilter();
    $this->query = $this->filter->buildQuery($request->getParameter('ente_filters'));
    $this->entes = $this->query->execute();
    $this->setTemplate('entes');
  }

//Función que invoca a la vista (entesInsertarSuccess) para hacer un nuevo registro de Entes
  public function executeEntesInsertar(sfWebRequest $request)
  {
    $this->form = new EnteForm();
  }

//Función que invoca a la vista (entesEditarSuccess) para modificar los registro de Entes
  public function executeEntesEditar(sfWebRequest $request)
  {
    $this->forward404Unless($entes = Doctrine_Core::getTable('Ente')->find($request->getParameter('id')),
    sprintf('Object entes does not exist (%s).', $request->getParameter('id')));
    $this->form = new EnteForm($entes);
  }

//Función valida de no dejar valor en blanco los campos: Nombre Ente, Estado, Municipio y Parroquia
  public function executeEntesCrear(sfWebRequest $request)
  {
    $this->form = new EnteForm();
    $this->processEntesForm($request, $this->form);
    $this->setTemplate('entesInsertar');
  }

//Función que invoca a la vista (entesEditarSuccess) para modificar los registro de Entes
  public function executeEntesModificar(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($entes = Doctrine_Core::getTable('Ente')->find($request->getParameter('id')),
            sprintf('Object entes does not exist (%s).',
            $request->getParameter('id')));
    $this->form = new EnteForm($entes);
    $this->processEntesForm($request, $this->form);
    $this->setTemplate('entesEditar');
  }

//Al recibir los (Datos de Entes), los pasa a esta función que se encarga de almacenarlos ó actualizarlos en la Base de Datos.
  protected function processEntesForm(sfWebRequest $request, sfForm $form)
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
        $this->redirect('formacion/entesInsertar?id='.$id);
      }
      else{
        $this->getUser()->setFlash('mensaje',sfConfig::get('app_mensaje_modificado'));
        $this->redirect('formacion/entesEditar?id='.$id);
      }

    }
  }

//Función que se encarga de eliminar los Entes
  public function executeEntesEliminar(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $this->forward404Unless($entes = Doctrine_Core::getTable('Ente')->find($request->getParameter('id')),
    sprintf('Object entes does not exist (%s).',
    $request->getParameter('id')));
    $entes->delete();
    $this->getUser()->setFlash('mensaje', sfConfig::get('app_mensaje_eliminado'));
    $this->redirect('formacion/entes');
  }

  /***************************** END AREAS ENTES *********************************/



    /******************************* SECCIONES**********************************/

//Función que invoca a la vista (seccionesSuccess) para ingresar al listado de Secciones
  public function executeSecciones(sfWebRequest $request)
  {
    $this->secciones = Doctrine_Core::getTable('Secciones')->getSecciones();
    $this->filter = new SeccionesFormFilter();
  }

//Esta función es invocada desde la vista (seccionesSuccess) para hacer filtrado de Secciones
  public function executeSeccionesFiltro(sfWebRequest $request) {
    $this->filter = new SeccionesFormFilter();
    $this->query = $this->filter->buildQuery($request->getParameter('secciones_filters'));
    $this->secciones = $this->query->execute();
    $this->setTemplate('secciones');
  }

//Función que invoca a la vista (seccionesInsertarSuccess) para hacer un nuevo registro de Secciones
  public function executeSeccionesInsertar(sfWebRequest $request)
  {
    $this->form = new SeccionesForm();
  }

//Función que invoca a la vista (seccionesEditarSuccess) para modificar los registro de Secciones
  public function executeSeccionesEditar(sfWebRequest $request)
  {
    $this->forward404Unless($secciones = Doctrine_Core::getTable('Secciones')->find($request->getParameter('id')),
    sprintf('Object secciones does not exist (%s).', $request->getParameter('id')));
    $this->form = new SeccionesForm($secciones);
  }

//Función valida de no dejar valor en blanco los campos: Area Formacion, Ente y Nombre de Seccion
  public function executeSeccionesCrear(sfWebRequest $request)
  {
    $this->form = new SeccionesForm();
    $this->processFormSecciones($request, $this->form);
    $this->setTemplate('seccionesInsertar');
  }

//Función que invoca a la vista (seccionesEditarSuccess) para modificar los registro de Secciones
  public function executeSeccionesModificar(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($secciones = Doctrine_Core::getTable('Secciones')->find($request->getParameter('id')),
            sprintf('Object secciones does not exist (%s).',
            $request->getParameter('id')));
    $this->form = new SeccionesForm($secciones);
    $this->processFormSecciones($request, $this->form);
    $this->setTemplate('seccionesEditar');
  }

//Al recibir los (Secciones), los pasa a esta función que se encarga de almacenarlos ó actualizarlos en la Base de Datos.
  protected function processFormSecciones(sfWebRequest $request, sfForm $form)
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
        $this->redirect('formacion/seccionesInsertar?id='.$id);
      }
      else{
        $this->getUser()->setFlash('mensaje',sfConfig::get('app_mensaje_modificado'));
        $this->redirect('formacion/seccionesEditar?id='.$id);
      }

    }
  }

//Función que se encarga de eliminar las Secciones
  public function executeSeccionesEliminar(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $this->forward404Unless($secciones = Doctrine_Core::getTable('Secciones')->find($request->getParameter('id')),
    sprintf('Object secciones does not exist (%s).',
    $request->getParameter('id')));
    $secciones->delete();
    $this->getUser()->setFlash('mensaje', sfConfig::get('app_mensaje_eliminado'));
    $this->redirect('formacion/secciones');
  }

  /***************************** END SECCIONES *********************************/

//Función que se encarga de cargar los Municipios y enviarlos a la vista municipiosList
    public function executeCargarMunicipios(sfWebRequest $request)
  {
    $this->forwardUnless($query = $request->getParameter('query'), 'formacion', 'insertar');

    if('*' != $query){
      $querystring = Doctrine_Core::getTable('Municipio')->createQuery()->where('id_estado=?',$query);
      $this->municipios = $querystring->execute();
    }

    if ($request->isXmlHttpRequest())
    {
      if ('*' == $query || !$this->municipios)
      {
        return $this->renderText('');
      }
      return $this->renderPartial('formacion/municipiosList', array('municipios' => $this->municipios));
    }
  }

//Función que se encarga de cargar las Parroquias y enviarlos a la vista parroquiasList
  public function executeCargarParroquias(sfWebRequest $request)
  {
    $this->forwardUnless($query = $request->getParameter('query'), 'formacion', 'insertar');

    if('*' != $query){
      $querystring = Doctrine_Core::getTable('Parroquia')->createQuery()->where('id_municipio=?',$query);
      $this->parroquias = $querystring->execute();
    }

    if ($request->isXmlHttpRequest())
    {
      if ('*' == $query || !$this->parroquias)
      {
        return $this->renderText('');
      }
      return $this->renderPartial('formacion/parroquiasList', array('parroquias' => $this->parroquias));
    }
  }

}
