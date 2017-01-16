<?php
include_once ('parts/begin.php');
?>
<body>
	<div class="container">
		<?php
			include_once ("nav.php");
			include_once ("scripts/connect.php");
		?>
		<article>
			<table class="table-hover">
				<thead>
						<?php
							if(isset($_GET['sent'])==NULL){
							}
							elseif(isset($_GET['sent'])){
								echo "<tr><td><h2>Изтриването УСПЕШНО.</h2></tr></td>";
							}
							else{
								echo "<tr><td><h2>НЕУСПЕШНО изтриване.</h2></tr></td>";
							}
						?>
				</thead>
				<tbody>
					<tr>
						<td>
							<h1>Въведените контакти</h1>
						</td>
					</tr>
					<tr>
						<td id="align-top">
							<form name="remove" action="scripts/deleteFromDB.php" method="post" onsubmit="return validateRemove()">
								<label for="forRemove">Въведете номер за триене</label>
								<input type="number" id="forRemove" name="forRemove" min="1" autofocus>
								<br><br>
								<input type="submit" value="Готово">
							</form>
						</td>
						<td>
							<table>
								<tr>
									<td><b>Номер</b></td><td><b>Имена</b></td><td><b>Тел.номер</b></td><td><b>Алтернативен номер</b></td><td><b>Адрес</b></td><td><b>Електронна поща</b></td><td><b>Бележка</b></td><td><b>Дата на въвеждане</b></td>
								</tr>
									<?php include ("scripts/loginform.php");?>
							</table>
						</td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td>
							Контакти 1.0
						</td>
					</tr>
				</tfoot>
			</table>
		</article>
		<?php
		include_once("footer.php");
		?>
