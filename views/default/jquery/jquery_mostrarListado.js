function showContent() {
	element = document.getElementById("listado");
	check = document.getElementById("check");
	if (check.checked) {
		element.style.display = 'block';
	} else {
		element.style.display = 'none';
	}
}
