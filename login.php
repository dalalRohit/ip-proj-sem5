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
				echo '<p>Sorry, logging in failed.</p>';
			}
		}
		else{
			foreach ($validation->errors() as $error){
				echo $error, '<br>';
			}
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

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
      <a class="navbar-brand" href="#">IP_PROJECT</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse" >
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href='register.php'>Signup <i class="fa fa-user-plus"></i></a></li>
        <li><a href="login.php">Login  <i class="fa fa-user"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>
<main style="margin-top: 60px;" class="container">
	<form action="" method="post" >
		<br class="field">
			<label for="username">Username: </label>
			<input type="text" name="username" placeholder="your username" id="username" autocomplete="off">
		</br>

		<br class="field">
			<label for="password">Password: </label>
			<input type="password" name="password" placeholder="your password" id="password" autocomplete="off">
		</br>

		<br class="field">
			<label for="remember">
				<input type="checkbox" name="remember" id="remember"> Remember me
			</label>
		</br>	

		<input type="hidden" name="token" value="<?php echo Token::generate();?>">
		<input type="submit" value="Log in">
	</form>
</main>


</body>
</html>