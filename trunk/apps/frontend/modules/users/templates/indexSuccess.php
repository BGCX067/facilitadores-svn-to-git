<!--
Document / Documento: indexSuccess del Módulo Users 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera el Menu principal de Usuarios para acceder a los funciones de:
1- Ir a Grupos.
2- Ir a Permisos.
3- Ir a Usuarios.
!-->
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('configuracion/index'); ?>'">Regresar</button>
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('principal/index'); ?>'">Ir al menú Principal</button>
<div style="min-height: 300px;">
  <button class="cajaicono" onclick="javascript:parent.location='<?php echo url_for('guard/groups'); ?>'"><?php echo image_tag('groups.png'); ?><br/>
  Grupos
</button>
  <button class="cajaicono" onclick="javascript:parent.location='<?php echo url_for('guard/permissions'); ?>'"><?php echo image_tag('permissions.png'); ?><br/>
  Permisos
</button>
  <button class="cajaicono" onclick="javascript:parent.location='<?php echo url_for('guard/users')?>'"><?php echo image_tag('user+.png'); ?><br/>
  Usuarios
</button>
</div>
