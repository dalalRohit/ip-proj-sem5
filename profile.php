<!DOCTYPE html>
<html>
<head>
	<title>You</title>
	<link rel="stylesheet" type="text/css" href="app4.css">
	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
</head>
<body>

</body>
</html>

<?php
require_once 'core/init.php';

if(!$username = Input::get('user')){
	Redirect::to('index.php');
}
else{
	$user = new User($username);

	if(!$user->exists()){
		Redirect::to(404);
	}
	else{
		$data = $user->data();
	}
	?>
<h3><p>Your Username: <?php echo escape($data->username);?></p></h3>
<p class="special">Full Name: <?php echo escape($data->name);?></p>
<?php	
}