<!--
Document / Documento: porEnteSuccess del Módulo Estadística 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Generar las estadísticas por Gráfico de Barras ó Circular de la cantidad de facilitadores por Estado y Área de Formación.
!-->
<button class="home" onclick="javascript:parent.location='<?php echo url_for('principal/index'); ?>'">Ir al menú Principal</button>
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('estadisticas/index'); ?>'">Regresar</button>

<div id="dialog-confirm" title="Seleccione el Estado y el Área de Formación" style="display: none; min-height: 100px;">
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Seleccione el Estatus</p>
</div>

<br>
<br>
<div id="sf_gmstv_container">
  <h1>Estadísticas - Entes</h1>
  
<form action="<?php echo url_for('estadisticas/porEnte')?>" method="post">
  <table style="border: 0">
    <tr>
     <th style="text-align:right; height: 30px">Estado:&nbsp</th>
      <td>
        <select id="estado" name="estado">
          <option value=""></option>
          <?php foreach($estados as $es): ?>
          <option value="<?php echo $es->getId(); ?>"><?php echo $es->getNombreEstado(); ?></option>
          <?php endforeach; ?>
        </select>
      </td>
     <td>&nbsp</td>
     <th style="text-align:right; height: 30px">Área de Formación:&nbsp</th>
      <td>
        <select id="area_formacion" name="area_formacion">
          <option value=""></option>
          <?php foreach($areasformacion as $af): ?>
          <option value="<?php echo $af->getId(); ?>"><?php echo $af->getNombreArea(); ?></option>
          <?php endforeach; ?>
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
  $estatusValor = 3;
  if (isset($estatusValor)) {
     stOfc::createChart('90%', 450, "@graficos_estadisticas?opcion=3&estatus=$estatusValor&tipografico=$tipo_grafico&estado=$estadoValor&area_formacion=$areaformacionValor", false);
  }
  ?>
</P>
</div>
