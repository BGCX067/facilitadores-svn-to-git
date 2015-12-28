 <!--
Document / Documento: facilitadoresList del Módulo Gestión 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Realiza la carga de facilitadores para realizar las siguientes acciones:
	1.1- Consultar.
	1.2- Modificar.
	1.3- Eliminar.
	1.4- Asignar Secciones.	
-->
  <input id="nombre" type="hidden" value="<?php echo $nombre; ?>" />
  <input id="apellido" type="hidden" value="<?php echo $apellido; ?>" />
  <input id="cedula" type="hidden" value="<?php echo $cedula; ?>" />
  <input id="estado" type="hidden" value="<?php echo $estado; ?>" />
  <input id="municipio" type="hidden" value="<?php echo $municipio; ?>" />
  <input id="parroquia" type="hidden" value="<?php echo $parroquia; ?>" />
  <input id="estatus" type="hidden" value="<?php echo $estatus; ?>" />
  <input id="area" type="hidden" value="<?php echo $area; ?>" />

<table border="1" style="border-collapse:collapse; width: 100%">
  <thead>
  <tr style="height: 30px">
      <th rowspan="2">Acciones</th>
      <th rowspan="2">Cédula</th>
      <th rowspan="2">Nombres</th>
      <th rowspan="2">Apellidos</th>
      <th rowspan="2">Estado</th>
      <th rowspan="1" colspan="2">Areas de Formacion</th>
  </tr>
  <tr>
    <th>Nombre</th>
    <th>Estatus</th>
  </tr>
  </thead>
  <tbody>
  <?php foreach($facilitadores as $f): ?>
  <tr style="height: 30px">
      <td>
        [<a href="<?php echo url_for('gestion/detalle?id='.$f->getId()) ?>">Consultar<a>]<br>
        [<a href="<?php echo url_for('gestion/insertar?id='.$f->getId()) ?>">Modificar<a>]<br>
        [<a href="#" onclick="eliminarFacilitador($('#estado').val(), $('#municipio').val(), $('#parroquia').val(), $('#estatus').val(), $('#area').val(), <?php echo $f->getId(); ?>); return false;">Eliminar<a>]<br>
        [<a href="<?php echo url_for('gestion/asignarSecciones?id='.$f->getId().'&p=') ?>">Asignar Secciones<a>]<br>
      </td>
      <td><?php echo $f->getCedulaPasaporte(); ?></td>
      <td><?php echo $f->getNombre(); ?></td>
      <td><?php echo $f->getApellido(); ?></td>
      <td><?php echo $f->getEstado(); ?></td>
      <td colspan="2">
        <table border="0" style="width:100%">
          <?php foreach($f->getAreasFormacionFacilitador() as $aff): ?>
          <tr style="text-align:left; height: 15px">
            <td style="width:50%"><?php echo $aff->getAreasFormacion()->getNombreArea(); ?></td>
            <td style="width:50%">
              <?php
                $x = $aff->getEstatus();
                switch ($x)
                {
                  case 0:
                    echo "En Formacion";
                    break;
                  case 1:
                    echo "Formado";
                    break;
                  case 2:
                    echo "Convocado";
                    break;
                  case 3:
                    echo "Activo";
                    break;
                  default:
                    echo "Inactivo";
                }
              ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
      </td>
  </tr>
  <?php endforeach; ?>
  </tbody>
  <tfoot>
  <tr>
    <th colspan="7"><?php echo count($facilitadores); ?> Resultado(s)</th>
  </tr>
  </tfoot>
</table>
