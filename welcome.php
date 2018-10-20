<!DOCTYPE html>
<html>
<head>
	<title>Welcome!</title>

		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

</head>
<style type="text/css">
	.main-posts {
		margin-top: 40px;
		display: flex;
		flex-direction: column;
		width: 60%;
		margin: 0 20% 0 20%;
		max-width: 100%;
		/*border: 1px solid red;*/
		background-color: #eee;
		font-family: monospace;
		padding: 1.2em;
		font-size: 1.3rem;
	}
	li {
		list-style-type: none;
	}
	.post{
		/*border: 1px dashed blue;*/
		padding: 1.5rem;
	}
	#innerId{
		border-bottom: 1px dotted purple;
	}
	#userIdPost{
		font-size: 1.4em;
	}
</style>
<body onload="loadPosts()">


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
      <a class="navbar-brand" href="#">IP_PROJECT</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse" >
      <ul class="nav navbar-nav">
        <li><a href="#">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href='logout.php'>Logout <i class="fa fa-user-plus"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>


<main class="container main-posts">
	<ul class="allPosts">
		
	</ul>
</main>


<!-- Mustache template -->
<script id="post-template" type="text/template">
	<li class="post">
		<div id="innerId">
			<i class="fas fa-user-circle fa-3x"></i>
			<span id="userIdPost">User: {{userId}}</span>	<br>
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

<script type="text/javascript" src="./getPosts.js"></script>

</body>
</html>
