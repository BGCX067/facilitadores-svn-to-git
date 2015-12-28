 <!--
Document / Documento: insertarcorreoSuccess del Módulo Gestión 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Ingresar correo electronico para ser asignadas al facilitador.
2- Eliminar correo electronico.	
-->
<?php $id=($sf_params->get ('id')) ?> 
<!--<button class="home" onclick="javascript:parent.location='<?php echo url_for('principal/index'); ?>'">Ir al menú Principal</button>-->
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('gestion/insertartelefono?id='.$id); ?>'">Regresar</button>
<button class="forward-button" onclick="javascript:parent.location='<?php echo url_for('gestion/insertar_areas_formacion_facilitador?id='.$id); ?>'">Siguiente</button>
<br/><br/>
<div id="sf_gmstv_container">
  <h1>Correos Electrónicos del Facilitador</h1>
<br>
<table border="1" style="border-collapse:collapse; width: 100%">
  <tr>
    <th colspan="2">Datos básicos del facilitador</th>
  </tr>
  <tr>
    <th><label>Nombre</label></th>
    <td><?php echo $facilitador->getNombre(); ?></td>
  </tr>
  <tr>
    <th><label>Apellido</label></th>
    <td><?php echo $facilitador->getApellido(); ?></td>
  </tr>
  <tr>
    <th><label>Cedula o Pasaporte</label></th>
    <td><?php echo $facilitador->getCedulaPasaporte(); ?></td>
  </tr>
</table>
<br>
<br>
<form action="<?php echo url_for('gestion/CreateCorreo?id='.$id); ?>" method="post">
<table border=0>
<tr>
  <th style="text-align:right; height: 30px"><?php echo $form['correo']->renderLabel(); ?></th>
  <td><?php echo $form['correo']->render(); ?></td>
  <td style="text-align:left; height: 30px"><?php echo $form['correo']->renderError(); ?></td>
</tr>
</table>
<br>
<input type="submit" value="Agregar Correo">
<?php echo $form->renderHiddenFields(); 
echo $form['id_identificacion']->render(array('value'=>$id));
?>
<br>
<br>
</form>
<br>
<table border="1" style="border-collapse:collapse; width: 100%">
<?php if (isset($correos)){
?>
<th colspan='3'>Lista Correos Electrónicos</th>
  </tr>
<tr>
<th>
Acciones
</th>
<th>
Nº
</th>
<th>
Correos Electrónicos
</th>
</tr>
<?php $cont=1; foreach($correos as $cf): ?>
  <tr style="height: 30px">
      <td> 
      <?php echo link_to(
  '[Eliminar]',
  'gestion/insertarcorreo?id_correo='.$cf->getId().'&id='.$id,
  array('method' => 'delete', 'confirm' => 'Seguro Desea Eliminar?')
) ?> 
      </td>
      <td><?php echo $cont; ?></td>
      <td><?php echo $cf->getcorreo(); ?></td>
      <?php $cont +=1; ?>
  </tr>
  <?php endforeach; 
} 
else 
{ 
echo "Aún no has configurado los correos electrónicos del facilitador"; 
} ?>
</table>
