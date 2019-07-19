<?php
if ( session_status() == PHP_SESSION_NONE ) session_start();
?>

<html>
	<head>
		<title>System</title>
		<script src="/static/jquery/jquery-3.4.1.js"></script>
		<script src="/static/bootstrap/dist/js/bootstrap.js"></script>
		<link rel="stylesheet" href="/static/bootstrap/dist/css/bootstrap.css"></link>
		<script>
		function form_submit() {
			if ( $("#username").val() == "" ) {
				$("#username").parent().addClass("has-warning");
				$("#username").parent().addClass("has-feedback");
				$("#username").focus();
				return false;			
			}
			if ( $("#password").val() == "" ) {
				$("#password").parent().addClass("has-warning");
				$("#password").parent().addClass("has-feedback");
				$("#password").focus();
				return false;			
			}
			return true;
		}
	</script>
	</head>
	<body>
		<div class="container">
			<div class="jumbotron">
				<h1>System</h1>
			</div>
			<div class="form-vertical">
				<form method="POST" action="index.php" onsubmit="return form_submit()">
					<div class="form-group">
						<label for="username">Username: </label>
						<input class="form-control" type="text" name="username" id="username">
					</div>
					<div class="form-group">
						<label for="password">Password: </label>
						<input class="form-control" type="password" name="password" id="password">
					</div>
					<input type="hidden" name="action" value="login">
					<button type="submit" class="btn btn-success">Entrar</button>
				</form>
			</div>
		</div>
	</body>
</html>