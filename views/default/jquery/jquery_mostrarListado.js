$(document).ready(function() {

	if ($('#check_edicion').prop('checked')) {
		element_edicion = document.getElementById("listado_edicion");
		element_edicion.style.display = 'block';
	}

});

function showContent() {
	element = document.getElementById("listado");
	check = document.getElementById("check");
	element_edicion = document.getElementById("listado_edicion");
	check_edicion = document.getElementById("check_edicion");
	if (check.checked) {
		element.style.display = 'block';
	} else {
		element.style.display = 'none';
	}
	if (check_edicion.checked) {
		element_edicion.style.display = 'block';
	} else {
		element_edicion.style.display = 'none';
	}
}
