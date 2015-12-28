<?php $sf_user->setCulture('es'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <script>
      $(function() {
	      $( ".button" ).button({
          });
          
        $( ".create-button" ).button({
          icons: { primary: "ui-icon-plusthick" }
        });
        
        $( ".edit-button" ).button({
          icons: { primary: "ui-icon-pencil" }
        });
        
        $( ".delete-button" ).button({
          icons: { primary: "ui-icon-closethick" }
        });
        
        $( ".home" ).button({
          icons: { primary: "ui-icon-home" }
        });
        
        $( ".note" ).button({
          icons: { primary: "ui-icon-note" }
        });
        
        $( ".back-button" ).button({
          icons: { primary: "ui-icon-arrowreturnthick-1-w" }
        });
        
        $( ".forward-button" ).button({
          icons: { primary: "ui-icon-arrowreturnthick-1-e" }
        });
        
        $( "button" ).button({
          });
      });
    </script>
  </head>
  <body>
    <div id="layer">
      <div id="header" class="ui-widget-content  ui-corner-all">
      </div>
      
      <div id="container" class="ui-widget-content  ui-corner-all">
        <div class="container-msg">
          <?php if($sf_user->hasFlash('mensaje')): ?>
          <div class="ui-widget" style="padding:0px 10px 10px 10px;">
            <div class="ui-state-highlight  ui-corner-all" style="padding-top: 7px; height: 23px">
              <span class="ui-icon ui-icon-alert" style="float: left; margin-right: 0.3em;"></span>
              <?php echo $sf_user->getFlash('mensaje'); ?>
            </div>
          </div>
          <?php endif; ?>
        </div>
        <?php echo $sf_content ?>
      </div>

      <div id="footer" class="ui-widget-content  ui-corner-all">
      CENDITEL - FUNDACIÓN CENTRO NACIONAL DE DESARROLLO E INVESTIGACIÓN EN TECNOLOGÍAS LIBRES</br>
      Gran Misi&oacute;n Saber y Trabajo Venezuela 
      </div>
      
    </div>
  </body>
</html>
