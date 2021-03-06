<!--
Document / Documento: IdentificacionTable.class

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Obtiene Identificacion.
2- Obtiene Estadisticas Por Especialidad.
3- Obtiene Estadisticas Por Estado.
4- Realiza calculo de Estadisticas por Estados.
5- Realiza calculo de Estadisticas por Especialidades.
6- Realiza calculo de Estadisticas por Ente.
7- Obtiene Estadisticas Por Ente.
8- Obtiene Cantidad Facilitadores por Especialidad.
9- Obtiene Cantidad Facilitadores por Ente.
10- Obtiene Facilitadores por cedula, nombre, apellido......
11- Obtiene Total Facilitadores por cedula, nombre, apellido......
12- Obtiene Facilitadores Compatibles por estado, municipio, area.
13- Elimina Facilitadores.
14- Obtiene Facilitadores por seccion.
-->
<?php

/**
 * IdentificacionTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class IdentificacionTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object IdentificacionTable
     */
//Función que Obtiene Identificacion.
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Identificacion');
    }
//Función que Obtiene Estadisticas Por Especialidad.
    public function obtenerEstadisticasPorEspecialidad($estado, $estatus, $area)
    {
        $cantFacPorEstadoEspc = $this->getInstance()->obtenerCantFacilitadorePorEsp($estado, $estatus, $area);
        $cantFacPorEstado = $this->getInstance()->obtenerCantFacilitadorePorEsp($estado, $estatus, "");
        
        if ($cantFacPorEstado == 0)
          $cantFacPorEstado = 1;
        
        return number_format( ($cantFacPorEstadoEspc / $cantFacPorEstado) * 100 , 2 );
    }
//Función que Obtiene Estadisticas Por Estado 
    public function obtenerEstadisticasPorEstado($estado, $estatus, $area)
    {
        $cantFacPorEstadoEspc = $this->getInstance()->obtenerCantFacilitadorePorEsp($estado, $estatus, $area);
        $cantFacPorEstado = $this->getInstance()->obtenerCantFacilitadorePorEsp("", $estatus, $area);
        
        if ($cantFacPorEstado == 0)
          $cantFacPorEstado = 1;
        
        return number_format( ($cantFacPorEstadoEspc / $cantFacPorEstado) * 100 , 2 );
    }

//Función que realiza calculo de Estadisticas por Estados
    public function obtenerEstPorEstados($estatus, $area)
    {
        $estados = Doctrine_Core::getTable('Estado')->getEstados();
        
        $estadisticas = array();
        foreach($estados as $estado)
        {
          $porcFacPorEstado = $this->obtenerEstadisticasPorEstado($estado->getId(), $estatus, $area);
          $estadisticas[$estado->getNombreEstado()] = $porcFacPorEstado;
        }
        
        return $estadisticas;
    }
    
//Función que realiza calculo de Estadisticas por Especialidades
    public function obtenerEstPorEspecialidad($estado, $estatus)
    {
        $areas = Doctrine_Core::getTable('AreasFormacion')->getAreasFormacion();
        
        $estadisticas = array();
        foreach($areas as $areaActual)
        {
          $porcFacPorArea = $this->obtenerEstadisticasPorEspecialidad($estado, $estatus, $areaActual->getId());
          $estadisticas[$areaActual->getNombreArea()] = $porcFacPorArea;
        }
        
        return $estadisticas;
    }
    
//Función que realiza calculo de Estadisticas por Ente
    public function obtenerEstPorEntes($estado, $estatus, $area)
    {
        if (strlen($estado) > 0)
          $entes = Doctrine_Core::getTable('Ente')->getEntesPorEstado($estado);
        else
          $entes = Doctrine_Core::getTable('Ente')->getEntes();
        
        $estadisticas = array();
        foreach($entes as $enteActual)
        {
          $porcFacPorEnte = $this->obtenerEstadisticasPorEnte($estado, $estatus, $area, $enteActual->getId());
          $estadisticas[$enteActual->getNombreEnte()] = $porcFacPorEnte;
        }
        
        return $estadisticas;
    }
//Función que obtiene Estadisticas Por Ente.
    public function obtenerEstadisticasPorEnte($estado, $estatus, $area, $ente)
    {
        $cantFacPorEstadoEnte = $this->getInstance()->obtenerCantFacilitadorePorEnte($estado, $estatus, $area, $ente);
        $cantFacPorEstado = $this->getInstance()->obtenerCantFacilitadorePorEnte($estado, $estatus, $area, "");
        
        if ($cantFacPorEstado == 0)
          $cantFacPorEstado = 1;
        
        return number_format( ($cantFacPorEstadoEnte / $cantFacPorEstado) * 100 , 2 );
    }
//Función que obtiene Cantidad Facilitadores por Especialidad
    public static function obtenerCantFacilitadorePorEsp($estado, $estatus, $area)
    {
        $w = "i.habilitado = true";
        if (strlen($estado) > 0)
          $w = $w. " and i.id_estado = $estado";
            
        if (strlen($estatus) > 0 && strlen($area) == 0)
          $w = $w. " and aff.estatus = $estatus";
        
        if (strlen($estatus) == 0 && strlen($area) > 0)
          $w = $w. " and aff.id_area_formacion = $area";
        
        if (strlen($estatus) > 0 && strlen($area) > 0)
          $w = $w. " and aff.estatus = $estatus and aff.id_area_formacion = $area";
        
        $q = Doctrine_Core::getTable('Identificacion')->createQuery("SELECT i FROM Identificacion i JOIN i.AreasFormacionFacilitador aff")->where($w);
        
        return $q->count();
    }
//Función que obtiene Cantidad Facilitadores por Ente
    public static function obtenerCantFacilitadorePorEnte($estado, $estatus, $area, $ente)
    {
        $w = "i.habilitado = true";
        if (strlen($estado) > 0)
          $w = $w. " and en.id_estado = $estado";
            
        if (strlen($estatus) > 0)
          $w = $w. " and aff.estatus = $estatus";
        else
          $w = $w. " and aff.estatus != 0";
        
        if (strlen($area) > 0)
          $w = $w. " and aff.id_area_formacion = $area";
        
        if (strlen($ente) > 0)
          $w = $w. " and sec.id_ente = $ente";
        
        if (strlen($estado) > 0)
        {
          $q = Doctrine_Core::getTable('Identificacion')->createQuery("SELECT i FROM Identificacion i")
            ->leftJoin("i.Secciones sec")
            ->leftJoin("i.Secciones.Ente en")
            ->leftJoin("i.AreasFormacionFacilitador aff")
            ->where($w);
        }
        
        else
        {
          $q = Doctrine_Core::getTable('Identificacion')->createQuery("SELECT i FROM Identificacion i")
             ->leftJoin("i.Secciones sec")
              ->leftJoin("i.AreasFormacionFacilitador aff")
             ->where($w);
        }
        
        return $q->count();
    }
//Función que Obtiene Facilitadores por cedula, nombre, apellido......
    public static function obtenerFacilitadores($cedula, $nombre, $apellido, $estado, $municipio, $parroquia, $estatus, $area)
    {
        $w = "";
        if (strlen($cedula) > 0)
          $w = $w. " and i.cedula_pasaporte like '%$cedula%'";

        if (strlen($nombre) > 0)
        {
          $nombre = strtolower($nombre);
          $w = $w. " and lower(i.nombre) like '%$nombre%'";
        }

        if (strlen($apellido) > 0)
        {
          $apellido = strtolower($apellido);
          $w = $w. " and lower(i.apellido) like '%$apellido%'";
        }

        if (strlen($estado) > 0)
          $w = $w. " and i.id_estado = $estado";

        if (strlen($municipio) > 0)
          $w = $w. " and i.id_municipio = $municipio";

        if (strlen($parroquia) > 0)
          $w = $w. " and i.id_parroquia = $parroquia";
            
        if (strlen($estatus) > 0 && strlen($area) == 0)
          $w = $w. " and aff.estatus = $estatus";
        
        if (strlen($estatus) == 0 && strlen($area) > 0)
          $w = $w. " and aff.id_area_formacion = $area";
        
        if (strlen($estatus) > 0 && strlen($area) > 0)
          $w = $w. " and aff.estatus = $estatus and aff.id_area_formacion = $area";
        
        $q = Doctrine_Core::getTable('Identificacion')->createQuery("SELECT i FROM Identificacion i JOIN i.AreasFormacionFacilitador aff")->where("i.habilitado = true" . $w);
        
        return $q->execute();
    }
//Función que Obtiene Total Facilitadores por cedula, nombre, apellido......   
    public static function obtenerTotalFacilitadores($cedula, $nombre, $apellido, $estado, $municipio, $parroquia, $estatus, $area)
    {
        $w = "";
        if (strlen($cedula) > 0)
          $w = $w. " and i.cedula_pasaporte like '%$cedula%'";

        if (strlen($nombre) > 0)
        {
          $nombre = strtolower($nombre);
          $w = $w. " and lower(i.nombre) like '%$nombre%'";
        }

        if (strlen($apellido) > 0)
        {
          $apellido = strtolower($apellido);
          $w = $w. " and lower(i.apellido) like '%$apellido%'";
        }

        if (strlen($estado) > 0)
          $w = $w. " and i.id_estado = $estado";

        if (strlen($municipio) > 0)
          $w = $w. " and i.id_municipio = $municipio";

        if (strlen($parroquia) > 0)
          $w = $w. " and i.id_parroquia = $parroquia";
            
        if (strlen($estatus) > 0 && strlen($area) == 0)
          $w = $w. " and aff.estatus = $estatus";
        
        if (strlen($estatus) == 0 && strlen($area) > 0)
          $w = $w. " and aff.id_area_formacion = $area";
        
        if (strlen($estatus) > 0 && strlen($area) > 0)
          $w = $w. " and aff.estatus = $estatus and aff.id_area_formacion = $area";
        
        $q = Doctrine_Core::getTable('Identificacion')->createQuery("SELECT i FROM Identificacion i JOIN i.AreasFormacionFacilitador aff")->where("i.habilitado = true" . $w);
        
        return $q->count();
    }
//Función que Obtiene Facilitadores Compatibles por estado, municipio, area.
    public static function obtenerFacilitadoresCompatibles($estado, $municipio, $area)
    {
        $w = "i.habilitado = true and aff.estatus != 0";

        if (strlen($estado) > 0)
          $w = $w. " and dte.id_estado = $estado";

        if (strlen($municipio) > 0)
          $w = $w. " and dte.id_municipio = $municipio";
        
        if (strlen($area) > 0)
          $w = $w. " and aff.id_area_formacion = $area";
        
        $q = Doctrine_Core::getTable('Identificacion')->createQuery("SELECT i FROM Identificacion i")
	    ->leftJoin("i.AreasFormacionFacilitador aff")
	    ->leftJoin("i.DisponibilidadTrasladoEstado dte")
	    ->where($w);
        
        return $q->execute();
    }
//Función que eliminar Facilitadores.
    public static function eliminarFacilitador($id)
    {
      Doctrine_Query::create()->update('Identificacion i')
        ->set('i.habilitado', '?', false)
        ->where('i.id = ?', $id)
        ->execute();
    }


/*
select * from identificacion i, secciones s, ente e, disponibilidad_traslado_estado d, areas_formacion_facilitador af  where s.id='1' and (i.id=s.id_identificacion or s.id_identificacion is null)  and s.id_ente=e.id and 
((e.id_estado=d.id_estado and e.id_municipio=d.id_municipio) or (e.id_estado=i.id_estado and e.id_municipio=i.id_municipio)) and s.id_area_formacion=af.id_area_formacion and af.id_area_formacion=1
*/
//Función que obtiene Facilitadores por seccion.
 public function obtenerSeccionesFacilitador($id_seccion){
      $query = Doctrine_Query::create()
              ->select('i.*')
              ->from("identificacion as i, secciones as se, ente as e, DisponibilidadTrasladoEstado as d, AreasFormacionFacilitador af")
              ->where("(se.id = '$id_seccion')")              
              ->andWhere("(se.id_identificacion is NULL or se.id_identificacion != i.id)")
              ->andWhere("(se.id_ente = e.id)")
              ->andWhere("((e.id_estado=d.id_estado and e.id_municipio=d.id_municipio) or (e.id_estado=i.id_estado and e.id_municipio=i.id_municipio))")
              ->andWhere("(se.id_area_formacion = af.id_area_formacion)")
              ->andWhere("af.id_identificacion = i.id")
              ->orderBy('i.cedula_pasaporte asc');
      return $query->execute();
    }

}
