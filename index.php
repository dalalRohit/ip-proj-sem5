<!DOCTYPE html>
<html>
<head>
	<title>Our Project</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="app.css">
</head>

<body>

 <nav class="navbar navbar-default navbar-fixed-top bg-dark navbar-dark">
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
        <li><a href="#">Home</a></li>
        <li><a href="about.php">About</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href='register.php'>Signup <i class="fa fa-user-plus"></i></a></li>
        <li><a href="login.php">Login  <i class="fa fa-user"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>

 <div class="container mainBody" style="margin-top: 60px;">
        <div class="content">
            <h1 class="">Microblogging website</h1>
            <h3>Sem 5 Internet Programming Project</h3>

        </div>

        <section class="desc" style="margin:10% 10%; ">
            This is a simple micro-blogging website which is built using Bootstrap,Js,Ajax.
            This website will simply allow you to register yourself with <b>username</b> & <b>password</b>. <br>
            Once registered,you can login via credentials and then you'll see sample posts as you
             see on Twitter! <br>
             The posts displayed are fetched from a sample API and using a Templating engine (Mustache) we are displaying it using some styling <b> without writing HTML code multiple times!</b>
        </section>
 </div>

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


</body>

</html>
