<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/includes/init.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="We at ‘Changemaker.be’ are a group of value-driven youngsters who are creating a platform to bring the change-makers of the society together.">
    <meta name="author" content="Ravi Agrawal">

    <title>Blog - Changemaker</title>
    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS here -->
    <link href="css/changemaker.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
  </head>

  <body>
    <?php require_once(LIB_PATH."/navbar.php"); ?>

    <div class="container">

      <div class="row">

        <div class="col-lg-12">
          <h1 class="page-header">Blog <small>Blog Homepage</small></h1>
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Blog</li>
          </ol>
        </div>

      </div>

      <div class="row">

        <div class="col-lg-12">

          <h1><a href="blog-post.html">Don't just create a change. Be One!</a></h1>
          <p class="lead">by <a href="about.html">Abhijith Asok</a></p>
          <hr>
          <p><i class="fa fa-clock-o"></i> Posted on October 15, 2013 at 10:00 AM</p>
          <hr>
          <a href="blog-post.html"><img src="images/sunset.jpg" class="img-responsive profile-pic"></a>
          <hr>
          <p>With the world advancing on a technological and commercial forefront at a lightning pace, the expectations and dreams of humanity have skyrocketed to an altogether different level..</p>
          <a class="btn btn-primary" href="blog-post.html">Read More <i class="fa fa-angle-right"></i></a>

          <hr>

          <h1><a href="blog-post.html">Blog Post</a></h1>
          <p class="lead">by <a href="about.html">Ravi Agrawal</a></p>
          <hr>
          <p><i class="fa fa-clock-o"></i> Posted on November 15, 2013 at 10:00 PM</p>
          <hr>
          <a href="blog-post.html"><img src="http://placehold.it/900x300" class="img-responsive profile-pic"></a>
          <hr>
          <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets..</p>
          <a class="btn btn-primary" href="blog-post.html">Read More <i class="fa fa-angle-right"></i></a>

          <hr>

          <ul class="pager">
            <li class="previous"><a href="#">&larr; Older</a></li>
            <li class="next"><a href="#">Newer &rarr;</a></li>
          </ul>

        </div>

        <!--<div class="col-lg-4">
          <div class="well">
            <h4>Blog Search</h4>
            <div class="input-group">
              <input type="text" class="form-control">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
              </span>
            </div><!-- /input-group
          </div><!-- /well --><!--
          <div class="well">
            <h4>Popular Blog Categories</h4>
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled">
                    <li><a href="#">Change</a></li>
                    <li><a href="#">Change</a></li>
                    <li><a href="#">Change</a></li>
                    <li><a href="#">Change</a></li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled">
                    <li><a href="#">Change</a></li>
                    <li><a href="#">Change</a></li>
                    <li><a href="#">Change</a></li>
                    <li><a href="#">Change</a></li>
                  </ul>
                </div>
              </div>
          </div><!-- /well --><!--
        </div>-->
      </div>

    </div><!-- /.container -->

      <?php require_once(LIB_PATH."/modals.php"); ?>

    <div class="container">

      <hr>

      <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>Copyright &copy; Ravi Agrawal</p>
          </div>
        </div>
      </footer>

    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/changemaker.js"></script>
    <script src='/js/login.js' type='text/javascript'></script>
  <script src='/js/signup.js' type='text/javascript'></script>
  </body>
</html>