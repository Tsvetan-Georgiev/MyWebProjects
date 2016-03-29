<?php
   include_once('../parts/header.php');
?>
<title>Административен панел</title>
<link rel="stylesheet" type="text/css" href="../style/style-normalize.css">
<link rel="stylesheet" type="text/css" href="../style/myStyle.css">
<link rel="stylesheet" type="text/css" href="../style/forstories.css">
<link rel="stylesheet" type="text/css" href="../style/foradminpanel.css">
<link rel="icon" type="image/png" href="../images/favicon.ico">
<script type="text/javascript" src="../scripts/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>
</head>
<body>
<div id="wrapper">
   <?php
      include_once('../scripts/connect.php');
   ?>
   <?php
      include_once('../scripts/session.php');
   ?>
   <?php
      include_once('../scripts/nav.php');
   ?>
   <div id="content">
      
   </div>
	<footer>
	</footer>
</div>
</body>
</html>