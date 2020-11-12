function setAllCookie (names, values) {
	$.each(names, function( index, name ) {
		$.cookie(name, values[index], { expires: 7 });
	});
}

function setCookie (name, value) {
	$.cookie(name, value, { expires: 7 });
}

function getCookie (name) {
	return $.cookie(name);
}

function getAllCookie () {
	return $.cookie();
}