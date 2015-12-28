<!--
Document / Documento: entesEditarSuccess del Módulo Formación

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Modificar registros de Entes.
-->
<div id="sf_gmstv_container">
  <h1>Editar Ente</h1>
  
  <?php if($form->hasGlobalErrors()): ?> 
    <?php echo $form->renderGlobalErrors();?>
  <?php endif; ?>

  <div id="sf_gmstv_header">
  </div>

  <div id="sf_gmstv_content">
    <div class="sf_gmstv_form">
        <?php include_partial('formacion/formEntes', array('form' => $form)); ?>
    </div>
  </div>
</div>
