<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('configuracion/index'); ?>'">Regresar</button>
<button class="back-button" onclick="javascript:parent.location='<?php echo url_for('principal/index'); ?>'">Ir al menú Principal</button>
<div style="min-height: 300px;">
  <button class="cajaicono" onclick="javascript:parent.location='<?php echo url_for('geografia/estados'); ?>'"><?php echo image_tag(''); ?><br/>
  Estados
</button>
  <button class="cajaicono" onclick="javascript:parent.location='<?php echo url_for('geografia/municipios'); ?>'"><?php echo image_tag(''); ?><br/>
  Municipios
</button>
  <button class="cajaicono" onclick="javascript:parent.location='<?php echo url_for('geografia/parroquias')?>'"><?php echo image_tag(''); ?><br/>
  Parroquias
</button>
</div>