<!--
Document / Documento: asignar_secciones_facilitadorSuccess del Módulo Gestión 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- 
2- 
3- 
4- 
-->
<button class="home" onclick="javascript:parent.location='<?php echo url_for('principal/index'); ?>'">Ir al menú Principal</button>
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('gestion/buscar_ente'); ?>'">Regresar</button>
<br><br>
<div id="sf_gmstv_container">
  <h1>Facilitadores para ser asignados en el área de: "<?php echo $sf_request->getParameter('area'); ?>"</h1>
  
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
          <table>          
          <tr>
          <td>
          </td>
          <td>
          Acciones
          </td>
          <td>
          Cédula
          </td>
          <td>
          Nombres
          </td>
          <td>
          Apellidos
          </td>
          </tr>
          
          <?php
          $cont=1; 
          if (isset($secciones))
          {
          foreach($secciones as $s):
          ?>
      <tr style="height: 30px">
       <td><?php echo $cont; ?></td>
      <td> 
      <?php echo link_to(
  '[Asignar]',
  'gestion/asignar_secciones_facilitador?id='.$s->getId().'&id_seccion='.$sf_request->getParameter('id_seccion').'&area='.$sf_request->getParameter('area'),array('method' => 'delete', 'confirm' => 'Desea asignar área al facilitador?')
) ?> 
      </td>
      <td><?php echo $s->getCedulaPasaporte(); ?></td>
      <td><?php echo $s->getNombre(); ?></td>
      <td><?php echo $s->getApellido(); ?></td>
      
      <?php $cont +=1; ?>
  </tr>        
            <?php endforeach; }?>
          </table>
        </div>
        </div>
  </fieldset>


    <ul class="sf_gmstv_actions">
      
      

    </ul>
  </form>
    </div>
    
    
    <!-----------------------------Listado----------------------------------->
    
    <div class="sf_gmstv_list">
      
    </div>   
    
  </div>
</div>
