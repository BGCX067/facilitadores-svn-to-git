<!--
Document / Documento: porEstadoSuccess del Módulo Estadística 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Generar las estadísticas por Gráfico de Barras ó Circular de la cantidad de facilitadores en Estatus de:
	1.1- En formacion
	1.2- Formado
	1.3- Convocado
	1.4- Activo
	1.5- Inactivo	
!-->
<button class="home" onclick="javascript:parent.location='<?php echo url_for('principal/index'); ?>'">Ir al menú Principal</button>
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('estadisticas/index'); ?>'">Regresar</button>

<div id="dialog-confirm" title="Seleccione el Estatus del facilitador" style="display: none; min-height: 100px;">
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Seleccione el Estatus</p>
</div>

<br>
<br>
<div id="sf_gmstv_container">
  <h1>Estadísticas - Estados</h1>
  
<form action="<?php echo url_for('estadisticas/porEstado')?>" method="post">
  <table style="border: 0">
    <tr>
      <th style="text-align:right; height: 30px">Estatus</th>
      <td>
        <select id="estatus" name="estatus">
          <option value=""></option>
          <option value="0">En Formacion</option>
          <option value="1">Formado</option>
          <option value="2">Convocado</option>
          <option value="3">Activo</option>
          <option value="4">Inactivo</option>
        </select>
      </td>
     <td>&nbsp</td>
     <td>
       <th style="text-align:right; height: 30px">
       <input type="radio" name="tipo" value="barra" checked>Gráfico de Barras</th>
    </td>
    <td>&nbsp</td>
    <td>   
       <th style="text-align:right; height: 30px">
       <input type="radio" name="tipo" value="circular">Gráfico Circular</th>
    </td>
  </table>
  <input type="submit" value="Generar Grafico">
</form>
<br>
<br>
<P>
  <?php
  $e = 'todos';
  $a = 'todas';
  if (isset($estatusValor)) {
     stOfc::createChart('90%', 450, "@graficos_estadisticas?opcion=1&estatus=$estatusValor&tipografico=$tipo_grafico&estado=$e&area_formacion=$a", false);
  }
  ?>
</P>
</div>
