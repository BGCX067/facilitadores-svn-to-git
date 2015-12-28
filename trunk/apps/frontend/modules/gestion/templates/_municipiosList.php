<!--
Document / Documento: municipiosList del Módulo Gestión 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo genera las siguientes funciones:
1- Ingresar en un (menu de selección) todos los Municipios de un Estado seleccionado.	
-->
<select id="identificacion_id_municipio" name="identificacion[id_municipio]">
<option value=""></option>
<?php foreach($municipios as $m): ?>
<option value="<?php echo $m->getId();?>"><?php echo $m->getNombreMunicipio(); ?></option>
<?php endforeach; ?>
</select>
