<!DOCTYPE html>
<html>
<head>
	<?php 
		include '../controller/security.php';
		protegePagina();
	 ?>
	<title>OpenLib - Sistema para Bibliotecas</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<link rel="shortcut icon" href="image/favicon.png" />
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.mask.js"></script>
	<script type="text/javascript" src="js/mascara.js"></script>
	<script type="text/javascript" src="js/all.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" type="text/css" href="css/custom.css"">
</head>
<body class="bodySistema">
		
	<?php  
		include 'menu_sistema.php';
	?>
	<div class="conteudoSistema">
	<?php
		function getGet( $key ){
                return isset( $_GET[ $key ] ) ? $_GET[ $key ]:null;
        }
        if(isset($_GET['pg'])){
            $pg = getGet('pg');
            if( is_file( 'telasCadastro/'.$pg.'.php' ) )
                    include 'telasCadastro/'.$pg.'.php';
            else
                    include 'telasCadastro/home.php';
        }else{
            include 'telasCadastro/home.php';
        }
	?>
	</div>
</body>
</html>