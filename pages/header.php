<?php require 'config.php'; ?>
<html>
<head>
	<title>Classificados</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script  src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="./" class="navbar-brand">Classificado</a>
				</div>
			<ul class="nav navbar-nav navbar-right">
				<?php 
				if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): 				
				require 'classes/usuarios.class.php';
				 $id = $_SESSION['cLogin'];
				$u = new Usuarios();
				
				 $dados = $u->getNome($id);
				 ?>
				 <div class="navbar-brand">
				 	Olá, <?php  echo $dados; ?>
				 </div>
				<li><a href="meus-anuncios.php">Meus Anúncios</a></li>
				<li><a href="sair.php">Sair</a></li>
				<?php else: ?>
				<li><a href="Cadastre-se.php">Cadastre-se</a></li>
				<li><a href="login.php">Login</a></li>
				<?php endif; ?>
				
			</ul>
		</div>
		

	</nav>