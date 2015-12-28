<!--
Document / Documento: _formEntes del Módulo Formación para la Vista Entes

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Carga los controles del Formulario. Campos, etiquetas.
-->
 <form method="post" action="<?php echo url_for('formacion/entes'.($form->getObject()->isNew() ?
'Crear' : 'Modificar').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>">
    <fieldset id="sf_fieldset_usuario">
        <div class="sf_gmstv_form_row sf_gmstv_text">
            <?php echo $form['nombre_ente']->renderError(); ?>
        <div>
          <?php echo $form['nombre_ente']->renderLabel(); ?>
          <?php echo $form['nombre_ente']->render(); ?>
        </div>
        </div>
        <div class="sf_gmstv_form_row sf_gmstv_text">
            <?php echo $form['id_estado']->renderError(); ?>
        <div>
          <?php echo $form['id_estado']->renderLabel(); ?>
          <?php echo $form['id_estado']->render(); ?>
        </div>
        </div>
        <div class="sf_gmstv_form_row sf_gmstv_text">
            <?php echo $form['id_municipio']->renderError(); ?>
        <div>
          <?php echo $form['id_municipio']->renderLabel(); ?>
          <span id="td_municipio">
          <?php
            $ente = $sf_request->getParameter('ente');
            $form_estado = $form->getObject()->getIdEstado();
            $form_municipio = $form->getObject()->getIdMunicipio();
            $form_parroquia = $form->getObject()->getIdParroquia();
            $form_estado = (!empty($ente['id_estado'])? $ente['id_estado'] : $form_estado);
            $form_municipio = (!empty($ente['id_municipio'])? $ente['id_municipio'] : $form_municipio);
            $form_parroquia = (!empty($ente['id_parroquia'])? $ente['id_parroquia'] : $form_parroquia);
            if(!empty($form_estado)):
              $municipios = Doctrine_Core::getTable('Municipio')->findBy('id_estado', $form_estado);
          ?>
              <select id="ente_id_municipio" name="ente[id_municipio]">
                <option value=""></option>
                <?php foreach($municipios as $m): ?>
                <option value="<?php echo $m->getId()?>" <?php echo ($m->getId()==$form_municipio ? 'selected="selected"' : '')?>>
                  <?php echo $m->getNombreMunicipio()?>
                </option>
                <?php endforeach; ?>
              </select>
          <?php endif; ?>
          &nbsp;</span>
        </div>
        </div>
        <div class="sf_gmstv_form_row sf_gmstv_text">
            <?php echo $form['id_parroquia']->renderError(); ?>
        <div>
          <?php echo $form['id_parroquia']->renderLabel(); ?>
          <span id="td_parroquia">
          <?php
            if(!empty($form_municipio)):
              $parroquias = Doctrine_Core::getTable('Parroquia')->findBy('id_municipio', $form_municipio);
          ?>
              <select id="ente_id_parroquia" name="ente[id_parroquia]">
                <option value=""></option>
                <?php foreach($parroquias as $p): ?>
                <option value="<?php echo $p->getId()?>" <?php echo ($p->getId()==$form_parroquia ? 'selected="selected"' : '')?>>
                  <?php echo $p->getNombreParroquia()?>
                </option>
                <?php endforeach; ?>
              </select>
          <?php endif; ?>
          &nbsp;</span>
        </div>
        </div>
      <input type="hidden" id="url_mun" value="<?php echo url_for("formacion/cargarMunicipios")?>">
      <input type="hidden" id="url_par" value="<?php echo url_for("formacion/cargarParroquias")?>">
    </fieldset>


    <ul class="sf_gmstv_actions">
      <?php echo $form->renderHiddenFields(); ?>
      <?php if (!$form->getObject()->isNew()): ?>
      <li class="sf_gmstv_action_delete"><?php echo link_to('Eliminar', 'formacion/entesEliminar?id='.$form->getObject()->getId(), array('method' => 'delete','confirm' => 'Seguro Desea Eliminar?')) ?></li>
      <?php endif; ?>
      <li class="sf_gmstv_action_list"><?php echo link_to('Volver','formacion/entes');?></li>
      <li class="sf_gmstv_action_save"><input type="submit" value="Guardar" /></li>
    </ul>
  </form>
