<?php

/*
 *  Document   : _form
 *  Created on : 23/05/2012, 03:40:53 PM
 *  Author     : jruiz
 *  Description:
 */

?>
 <form method="post" action="<?php echo url_for('geografia/estados'.($form->getObject()->isNew() ?
'Crear' : 'Modificar').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>">
    <fieldset id="sf_fieldset_usuario">
        <div class="sf_gmstv_form_row sf_gmstv_text">
            <?php echo $form['nombre_estado']->renderError(); ?>
        <div>
          <?php echo $form['nombre_estado']->renderLabel(); ?>
          <?php echo $form['nombre_estado']->render(); ?>
        </div>
        </div>
  </fieldset>


    <ul class="sf_gmstv_actions">
      <?php echo $form->renderHiddenFields(); ?>
      <?php if (!$form->getObject()->isNew()): ?>
      <li class="sf_gmstv_action_delete"><?php echo link_to('Eliminar', 'geografia/estadosEliminar?id='.$form->getObject()->getId(), array('method' => 'delete','confirm' => 'estas seguro?')) ?></li>
      <?php endif; ?>
      <li class="sf_gmstv_action_list"><?php echo link_to('Volver','geografia/estados');?></li>
      <li class="sf_gmstv_action_save"><input type="submit" value="Guardar" /></li>
    </ul>
  </form>