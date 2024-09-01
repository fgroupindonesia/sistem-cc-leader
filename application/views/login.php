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
				<form action="/verify" method="post"> 
					<label for="chk" aria-hidden="true">Login</label>
	<input type="text" name="username" placeholder="Username" required="">
	<input type="password" name="pass" placeholder="Password" required="">
					<button>Login</button>
				</form>
			</div>
	</div>
</body>
</html>