
/* появление исчезновение формы*/

$(document).ready(function () {
	$("img").click(function () {
		$("#form").fadeIn(800);
	});
	$('div.cross').click(function () {
		$("#form").fadeOut(300);
	});
});