<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style type="text/css">
	input[type='text'],input[type='password']{
		width: 50%;
	}

	.myform{
		width: 80%;
		max-width: 100%;
		margin: 0 10% 0 10%;
		padding: 2rem;
		font-family: monospace;
	}
	.myalert{
		text-align: center;
		width: 50%;
		margin: 0 25% 0 25%;
	}
	.myalert:first-child{
		margin-top: 60px;
	}
	.myalert:last-child{
		margin-bottom: 10px;
	}
</style>

<?php
require_once 'core/init.php';

if (Input::exists()) {
	if(Token::check(Input::get('token'))){

		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'username' => array('required' => true),
			'password' => array('required' => true)
			));

		if($validation->passed()){
			$user = new User();

			$remember = (Input::get('remember') === 'on') ? true : false;
			$login = $user->login(Input::get('username'), Input::get('password'), $remember);

			if($login){
				Redirect::to('welcome.php');
			}
			else{
				echo '<h5 class="alert alert-danger myalert">'.'User not found! Check details..'.'</h5>';
			}
		}
		else{
			foreach ($validation->errors() as $error)
			{
				
				echo '<h5 class="alert alert-danger myalert">'.$error.'</h5>';
			}
		}
	}
}
?>

<body>
 <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">IP-PROJECT</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse" >
      <ul class="nav navbar-nav">
        <li ><a href="/ip-project">Home</a></li>
        <li><a href="#about">About</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href='register.php'>Signup <i class="fa fa-user-plus"></i></a></li>
        <li><a href="login.php">Login  <i class="fa fa-user"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>

 <main style="margin-top: 60px;" class="container">
 	<h2 class="alert alert-info">Login</h2>

	<form action="" method="post" class="form-group myform">

		<label for="username">Username: </label>
		<input  class="form-control" type="text" name="username"  value="<?php echo escape(Input::get('username'));?>" autocomplete="off" />

		<label for="password">Enter Your Password: </label>
		<input class="form-control" type="password" name="password" >
	
		<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

		<input type="submit" class="btn btn-info" value="Register">

	</form>
</main>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>