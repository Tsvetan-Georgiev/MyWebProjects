<header>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class = "container-fluid">
  		<div class = "navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class = "navbar-brand" href="index.php">Тел.Указател</a>
  		</div>
      <div class="collapse navbar-collapse" id="menu">
  			<ul  class="nav navbar-nav">
  				<li class = "active">
  					<a href="index.php">
  						Контакти
  					</a>
  				</li><li>
  					<a href="newcontact.php">
  						Нов Контакт
  					</a>
  				</li><li>
  					<a href="edit.php">
  						Редактиране
  					</a>
  				</li><li>
  					<a href="remove.php">
  						Изтриване
  					</a>
  				</li>
  				<?php
  				include_once ('scripts/connect.php');
  					if(loggedin()){

  				?>
  				<li>
  					<a href="scripts/logout.php">
  						Излизане
  					</a>
  				</li>
  				<?php
  					}
  				?>
  			</ul>
      </div>
		</div>
	</nav>
</header>
