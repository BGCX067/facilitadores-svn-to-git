<!--
Document / Documento: indexSuccess del Módulo Gestión 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera el Menu principal de Gestión para acceder a los funciones de:
1- Insertar nuevos facilitadores.
2- Búscar, Actualizar los facilitadores ya existentes.
3- Asignar secciones a facilitadores ya existentes.
4- Devolverse al Menu Principal del Sistema

!-->
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('principal/index'); ?>'">Ir al menú Principal</button>
<div style="min-height: 300px;">
  <button class="cajaicono" onclick="javascript:parent.location='<?php echo url_for('gestion/insertar'); ?>'"><?php echo image_tag('insertar.png'); ?><br/>
  Inserción
</button>
  <button class="cajaicono" onclick="javascript:parent.location='<?php echo url_for('gestion/buscar'); ?>'"><?php echo image_tag('buscar.png'); ?><br/>
 Búsqueda / Actualización
</button>
<button class="cajaicono" onclick="javascript:parent.location='<?php echo url_for('gestion/buscar_ente'); ?>'"><?php echo image_tag('buscar.png'); ?><br/>
 Asignar Secciones 
</button>
</div>

