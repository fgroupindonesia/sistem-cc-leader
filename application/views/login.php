<!DOCTYPE html>
<html>
<head>
	<title>Sistem CC Leader</title>
	<link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/assets/css/style-login.css">
<link href="/assets/css/fonts-googleapis.css" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form >
                    <center>
					<label for="chk" aria-hidden="true">Checksheet Control Leader</label>
                    <img src="/assets/images/logo.png" >    
                </center>
				</form>
			</div>

			<div class="login">
				<form action="/dashboard" method="post"> 
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button>Login</button>
				</form>
			</div>
	</div>
</body>
</html>