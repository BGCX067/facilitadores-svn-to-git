<!--
Document / Documento: asignarSessionesSuccess del Módulo Gestión 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Asignar Secciones a los facilitadores.
-->
<?php
$p=($sf_params->get ('p'))
?>
<!--<button class="home" onclick="javascript:parent.location='<?php echo url_for('principal/index'); ?>'">Ir al menú Principal</button>-->
<?php if (isset($p))
{
?>
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('gestion/buscar'); ?>'">Regresar</button>
<?php } else { ?>
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('gestion/insertar_traslados?id='.$sf_request->getParameter('id')); ?>'">Regresar</button>
<?php } ?>
<br><br>
<div id="sf_gmstv_container">
  <h1>Asignar Secciones</h1>
  
  <?php if($sf_user->hasFlash('error')): ?> 
    <div class="error"><?php echo $sf_user->getFlash('error'); ?> </div>
  <?php endif; ?>

  <div id="sf_gmstv_header">
  </div>

  <div id="sf_gmstv_content">
    <div class="sf_gmstv_form">
      
      <form method="post" action="<?php echo url_for('gestion/asignarSeccionesUpdate'); ?>">
    <fieldset id="sf_fieldset_usuario">
        <div class="sf_gmstv_form_row sf_gmstv_text">
          <!-- aqui va el render error -->
        <div>
          Secciones<!-- aqui va el render label -->
          <!-- aqui va el render -->
          <select name="seccion">
            <option value=""></option>
            <?php foreach($secciones as $s):?>
            <?php $p = $s->getIdentificacion();?>
            <option value="<?php echo $s->getId()?>"><?php echo $s->getNombre()?> - <?php echo $p->getNombre()." ".$p->getApellido(); ?></option>
            <?php endforeach; ?>
          </select>
          <input type="hidden" name="id" value="<?php echo $sf_request->getParameter('id')?>">
        </div>
        </div>
  </fieldset>


    <ul class="sf_gmstv_actions">
      <li class="sf_gmstv_action_save"><input type="submit" value="Guardar" />
<?php if (!isset($p)){ ?>
      <li class="sf_gmstv_action_list"><?php echo link_to('Finalizar','gestion/insertar');?></li>
<?php } ?>
    </ul>
  </form>
    </div>
    
    
    <!-----------------------------Listado----------------------------------->
    
    <div class="sf_gmstv_list">
      <table cellspacing="0">
        <thead>

          <tr>
            <th class="sf_gmstv_text" style="min-width: 100px;">Nombre</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th colspan="4"><?php echo count($asignados); ?> Resultado(s)</th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach($asignados as $a): ?>
          <tr class="sf_gmstv_row odd">
              <td class="sf_gmstv_text sf_gmstv_list_td_name"><?php echo $a->getNombreSeccion(); ?></td>
           </tr>
           <?php endforeach; ?>
         </tbody>
      </table>
    </div>   
    
  </div>
</div>
