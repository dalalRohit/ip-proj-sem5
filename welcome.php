<!DOCTYPE html>
<html>
<head>
	<title>Welcome!</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/welcome.css">

</head>

<body onload="loadPosts()" style="margin-top: 80px;">


<?php
require_once 'core/init.php';

if(Session::exists('home'))
{
	echo '<h4 class="alert alert-success">'. Session::flash('home') . '</h4>';
}


$user = new User();

if($user->isLoggedIn())
{

?> 

 <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Dashboard</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse" >
      <ul class="nav navbar-nav">
        <li><a href="#">Home</a></li>
        <!-- <li><a href="update.php">Change Password</a></li> -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href='logout.php'>Logout <i class="fa fa-user-plus"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>


<h4 class="alert alert-success">Welcome,</h4>

<main class="container main-posts">
	<ul class="allPosts">
		
	</ul>
</main>


<!-- Mustache template -->
<script id="post-template" type="text/template">
	<li class="post">
		<div id="innerId">
			<i class="fa fa-user fa-2x"></i>
			<span id="userIdPost">User: {{userId}}</span>	<br>
      <br>
			<span id="userIdTitle">Title: {{title}}</span>	
		</div>
		
		<p> {{body}} </p>
	</li>
</script>

<?php

if($user->hasPermission('admin')){
	echo "<p>Systems' finds that: You are an administrator!</p>";	
}

}
?> 

<!-- LIBS -->
<script type="text/javascript" src="./libs/bootstrap.min.js"></script>
<script type="text/javascript" src="./libs/jquery.min.js"></script>
<script type="text/javascript" src="./libs/mustache.js"></script>
<script type="text/javascript" src="./libs/axios.min.js"></script>
<script type="text/javascript" src="./libs/moment.js"></script>
<script type="text/javascript" src="./getPosts.js"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>
