<html>
<head>
    <!-- <link rel="stylesheet" type="text/css" href="< //base_url('assets/css/bootstrap.min.css'); ">
	<link rel="stylesheet" type="text/css" href=" https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/sandstone/bootstrap.min.css">
	 -->
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/ico/favicon.ico">

    <title>Webox.</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/js/modernizr.js"></script>

<!--	<title>Webox</title>-->

</head>

<body>


  <!-- <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">WeBox</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Login <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Sign Up</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categories <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Windows Apps</a></li>
            <li class="divider"></li>
            <li><a href="#">Android Apps</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search Apps">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
  </div>
</nav>
 -->

 <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url().'user/index'; ?>">WeBox.</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">

            <li class="active"><a href="<?php echo site_url().'user/index'; ?>">HOME</a></li>
              <?php
              if($this->session->userdata('dev_id'))
              {
                  echo "<li><a href=".site_url()."user/logout".">LOGOUT</a></li>";
              }
              else
                  {
                      echo  "<li><a href=".site_url()."user/login".">LOGIN</a></li>";
                      echo "<li><a href=".site_url()."user/signup".">SIGN UP</a></li>";
                  }
              ?>



            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">APPLICATIONS <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="blog.html">WINDOWS APPS</a></li>
                <li><a href="single-post.html">ANDROID APPS</a></li>
<!--                <li><a href="portfolio.html">PORTFOLIO</a></li>-->
<!--                <li><a href="single-project.html">SINGLE PROJECT</a></li>-->
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>