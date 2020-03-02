<div class="h_form">Запишитесь в один клик</div>

<div class="form">
<form action="submit.php" id="reg-form">
	<table>
		<tr class="row">
			<td>
				<span style="color: red; margin-left: 50px; text-align: left;">* <small>Обязательно для заполнения!</small></span> 
			</td>
		</tr>
		<tr class="row">
			<td class="col">
				<div class="name_input"><span>Ваше имя: </span><span style="color: red;"> *</span> <br>
					<input type="text" name="name" placeholder=" Имя" value="<?php echo @$data['name']; ?>" required >
					<span class="valid_name">  </span>
				</div>
			</td>
		
		
			<td class="col">
				<div class="name_input"><span>Ваша фамилия: </span><span style="color: red;"> *</span> <br>
					<input type="text" name="surname" placeholder=" Фамилия" value="<?php echo @$data['surname']; ?>" required >
					<span class="valid_surname">  </span>
				</div>
			</td>
		</tr>
		<tr class="row">
			<td class="col">
				<div class="name_input"><span>Номер телефона: </span><span style="color: red;"> *</span><br>
					<input type="tel" name="phone"  placeholder=" +380" value="<?php echo @$data['phone']; ?>" min="4" max="5" step="1" required >
					<span class="valid_phone">  </span>
				</div>
			</td>

			<td class="col">
				<div class="name_input"><span>Ваш e-mail: </span><br>
					<input type="email" name="email"  placeholder=" email@mail.com" value="<?php echo @$data['email']; ?>">
					<span class="valid_email">  </span>
				</div>
			</td>
		</tr>
		<tr class="row">
			<td class="col">
				<div class="name_input"><div style="margin-bottom: 20px; text-align: left;">Филиал: </div>
		        <select name="filial">
		         	<?php
		         	include ('connection.php');
					$link = mysql_connect($host, $user, $password) or die(mysql_error());
					mysql_select_db($database, $link) or die(mysql_error());
					$result = mysql_query("SELECT filia FROM filials;") or die(mysql_error());
					
					while ($row = mysql_fetch_assoc($result)) {
						echo "<option value=".$row['filia'].">".$row['filia'].'</option>';
					}

					mysql_close($link);
					?>
				</div>
		        </select>
			</td>
		
			<td class="col">
				<div class="name_input"><div style="margin-bottom: 20px; text-align: left;">Программа обучения: </div>
		         <select name="programme">
		           <option value="categoryA">Обучение на категорию А</option>
		           <option value="categoryB">Обучение на категорию B</option>
		           <option value="categoryC">Обучение на категорию C</option>
		         </select>
		         </div>
			</td>
		</tr>

		<tr class="row">
			<td class="col">
				<div class="name_input"><div style="margin-bottom: 20px; text-align: left;">График обучения: <br></div>
		         <select name="plan">
		           <option value="morning">Утро</option>
		           <option value="day">День</option>
		           <option value="evening">Вечер</option>
		           <option value="weekends">Выходные</option>
		         </select>
		         </div>
			</td>
		</tr>
		<tr>
			<td class="col">
				<input type="button" name="submit" value="Отправить" style="margin-top: 30px;" id="go">
			</td>
		</tr>
	</table>
	
	<!-- Вывод успешной отправки данных-->
	<div class="card-body done"><? echo $city ?></div>
</form>
</div>