 <!--
Document / Documento: insertar_dias_turnoSuccess del Módulo Gestión 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Ingresar turnos disponibles del facilitador.
2- Eliminar turnos disponibles.	
-->
<?php $id=($sf_params->get ('id')) ?> 
<!--<button class="home" onclick="javascript:parent.location='<?php echo url_for('principal/index'); ?>'">Ir al menú Principal</button>-->
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('gestion/insertar_ocupacion?id='.$id); ?>'">Regresar</button>
<button class="forward-button" onclick="javascript:parent.location='<?php echo url_for('gestion/insertar_traslados?id='.$id); ?>'">Siguiente</button>
<br/><br/>
<div id="sf_gmstv_container">
  <h1>Turnos Disponibles del Facilitador</h1>
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
<form action="<?php echo url_for('gestion/CreateTurnoDisponible?id='.$id); ?>" method="post">
<table border=1>
<tr>
<th>
Horarios
</th>
<th>
Lunes
</th>
<th>
Martes
</th>
<th>
Miércoles
</th>
<th>
Jueves
</th>
<th>
Viernes
</th>
<th>
Sábado
</th>
<th>
Domingo
</th>
</tr>

<tr>
<th>
7am-8am
</th>

<?php //if (isset($obtener_dias_turno))
//{
/*foreach($obtener_dias_turno as $odt):
  //echo "<td>";
  echo $dia=$odt->getdia();
  //echo "</td>";
  foreach($odt->getDisponibilidadTurnos() as $obtener_turno):
    //echo "<td>";
  echo $turno=$obtener_turno->getturno(); 
  //echo "</td>";

endforeach;
endforeach;*/

function is_checked($dia, $turno, $obtener_dias_turno) {
  foreach($obtener_dias_turno as $odt) {
    $d=$odt->getdia();
    if($d==$dia) { 
      foreach($odt->getDisponibilidadTurnos() as $obtener_turno) {
        $t=$obtener_turno->getturno();
        if($t == $turno) { return '1'; }
      }
      return '0';
    }
  }
  return '0';
} 


?>

<th>
<input type="checkbox" name="lunes[]" value="7am-8am" <?php echo ((is_checked ('0','7am-8am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="martes[]" value="7am-8am" <?php echo ((is_checked ('1','7am-8am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="miercoles[]" value="7am-8am" <?php echo ((is_checked ('2','7am-8am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="jueves[]" value="7am-8am" <?php echo ((is_checked ('3','7am-8am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="viernes[]" value="7am-8am" <?php echo ((is_checked ('4','7am-8am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="sabado[]" value="7am-8am" <?php echo ((is_checked ('5','7am-8am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="domingo[]" value="7am-8am" <?php echo ((is_checked ('6','7am-8am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
</tr>
<tr>
<th>
8am-9am
</th>
<th>
<input type="checkbox" name="lunes[]" value="8am-9am" <?php echo ((is_checked ('0','8am-9am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="martes[]" value="8am-9am" <?php echo ((is_checked ('1','8am-9am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="miercoles[]" value="8am-9am" <?php echo ((is_checked ('2','8am-9am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="jueves[]" value="8am-9am" <?php echo ((is_checked ('3','8am-9am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="viernes[]" value="8am-9am" <?php echo ((is_checked ('4','8am-9am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="sabado[]" value="8am-9am" <?php echo ((is_checked ('5','8am-9am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="domingo[]" value="8am-9am" <?php echo ((is_checked ('6','8am-9am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>

</tr>
<tr>
<th>
9am-10am
</th>
<th>
<input type="checkbox" name="lunes[]" value="9am-10am" <?php echo ((is_checked ('0','9am-10am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="martes[]" value="9am-10am" <?php echo ((is_checked ('1','9am-10am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="miercoles[]" value="9am-10am" <?php echo ((is_checked ('2','9am-10am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="jueves[]" value="9am-10am" <?php echo ((is_checked ('3','9am-10am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="viernes[]" value="9am-10am" <?php echo ((is_checked ('4','9am-10am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="sabado[]" value="9am-10am" <?php echo ((is_checked ('5','9am-10am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="domingo[]" value="9am-10am" <?php echo ((is_checked ('6','9am-10am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
</tr>
<tr>
<th>
10am-11am
</th>
<th>
<input type="checkbox" name="lunes[]" value="10am-11am" <?php echo ((is_checked ('0','10am-11am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="martes[]" value="10am-11am" <?php echo ((is_checked ('1','10am-11am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="miercoles[]" value="10am-11am" <?php echo ((is_checked ('2','10am-11am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="jueves[]" value="10am-11am" <?php echo ((is_checked ('3','10am-11am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="viernes[]" value="10am-11am" <?php echo ((is_checked ('4','10am-11am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="sabado[]" value="10am-11am" <?php echo ((is_checked ('5','10am-11am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="domingo[]" value="10am-11am" <?php echo ((is_checked ('6','10am-11am',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
</tr>
<tr>
<th>
11am-12pm
</th>
<th>
<input type="checkbox" name="lunes[]" value="11am-12pm" <?php echo ((is_checked ('0','11am-12pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="martes[]" value="11am-12pm" <?php echo ((is_checked ('1','11am-12pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="miercoles[]" value="11am-12pm" <?php echo ((is_checked ('2','11am-12pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="jueves[]" value="11am-12pm" <?php echo ((is_checked ('3','11am-12pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="viernes[]" value="11am-12pm" <?php echo ((is_checked ('4','11am-12pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="sabado[]" value="11am-12pm" <?php echo ((is_checked ('5','11am-12pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="domingo[]" value="11am-12pm" <?php echo ((is_checked ('6','11am-12pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
</tr>
<tr>
<th>
2pm-3pm
</th>
<th>
<input type="checkbox" name="lunes[]" value="2pm-3pm" <?php echo ((is_checked ('0','2pm-3pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="martes[]" value="2pm-3pm" <?php echo ((is_checked ('1','2pm-3pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="miercoles[]" value="2pm-3pm" <?php echo ((is_checked ('2','2pm-3pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="jueves[]" value="2pm-3pm" <?php echo ((is_checked ('3','2pm-3pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="viernes[]" value="2pm-3pm" <?php echo ((is_checked ('4','2pm-3pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="sabado[]" value="2pm-3pm" <?php echo ((is_checked ('5','2pm-3pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="domingo[]" value="2pm-3pm" <?php echo ((is_checked ('6','2pm-3pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
</tr>
<tr>
<th>
3pm-4pm
</th>
<th>
<input type="checkbox" name="lunes[]" value="3pm-4pm" <?php echo ((is_checked ('0','3pm-4pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="martes[]" value="3pm-4pm" <?php echo ((is_checked ('1','3pm-4pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="miercoles[]" value="3pm-4pm" <?php echo ((is_checked ('2','3pm-4pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="jueves[]" value="3pm-4pm" <?php echo ((is_checked ('3','3pm-4pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="viernes[]" value="3pm-4pm" <?php echo ((is_checked ('4','3pm-4pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="sabado[]" value="3pm-4pm" <?php echo ((is_checked ('5','3pm-4pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="domingo[]" value="3pm-4pm" <?php echo ((is_checked ('6','3pm-4pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
</tr>
<tr>
<th>
4pm-5pm
</th>
<th>
<input type="checkbox" name="lunes[]" value="4pm-5pm" <?php echo ((is_checked ('0','4pm-5pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="martes[]" value="4pm-5pm" <?php echo ((is_checked ('1','4pm-5pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="miercoles[]" value="4pm-5pm" <?php echo ((is_checked ('2','4pm-5pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="jueves[]" value="4pm-5pm" <?php echo ((is_checked ('3','4pm-5pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="viernes[]" value="4pm-5pm" <?php echo ((is_checked ('4','4pm-5pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="sabado[]" value="4pm-5pm" <?php echo ((is_checked ('5','4pm-5pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="domingo[]" value="4pm-5pm" <?php echo ((is_checked ('6','4pm-5pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
</tr>
<tr>
<th>
5pm-6pm
</th>
<th>
<input type="checkbox" name="lunes[]" value="5pm-6pm" <?php echo ((is_checked ('0','5pm-6pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="martes[]" value="5pm-6pm" <?php echo ((is_checked ('1','5pm-6pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="miercoles[]" value="5pm-6pm" <?php echo ((is_checked ('2','5pm-6pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="jueves[]" value="5pm-6pm" <?php echo ((is_checked ('3','5pm-6pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="viernes[]" value="5pm-6pm" <?php echo ((is_checked ('4','5pm-6pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="sabado[]" value="5pm-6pm" <?php echo ((is_checked ('5','5pm-6pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="domingo[]" value="5pm-6pm" <?php echo ((is_checked ('6','5pm-6pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
</tr>
<tr>
<th>
7pm-8pm
</th>
<th>
<input type="checkbox" name="lunes[]" value="7pm-8pm" <?php echo ((is_checked ('0','7pm-8pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="martes[]" value="7pm-8pm" <?php echo ((is_checked ('1','7pm-8pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="miercoles[]" value="7pm-8pm" <?php echo ((is_checked ('2','7pm-8pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="jueves[]" value="7pm-8pm" <?php echo ((is_checked ('3','7pm-8pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="viernes[]" value="7pm-8pm" <?php echo ((is_checked ('4','7pm-8pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="sabado[]" value="7pm-8pm" <?php echo ((is_checked ('5','7pm-8pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="domingo[]" value="7pm-8pm" <?php echo ((is_checked ('6','7pm-8pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
</tr>
<tr>
<th>
8pm-9pm
</th>
<th>
<input type="checkbox" name="lunes[]" value="8pm-9pm" <?php echo ((is_checked ('0','8pm-9pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="martes[]" value="8pm-9pm" <?php echo ((is_checked ('1','8pm-9pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="miercoles[]" value="8pm-9pm" <?php echo ((is_checked ('2','8pm-9pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="jueves[]" value="8pm-9pm" <?php echo ((is_checked ('3','8pm-9pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="viernes[]" value="8pm-9pm" <?php echo ((is_checked ('4','8pm-9pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="sabado[]" value="8pm-9pm" <?php echo ((is_checked ('5','8pm-9pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="domingo[]" value="8pm-9pm" <?php echo ((is_checked ('6','8pm-9pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
</tr>
<tr>
<th>
9pm-10pm
</th>
<th>
<input type="checkbox" name="lunes[]" value="9pm-10pm" <?php echo ((is_checked ('0','9pm-10pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="martes[]" value="9pm-10pm" <?php echo ((is_checked ('1','9pm-10pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="miercoles[]" value="9pm-10pm" <?php echo ((is_checked ('2','9pm-10pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="jueves[]" value="9pm-10pm" <?php echo ((is_checked ('3','9pm-10pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="viernes[]" value="9pm-10pm" <?php echo ((is_checked ('4','9pm-10pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="sabado[]" value="9pm-10pm" <?php echo ((is_checked ('5','9pm-10pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>
<th>
<input type="checkbox" name="domingo[]" value="9pm-10pm" <?php echo ((is_checked ('5','9pm-10pm',$obtener_dias_turno)=='1') ? 'checked="true"' : '')?>><br>
</th>

</tr>
</table>

<br>
<input type="submit" value="Registrar Turno">
<br>
<br>
<?php echo $form_turnos->renderHiddenFields(); 
echo $form_turnos['id_identificacion']->render(array('value'=>$id));
?>
</form>
