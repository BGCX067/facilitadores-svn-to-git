<!--
Document / Documento: indexSuccess del Módulo Estadísticas 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera el Menu principal de Estadísticas para acceder a los funciones de:
1- Estadísticas Estado
2- Estadísticas Especialidad (Áreas de Formación)
3- Estadísticas por ente
!-->
<p><button class="back-button" onclick="javascript:parent.location='<?php echo url_for('principal/index'); ?>'">Ir al menú Principal</button>
</p>
<p><button class="note" onclick="javascript:parent.location='<?php echo url_for('estadisticas/porEstado'); ?>'">Por Estado</button></p>
<p><button class="note" onclick="javascript:parent.location='<?php echo url_for('estadisticas/porEspecialidad'); ?>'">Por Especialidad (Área de formación)</button></p>
<p><button class="note" onclick="javascript:parent.location='<?php echo url_for('estadisticas/porEnte'); ?>'">Por ente</button></p>
