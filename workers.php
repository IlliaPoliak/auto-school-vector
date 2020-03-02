<?php 

	include ('header.php');  
	include ('connection.php');

	$link = mysql_connect($host, $user, $password) or die(mysql_error());
	mysql_select_db($database, $link) or die(mysql_error());

	$query = "SELECT * FROM workers;";

	if (isset($_POST['search'])){

			if ($_POST['select']=='instructor'){
				$query = "SELECT * FROM workers WHERE position='Инструктор';";
			}elseif ($_POST['select']=='teacher') {
				$query = "SELECT * FROM workers WHERE position='Преподаватель по теории';";
			}elseif ($_POST['select']=='simulator'){
				$query = "SELECT * FROM workers WHERE position='Инструктор на симуляторе';";
			}elseif($_POST['select']=='manager'){
				$query = "SELECT * FROM workers WHERE position='Менеджер';";
			}elseif ($_POST['select']=='all'){
				$query = "SELECT * FROM workers;";
			}
		}
?>

<div class="workers">
	<center>
	<h2>Коллектив автошколы «Vector»</h2>
	<p id="workers">Познакомьтесь с нашим коллективом автошколы. Опытные и квалифицированные инструктора, преподаватели теории и очаровательные менеджеры ждут вас в нашей автошколе. Мы стараемся быть лучше для Вас!</p>
	<form action="" method="post" id="data" style="margin-bottom: 50px;">
		<select name="select"> 
		  <option value="all">Все</option>
		  <option value="instructor">Инструктор</option>
		  <option value="teacher">Преподаватель по теории</option>
		  <option value="simulator">Инструктор на симуляторе</option>
		  <option value="manager">Менеджер</option>
		</select>
		<button name="search" form="data" >Найти</button>
	</form>
	</center>

	<div class="worker row">
	<?php 
	$result = mysql_query($query) or die(mysql_error());
	while ($row = mysql_fetch_assoc($result)) { ?>
		<div class="workers_data col">
			<img src=" <? echo $row['url'] ?> "/>
			<p class="fio"><? echo $row['FIO']?> </p>
			<p>Возраст: <? echo $row['years']?></p>
			<p><? echo $row['position']?> </p>
		</div>
	<? } ?>
	</div>
	
</div>

<?php include ('footer.php'); ?>