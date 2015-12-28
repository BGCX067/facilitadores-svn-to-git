<!--
Document / Documento: indexSuccess del Módulo Formación 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera el Menu principal de Formación para acceder a los funciones de:
1- Insertar Estudios.
2- Insertar Áreas de Formación.
3- Insertar Entes.
4- Insertar Secciones.
!-->
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('configuracion/index'); ?>'">Regresar</button>
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('principal/index'); ?>'">Ir al menú Principal</button>
<div style="min-height: 300px;">
  <button class="cajaicono" onclick="javascript:parent.location='<?php echo url_for('formacion/estudios'); ?>'"><?php echo image_tag(''); ?><br/>
  Estudios
</button>
  <button class="cajaicono" onclick="javascript:parent.location='<?php echo url_for('formacion/areasFormacion'); ?>'"><?php echo image_tag(''); ?><br/>
  Áreas Formación
</button>
  <button class="cajaicono" onclick="javascript:parent.location='<?php echo url_for('formacion/entes')?>'"><?php echo image_tag(''); ?><br/>
  Entes
</button>
  <button class="cajaicono" onclick="javascript:parent.location='<?php echo url_for('formacion/secciones')?>'"><?php echo image_tag(''); ?><br/>
  Secciones
</button>
</div>
