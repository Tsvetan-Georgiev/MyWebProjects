<?php
						if (loggedin()){
							include ("viewDB.php");
						}
						else{
							echo "<tr><td colspan='8'>";
					?>
						<form method="post">
			         <?php
				            if (isset($_POST['submit'])) {
				            	include ('secure.php');
								$username = safestrip($_POST['user']);
								$password = md5(safestrip($_POST['pass']));
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
					                    	var_dump($run);
					                    	$user_id = $run['id'];
					                    	var_dump($user_id);
					                    	$_SESSION['user_id'] = $user_id;
					                    	header('location: index.php');
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