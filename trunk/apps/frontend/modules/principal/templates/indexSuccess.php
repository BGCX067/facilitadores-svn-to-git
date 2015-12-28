<!--
Document / Documento: indexSuccess del Módulo Principal 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera el Menu principal del Sistema para acceder a los funciones de:
1- Gestión de Facilitadores.
2- Estadísticas de Facilitadores.
3- Configuración de Usuarios y de Formación.
4- Cerrar Sesión.
!-->
<div style="min-height: 300px;">
  <button class="cajaicono" onclick="javascript:parent.location='<?php echo url_for('gestion/index'); ?>'"><?php echo image_tag('gestion.png'); ?><br/>
  Gestión
</button>
  <button class="cajaicono" onclick="javascript:parent.location='<?php echo url_for('estadisticas/index'); ?>'"><?php echo image_tag('estadisticas.png'); ?><br/>
  Estadísticas 
</button>
  <button class="cajaicono" onclick="javascript:parent.location='<?php echo url_for('configuracion/index'); ?>'"><?php echo image_tag('config.png'); ?><br/>
  Configuración
</button>
  <button class="cajaicono" onclick="javascript:parent.location='<?php echo url_for('@sf_guard_signout')?>'"><?php echo image_tag('logout.png'); ?><br/>
  Cerrar Sesión
</button>
</div>
