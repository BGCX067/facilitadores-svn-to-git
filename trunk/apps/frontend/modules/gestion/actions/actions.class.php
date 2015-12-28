<!--
Document / Documento: action.class del Módulo Gestión 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Insertar Datos Básicos del Facilitador.
	1.1- Teléfonos.
	1.2- Correo Electronico.
	1.3- Areas de Formación.
	1.4- Nivel de Formación.
	1.5- Profesió.
	1.6- Ocupación.
	1.7- Turnos Disponibles.
	1.8- Traslados.
	1.9- Asignar Secciones.	
-->
<?php

class gestionActions extends sfActions
{
//Función que invoca a la vista (indexSuccess) para mostrar el Menu Principal de Facilitadores
  public function executeIndex(sfWebRequest $request)
  {
   //$this->forward('default', 'module');
  }

//Función que invoca a la vista (insertarSuccess) para ingresar los Datos Básicos del Facilitador
  public function executeInsertar(sfWebRequest $request)
  { 
    $this->id = $request->getParameter('id');
    if (isset($this->id))
    {
      $facilitador = Doctrine_Core::getTable('Identificacion')->find($this->id);
      //$this->telefonos = Doctrine_Core::getTable('Telefonos')->obtenerTelefonos($ver_telefono);
      $this->form = new IdentificacionForm($facilitador);
    }
    else
      $this->form = new IdentificacionForm();
  }

//Función que invoca a la vista (insertartelefonoSuccess) para ingresar los teléfonos del facilitador
  public function executeInsertartelefono(sfWebRequest $request)
  {
    $this->form = new TelefonosForm();
    $id = $request->getParameter('id');
    $this->ver_telefono= $request->getParameter('ver_telefono');
   //Realizar la consulta a la tabla telefonos referenciando el id y la enviamos al formulario insertartelefonoSuccess.php
   $this->telefonos = Doctrine_Core::getTable('Telefonos')->obtenerTelefonosPorFacilitador($id);
   
    //Obtiene el id del telefono
   $id_telefono = $request->getParameter('id_telefono');
   //Si la variable id del telefono existe, realiza la eliminacion y redirecciona
   //de nuevo a insertartelefono
   $this->facilitador = Doctrine::getTable('Identificacion')->find($id);
   if (isset($id_telefono))
   {
   Doctrine_Core::getTable('Telefonos')->eliminarTelefono($id_telefono);
   $this->redirect('gestion/insertartelefono?id='.$id);
   }

 /*if (isset($this->$ver_telefono))
   {
      $this->telefono = Doctrine_Core::getTable('Telefonos')->find(6);
      $this->form = new TelefonosForm($this->telefono);
    }
*/
  }

//Función que invoca a la vista (insertarcorreoSuccess) para ingresar los correos del facilitador
  public function executeInsertarcorreo(sfWebRequest $request)
  {
    $this->form = new CorreosForm();
    $id = $request->getParameter('id');
   //Realizar la consulta a la tabla correos referenciando el id y la enviamos al formulario insertarcorreoSuccess.php
   $this->correos = Doctrine_Core::getTable('Correos')->obtenerCorreosPorFacilitador($id);
   //Obtiene el id del correo
   $id_correo = $request->getParameter('id_correo');
   //Si la variable id del correo existe, realiza la eliminacion y redirecciona
   //de nuevo a insertarcorreo
   $this->facilitador = Doctrine::getTable('Identificacion')->find($id);
   if (isset($id_correo))
   {
   Doctrine_Core::getTable('Correos')->eliminarCorreo($id_correo);
   $this->redirect('gestion/insertarcorreo?id='.$id);
   }
  }

//Función que invoca a la vista (insertar_areas_formacion_facilitadorSuccess) para ingresar los áreas de formación del facilitador
  public function executeInsertar_areas_formacion_facilitador(sfWebRequest $request)
  {
   $this->form = new AreasFormacionFacilitadorForm();
   //obtener el id que pertenece al identificador
   $id = $request->getParameter('id');
   //Realizar la consulta a la tabla areas_formacion y areas_formacion_facilitador referenciando el id y la enviamos al formulario insertar_areas_formacion_facilitadorSuccess.php
   $this->areas_formacion_facilitador = Doctrine_Core::getTable('AreasFormacionFacilitador')->obtenerAreasFormacionPorFacilitador($id);
   //Obtiene el id del Area Formacion Facilitador
   $id_area = $request->getParameter('id_area');
   //Si la variable id del area existe, realiza la eliminacion y redirecciona
   //de nuevo a insertar_areas_formacion_facilitador
   $this->facilitador = Doctrine::getTable('Identificacion')->find($id);
   if (isset($id_area))
   {
   Doctrine_Core::getTable('AreasFormacionFacilitador')->eliminarAreasFormacion($id_area);
   $this->redirect('gestion/insertar_areas_formacion_facilitador?id='.$id);
   }
  }

//Función que invoca a la vista (insertar_nivel_formacion_facilitadorSuccess) para ingresar los nivel de formación del facilitador
  public function executeInsertar_nivel_formacion_facilitador(sfWebRequest $request)
  {
   $this->form = new NivelFormacionForm();
   //obtener el id que pertenece al identificador
   $id = $request->getParameter('id');
   //Realizar la consulta a la tabla nivel_formacion referenciando el id y la enviamos al formulario insertar_nivel_formacion_facilitadorSuccess.php
   $this->nivel_formacion_facilitador = Doctrine_Core::getTable('NivelFormacion')->obtenerNivelFormacionPorFacilitador($id);
   //Obtiene el id del Nivel Formacion Facilitador
   $id_nivel = $request->getParameter('id_formacion');
   //Si la variable id_nivel existe, realiza la eliminacion y redirecciona
   //de nuevo a insertar_nivel_formacion_facilitador
   $this->facilitador = Doctrine::getTable('Identificacion')->find($id);
   if (isset($id_nivel))
   {
   Doctrine_Core::getTable('NivelFormacion')->eliminarNivelFormacion($id_nivel);	
   $this->redirect('gestion/insertar_nivel_formacion_facilitador?id='.$id);
   }
  }

//Función que invoca a la vista (insertar_profesionSuccess) para ingresar la profesión del facilitador
public function executeInsertar_profesion(sfWebRequest $request)
  {
   $this->form = new ProfesionForm();
   //obtener el id que pertenece al identificador
   $id = $request->getParameter('id');
   //Realizar la consulta a la tabla profesion referenciando el id y la enviamos al formulario insertar_profesionSuccess.php
   $this->profesion_facilitador = Doctrine_Core::getTable('Profesion')->obtenerProfesionPorFacilitador($id);
   //Obtiene el id del Nivel Formacion Facilitador
   $id_profesion = $request->getParameter('id_profesion');
   //Si la variable id_profesion existe, realiza la eliminacion y redirecciona
   //de nuevo a insertar_profesion
   $this->facilitador = Doctrine::getTable('Identificacion')->find($id);
   if (isset($id_profesion))
   {
   Doctrine_Core::getTable('Profesion')->eliminarProfesion($id_profesion);
   $this->redirect('gestion/insertar_profesion?id='.$id);
   }
  }

//Función que invoca a la vista (insertar_ocupacionSuccess) para ingresar la ocupación del facilitador
public function executeInsertar_ocupacion(sfWebRequest $request)
  {
   $this->form = new OcupacionForm();
   //obtener el id que pertenece al identificador
   $id = $request->getParameter('id');
   //Realizar la consulta a la tabla ocupacion referenciando el id y la enviamos al formulario insertar_ocupacionSuccess.php
   $this->ocupacion_facilitador = Doctrine_Core::getTable('Ocupacion')->obtenerOcupacionPorFacilitador($id);
   //Obtiene el id de la Ocupacion
   $id_ocupacion = $request->getParameter('id_ocupacion');
   //Si la variable id_ocupacion existe, realiza la eliminacion y redirecciona
   //de nuevo a insertar_ocupacion
   $this->facilitador = Doctrine::getTable('Identificacion')->find($id);
   if (isset($id_ocupacion))
   {
   Doctrine_Core::getTable('Ocupacion')->eliminarOcupacion($id_ocupacion);
   $this->redirect('gestion/insertar_ocupacion?id='.$id);
   }
  }

//Función que invoca a la vista (insertar_dias_turnoSuccess) para ingresar los turnos disponibles del facilitador
public function executeInsertar_dias_turno(sfWebRequest $request)
  {
    
   $this->form_turnos = new DisponibilidadTurnosForm();
   $this->form_dias = new DisponibilidadDiasForm();
   //obtener el id que pertenece al identificador
   $id = $request->getParameter('id');
   //Realizar la consulta a la tabla ocupacion referenciando el id y la enviamos al formulario insertar_dias_turnoSuccess.php
   $this->obtener_dias_turno = Doctrine_Core::getTable('DisponibilidadDias')->obtenerDiasTurnoFacilitador($id);
   $this->facilitador = Doctrine::getTable('Identificacion')->find($id);
  }

//Función que invoca a la vista (insertar_dias_turnoSuccess) para ingresar los traslados del facilitador
public function executeInsertar_traslados(sfWebRequest $request)
  {
    
   $this->form = new DisponibilidadTrasladoEstadoForm();
   //obtener el id que pertenece al identificador
   $id = $request->getParameter('id');
   //Realizar la consulta a la tabla DisponibilidadTrasladoEstado referenciando el id y la enviamos al formulario insertar_trasladosSuccess.php
   $this->traslados_facilitador = Doctrine_Core::getTable('DisponibilidadTrasladoEstado')->obtenerDisponibilidadTraslado($id);
   //Obtiene el id del Traslado
   $id_traslado = $request->getParameter('id_traslado');
   //Si la variable id_traslado existe, realiza la eliminacion y redirecciona
   //de nuevo a insertar_traslado
   $this->facilitador = Doctrine::getTable('Identificacion')->find($id);
   if (isset($id_traslado))
   {
   Doctrine_Core::getTable('DisponibilidadTrasladoEstado')->eliminarTraslados($id_traslado);	
   $this->redirect('gestion/insertar_traslados?id='.$id);
   }
  }

//Función que invoca a la vista (buscar_enteSuccess) para buscar las secciones a ser asignadas al facilitador
public function executeBuscar_ente(sfWebRequest $request)
  {
    $this->form = new EnteForm();
    $this->setTemplate('buscar_ente');
    $ente = $request->getParameter('ente');
    $this->areas = Doctrine::getTable('AreasFormacion')->getAreasFormacion();
  }

//Función que envia valores a la vista (seccionesList) para luego proceder a asignar facilitadores
public function executeCargarSecciones(sfWebRequest $request)
  {
   if (!$request->isXmlHttpRequest())
      return $this->renderText('No hay registros');
  
    $nombre_seccion = $request->getParameter('nombre');
    $estado = $request->getParameter('estado');
    $municipio = $request->getParameter('municipio');
    $parroquia = $request->getParameter('parroquia');
    $ente = $request->getParameter('ente');
    $area = $request->getParameter('area');

    
    $this->secciones = Doctrine_Core::getTable('Secciones')->obtenerSecciones($nombre_seccion, $ente, $area, $estado, $municipio, $parroquia);

    return $this->renderPartial('gestion/seccionesList', array('secciones' => $this->secciones, 'nombre_seccion' => $nombre_seccion, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia, 'ente' => $ente, 'area' => $area));
  }

//Función que envia valores a la vista (seccionesList) para luego proceder a asignar facilitadores
public function executeAsignar_secciones_facilitador(sfWebRequest $request)
  {
    $id_seccion = $request->getParameter('id_seccion');
    $area = $request->getParameter('area');
    if($request->hasParameter('id')){
      $seccion = Doctrine_Core::getTable('Secciones')->find($id_seccion);
    
    $seccion->setIdIdentificacion($request->getParameter('id'));
    $seccion->save();
    
    $bitacora = new BitacoraSecciones();
    $bitacora->setIdSecciones($seccion->getId());
    $bitacora->setIdIdentificacion($request->getParameter('id'));
    $bitacora->setFecha(date("Y-m-d"));
    $bitacora->save();
    $this->redirect('gestion/asignar_secciones_facilitador?id_seccion='.$seccion->getId().'&area='.$area);
    } 
    
    $this->secciones = Doctrine_Core::getTable('Identificacion')->obtenerSeccionesFacilitador($id_seccion);
}

//Función que invoca a la vista (insertar_seccionesSuccess) para asignar secciones al facilitador
public function executeInsertar_secciones(sfWebRequest $request)
  {
    
   $this->form = new SeccionesForm();
   //obtener el id que pertenece al identificador
   $id = $request->getParameter('id');
   //Realizar la consulta a la tabla AreasFormacionFacilitador referenciando el id y la enviamos al formulario insertar_seccionesSuccess.php
   $this->areas_formacion_facilitador = Doctrine_Core::getTable('AreasFormacionFacilitador')->obtenerAreasFormacionPorFacilitador($id);
  }
  
//Funcion que recibe los (Datos Básicos del Facilitador), para realizar un nuevo ingreso.
  public function executeCreate(sfWebRequest $request)
 {
   $this->form = new IdentificacionForm();
   $this->processForm($request, $this->form);
   $this->setTemplate('insertar');
 }

//Funcion que recibe los (Datos Básicos del Facilitador), para realizar una actualización.
 public function executeUpdate(sfWebRequest $request)
 {
   $id = $request->getParameter('id');
    
   $facilitador = Doctrine_Core::getTable('Identificacion')->find($id);
   $this->form = new IdentificacionForm($facilitador);
      
   $this->processForm($request, $this->form);
   $this->setTemplate('insertar');
 }

//Al recibir los (Datos Básicos del Facilitador), los pasa a esta función que se encarga de almacenarlos ó actualizarlos en la Base de Datos.
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
   $form->bind(
     $request->getParameter($form->getName()),
     $request->getFiles($form->getName())
   );

   if ($form->isValid())
   {
     $result = $form->save();
     $id = $form->getObject()->id;
     $this->redirect('gestion/insertartelefono?id='.$id);
   }
 }
 
//Funcion que recibe los (Datos de Teléfonos del Facilitador), para realizar un nuevo ingreso.
 public function executeCreateTelefono(sfWebRequest $request)
 {
   $this->form = new TelefonosForm();
   $this->processFormTelefono($request, $this->form);
   $this->setTemplate('insertartelefono');
   //obtener el id que pertenece al identificador
   $id = $request->getParameter('id');
   //Realizar la consulta a la tabla telefonos referenciando el id y la enviamos al formulario insertartelefonoSuccess.php
   $this->telefonos = Doctrine_Core::getTable('Telefonos')->obtenerTelefonosPorFacilitador($id);
   $this->facilitador = Doctrine::getTable('Identificacion')->find($id);
 }

//Al recibir los (Datos de Teléfonos del Facilitador), los pasa a esta función que se encarga de almacenarlos en la Base de Datos.
  protected function processFormTelefono(sfWebRequest $request, sfForm $form)
  {
    $form->bind(
      $request->getParameter($form->getName()),
      $request->getFiles($form->getName())
    );

    if ($form->isValid())
    {
      $result = $form->save();
      $this->getUser()->setFlash('mensaje',sfConfig::get('app_mensaje_insertado'));
      $this->redirect('gestion/insertartelefono?id='.$request->getParameter('id'));
    }
  }

//Funcion que recibe los (Datos de Correo Electrónico del Facilitador), para realizar un nuevo ingreso.
public function executeCreateCorreo(sfWebRequest $request)
 {
   $this->form = new CorreosForm();
   $this->processFormCorreos($request, $this->form);
   $this->setTemplate('insertarcorreo');
   //obtener el id que pertenece al identificador
   $id = $request->getParameter('id');
   //Realizar la consulta a la tabla correos referenciando el id y la enviamos al formulario insertarcorreoSuccess.php
   $this->correos = Doctrine_Core::getTable('Correos')->obtenerCorreosPorFacilitador($id);
   $this->facilitador = Doctrine::getTable('Identificacion')->find($id);
 }

//Al recibir los (Datos de Correo Electrónico del Facilitador), los pasa a esta función que se encarga de almacenarlos en la Base de Datos.
  protected function processFormCorreos(sfWebRequest $request, sfForm $form)
  {
   $form->bind(

     $request->getParameter($form->getName()),
     $request->getFiles($form->getName())
   );

   if ($form->isValid())
   {
     $result = $form->save();
      $this->getUser()->setFlash('mensaje',sfConfig::get('app_mensaje_insertado'));
      $this->redirect('gestion/insertarcorreo?id='.$request->getParameter('id'));
   }
 }

//Funcion que recibe los (Datos de Areas Formación del Facilitador), para realizar un nuevo ingreso.
public function executeCreateAreasFormacionFacilitador(sfWebRequest $request)
 {
   $this->form = new AreasFormacionFacilitadorForm();
   $this->processAreasFormacionFacilitador($request, $this->form);
   $this->setTemplate('insertar_areas_formacion_facilitador');
   //obtener el id que pertenece al identificador
   $id = $request->getParameter('id');
   //Realizar la consulta a la tabla areas_formacion_facilitador referenciando el id y la enviamos al formulario insertar_areas_formacion_facilitadorSuccess.php
   $this->areas_formacion_facilitador = Doctrine_Core::getTable('AreasFormacionFacilitador')->obtenerAreasFormacionPorFacilitador($id);
   $this->facilitador = Doctrine::getTable('Identificacion')->find($id);
 }

//Al recibir los (Datos de Areas Formación del Facilitador), los pasa a esta función que se encarga de almacenarlos en la Base de Datos.
  protected function processAreasFormacionFacilitador(sfWebRequest $request, sfForm $form)
  {
   $form->bind(

     $request->getParameter($form->getName()),
     $request->getFiles($form->getName())
   );

   if ($form->isValid())
   {
     $result = $form->save();
     $id = $form->getObject()->id; 
     $bitacora= new BitacoraFormacionFacilitador();
     $bitacora->setIdAreaFormacionFacilitador($id);
     $bitacora->setFecha(date('Y-m-d'));
     $bitacora->save();
      $this->getUser()->setFlash('mensaje',sfConfig::get('app_mensaje_insertado'));
      $this->redirect('gestion/insertar_areas_formacion_facilitador?id='.$request->getParameter('id'));
   }
 }

//Funcion que recibe los (Datos de Nivel de Formación del Facilitador), para realizar un nuevo ingreso.
public function executeCreateNivelFormacionFacilitador(sfWebRequest $request)
 {
   $this->form = new NivelFormacionForm();
   $this->processNivelFormacionFacilitador($request, $this->form);
   $this->setTemplate('insertar_nivel_formacion_facilitador');
   //obtener el id que pertenece al identificador
   $id = $request->getParameter('id');
   //Realizar la consulta a la tabla nivel_formacion referenciando el id y la enviamos al formulario insertar_nivel_formacion_facilitadorSuccess.php
   $this->nivel_formacion_facilitador = Doctrine_Core::getTable('NivelFormacion')->obtenerNivelFormacionPorFacilitador($id);
   $this->facilitador = Doctrine::getTable('Identificacion')->find($id);
 }

//Al recibir los (Datos de Nivel de Formación del Facilitador), los pasa a esta función que se encarga de almacenarlos en la Base de Datos.
  protected function processNivelFormacionFacilitador(sfWebRequest $request, sfForm $form)
  {
   $form->bind(

     $request->getParameter($form->getName()),
     $request->getFiles($form->getName())
   );

   if ($form->isValid())
   {
     $result = $form->save();
      $this->getUser()->setFlash('mensaje',sfConfig::get('app_mensaje_insertado'));
      $this->redirect('gestion/insertar_nivel_formacion_facilitador?id='.$request->getParameter('id'));
   }
 }

//Funcion que recibe los (Datos de Profesión del Facilitador), para realizar un nuevo ingreso.
public function executeCreateProfesion(sfWebRequest $request)
 {
   $this->form = new ProfesionForm();
   $this->processProfesion($request, $this->form);
   $this->setTemplate('insertar_profesion');
   //obtener el id que pertenece al identificador
   $id = $request->getParameter('id');
   //Realizar la consulta a la tabla profesion referenciando el id y la enviamos al formulario insertar_profesionSuccess.php
   $this->profesion_facilitador = Doctrine_Core::getTable('Profesion')->obtenerProfesionPorFacilitador($id);
   $this->facilitador = Doctrine::getTable('Identificacion')->find($id);
 }

//Al recibir los (Datos de Profesión del Facilitador), los pasa a esta función que se encarga de almacenarlos en la Base de Datos.
  protected function processProfesion(sfWebRequest $request, sfForm $form)
  {
   $form->bind(

     $request->getParameter($form->getName()),
     $request->getFiles($form->getName())
   );

   if ($form->isValid())
   {
     $result = $form->save();
      $this->getUser()->setFlash('mensaje',sfConfig::get('app_mensaje_insertado'));
      $this->redirect('gestion/insertar_profesion?id='.$request->getParameter('id'));
   }
 }

//Funcion que recibe los (Datos de Ocupación del Facilitador), para realizar un nuevo ingreso.
public function executeCreateOcupacion(sfWebRequest $request)
 {
   $this->form = new OcupacionForm();
   $this->processOcupacion($request, $this->form);
   $this->setTemplate('insertar_ocupacion');
   //obtener el id que pertenece al identificador
   $id = $request->getParameter('id');
   //Realizar la consulta a la tabla ocupacion referenciando el id y la enviamos al formulario insertar_ocupacionSuccess.php
   $this->ocupacion_facilitador = Doctrine_Core::getTable('Ocupacion')->obtenerOcupacionPorFacilitador($id);
   $this->facilitador = Doctrine::getTable('Identificacion')->find($id);
 }

//Al recibir los (Datos de Ocupación del Facilitador), los pasa a esta función que se encarga de almacenarlos en la Base de Datos.
  protected function processOcupacion(sfWebRequest $request, sfForm $form)
  {
   $form->bind(

     $request->getParameter($form->getName()),
     $request->getFiles($form->getName())
   );

   if ($form->isValid())
   {
     $result = $form->save();
      $this->getUser()->setFlash('mensaje',sfConfig::get('app_mensaje_insertado'));
      $this->redirect('gestion/insertar_ocupacion?id='.$request->getParameter('id'));
   }
 }

//Funcion que recibe los (Datos de Turno Disponible del Facilitador), que se encarga de almacenarlos en la Base de Datos.
public function executeCreateTurnoDisponible(sfWebRequest $request)
 {
   $id = $request->getParameter('id');
   //Realiza el Borrado de la tabla DisponibilidadDias asignado al id del Facilitador
   Doctrine_Core::getTable('DisponibilidadDias')->eliminarDias($id);	
     
   $dias[] = $request->getParameter('lunes');
   $dias[] = $request->getParameter('martes');
   $dias[] = $request->getParameter('miercoles');
   $dias[] = $request->getParameter('jueves');
   $dias[] = $request->getParameter('viernes');
   $dias[] = $request->getParameter('sabado');
   $dias[] = $request->getParameter('domingo');
   $this->x = $dias;

   foreach($dias as $key=>$dia) {
       if(!empty($dia)) {
         $d = new DisponibilidadDias();
         $d->setIdIdentificacion($request->getParameter('id'));
         $d->setDia($key);
         $d->save();
       }
     foreach($dia as $t) {
       $turnos = new DisponibilidadTurnos();
       $turnos->setIdDisponibilidadDia($d->getId());
       $turnos->setTurno($t);
       $turnos->save();
     }
   }
   
   //Realizar la consulta a la tabla ocupacion referenciando el id y la enviamos al formulario insertar_ocupacionSuccess.php
   $this->facilitador = Doctrine::getTable('Identificacion')->find($id);
   
   $this->getUser()->setFlash('mensaje',sfConfig::get('app_mensaje_insertado'));
   $this->redirect('gestion/insertar_dias_turno?id='.$request->getParameter('id'));
}

//Funcion que recibe los (Datos de Disponbilidad Traslados del Facilitador), para realizar un nuevo ingreso.
public function executeCreateDisponibilidadtraslados(sfWebRequest $request)
 {
   $this->form = new DisponibilidadTrasladoEstadoForm();
   $this->processDisponibilidadTrasladoEstado($request, $this->form);
   $this->setTemplate('insertar_traslados');
   //obtener el id que pertenece al identificador
   $id = $request->getParameter('id');
   //Realizar la consulta a la tabla DisponibilidadTrasladoEstado referenciando el id y la enviamos al formulario insertar_trasladosSuccess.php
   $this->traslados_facilitador = Doctrine_Core::getTable('DisponibilidadTrasladoEstado')->obtenerDisponibilidadTraslado($id);
   $this->facilitador = Doctrine::getTable('Identificacion')->find($id);
 }

//Al recibir los (Datos de Disponbilidad Traslados del Facilitador), los pasa a esta función que se encarga de almacenarlos en la Base de Datos.
  protected function processDisponibilidadTrasladoEstado(sfWebRequest $request, sfForm $form)
  {
   $form->bind(

     $request->getParameter($form->getName()),
     $request->getFiles($form->getName())
   );

   if ($form->isValid())
   {
     $result = $form->save();
      $this->getUser()->setFlash('mensaje',sfConfig::get('app_mensaje_insertado'));
      $this->redirect('gestion/insertar_traslados?id='.$request->getParameter('id'));
   }
 }

//Funcion que recibe y consulta los (Datos de Facilitadores).
 public function executeBuscar(sfWebRequest $request)
 {
   $this->form = new IdentificacionBuscarForm();
   $this->buscarProcessForm($request, $this->form);
   $this->setTemplate('buscar');
   
   $this->areas = Doctrine::getTable('AreasFormacion')->getAreasFormacion();
 }

//Al recibir los (Datos de Facilitadores), los pasa a esta función que se encarga de enviarlos a la vista BuscarSuccess.
  protected function buscarProcessForm(sfWebRequest $request, sfForm $form)
  {
   $form->bind(
     $request->getParameter($form->getName()),
     $request->getFiles($form->getName())
   );

   if ($form->isValid())
   {
     $result = $form->save();
     $this->redirect('gestion/buscar');
   }
 }

//Funcion que consulta los (Datos de Facilitadores) detalladamente.
 public function executeDetalle(sfWebRequest $request)
 {
    $id = $request->getParameter('id');
    $this->facilitador = Doctrine::getTable('Identificacion')->find($id);
    
    $this->areasFormPorFacilitador = Doctrine::getTable('AreasFormacionFacilitador')->obtenerAreasFormacionPorFacilitador($id);
    
    $this->telefonos = Doctrine_Core::getTable('Telefonos')->obtenerTelefonosPorFacilitador($id);
    $this->correos = Doctrine_Core::getTable('Correos')->obtenerCorreosPorFacilitador($id);
    
    $this->form = new IdentificacionForm();
    $this->forward404Unless($this->facilitador);
 }

//Funcion que consulta los (Datos de Facilitadores) y los envia a la vista facilitadoresList.
  public function executeCargarFacilitadores(sfWebRequest $request)
  {
    if (!$request->isXmlHttpRequest())
      return $this->renderText('No hay registros');
  
    $cedula = $request->getParameter('cedula');
    $nombre = $request->getParameter('nombre');
    $apellido = $request->getParameter('apellido');
    $estado = $request->getParameter('estado');
    $municipio = $request->getParameter('municipio');
    $parroquia = $request->getParameter('parroquia');
    $estatus = $request->getParameter('estatus');
    $id = $request->getParameter('id');
    $area = $request->getParameter('area');

    if (strlen($id) > 0)
      Doctrine_Core::getTable('Identificacion')->eliminarFacilitador($id);

    $this->facilitadores = Doctrine_Core::getTable('Identificacion')->obtenerFacilitadores($cedula, $nombre, $apellido, $estado, $municipio, $parroquia, $estatus, $area);

    /*$cuantosFacilitadores = Doctrine_Core::getTable('Identificacion')->obtenerTotalFacilitadores($cedula, $nombre, $apellido, $estado, $municipio, $parroquia, $estatus, $area);*/

    return $this->renderPartial('gestion/facilitadoresList', array('facilitadores' => $this->facilitadores, 'cedula' => $cedula, 'nombre' => $nombre, 'apellido' => $apellido, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia, 'estatus' => $estatus, 'area' => $area,));
  }

//Funcion que consulta los (Municipios) y los envia a la vista municipiosList.
  public function executeCargarMunicipios(sfWebRequest $request)
  {
    $this->forwardUnless($query = $request->getParameter('query'), 'gestion', 'insertar');
  //$this->forwardUnless($query = $request->getParameter('query'), 'gestion', 'insertar_traslados');
    if('*' != $query){
      $this->municipios = Doctrine_Core::getTable('Municipio')->obtenerMunicipiosPorEstado($query);
    }
 
    if ($request->isXmlHttpRequest())
    {
      if ('*' == $query || !$this->municipios)
      {
        return $this->renderText('');
      }
      return $this->renderPartial('gestion/municipiosList', array('municipios' => $this->municipios));
    }
  }

//Funcion que consulta las (Parroquias) y los envia a la vista parroquiasList.
  public function executeCargarParroquias(sfWebRequest $request)
  {
   $this->forwardUnless($query = $request->getParameter('query'), 'gestion', 'insertar');

    if('*' != $query){
      $this->parroquias = Doctrine_Core::getTable('Parroquia')->obtenerParroquiaPorMunicipio($query);
    }
 
    if ($request->isXmlHttpRequest())
    {
      if ('*' == $query || !$this->parroquias)
      {
        return $this->renderText('');
      }
      return $this->renderPartial('gestion/parroquiasList', array('parroquias' => $this->parroquias));
    }
  }

//Funcion que consulta los (Municipios) y los envia a la vista parroquiasListTraslados.
public function executeCargarMunicipiosTraslados(sfWebRequest $request)
  {
    
    $this->forwardUnless($query = $request->getParameter('query'), 'gestion', 'insertar_traslados');
    
    if('*' != $query){
      $this->municipios = Doctrine_Core::getTable('Municipio')->obtenerMunicipiosPorEstado($query);
    }
 
    if ($request->isXmlHttpRequest())
    {
      if ('*' == $query || !$this->municipios)
      {
        return $this->renderText('');
      }
      return $this->renderPartial('gestion/municipiosListTraslados', array('municipios' => $this->municipios));
    }
  }

//Funcion que consulta las (Parroquias) y los envia a la vista parroquiasListTraslados.
public function executeCargarParroquiasTraslados(sfWebRequest $request)
  {
   $this->forwardUnless($query = $request->getParameter('query'), 'gestion',
'insertar_traslados');
       
    if('*' != $query){
      $this->parroquias = Doctrine_Core::getTable('Parroquia')->obtenerParroquiaPorMunicipio($query);
    }
 
    if ($request->isXmlHttpRequest())
    {
      if ('*' == $query || !$this->parroquias)
      {
        return $this->renderText('');
      }
      return $this->renderPartial('gestion/parroquiasListTraslados', array('parroquias' => $this->parroquias));
    }
  }

//Funcion que consulta los (Municipios) y los envia a la municipiosListEntes.  
public function executeCargarMunicipiosEntes(sfWebRequest $request)
  {
    
    $this->forwardUnless($query = $request->getParameter('query'), 'gestion','buscar_ente');
    
    if('*' != $query){
      $this->municipios = Doctrine_Core::getTable('Municipio')->obtenerMunicipiosPorEstado($query);
    }
 
    if ($request->isXmlHttpRequest())
    {
      {
        return $this->renderText('');
      }
      return $this->renderPartial('gestion/municipiosListEntes', array('municipios' => $this->municipios));
    }
  }

//Funcion que consulta las (Parroquias) y los envia a la vista parroquiasListEntes.
public function executeCargarParroquiasEntes(sfWebRequest $request)
  {
   $this->forwardUnless($query = $request->getParameter('query'), 'gestion','buscar_ente');
       
    if('*' != $query){
      $this->parroquias = Doctrine_Core::getTable('Parroquia')->obtenerParroquiaPorMunicipio($query);
    }
 
    if ($request->isXmlHttpRequest())
    {
      if ('*' == $query || !$this->parroquias)
      {
        return $this->renderText('');
      }
      return $this->renderPartial('gestion/parroquiasListEntes', array('parroquias' => $this->parroquias));
    }
  }
  
//Funcion que consulta los (Entes) y los envia a la vista entesList.
public function executeCargarNombreEntes(sfWebRequest $request)
  {
if (!$request->isXmlHttpRequest())
      return $this->renderText('No hay registros');
  
    $estado = $request->getParameter('idEstado');
    $municipio = $request->getParameter('idMunicipio');
    $parroquia = $request->getParameter('idParroquia');
    $this->entes=Doctrine_Core::getTable('Ente')->getEntesPorUbicacionGeografica($estado, $municipio,$parroquia);

  
    return $this->renderPartial('gestion/entesList', array('entes'=>$this->entes));  

}

//Función que se encarga de ingresar secciones al facilitador.
  public function executeAsignarSecciones(sfWebRequest $request)
  {
    
    $this->secciones = Doctrine_Core::getTable('Secciones')->getSeccionesForFacilitador($request->getParameter('id'));
    
    $this->asignados = Doctrine_Core::getTable('Secciones')->findBy('id_identificacion', $request->getParameter('id'));
  }

//Función que se encarga de actualizar secciones del Facilitador.
  public function executeAsignarSeccionesUpdate(sfWebRequest $request)
  {
    if($request->getParameter('seccion')=='' or $request->getParameter('id')=='') {
      $this->getUser()->setFlash('error', 'Todos los campos son requeridos');
      $this->redirect('gestion/asignarSecciones?id='.$request->getParameter('id'));
    }
    
    $seccion = Doctrine_Core::getTable('Secciones')->find($request->getParameter('seccion'));
    $seccion->setIdIdentificacion($request->getParameter('id'));
    $seccion->save();
    
    $bitacora = new BitacoraSecciones();
    $bitacora->setIdSecciones($seccion->getId());
    $bitacora->setIdIdentificacion($request->getParameter('id'));
    $bitacora->setFecha(date("Y-m-d"));
    $bitacora->save();    
    $this->getUser()->setFlash('mensaje', '¡Registro asignado con exito!');
    $this->redirect('gestion/asignarSecciones?id='.$request->getParameter('id'));
    
  }

}
