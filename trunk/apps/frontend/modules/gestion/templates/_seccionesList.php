<!--
Document / Documento: seccionesList del Módulo Gestión 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Muestra la consulta de:
	1.1- Nombre Sección
	1.2- Área de Formación
	1.3- Ente
	1.4- Facilitador Asignado 	
-->
  <input id="nombre_seccion" type="hidden" value="<?php echo $nombre_seccion; ?>" />
  <input id="estado" type="hidden" value="<?php echo $estado; ?>" />
  <input id="municipio" type="hidden" value="<?php echo $municipio; ?>" />
  <input id="parroquia" type="hidden" value="<?php echo $parroquia; ?>" />
  <input id="ente" type="hidden" value="<?php echo $ente; ?>" />
  <input id="area" type="hidden" value="<?php echo $area; ?>" />

<table border="1" style="border-collapse:collapse; width: 100%">
  <tr style="height: 30px">
      <th >Acciones</th>
      <th >Nombre Sección</th>
      <th >Área de Formación</th>
      <th >Ente</th>
      <th >Facilitador Asignado</th>
      </tr>
  <?php foreach($secciones as $s): ?>
  <tr style="height: 30px">
      <td>
      [<a href="<?php echo url_for('gestion/asignar_secciones_facilitador?id_seccion='.$s->getId().'&area='.$s->getAreasFormacion()->getNombreArea()) ?>">Buscar Facilitadores<a>]
       </td>

      <td><?php echo $s->getNombreSeccion(); ?></td>
      <td><?php echo $s->getAreasFormacion()->getNombreArea(); ?></td>
     <td><?php echo $s->getEnte()->getNombreEnte(); ?></td>
     <td><?php
      if (($s->getIdentificacion()->getNombre()==NULL)&&($s->getIdentificacion()->getApellido()==NULL))
      {
      echo "Sección sin Facilitador Asignado";
      }
      else
      {
 echo $s->getIdentificacion()->getNombre()." ".$s->getIdentificacion()->getApellido(); 
      }
      ?></td>
  </tr>
  <?php endforeach; ?>
</table>
