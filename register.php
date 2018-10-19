 <?php
require_once 'core/init.php';

if(Input::exists()){
	if(Token::check(Input::get('token'))){
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'username' => array(
				'required' => true,
				'min' => 2,
				'max' => 20,
				'unique' => 'users'
				),
			'password' => array(
				'required' => true,
				'min' => 6,
				),
			'password_again' => array(
				'required' => true,
				'matches' => 'password'
				),
			'name' => array(
				'required' => true,
				'min' => 2,
				'max' => 50
				)
			));

		if($validation->passed()){
			$user = new User();
			$salt = Hash::salt(32);
			
			try{
				$user->create(array(
					'username' => Input::get('username'),
					'password' => Hash::make(Input::get('password'), $salt),
					'salt' => $salt,
					'name' => Input::get('name'),
					'joined' => date('Y-m-d H:i:s'),
					'groupp' => 1
				));

				Session::flash('home', 'You have been registered and can now log in!');
				Redirect::to('login.php');
			}catch(Exception $e){
				die($e->getMessage());
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
	<title>Register</title>
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
	<form action="" method="post">

	<br class="field">
		<label for="username">Username: </label>
		<input type="text" name="username" placeholder="username" id="username" value="<?php echo escape(Input::get('username'));?>" autocomplete="off">
	</br>

	<br class="field">
		<label for="password">Enter Your Password: </label>
		<input type="password" name="password" placeholder="password">
	</br>

	<br class="field">
		<label for="password_again">Confirm Your Password Again: </label>
		<input type="password" name="password_again" placeholder="password_again">
	</br>

	<br class="field">
		<label for="name">Your Name: </label>
		<input type="text" name="name" placeholder="fname,lname" value="<?php echo escape(Input::get('name'));?>">
	</br>
	

	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	<input type="submit" value="Register">
	</form>
</main>
</body>
</html>