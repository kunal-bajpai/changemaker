<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/includes/init.php");
    if(isset($_GET['id']))
        $article=Article::find_by_id($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="We at ‘Changemaker.be’ are a group of value-driven youngsters who are creating a platform to bring the change-makers of the society together.">
    <meta name="author" content="Ravi Agrawal">

    <title>Article - Changemaker</title>
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
          <h1 class="page-header"><?php echo $article->head; ?></h1>
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Article</li>
          </ol>
        </div>

      </div>

      <div class="row">

        <div class="col-lg-12">
        
          <!-- the actual blog post: title/author/date/content -->
          <hr>
          <p><i class="fa fa-clock-o"></i> Source : <?php echo $article->source;?></p>
          <hr>
          <img src="<?php if(file_exists(UPLOAD_DIR.'articles/Article'.$article->id)) {echo '/images/articles/Article'.$article->id;} else {echo '/images/articles/default';}?>" class="img-responsive profile-pic">
          <hr>
          <p><?php echo $article->body; ?></p>
          <!--<p><strong>Other Reference Links:</strong></p>
          <ul>
            <li><a href="#">Reference 1</a></li>
            <li><a href="#">Reference 2</a></li>
            <li><a href="#">Reference 1</a></li>
          </ul>-->

          <hr>

          <!-- the comment box -->
          <div class="well">
            

        </div>
        <!--
        <div class="col-lg-4">
          <div class="well">
            <h4>Blog Search</h4>
            <div class="input-group">
              <input type="text" class="form-control">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
              </span>
            </div><!-- /input-group --><!--
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
        </div>
      </div>-->

    </div><!-- /.container -->
<div class="container">

      <hr>

      <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>Copyright &copy; 2013 Changemaker. All Rights Reserved</p>
          </div>
        </div>
      </footer>

    </div><!-- /.container -->
      <?php require_once(LIB_PATH."/modals.php"); ?>


    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/chanemaker.js"></script>
    <script src='/js/login.js' type='text/javascript'></script>
  <script src='/js/signup.js' type='text/javascript'></script>
  </body>
</html>