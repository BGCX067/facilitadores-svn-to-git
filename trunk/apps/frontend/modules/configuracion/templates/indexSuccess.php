<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('principal/index'); ?>'">Ir al menú Principal</button>
<div style="min-height: 300px;">
  <button class="cajaicono" onclick="javascript:parent.location='<?php echo url_for('users/index'); ?>'"><?php echo image_tag('permissions.png'); ?><br/>
  Permisos
</button>
  <button class="cajaicono" onclick="javascript:parent.location='<?php echo url_for('formacion/index')?>'"><?php echo image_tag('formacion.png'); ?><br/>
  Datos de formación 
</button>
</div>
