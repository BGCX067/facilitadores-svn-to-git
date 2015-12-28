function estadoentesChange(idEstado) {
  $(function() {
    $('#td_municipio_entes').load($('#entes_mun').val(),   { query: idEstado }, function() {
      $('#td_parroquia_entes').html('');
      $('#ente_id_municipio').change(function(key) {
        $('#municipio').attr('value', this.value);
        var idMunicipio = (this.value=='' ? '*' : this.value);
        municipioentesChange(idEstado, idMunicipio, '');
        estadonombreentesChange(idEstado, idMunicipio, '');
   
      });
    });
  });
}

function estadonombreentesChange(idEstado, idMunicipio, idParroquia) {
  $(function() {
    $('#td_nombre_entes').load($('#nombre_ente').val(),   { idEstado:idEstado, idMunicipio:idMunicipio, idParroquia:idParroquia }, function() {
    $('#entesSecciones').change(function(key) {
      $('#enteSeccion').attr('value', $('#entesSecciones option:selected').attr('value'));
    });
  });
  });
}

function municipioentesChange(idEstado, idMunicipio, idParroquia) {
  $('#td_parroquia_entes').load($('#entes_par').val(), { query: idMunicipio }, function() {
    $('#ente_id_parroquia').change(function(key) {
      $('#parroquia').attr('value', this.value);
      estadonombreentesChange(idEstado, idMunicipio, idParroquia);
    });
  });
}

$(document).ready(function()
{
  $('#ente_id_estado').change(function(key)
  {
    $('#estado').attr('value', this.value);
    var idEstado = (this.value=='' ? '*' : this.value);
    estadoentesChange(idEstado);
    estadonombreentesChange(idEstado, '', '');
  });

});


function cargarSecciones(estado, municipio, parroquia, ente, area) {
  var nombre_seccion = $('#nombre_seccion').val();
  
  $(function() {
    $('#seccionesConsultados').load('cargarSecciones',{ 'nombre': nombre_seccion, 'estado': estado, 'municipio': municipio, 'parroquia': parroquia, 'ente': ente, 'area': area });
  });
}
