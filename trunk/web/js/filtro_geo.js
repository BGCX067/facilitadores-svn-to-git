function estadoChange(idEstado, path) {
  $(function() {
    $('#td_municipio').load(path + 'cargarMunicipios', { query: idEstado }, function() {
      $('#td_parroquia').html('');
	    $('#identificacion_id_municipio').change(function(key) {
        $('#municipio').attr('value', this.value);
        var idMunicipio = (this.value=='' ? '*' : this.value);
        municipioChange(idMunicipio, path);
      });
    });
  });
}

function municipioChange(idMunicipio, path) {
  $('#td_parroquia').load(path + 'cargarParroquias', { query: idMunicipio }, function() {
    $('#identificacion_id_municipio').change(function(key) {
      $('#parroquia').attr('value', this.value);
    });
  });
}

$(document).ready(function()
{
  if ($('#identificacion_id').attr('value') == "")
  {
    $('#td_municipio').html('');
    $('#td_parroquia').html('');
  }

  $('#identificacion_id_estado').change(function(key)
  {
    $('#estado').attr('value', this.value);
    var idEstado = (this.value=='' ? '*' : this.value);
    $('#td_parroquia').html('');
    if ($('#identificacion_id').attr('value') != "")
    {
      estadoChange(idEstado, "../../");
    }
    else
    {
      estadoChange(idEstado, "");
    }
  });
});
