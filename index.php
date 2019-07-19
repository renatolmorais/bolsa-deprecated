<?php
if ( session_status() == PHP_SESSION_NONE ) session_start();

header( "Cache-Control: no-cache, must-revalidate" );
header( "Pragma: no-cache" );

//var_dump($_REQUEST);
//var_dump($_POST);
//var_dump($_SESSION);

if ( array_key_exists("action",$_POST) && $_POST["action"] == "login" )
{
	$username = ( array_key_exists("username",$_POST) ? $_POST["username"] : "");
	$password = ( array_key_exists("password",$_POST) ? $_POST["password"] : "");
	if ( $username == "renato" && $password == "renato" )
	{
		$_SESSION["loginok"] = 1;
		$_SESSION["username"] = $username;
	}
	else
	{
		$_SESSION["loginok"] = 0;
	}
	header("Location: index.php");
}
elseif ( array_key_exists("action",$_POST) && $_POST["action"] == "logout" )
{
	session_destroy();
	header("Location: login.php");
}
elseif ( ! array_key_exists("loginok",$_SESSION ) || $_SESSION["loginok"] != 1 )
{
	header("Location: login.php");
}

?>

<html>
	<head>
		<title>System</title>
		<script src="/static/jquery/jquery-3.4.1.js"></script>
		<script src="/static/bootstrap/dist/js/bootstrap.js"></script>
		<link rel="stylesheet" href="/static/bootstrap/dist/css/bootstrap.css"></link>
	</head>
	<body>
		<div class="container">
			<div class="jumbotron">
				<h1>System</h1>
				<span>Seja bem-vindo, <?php echo $_SESSION["username"]; ?></span>
				<div class="form-vertical">
					<form method="POST" action="">
						<input type="hidden" name="action" value="logout">
						<button type="submit" class="btn btn-danger">Sair</button>
					</form>
				</div>
			</div>
		</div>
		
	</body>
</html>