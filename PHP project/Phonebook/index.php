<?php
include_once ('parts/begin.php');
?>
<body>
	<div class = "container">
		<?php
			include_once ("nav.php");
		?>
		<article>
			<table class="table-hover table-responsive">
				<thead>
					<tr>
						<td class = "col-md-6">
							<h1>
								Въведените контакти
							</h1>
						</td>
						<td class = "col-md-6">
							<form method = "POST">
								<input type = "text" name = "search" autofocus>
								<input type = "submit" name = "submitsearch" style = "display:none">
							</form>
						</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<form method = "GET">
						<td style="margin:0;padding:0">
							<!-- <b><span style="z-index:2">Номер</span></b> -->
							<input type = "submit" name = "sort_number" value = "Номер" class = "cont_thead">
						</td>
						<td  style="margin:0;padding:0">
							<!-- <b>Имена</b> -->
							<input type = "submit" name = "sort_name" value = "Имена" class = "cont_thead" >
						</td>
						<td  style="margin:0;padding:0">
							<!-- <b>Тел.номер</b> -->
							<input type = "submit" name = "sort_phonenum" value = "Тел.номер" class = "cont_thead">
						</td>
						<td  style="margin:0;padding:0">
							<!-- <b>Алтернативен номер</b> -->
							<input type = "submit" name = "sort_phonenum2" value = "Алтернативен номер" class = "cont_thead">
						</td>
						<td  style="margin:0;padding:0">
							<!-- <b>Адрес</b> -->
							<input type = "submit" name = "sort_addr" value = "Адрес" class = "cont_thead">
						</td>
						<td  style="margin:0;padding:0">
							<!-- <b>Електронна поща</b> -->
							<input type = "submit" name = "sort_email" value = "Електронна поща" class = "cont_thead">
						</td>
						<td  style="margin:0;padding:0">
							<!-- <b>Бележка</b> -->
							<input type = "submit" name = "sort_note" value = "Бележка" class = "cont_thead">
						</td>
						<td  style="margin:0;padding:0">
							<!-- <b>Дата на въвеждане</b> -->
							<input type = "submit" name = "sort_date" value = "Дата на въвеждане" class = "cont_thead">
						</td>
						</form>
					</tr>
					<?php
						include_once ('scripts/loginform.php');
					?>
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
