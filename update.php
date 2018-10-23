<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>

</body>
</html>


<?php
require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn()){
	Redirect::to('index.php');
}

if(Input::exists()){
	if(Token::check(Input::get('token'))){
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'name' => array(
				'required' => true,
				'min' => 2,
				'max' => 50
				)
			));

		if($validation->passed()){
			
			try{
				$user->update(array(
					'username' => Input::get('username')
				));

				Session::flash('home', 'Your details have been updated');
				Redirect::to('index.php');
			}
			catch(Exception $e){
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

<form action="" method="post">
	<div class="container">

	<form action="" method="post" class="form-group myform">
		<label for="username">Update The username To: </label>
		<input type="text" name="username" class="form-control" 
			value="<?php echo escape($user->data()->username); ?>" >

		<br>

		<label for="password">Update The Password To: </label>
		<input type="password" class="form-control" name="password">

		<input type="submit" class="btn btn-info" value="Update">

		<input type="hidden" name="token" value="<?php echo Token::generate();?>">

	</form>

	</div>

</form>