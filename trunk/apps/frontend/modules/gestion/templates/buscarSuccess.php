<!--
Document / Documento: buscarSuccess del Módulo Gestión 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Realizar una búsqueda de facilitadores por:
	1.1- Nombre
	1.2- Apellido
	1.3- Cedula pasaporte
	1.4- Estado
	1.5- Municipio
	1.6- Parroquia
	1.7- Areas de formacion
	1.8- Estatus	
-->
<button class="home" onclick="javascript:parent.location='<?php echo url_for('principal/index'); ?>'">Ir al menú Principal</button>
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('gestion/index'); ?>'">Regresar</button>
<br/><br/>
<div id="dialog-confirm" title="Eliminar Facilitador" style="display: none; min-height: 100px;">
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>¿Esta seguro de eliminar al Facilitador?</p>
</div>

<div id="sf_gmstv_container">
  <h1>Consultar Facilitadores</h1> 
<form action="<?php echo url_for('gestion/buscar'); ?>" method="post">
  <table style="border: 0">
    <tr>
      <th style="text-align:right;"><?php echo $form['nombre']->renderLabel(); ?></th>
      <td><?php echo $form['nombre']->render(); ?></td>
      <td></td>
    </tr>
    <tr>
      <th style="text-align:right; "><?php echo $form['apellido']->renderLabel(); ?></th>
      <td><?php echo $form['apellido']->render(); ?></td>
      <td></td>
    </tr>
    <tr>
      <th style="text-align:right; "><?php echo $form['cedula_pasaporte']->renderLabel(); ?></th>
      <td><?php echo $form['cedula_pasaporte']->render(); ?></td>
      <td></td>
    </tr>
    <tr>
      <th style="text-align:right; "><?php echo $form['id_estado']->renderLabel(); ?></th>
      <td><?php echo $form['id_estado']->render(); ?></td>
      <td><input id="estado" value="" type="hidden"></td>
    </tr>
    <tr>
      <th style="text-align:right; "><?php echo $form['id_municipio']->renderLabel(); ?></th>
      <td id="td_municipio"></td>
      <td><input id="municipio" value="" type="hidden"></td>
    </tr>
    <tr>
      <th style="text-align:right; "><?php echo $form['id_parroquia']->renderLabel(); ?></th>
      <td id="td_parroquia"></td>
      <td><input id="parroquia" value="" type="hidden"></td>
    </tr>
    <tr>
      <th style="text-align:right; "><label>Areas de Formación</label></th>
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
    <tr>
      <th style="text-align:right; "><?php echo $form['estatus']->renderLabel(); ?></th>
      <td>
        <?php echo $form['estatus']->render(); ?>
      </td>
      <td><input id="estatusAreaFormacion" value="" type="hidden"></td>
    </tr>
  </table>
  <input id="identificacion_id" type="hidden" value="">
<input type="submit" onclick="cargarFacilitadores($('#estado').val(), $('#municipio').val(), $('#parroquia').val(), $('#estatusAreaFormacion').val(), $('#areaFormacion').val(),''); return false;" value="Consultar">
<?php echo $form->renderHiddenFields(); ?>
</form>
<br>
<br>
<form action="<?php echo url_for('gestion/modificar'); ?>" method="post">
    <div id="facilitadoresConsultados"></div>
</form>
</div>
