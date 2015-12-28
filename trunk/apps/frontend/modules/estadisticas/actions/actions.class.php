<!--
Document / Documento: action.class del Módulo Estadísticas 

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
class estadisticasActions extends sfActions

{

//Función que invoca a la vista (indexSuccess) del Módulo Estadísticas
public function executeIndex(sfWebRequest $request)
  {
  }

//Función que invoca a la vista (porEstadoSuccess) del Módulo Estadísticas
  public function executePorEstado(sfWebRequest $request)
  {
    $this->estatusValor = $request->getParameter('estatus');
    $this->tipo_grafico = $request->getParameter('tipo');
  }

//Función que invoca a la vista (porEspecialidadSuccess) del Módulo Estadísticas
  public function executePorEspecialidad(sfWebRequest $request)
  {
    $this->estados = Doctrine_Core::getTable('Estado')->getEstados();
    $this->estatusValor = $request->getParameter('estatus');
    $this->tipo_grafico = $request->getParameter('tipo');
    $this->estadoValor = $request->getParameter('estado');
  }

//Función que invoca a la vista (porEnteSuccess) del Módulo Estadísticas
  public function executePorEnte(sfWebRequest $request)
  {
    $this->estados = Doctrine_Core::getTable('Estado')->getEstados();
    $this->areasformacion = Doctrine_Core::getTable('AreasFormacion')->getAreasFormacion();
    $this->tipo_grafico = $request->getParameter('tipo');
    $this->estadoValor = $request->getParameter('estado');
    $this->areaformacionValor = $request->getParameter('area_formacion');
  }

//Función que invoca a la vista de Estado, Especialidad y entes las Estadísticas de los Gráficos.  
 public function executeGraficos(sfWebRequest $request)
  {
    $estatus = $request->getParameter('estatus');
    $tipo = $request->getParameter('tipografico');
    $opcion = $request->getParameter('opcion');
    $estado = $request->getParameter('estado');
    $area_formacion = $request->getParameter('area_formacion');
    echo $estatus;
    echo $tipo;
    echo $opcion;
    echo $estado;
    echo $area_formacion;
    $eje_x = array();
    $porcentajes = array();
    if ($opcion == 1){
       $porcentaje_referencia = Doctrine_Core::getTable('Identificacion')->obtenerEstPorEstados($estatus, "");
    }
    if ($opcion == 2){
       $porcentaje_referencia = Doctrine_Core::getTable('Identificacion')->obtenerEstPorEspecialidad($estado, $estatus);
    }
    if ($opcion == 3){
       $porcentaje_referencia = Doctrine_Core::getTable('Identificacion')->obtenerEstPorEntes($estado, $estatus, $area_formacion);
    }
    foreach ($porcentaje_referencia as $referencia=>$porcentaje){
            $eje_x[] = $referencia;
            $porcentajes[] = $porcentaje;
    }
    if ($tipo == 'barra'){
       $bar = new stBarOutline( 80, '#78B9EC', '#3495FE' );
       $bar->key( 'Porcentaje por Estado', 10 );
    
       //Passing the estados data to bar chart
       $bar->data = $porcentajes;
 
       //Creating a stGraph object
       $g = new stGraph();
       $g->title( '% Facilitadores por Estados', '{font-size: 20px;}' );
       $g->bg_colour = '#E4F5FC';
       $g->set_inner_background( '#E3F0FD', '#CBD7E6', 150 );
       $g->x_axis_colour( '#8499A4', '#E4F5FC' );
       $g->y_axis_colour( '#8499A4', '#E4F5FC' );
 
       //Pass stBarOutline object i.e. $bar to graph
       $g->data_sets[] = $bar;
 
       //Setting labels for X-Axis
       $g->set_x_labels($eje_x);
       // to set the format of labels on x-axis e.g. font, color, step
       $g->set_x_label_style( 10, '#18A6FF', 1 );
 
       // To tick the values on x-axis
       // 2 means tick every 2nd value
       $g->set_x_axis_steps( 1 );
 
       //set maximum value for y-axis
       //we can fix the value as 20, 10 etc.
       //but its better to use max of data
       $g->set_y_max( max($porcentajes) );
       $g->y_label_steps( 10 );
       $g->set_y_legend( 'Porcentaje', 12, '#18A6FF' );
       echo $g->render();
 
       return sfView::NONE;
    }
    if ($opcion == 'circular'){
        //Creating a stGraph object
        $g = new stGraph();

        //set background color
        $g->bg_colour = '#E4F5FC';

        //Set the transparency, line colour to separate each slice etc.
        $g->pie(80,'#78B9EC','{font-size: 12px; color: #78B9EC;');

        //array two arrray one containing data while other contaning labels

        $g->pie_values($porcentaje,$eje_x);
        //Set the colour for each slice. Here we are defining three colours
        //while we need 7 colours. So, the same colours will be
        //repeated for the all remaining slices in the same order
        $g->pie_slice_colours( array('#d01f3c','#356aa0','#c79810') );

        //To display value as tool tip
        $g->set_tool_tip( '#val#%' );

        $g->title( '% de Facilitadores por Estado', '{font-size:18px; color: #18A6FF}' );
        echo $g->render();

        return sfView::NONE;
    }

}

//Función que invoca a la vista de Estado, Especialidad y entes las Estadísticas de los Gráficos.
public function executeGraficoLinea()
{
  $chartData = array();
  for( $i = 0; $i < 25; $i++ )
  {
    $chartData[] = rand(0, 50);
  }
 
  //Create new stGraph object
  $g = new stGraph();
 
  // Chart Title
  $g->title( '% de Facilitadores por Estado', '{font-size: 20px;}' );
  $g->bg_colour = '#E4F5FC';
  $g->set_inner_background( '#E3F0FD', '#CBD7E6', 90 );
  $g->x_axis_colour( '#8499A4', '#E4F5FC' );
  $g->y_axis_colour( '#8499A4', '#E4F5FC' );
 
  //Use line_dot to set line dots diameter, text, color etc.
  $g->line_dot(2, 3, '#3495FE', 'Porcentaje de facilitadores por Estado', 10);
 
  //In case of line chart data should be passed to stGraph object
  //unsing set_data
  $g->set_data( $chartData );
 
  //Setting labels for X-Axis
  $estados = Doctrine_Core::getTable('Estado')->getEstados();
  foreach ($estados as $e){
      $lista_estados[] = $e->getNombreEstado();
  }
  $g->set_x_labels($lista_estados);
  //to set the format of labels on x-axis e.g. font, color, step
  $g->set_x_label_style( 10, '#18A6FF', 1, 1 );

  //set maximum value for y-axis
  //we can fix the value as 20, 10 etc.
  //but its better to use max of data
  $g->set_y_max( max($chartData) );
 
  $g->y_label_steps( 10 );
 
  // display the data
  echo $g->render();
 
  echo $g->render();
 
  return sfView::NONE;
}



}
