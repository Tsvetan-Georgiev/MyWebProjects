<?php
   include_once('../parts/header.php');
?>
<title>Вход към администраторския панел</title>
<link rel="stylesheet" type="text/css" href="../style/style-normalize.css">
<link rel="stylesheet" type="text/css" href="../style/myStyle.css">
<link rel="stylesheet" type="text/css" href="../style/forloginpage.css">
</head>
<body>
<?php
   include_once('../scripts/connect.php');
   include_once('../scripts/session.php');
?>
<div id="wrapper">
<?php
   include_once('../scripts/nav.php');
?>
	<div id="content">
      <form method="post" >
         <?php
            // function to escape data and strip tags
            function safestrip($string){
               $string = strip_tags($string);
               $string = mysql_real_escape_string($string);
               return $string;
            }
            if (isset($_POST['submit'])) {
               $username = safestrip($_POST['user']);
               $password = md5(safestrip($_POST['pass']));
               if (empty($username) or empty($password)) {
                  echo "<p style='color:red;'>Поребителят или Паролата не са въведени!</p>";
               } else {
                  $check_login = mysql_query("SELECT id FROM user WHERE username='$username' AND password='$password'");
                  if (mysql_num_rows($check_login) == 1){
                     $run = mysql_fetch_array($check_login);
                     $user_id = $run['id'];
                     $_SESSION['user_id']= $user_id;
                     header('location: ../administration/adminpanel.php');
                  }
                  else{
                     echo "<p style='color:red;'> Невярна парола или потребител. Паролата е $password</p>";
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
      </form>
   </div>
	<footer>
	</footer>
</div>
</body>
</html>