<?php
	if (loggedin()){
		include_once ("scripts/secure.php");
		include ("viewDB.php");
	}
	else{
		echo "<tr><td colspan='8'>";
?>
	<form method="POST">
 <?php
		if (isset($_POST['submit'])) {
			include ('secure.php');
			$page = $_SERVER['PHP_SELF'];
			$sec = "0.5";
			$username = safestrip($_POST['user']);
			$password = md5(safestrip($_POST['pass']));
			if(empty($username) or empty($password)) {
				echo "<p style='color:red;'>Потребителят или Паролата не са въведени!</p>";
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
						echo '<script>window.location.reload(true)</script>';//header("Refresh: $sec; url=$page");
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
		echo "</td></tr>";
	}
?>
