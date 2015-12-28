 <!--
Document / Documento: insertar_profesionSuccess del Módulo Gestión 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Ingresar datos básicos del facilitador.	
-->
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('principal/index'); ?>'">Ir al menú Principal</button>
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('gestion/index'); ?>'">Regresar</button>
<br/><br/>
<div id="sf_gmstv_container">
  <h1>Datos Básicos del Facilitador</h1> 
<?php if (empty($id)): ?>
<form id="identificacion" action="<?php echo url_for('gestion/create'); ?>" method="post">
<?php else: ?>
<form id="identificacion" action="<?php echo url_for('gestion/update?id='.$form->getObject()->getId()); ?>" method="post">
<?php endif; ?>
<table style="border: 0">
<tr>
  <th style="text-align:right; height: 30px"><?php echo $form['nombre']->renderLabel(); ?></th>
  <td><?php echo $form['nombre']->render(); ?></td>
  <td style="text-align:left; height: 30px"><?php echo $form['nombre']->renderError(); ?></td>
</tr>
<tr>
  <th style="text-align:right; height: 30px"><?php echo $form['apellido']->renderLabel(); ?></th>
  <td><?php echo $form['apellido']->render(); ?></td>
  <td style="text-align:left; height: 30px"><?php echo $form['apellido']->renderError(); ?></td>
</tr>
<tr>
  <th style="text-align:right; height: 30px"><?php echo $form['cedula_pasaporte']->renderLabel(); ?></th>
  <td><?php echo $form['cedula_pasaporte']->render(); ?></td>
  <td style="text-align:left; height: 30px"><?php echo $form['cedula_pasaporte']->renderError(); ?></td>
</tr>
<tr>
  <th style="text-align:right; height: 30px"><?php echo $form['nacionalidad']->renderLabel(); ?></th>
  <td><?php echo $form['nacionalidad']->render(); ?></td>
  <td style="text-align:left; height: 30px"><?php echo $form['nacionalidad']->renderError(); ?></td>
</tr>
<tr>
  <th style="text-align:right; height: 30px"><?php echo $form['direccion']->renderLabel(); ?></th>
  <td><?php echo $form['direccion']->render(); ?></td>
  <td style="text-align:left; height: 30px"><?php echo $form['direccion']->renderError(); ?></td>
</tr>
<tr>
  <th style="text-align:right; height: 30px"><?php echo $form['sector']->renderLabel(); ?></th>
  <td><?php echo $form['sector']->render(); ?></td>
  <td style="text-align:left; height: 30px"><?php echo $form['sector']->renderError(); ?></td>
</tr>
<tr>
  <th style="text-align:right; height: 30px"><?php echo $form['situacion_laboral']->renderLabel(); ?></th>
  <td><?php echo $form['situacion_laboral']->render(); ?></td>
  <td style="text-align:left; height: 30px"><?php echo $form['situacion_laboral']->renderError(); ?></td>
</tr>
<tr>
  <th style="text-align:right; height: 30px"><?php echo $form['formacion_politica']->renderLabel(); ?></th>
  <td><?php echo $form['formacion_politica']->render(); ?></td>
  <td style="text-align:left; height: 30px"><?php echo $form['formacion_politica']->renderError(); ?></td>
</tr>
<tr>
  <th style="text-align:right; height: 30px"><?php echo $form['id_estado']->renderLabel(); ?></th>
  <td><?php echo $form['id_estado']->render(); ?></td>
  <td style="text-align:left; height: 30px"><?php echo $form['id_estado']->renderError(); ?></td>
</tr>
<tr>
  <th style="text-align:right; height: 30px"><?php echo $form['id_municipio']->renderLabel(); ?></th>
  <td id="td_municipio"><?php echo $form['id_municipio']->render(); ?></td>
  <td style="text-align:left; height: 30px"><?php echo $form['id_municipio']->renderError(); ?></td>
</tr>
<tr>
  <th style="text-align:right; height: 30px"><?php echo $form['id_parroquia']->renderLabel(); ?></th>
  <td id="td_parroquia"><?php echo $form['id_parroquia']->render(); ?></td>
  <td style="text-align:left; height: 30px"><?php echo $form['id_parroquia']->renderError(); ?></td>
</tr>
</table>
<input type="hidden" name="identificacion[habilitado]" id="identificacion_habilitado" value="true">
<?php echo $form->renderHiddenFields(); ?>
<?php echo $form->renderGlobalErrors(); ?>
<?php if (empty($id)): ?>
<input type="submit" value="Insertar">
<br>
<br>
<?php else: ?>
<input type="hidden" id="municipio" value="<?php echo $form->getObject()->getIdMunicipio(); ?>" >
<input type="hidden" id="parroquia" value="<?php echo $form->getObject()->getIdParroquia(); ?>" >
<input type="submit" value="Modificar">
<br>
<br>
<?php endif; ?>
</form>
