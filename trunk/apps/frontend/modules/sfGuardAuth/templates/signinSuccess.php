<?php use_helper('I18N') ?>
<div class="container-msg">
  <?php if($sf_request->isMethod('post')): ?>
  <div class="ui-widget" style="padding:0px 10px 10px 10px;">
    <div class="ui-state-error ui-corner-all" style="padding-top: 7px; height: 23px">
      <span class="ui-icon ui-icon-alert" style="float: left; margin-right: 0.3em;"></span>
      <strong>Alerta:</strong> ¡Usuario y/o contraseña incorrectos!
    </div>
  </div>
  <?php endif; ?>
</div>
<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <div id="form-sesion" class="ui-widget" style="min-height: 250px;">
    <h3 class="ui-corner-top ui-widget-header">Iniciar Sesión</h3>
    <div class="ui-corner-bottom ui-widget-content" style="padding-top: 15px;">
      <div class="space">

      </div>
      <div class="content-rows">
        <div class="row">
          <div class="label">Usuario:</div>
          <div class="field"><?php echo $form['username']->render(array('class' => 'ui-widget-content ui-corner-all','onFocus' => "javascript:this.style.border = '1px solid #d19405';",'onBlur' => "javascript:this.style.border = '1px solid #655e4e';")); ?>
          </div>
        </div>
      <div class="row">
        <div class="label">Contraseña:</div>
        <div class="field"><?php echo $form['password']->render(array('class' => 'ui-widget-content ui-corner-all','onFocus' => "javascript:this.style.border = '1px solid #d19405';",'onBlur' => "javascript:this.style.border = '1px solid #655e4e';")); ?>
        </div>
      </div>
      </div>
      <div class="row-button">
        <?php echo $form->renderHiddenFields(); ?>
        <input type="submit" class="button" value="Entrar" />
      </div>
    </div>
  </div>
</form>