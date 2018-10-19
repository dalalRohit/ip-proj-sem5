<!DOCTYPE html>
<html>
<head>
	<title>Welcome!</title>
	<link rel="stylesheet" type="text/css" href="./bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<style type="text/css">
	.main-posts {
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


<!-- <?php
// require_once 'core/init.php';

// if(Session::exists('home')){
// 	echo '<p>'. Session::flash('home') . '</p>';
// }


// $user = new User();

// if($user->isLoggedIn()){
?> -->


<h2> Hello, welcome to our project, </h2> 
<ul>
	<li><a href="logout.php">Log Out</a></li>
	<li><a href="update.php">Update Name</a></li>
	<li><a href="changepassword.php">Change password</a></li>
</ul>


<main class="container main-posts">
	<ul class="allPosts">
		
	</ul>
</main>
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

<!-- <?php

// if($user->hasPermission('admin')){
// 	echo "<p>Systems' finds that: You are an administrator!</p>";	
// }

// }
?> -->
<script type="text/javascript" src="./bootstrap.min.js"></script>
<script type="text/javascript" src="./jquery.min.js"></script>
<script type="text/javascript" src="./mustache.js"></script>
<script type="text/javascript" src="./axios.min.js"></script>
<script type="text/javascript" src="./getPosts.js"></script>

</body>
</html>
