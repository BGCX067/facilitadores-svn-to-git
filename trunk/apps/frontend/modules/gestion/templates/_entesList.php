<!--
Document / Documento: entesList del Módulo Gestión 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Carga los entes por el Estado, Municipio y Parroquia que se le envien.	
-->
<select id="entesSecciones">
          <option value=""></option>
          <?php foreach($entes as $ef): ?>
          <option value="<?php echo $ef->getId(); ?>"><?php echo $ef->getNombreEnte(); ?></option>
          <?php endforeach; ?>
        </select>
