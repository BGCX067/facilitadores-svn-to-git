<!--
Document / Documento: _parroquiasList del Módulo Formación 

Created on / Creado : 23/05/2012, 10:39:10 AM

Author / Desarrolladores:
1. Raúl Lobo 04267711578 andrescerrada@gmail.com
2. José Ruiz 04265752819 jruiz@cenditel.gob.ve joseph2283@gmail.com
3. Jesús Becerra 04263779960 jbecerra@cenditel.gob.ve jesusignaciob@gmail.com
4. Rodolfo Sumoza 04166342086 rsumoza@cenditel.gob.ve rsumoza@gmail.com

Description / Comentarios:
Este archivo se encargar de:
1- Cargar las parroquias en un Menu desplegable.
!-->
<select id="ente_id_parroquia" name="ente[id_parroquia]">
<option value=""></option>
<?php foreach($parroquias as $p): ?>
<option value="<?php echo $p->getId();?>"><?php echo $p->getNombreParroquia(); ?></option>
<?php endforeach; ?>
</select>
