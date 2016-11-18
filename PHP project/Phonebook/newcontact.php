<?php
include_once ('parts/begin.php');
?>
<body>
	<div class="container">
		<?php
			include_once ("nav.php");
			include_once ("scripts/connect.php");
			include_once ("scripts/session.php");
		?>
		<article>
			<?php 
			if (loggedin()) {
				if(isset($_GET['sent'])==NULL){
				}
				elseif(isset($_GET['sent'])){
					echo "<h2>Новият контакт е добавен УСПЕШНО.</h2>";
				}
				else{
					echo "<h2>НЕУСПЕШНО добавяне.</h2>";
				}
			?>
			<form name="new" action="scripts/insertDataDB.php" method="post" onsubmit="return validateForm()">
				<fieldset>
				<legend>Въведете новият контакт</legend>	
					<label for="1">Имена:</label>
							<br>
						<input type="text" id = "1" class = "new_contact_inp" name="fullname" autofocus>
							<br>
					<label for="2">Телефонен номер:</label>
							<br>
						<input type="tel" id = "2" class = "new_contact_inp" name="phonenumber">
							<br>
					<label for="3">Алтернативен тел. номер:</label>
							<br>
						<input type="tel" id = "3" class = "new_contact_inp" name="phonenumber2">
							<br>
					<label for="4">Адрес:</label>
							<br>
						<input type="text" id = "4" class = "new_contact_inp" name="address">
							<br>
					<label for="5">Електронна поща:</label>
							<br>
						<input type="email" id = "5" class = "new_contact_inp" name="email">
							<br>
					<label for="6">Инфо:</label>
							<br>
						<textarea name="info" id = "6" class = "new_contact_inp"></textarea>
							<br>
					<input type="submit" value="Готово">
					<input type="reset" value="Почисти">
				</fieldset>
			</form>
			<?php
			}
			else{
			?>
					<form method="post">
			<?php
				            if (isset($_POST['submit'])) {
				            	include ('scripts/secure.php');
								$username = safestrip($_POST['user']);
								$password = md5(safestrip($_POST['pass']));
								echo "<br/># ".$username." # ".$password." # <br/>";
								if(empty($username) or empty($password)) {
				                	echo "<p style='color:red;'>Поребителят или Паролата не са въведени!</p>";
				                }
				        		else {
				                	$q = <<<SQL
				                	SELECT id FROM users WHERE username='$username' AND password='$password'
SQL;
				                	$check_login = $conn -> query($q);

				                	if($check_login){
					                	if (mysqli_num_rows($check_login) == 1){
					                    	$run = mysqli_fetch_array($check_login,MYSQLI_ASSOC);
					                    	$user_id = $run['id'];
					                    	$_SESSION['user_id'] = $user_id;
					                    	header('location: newcontact.php');
					                	}
					                	else{
					                    	echo "<p style='color:red;'> Невярна парола или потребител</p>";
					                	}
				                	}
				                	else{
				                		echo "<p style='color:red;'> Ориентирайте се към бутона за регистрация</p>";
				                	}
				            	}   
				            }
				         ?>
						<label for="user">Поребител</label>
						<br>
						<input type="text" name="user" id="user">
						<br>
						<label for="pass">Парола</label>
						<br>
						<input type="password" name="pass" id="pass">
						<br>
						<input type="submit" name="submit" value="Влез">
						<button>
							<a href="reg.php">
								Регистрация
							</a>
						</button>
				      </form>
			<?php
			}
			?>
		</article>
		<?php
		include_once("footer.php");
		?>