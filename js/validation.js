
$(document).ready(function () {

//	валидация данных формы

function validateName() {
	$(".valid_name").text("");
	var name = $('[name="name"]').val();
	var re = /^[a-zA-Zа-яА-Я][a-zA-Zа-яА-Я-']+[a-zA-Zа-яА-Я']?$/u;

	if (re.test(name)) {
		$(".valid_name").text(" ✔");
		$(".valid_name").css("color", "green");
		return true;
	} else {
		$(".valid_name").text(" x");
		$(".valid_name").css("color", "red");
		return false;
	}
}

function validateSurname() {
	$(".valid_surname").text("");
	var surname = $('[name="surname"]').val();
	var re = /^[a-zA-Zа-яА-Я][a-zA-Zа-яА-Я-']+[a-zA-Zа-яА-Я']?$/u;

	if (re.test(surname)) {
		$(".valid_surname").text(" ✔");
		$(".valid_surname").css("color", "green");
		return true;
	} else {
		$(".valid_surname").text(" x");
		$(".valid_surname").css("color", "red");
		return false;
	}
}

function validatePhone() {
	$(".valid_phone").text("");
	var phone = $('[name="phone"]').val();
	var re = /^[0-9]{10}$/u;

	if (re.test(phone)) {
		$(".valid_phone").text(" ✔");
		$(".valid_phone").css("color", "green");
		return true;
	} else {
		$(".valid_phone").text(" x");
		$(".valid_phone").css("color", "red");
		return false;
	}
}

function validateEmail() {
	$(".valid_email").text("");
	var email = $('[name="email"]').val();
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	if (re.test(email)) {
		$(".valid_email").text(" ✔");
		$(".valid_email").css("color", "green");
		return true;
	} else {
		$(".valid_email").text(" x");
		$(".valid_email").css("color", "red");
		return false;
	}
}

//	отправка данных формы

	$('[type="button"]' ).click(function() {
		
		validateName();
		validateSurname();
		
		if ($('[name="email"]').val()!="")
			validateEmail();

		if (validateName()==true & validateSurname() & validatePhone()==true)
		{
			$.post("submit.php", 	//url

				{	// передача данных из формы
					name: $('[name="name"]').val(),
					surname:  $('[name="surname"]').val(),
					phone:  $('[name="phone"]').val(),
					email:  $('[name="email"]').val(),
					programme:  $('[name="programme"]').val(),
					filial:  $('[name="filial"]').val(),
					plan:  $('[name="plan"]').val()
				}

			// после отправки данных

				,function(data){		
					$(".done").html(data);
				}
		);}
	});
});