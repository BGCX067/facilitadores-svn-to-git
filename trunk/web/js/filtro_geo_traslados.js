function estadotrasladoChange(idEstado) {
  $(function() {
  $('#td_municipio_traslado').load($('#url_mun').val(), { query: idEstado }, function() {
  $('#td_parroquia_traslado').html('');
  $('#disponibilidad_traslado_estado_id_municipio').change(function(key) {
  $('#municipio').attr('value', this.value);
  var idMunicipio = (this.value=='' ? '*' : this.value);
  municipiotrasladoChange(idMunicipio);
  });
  });
  });
}

function municipiotrasladoChange(idMunicipio) {
  $('#td_parroquia_traslado').load($('#url_par').val(), { query: idMunicipio }, function() {
  $('#disponibilidad_traslado_estado_id_municipio').change(function(key) {
  $('#parroquia').attr('value', this.value);
  });
  });
}

$(document).ready(function()
{
  $('#disponibilidad_traslado_estado_id_estado').change(function(key)
  {
  $('#estado').attr('value', this.value);
  var idEstado = (this.value=='' ? '*' : this.value)
  estadotrasladoChange(idEstado);
  });
});
