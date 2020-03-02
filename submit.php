<?php 

	$data = $_POST;

	if (!empty($data['name']) AND !empty($data['surname']) AND !empty($data['phone']))
	{
		$headers = 'From: Поляк Илья\r\n'.
					'Reply-To: polakser@ukr.net\r\n'.
					'X-mailer: PHP/'.phpversion();
		$to = 'polakser@ukr.net';
		$subject = 'New message';
		$message = 'Данные клиента:\r\n'
				.'Имя: '.$data['name'].'r\n'
				.'Фамилия: '.$data['surname'].'r\n'
				.'Номер телефона: '.$data['phone'].'r\n'
				.'E-mail: '.$data['email'].'r\n'
				.'Программа обучения: '.$data['programme'].'r\n'
				.'Филиал: '.$data['filial'].'r\n'
				.'График: '.$data['plan'].'r\n';

		if (mail($to, $subject, $message, $headers))
		{
			include ('connection.php');

			$link = mysql_connect($host, $user, $password) or die(mysql_error());
			mysql_select_db($database, $link) or die(mysql_error());

			$index = mysql_query("SELECT MAX(id) FROM requests;") or die(mysql_error());

			$data = 
			"('" . $index++ . "', 
			'" . $data['name'] . "', 
			'" . $data['surname'] . "', 
			'" . $data['phone'] . "', 
			'" . $data['email'] . "','" . $data['programme'] . "','" . date("Y-m-d H:i:s") . "')";

			mysql_query("INSERT INTO requests VALUES" . $data . ";") or die(mysql_error());
			mysql_close($link);

			echo '<script>location.replace("success.php");</script>'; 
			exit;
		}
		else
		{
			echo '<script>location.replace("error.php");</script>'; 
			exit;
		}
	}
	else
	{
		echo 'Данные не отправлены! :(';
	}
?>