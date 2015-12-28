<!--
Document / Documento: buscar_enteSuccess del Módulo Gestión 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Realizar una búsqueda de secciones por:
	1.1- Nombre Sección
	1.2- Estado
	1.3- Municipio
	1.4- Parroquia
	1.5- Ente
	1.6- Areas de formación	
-->
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('principal/index'); ?>'">Ir al menú Principal</button>
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('gestion/index'); ?>'">Regresar</button>
<br>
<form action="<?php echo url_for('gestion/buscar_ente'); ?>" method="post">
<h1>Búsqueda de Secciones</h1>
  <table style="border: 0">
    
    <tr>
      <th style="text-align:right; height: 30px">
      Nombre Sección
      </th>
     <td>
<input type="text" id="nombre_seccion" name="nombre_seccion">
    </td>
	  </tr>
    <tr>
      <th style="text-align:right; height: 30px"><?php echo $form['id_estado']->renderLabel(); ?></th>
      <td><?php echo $form['id_estado']->render(); ?></td>
	<td><input id="estado" value="" type="hidden"></td>
      </tr>
    <tr>
      <th style="text-align:right; height: 30px"><?php echo $form['id_municipio']->renderLabel(); ?>
    </th>
      <th id="td_municipio_entes"></th>
      <td><input id="municipio" value="" type="hidden"></td>
    </tr>

    <tr>
      <th style="text-align:right; height: 30px"><?php echo $form['id_parroquia']->renderLabel(); ?></th>
	<th id="td_parroquia_entes"></th>
   <td><input id="parroquia" value="" type="hidden"></td>  
    </tr>
    <tr>
      <th style="text-align:right; height: 30px">Ente</th>
      <td id="td_nombre_entes">
        
      </td>
      <td><input id="enteSeccion" value="" type="hidden"></td>
       </tr>
    <tr>
      <th style="text-align:right; height: 30px">Areas de Formacion</th>
      <td>
        <select id="areas">
          <option value=""></option>
          <?php foreach($areas as $af): ?>
          <option value="<?php echo $af->getId(); ?>"><?php echo $af->getNombreArea(); ?></option>
          <?php endforeach; ?>
        </select>
      </td>
      <td><input id="areaFormacion" value="" type="hidden"></td>
    </tr>
<input type="hidden" id="entes_mun" value="<?php echo url_for("gestion/cargarMunicipiosEntes")?>">
<input type="hidden" id="entes_par" value="<?php echo url_for("gestion/cargarParroquiasEntes")?>">
<input type="hidden" id="nombre_ente" value="<?php echo url_for("gestion/cargarNombreEntes")?>">
    </table>
<input type="submit" onclick="cargarSecciones($('#estado').val(), $('#municipio').val(), $('#parroquia').val(), $('#enteSeccion').val(), $('#areaFormacion').val(),''); return false;" value="Consultar">
<?php echo $form->renderHiddenFields(); ?>
</form>
<br>
<div id="seccionesConsultados"></div>

