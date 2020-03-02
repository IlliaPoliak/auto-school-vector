<?
	$data = $_POST;
	$good ="";

	if (!empty($data['name']) AND !empty($data['phone']))
	{
		$headers = 'From: Поляк Илья\r\n'.
					'Reply-To: polakser@ukr.net\r\n'.
					'X-mailer: PHP/'.phpversion();
		$to = 'polakser@ukr.net';
		$subject = 'New message';
		$message = 'Данные клиента:\r\n'
				.'Имя: '.$data['name'].'r\n'
				.'Номер телефона: '.$data['phone'].'r\n';

		if (mail($to, $subject, $message, $headers))
		{
			
			echo '<script>location.replace("call_success.php");</script>'; 
			exit;
		}
		else
		{
			
			echo '<script>location.replace("call_error.php");</script>'; 
			exit;
		}
	}
?>