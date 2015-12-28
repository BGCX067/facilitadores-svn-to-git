<!--
Document / Documento: _formAreasFormacion del Módulo Formación para la Vista Areas de Formacion

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Carga los controles del Formalario. Campos, etiquetas.
-->
 <form method="post" action="<?php echo url_for('formacion/areasFormacion'.($form->getObject()->isNew() ?
'Crear' : 'Modificar').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>">
    <fieldset id="sf_fieldset_usuario">
        <div class="sf_gmstv_form_row sf_gmstv_text">
            <?php echo $form['nombre_area']->renderError(); ?>
        <div>
          <?php echo $form['nombre_area']->renderLabel(); ?>
          <?php echo $form['nombre_area']->render(); ?>
        </div>
        </div>
  </fieldset>


    <ul class="sf_gmstv_actions">
      <?php echo $form->renderHiddenFields(); ?>
      <?php if (!$form->getObject()->isNew()): ?>
      <li class="sf_gmstv_action_delete"><?php echo link_to('Eliminar', 'formacion/areasFormacionEliminar?id='.$form->getObject()->getId(), array('method' => 'delete','confirm' => 'Seguro Desea Eliminar?')) ?></li>
      <?php endif; ?>
      <li class="sf_gmstv_action_list"><?php echo link_to('Volver','formacion/areasFormacion');?></li>
      <li class="sf_gmstv_action_save"><input type="submit" value="Guardar" /></li>
    </ul>
  </form>
