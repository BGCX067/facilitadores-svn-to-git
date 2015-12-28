<!--
Document / Documento: insertar_trasladosSuccess del Módulo Gestión 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Ingresar traslados del facilitador seleccionando Estado, Municipio y requiere traslado.
2- Eliminar traslados del facilitador.	
-->
<?php $id=($sf_params->get ('id')) ?> 
<!--<button class="home" onclick="javascript:parent.location='<?php echo url_for('principal/index'); ?>'">Ir al menú Principal</button>-->
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('gestion/insertar_dias_turno?id='.$id); ?>'">Regresar</button>
<button class="forward-button" onclick="javascript:parent.location='<?php echo url_for('gestion/asignarSecciones?id='.$id); ?>'">Siguiente</button>
<br/><br/>
<div id="sf_gmstv_container">
  <h1>Traslados del Facilitador</h1>
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
<form action="<?php echo url_for('gestion/CreateDisponibilidadtraslados?id='.$id); ?>" method="post">
<table style="border: 0">
<tr>
  <td><?php echo $form['id_estado']->renderLabel(); ?></td>
  <td><?php echo $form['id_estado']->render(); ?></td>
  <td><?php echo $form['id_estado']->renderError(); ?></td>
  <td style="text-align:left; height: 30px"><?php echo $form['id_identificacion']->renderError(); ?></td>
</tr>
<tr>
  <td><?php echo $form['id_municipio']->renderLabel(); ?></td>
  <td id="td_municipio_traslado"></td>
  <td><?php echo $form['id_municipio']->renderError(); ?></td>
</tr>

<tr>
  <td><?php echo $form['requiere_traslado']->renderLabel(); ?></td>
  <td><?php echo $form['requiere_traslado']->render(); ?></td>
  <td><?php echo $form['requiere_traslado']->renderError(); ?></td>
</tr>
<input type="hidden" id="url_mun" value="<?php echo url_for("gestion/cargarMunicipiosTraslados")?>">
<input type="hidden" id="url_par" value="<?php echo url_for("gestion/cargarParroquiasTraslados")?>">
</table>
<input type="submit" value="Agregar Traslados">
<?php 
echo $form->renderHiddenFields(); 
echo $form['id_identificacion']->render(array('value'=>$id));
?>
</form>
<br>
<table border="1" style="border-collapse:collapse; width: 100%">
<?php $cont=1; if (isset($traslados_facilitador)){
?>
<tr>
<th colspan='6'>Lista de Traslados</th>
</tr>
<tr>
<th>
Acciones
</th>
<th>
Nº
</th>
<th>
Estado
</th>
<th>
Municipio
</th>
<th>
Requiere Traslado
</th>
</tr>
<?php foreach($traslados_facilitador as $tf): ?>
     <tr style="height: 30px">
       <td> 
      <?php echo link_to(
  '[Eliminar]',
  'gestion/insertar_traslados?id_traslado='.$tf->getId().'&id='.$id,
  array('method' => 'delete', 'confirm' => 'Seguro Desea Eliminar?')
) ?> 
      </td> 
      <td><?php echo $cont; ?> </td>
      <td><?php echo $tf->getEstado()->getnombre_estado(); ?></td>
      <td><?php echo $tf->getMunicipio()->getnombre_municipio(); ?></td>
      <td>
      <?php 
      $requiere=$tf->getrequiere_traslado(); 
      if($requiere==1)
      {
		echo "Si";
	  }
	  else
	  {
		  echo "No";
	  }
      ?>
      </td>
      <?php $cont+=1; ?>
  </tr>
  <?php endforeach; 
} 
else 
{ 
echo "Aún no has configurado traslados para el facilitador"; 
} ?>
</table>
