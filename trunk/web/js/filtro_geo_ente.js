$(document).ready(function()
{
  $('#ente_id_estado').change(function(key)
  {
      var valor = (this.value=='' ? '*' : this.value)
      $('#td_municipio').load(
        $('#url_mun').val(),
        {query: valor}, function() {
          $('#td_parroquia').html('&nbsp;');
	  $('#ente_id_municipio').change(function(key)
          {
            var valor = (this.value=='' ? '*' : this.value)
            $('#td_parroquia').load(
              $('#url_par').val(),
              {query: valor}
            );
          });
        }
      );
  });

  $('#ente_id_municipio').change(function(key)
  {
    var valor = (this.value=='' ? '*' : this.value)
    $('#td_parroquia').load(
      $('#url_par').val(),
      {query: valor}
    );
  });
});
