<!--
Document / Documento: areasFormacionSuccess del Módulo Formación

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Ir al ingreso de Areas de formación.
2- Ir a la Eliminación de Areas de formación.
3- Ir a la Actualización de Areas de formación.
4- Búsqueda de Areas de formación.
-->
<button class="home" onclick="javascript:parent.location='/frontend_dev.php/principal'">Ir al menú Principal</button>
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('formacion/index'); ?>'">Regresar</button><br/><br/>
<div id="sf_gmstv_container">
  <h1>Lista de Áreas de Formación</h1> 
<div id="sf_gmstv_bar">    
  <div class="sf_gmstv_filter">
    <form action="<?php echo url_for('formacion/areasFiltro');?>" method="post">
      <table cellspacing="0">
        <tfoot>
          <tr>

            <td colspan="2">           
              <?php echo $filter->renderHiddenFields(); ?>
              <input type="submit" value="Filtrar" />
            </td>
          </tr>
        </tfoot>
        <tbody>
          <?php echo $filter; ?>
        </tbody>
      </table>
    </form>
  </div>
</div>
  <div id="sf_gmstv_content">
    <div class="sf_gmstv_list">
      <table cellspacing="0">
        <thead>

          <tr>
            <th class="sf_gmstv_text" style="min-width: 100px;">Nombre</th>
            <th id="sf_gmstv_list_th_actions">Acciones</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th colspan="4"><?php echo count($areasFormacion); ?> Resultado(s)</th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach($areasFormacion as $a): ?>
          <tr class="sf_gmstv_row odd">
              <td class="sf_gmstv_text sf_gmstv_list_td_name"><?php echo $a->getNombreArea(); ?></td>
              <td>
                <ul class="sf_gmstv_td_actions">
                  <li class="sf_gmstv_action_edit"><?php echo link_to('Editar','formacion/areasFormacionEditar?id='.$a->getId()); ?></li>
                  <li class="sf_gmstv_action_delete"><?php echo link_to('Eliminar', 'formacion/areasFormacionEliminar?id='.$a->getId(), array('post' => true, 'confirm' => 'Seguro Desea Eliminar?')) ?>
</li>
                </ul>
              </td>
           </tr>
           <?php endforeach; ?>
         </tbody>
      </table>
    </div>
    <ul class="sf_gmstv_actions">
      <li class="sf_gmstv_action_new"><?php echo link_to('Nuevo', 'formacion/areasFormacionInsertar'); ?></li>    </ul>
  </div>
</div>
