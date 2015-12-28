$(function() {
  $('#identificacion_cedula_pasaporte').keyup(function(key) {
    valNumero(this);
  });
  
  $('#estatus').change(function() {
    $('#estatusAreaFormacion').attr('value', this.value);
  });
  
  $('#areas').change(function() {
    $('#areaFormacion').attr('value', this.value);
  });
});

function soloNumerico(variable) {
  var numero = parseInt(variable);
  if (isNaN(numero)) {
    return "";
  }
  return numero;
}

function valNumero(control) {
  control.value = soloNumerico(control.value);
}

function cargarFacilitadores(estado, municipio, parroquia, estatus, area, idEliminar) {
  var cedula = $('#identificacion_cedula_pasaporte').val();
  var nombre = $('#identificacion_nombre').val();
  var apellido = $('#identificacion_apellido').val();

  $(function() {
    $('#facilitadoresConsultados').load('cargarFacilitadores',{ 'cedula': cedula, 'nombre': nombre, 'apellido': apellido, 'estado': estado, 'municipio': municipio, 'parroquia': parroquia, 'estatus': estatus, 'area': area, 'id': idEliminar });
  });
}

function eliminarFacilitador(estado, municipio, parroquia, estatus, area, idEliminar) {
  $(function() {
    $( "#dialog:ui-dialog" ).dialog( "destroy" );
  
    $( "#dialog-confirm" ).dialog({
			resizable: false,
			height:200,
			modal: true,
			buttons: {
				"Eliminar": function() {
				  cargarFacilitadores(estado, municipio, parroquia, estatus, area, idEliminar);
					$( this ).dialog( "close" );
				},
				"Cancelar": function() {
					$( this ).dialog( "close" );
				}
			}
		});
  });
}
