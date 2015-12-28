<!--
Document / Documento: detalleSuccess del Módulo Gestión 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Muestra la consulta de toda la información del facilitador.	
-->
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('principal/index'); ?>'">Ir al menú Principal</button>
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('gestion/buscar'); ?>'">Regresar</button>
<br>
<br>
<div id="sf_gmstv_container">
  <h1>Datos del Facilitador</h1>
<br>
<table border="1" style="border-collapse:collapse; width: 100%">
  <tr>
    <th colspan="2">Datos básicos del facilitador</th>
  </tr>
  <tr>
    <th><?php echo $form['nombre']->renderLabel(); ?></th>
    <td><?php echo $facilitador->getNombre(); ?></td>
  </tr>
  <tr>
    <th><?php echo $form['apellido']->renderLabel(); ?></th>
    <td><?php echo $facilitador->getApellido(); ?></td>
  </tr>
  <tr>
    <th><?php echo $form['cedula_pasaporte']->renderLabel(); ?></th>
    <td><?php echo $facilitador->getCedulaPasaporte(); ?></td>
  </tr>
  <tr>
    <th><?php echo $form['nacionalidad']->renderLabel(); ?></th>
    <td><?php echo $facilitador->getNacionalidad(); ?></td>
  </tr>
  <tr>
    <th><?php echo $form['direccion']->renderLabel(); ?></th>
    <td><?php echo $facilitador->getDireccion(); ?></td>
  </tr>
  <tr>
    <th><?php echo $form['sector']->renderLabel(); ?></th>
    <td><?php echo $facilitador->getSector(); ?></td>
  </tr>
  <tr>
    <th><?php echo $form['situacion_laboral']->renderLabel(); ?></th>
    <td><?php echo $facilitador->getSituacionLaboral(); ?></td>
  </tr>
  <tr>
    <th><?php echo $form['formacion_politica']->renderLabel(); ?></th>
    <td>
    <?php
        $x = $facilitador->getFormacionPolitica();
        switch ($x)
        {
          case 0:
            echo "No";
            break;
          case 1:
            echo "Si";
            break;
          }
      ?>
    </td>
  </tr>
  <tr>
    <th><?php echo $form['id_estado']->renderLabel(); ?></th>
    <td><?php echo $facilitador->getEstado(); ?></td>
  </tr>
  <tr>
    <th><?php echo $form['id_municipio']->renderLabel(); ?></th>
    <td id="td_municipio"><?php echo $facilitador->getMunicipio(); ?></td>
  </tr>
  <tr>
    <th><?php echo $form['id_parroquia']->renderLabel(); ?></th>
    <td id="td_parroquia"><?php echo $facilitador->getParroquia(); ?></td>
  </tr>
</table>
<br>
<br>
<table border="1" style="border-collapse:collapse; width: 100%">
  <tr>
    <th colspan="2">Areas de Formación</th>
  </tr>
  <tr>
    <th>Nombre</th>
    <th>Estatus</th>
  </tr>
  <?php foreach($areasFormPorFacilitador as $af): ?>
  <tr style="height: 30px">
    <td><?php echo $af->getAreasFormacion()->getNombreArea(); ?></td>
    <td>
      <?php
        $x = $af->getEstatus();
        switch ($x)
        {
          case 0:
            echo "En Formación";
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
  <tr>
  <?php endforeach; ?>
</table>
<br>
<br>
      <table border="1" style="border-collapse:collapse; width: 100%">
        <tr>
          <th style="width: 50%">Teléfonos</th>
          <th style="width: 50%">Correos</th>
        </tr>
        <tr style="height: 30px">
          <td>
            <?php foreach($telefonos as $tels): ?>
            <?php echo $tels->getNumero(); ?><br>
            <?php endforeach; ?>
          </td>
            <td>
            <?php foreach($correos as $c): ?>
            <?php echo $c->getCorreo(); ?><br>
            <?php endforeach; ?>
            </td>
        <tr>
      </table>
    </td>
<br>
<br>
<table border="1" style="border-collapse:collapse; width: 100%">
  <tr>
    <th>Profesión</th>
  </tr>
  <?php foreach($facilitador->getProfesion() as $profesion): ?>
  <tr style="height: 30px">
    <td><?php echo $profesion->getNombreProfesion(); ?></td>
  <tr>
  <?php endforeach; ?>
</table>
<br>
<br>
<table border="1" style="border-collapse:collapse; width: 100%">
  <tr>
    <th>Ocupación</th>
  </tr>
  <?php foreach($facilitador->getOcupacion() as $ocupacion): ?>
  <tr style="height: 30px">
    <td><?php echo $ocupacion->getNombreOcupacion(); ?></td>
  </tr>
  <?php endforeach; ?>
</table>
<br>
<br>
<table border="1" style="border-collapse:collapse; width: 100%">
  <tr>
    <th>Nivel de Formación</th>
  </tr>
  <?php foreach($facilitador->getNivelFormacion() as $nivel): ?>
  <tr style="height: 30px">
    <td><?php echo $nivel->getEstudios()->getNombreEstudio(); ?></td>
  <tr>
  <?php endforeach; ?>
</table>
<br>
<br>
<table border="1" style="border-collapse:collapse; width: 100%">
  <tr>
    <th colspan="3">Disponibilidad de Traslado</th>
  </tr>
  <tr>
    <th>Estado</th>
    <th>Municipio</th>
    <th>Requiere Traslado</th>
  </tr>
  <?php foreach($facilitador->getDisponibilidadTrasladoEstado() as $disponibilidad): ?>
  <tr style="height: 30px">
    <td><?php echo $disponibilidad->getEstado(); ?></td>
    <td><?php echo $disponibilidad->getMunicipio(); ?></td>
    <td>
      <?php
        $x = $disponibilidad->getRequiereTraslado();
        switch ($x)
        {
          case 0:
            echo "No";
            break;
          case 1:
            echo "Si";
            break;
                }
      ?>
    </td>
  <tr>
  <?php endforeach; ?>
</table>
<br>
<br>
<table border="1" style="border-collapse:collapse; width: 100%">
  <tr>
    <th colspan="3">Secciones</th>
  </tr>
  <tr>
    <th>Area de Formación</th>
    <th>Sección</th>
    <th>Ente</th>
  </tr>
  <?php foreach($facilitador->getSecciones() as $seccion): ?>
  <tr style="height: 30px">
    <td><?php echo $seccion->getAreasFormacion()->getNombreArea(); ?></td>
    <td><?php echo $seccion->getNombreSeccion(); ?></td>
    <td><?php echo $seccion->getNombreEnte(); ?></td>
  <tr>
  <?php endforeach; ?>
</table>
<br>
<br>
<table border="1" style="border-collapse:collapse; width: 100%">
  <tr>
    <th colspan="7">Disponibilidad Diaria</th>
  </tr>
  <tr>
  <?php foreach($facilitador->getDisponibilidadDias() as $dia): ?>
    <th>
      <?php
        $x = $dia->getDia();
        switch ($x)
        {
          case 0:
            echo "Lunes";
            break;
          case 1:
            echo "Martes";
            break;
          case 2:
            echo "Miercoles";
            break;
          case 3:
            echo "Jueves";
            break;
          case 4:
            echo "Viernes";
            break;
          case 5:
            echo "Sabado";
            break;
          case 6:
            echo "Domingo";
            break;
        }
      ?>
    </th>
  <?php endforeach; ?>
  </tr>
  <tr style="height: 30px">
  <?php foreach($facilitador->getDisponibilidadDias() as $dia): ?>
    <td>
      <?php foreach($dia->getDisponibilidadTurnos() as $turno): ?>
        <?php echo $turno->getTurno(); ?><br>
      <?php endforeach; ?>
    </td>
  <?php endforeach; ?>
  <tr>
</table>
</div>
